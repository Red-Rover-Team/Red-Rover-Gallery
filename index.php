<?php
require_once('includes/header.php');
require ('createAlbum.php');
?>

<section>
    <h3>Create new album</h3>
    <form method="post" action="">
        <label for="name">Album Name: </label>
        <input type="text" id="name" name="album[]" maxlength="25" pattern=".{3,}" required
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
    <div class="validateField" style="min-height: 50px;max-height: 50px">
        <?php
        //dont change or delete this!
        if (isset($_POST['album'])) {
            createAlbum($_POST['album']);
        }
        ?>
    </div>
</section>

<section>
    <h3>Top rated</h3>

</section>

<script src="scripts/albumNameValidator.js" defer></script>

<?php
require_once('includes/footer.php');
