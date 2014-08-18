<?php
require_once('includes/header.php');
?>

<section>
    <h3>Create new album</h3>
    <form method="post">
        <label for="name">Album Name: </label>
        <input type="text" name="name" id="name"/>
        <label for="category">Category: </label>
        <select id="category" name="category">
            <option hidden selected></option>
            <?php
            foreach ($categories as $category) {
                echo "<option value='#'>$category</option>";
            }
            ?>
        </select>
        <input type="submit" value="Create"/>
    </form>
</section>

<section>
    <h3>Top rated</h3>

</section>

<?php
require_once('includes/footer.php');