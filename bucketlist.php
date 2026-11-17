<?php
require __DIR__ . '/includes/init.php';

// ------- DATA & VARIABLER --------
$storage = new Storage($db);
$errors = [];
$name = $description = $priority = ''; //empty forms
$buckets = $storage->getAll();

// ------- POST --------

if (isset($_POST['name'])) {
    $name = trim($_POST['name'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $priority = trim($_POST['priority'] ?? '');

    //validation
    if ($name === '')  $errors[] = 'Namn måste fyllas i.';
    if ($description === '') $errors[] = 'Beskrivning måste fyllas i.';

    if (mb_strlen($name) > 32)         $errors[] = 'Namn får vara högst 32 tecken.';
    if (mb_strlen($description) > 150) $errors[] = 'Beskrivning får vara högst 150 tecken.';

    if (!ctype_digit($priority) || (int)$priority < 1 || (int)$priority > 5) {
        $errors[] = 'Prioritet måste vara ett heltal mellan 1 och 5.';
    }

    //if no errros, create new bucket to databse
    if(!$errors) {
                    
        $bucket = new Bucket($name, $description, (int)$priority);

        if ($storage->create($bucket)) {
            header('Location: bucketlist.php'); //redirect after POST
            exit;
        }

        $errors[] = 'Något blev fel vid skapandet av Bucket.';
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
        <label for="name">Namn:</label>
        <input type="text" id="name" name="name" value="<?= e($name) ?>">

        <label for="description">Beskrivning:</label>
        <input type="text" id="description" name="description" value="<?= e($description) ?>">

        <label for="priority">Prioritet:</label>
        <input type="number" id="priority" name="priority" value="<?= e($priority) ?>">

        <button type="submit">Lägg till</button>
    </form>
</div>

<div class="bucketlist">
    <h3>Min bucketlist: (<?= count($buckets) ?>)</h3>
    <table>
        <thead>
            <th>Namn</th>
            <th>Beskrivning</th>
            <th>Prioritet</th>
            <th>Ta bort</th>
        </thead>
        <tbody>
            <!-- Print buckets to table -->
            <?php foreach ($buckets as $bucket): ?>
                <tr>
                    <td><?= e($bucket->getName()) ?></td>
                    <td><?= e($bucket->getDescription()) ?></td>
                    <td><?= e((string)$bucket->getPriority()) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
include("includes/footer.php");
?>