<?php
require_once('includes/header.php');
?>

<section>
    <h3>Create new album</h3>
    <form method="post" action="createAlbum.php">
        <label for="name">Album Name: </label>
        <input type="text" id="name" name="album[]" maxlength="25" required
               title="The name can contain only english characters and numbers from zero to nine."/>
        <label for="category">Category: </label>
        <select id="category" name="album[]" required>
            <option hidden selected></option>
            <?php
            foreach ($categories as $category) {
                echo "<option value='$category'>$category</option>";
            }
            ?>
        </select>
        <input type="submit" value="Create"/>
    </form>
</section>

<section>
    <h3>Top rated</h3>

</section>

<script src="scripts/albumNameValidator.js" defer></script>

<?php
require_once('includes/footer.php');