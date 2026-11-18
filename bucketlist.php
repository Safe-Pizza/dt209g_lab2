<?php
require __DIR__ . '/includes/init.php';

// ------- DATA & VARIABLER --------
$storage = new Storage($db);
$errors = [];
$name = '';
$description = '';
$priority = 3;
$buckets = $storage->getAll();

// ------- POST --------

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $action = $_POST['action'] ?? '';

    // ------ ACTION - LÄGG TILL -------
    if ($action === 'create') {
        $name = trim($_POST['name'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $priority = (int) ($_POST['priority'] ?? 1);

        //validation
        if ($name === '')  $errors[] = 'Namn måste fyllas i.';
        if ($description === '') $errors[] = 'Beskrivning måste fyllas i.';

        if (mb_strlen($name) > 32)         $errors[] = 'Namn får vara högst 32 tecken.';
        if (mb_strlen($description) > 150) $errors[] = 'Beskrivning får vara högst 150 tecken.';

        if (!in_array($priority, [1, 2, 3], true)) {
            $errors[] = 'Ogiltig prioritet.';
            $priority = 3;
        }

        //if no errros, create new bucket to databse
        if (!$errors) {

            $bucket = new Bucket($name, $description, (int)$priority);

            if ($storage->create($bucket)) {
                header('Location: bucketlist.php'); //redirect after POST
                exit;
            }

            $errors[] = 'Något blev fel vid skapandet av Bucket.';
        }
    }

    //----- ACTION - TA BORT -----
    if ($action === 'delete') {
        $id = filter_var($_POST['id'] ?? null, FILTER_VALIDATE_INT);

        if ($id === false || $id <= 0) {
            $errors[] = 'Ogiltigt id.';
        } elseif ($storage->delete($id)) {
            header('Location: bucketlist.php'); // redirect after POST
            exit;
        } else {
            $errors[] = 'Kunde inte ta bort bucketen.';
        }
    }
}

include("includes/head.php");
include("includes/mainnav.php");


?>

<h2>Bucketlist</h2>
<p>Här är min bucketlist</p>

<div class="error-msg">
    <?php foreach ($errors as $error): ?>
        <p class="error"><?= e($error) ?></p>
    <?php endforeach; ?>
</div>

<div class="form-add-to-list">
    <form method="post">
        <input type="hidden" name="action" value="create">

        <label for="name">Namn:</label>
        <input type="text" id="name" name="name" value="<?= e($name) ?>">

        <label for="description">Beskrivning:</label>
        <textarea id="description" name="description"><?= e($description) ?></textarea>

        <label for="priority">Prioritet:</label>
        <select name="priority" id="priority">
            <option value="1" <?= $priority === 1 ? 'selected' : '' ?>>Hög</option>
            <option value="2" <?= $priority === 2 ? 'selected' : '' ?>>Medel</option>
            <option value="3"<?= $priority === 3 ? 'selected' : '' ?>>Låg</option>
        </select>

        <button type="submit">Lägg till</button>
    </form>
</div>

<div class="bucketlist">
    <h3>Min bucketlist(<?= count($buckets) ?>)</h3>
    <!-- Kontroll om databas saknar buckets skriv ut p-element -->
    <?php if (!$buckets): ?>
        <p>Listan är tom. Lägg till något!</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Namn</th>
                    <th>Beskrivning</th>
                    <th>Prioritet</th>
                    <th>Ta bort</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop för att skriva ut buckets från databas -->
                <?php foreach ($buckets as $bucket): ?>
                    <tr>
                        <td><?= e($bucket->getName()) ?></td>
                        <td><?= e($bucket->getDescription()) ?></td>
                        <td><?= e((string)$bucket->getPriorityLabel()) ?></td>
                        <td>
                            <form method="post" class="form-delete" onsubmit="return confirm('Vill du verkligen ta bort?');">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="id" value="<?= (int) $bucket->getId() ?>">
                                <input type="submit" value="Ta bort">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<?php
include("includes/footer.php");
?>