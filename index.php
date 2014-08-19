<?php
require_once('includes/header.php');
require ("createAlbum.php");
?>

<section>
    <h3>Create new album</h3>
    <form method="post">
        <label for="name">Album Name: </label>
        <input type="text" name="album[]" id="name" required="required" pattern=".{3,}"/>
        <label for="category">Category: </label>
        <select id="category" name="album[]" required="required">
            <option hidden selected></option>
            <?php
            foreach ($categories as $category) {
                echo "<option value='$category'>$category</option>";
            }
            ?>
        </select>
        <input type="submit" value="Create"/>
    </form>

    <?php
    if (isset($_POST['album'])) {
        createAlbum($_POST['album']);
    }
    ?>
    <script src="scripts/albumNameValidator.js"></script>
</section>

<section>
    <h3>Top rated</h3>

</section>

<?php
require_once('includes/footer.php');
