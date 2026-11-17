<?php
include("includes/head.php");
include("includes/mainnav.php");
?>

<h2>Bucketlist</h2>
<p>Här är min bucketlist</p>
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
<div class="bucketlist">
    <h3>Min bucketlist</h3>
    <table>
        <thead>
            <th>Namn</th>
            <th>Beskrivning</th>
            <th>Prioritet</th>
            <th>Ta bort</th>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<?php
include("includes/footer.php");
?>