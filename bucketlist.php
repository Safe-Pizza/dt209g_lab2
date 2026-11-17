<?php
require __DIR__ . '/includes/init.php';
$storage = new Storage($db);
$errors = [];

// ------- HANTERA POST --------

if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $priority = $_POST['priority'];

    if ($name === '')  $errors[] = 'Namn måste fyllas i.';
    if ($description === '') $errors[] = 'Beskrivning måste fyllas i.';
    if ($priority === '') $errors[] = 'Prioritet måste fyllas i.';
    if ($priority !== '' && (!ctype_digit($priority))) {
        $errors[] = 'Prioritet måste vara ett heltal';
    }

    if(!$errors) {
                    
        $bucket = new Bucket($name, $description, $priority);

        if (!$storage->create($bucket)) {
            echo '<p>Något blev fel vid skapandet av Bucket</p>';
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
        <label for="name">Namn:</label>
        <input type="text" id="name" name="name">

        <label for="description">Beskrivning:</label>
        <input type="text" id="description" name="description">

        <label for="priority">Prioritet:</label>
        <input type="number" id="priority" name="priority">

        <button type="submit">Lägg till</button>
    </form>
</div>
<?php $buckets = $storage->getAll(); ?>
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