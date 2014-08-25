<?php
session_start();
require_once('includes/header.php');
if (isset($_SESSION['isLogged']) && $_SESSION['isLogged'] == true) {

    echo 'Hello User: <b>' . $_SESSION['userinfo']['username'] . '</b>!</br>';
    echo 'First Name: ' . $_SESSION['userinfo']['firstname'] . '</br>';
    echo 'Last Name: ' . $_SESSION['userinfo']['lastname'] . '</br>';
    echo '<a href="logout.php">Logout</a>';
}
?>

<section>
    <h3>Create new album</h3>
    <form method="post">
        <label for="name">Album Name: </label>
        <input type="text" id="name" name="album[]" maxlength="25" pattern=".{3,}" required
               title="The name can contain only english characters and numbers from zero to nine."/>
        <br>
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
    <div class="validateField">
        <?php
        if (isset($_POST['album'])) {
            createAlbum($_POST['album']);
        }
        ?>
    </div>
</section>

<section>
    <h3>Top Rated Albums</h3>
    <p><strong>TO DO</strong></p>
</section>

<script src="scripts/albumNameValidator.js" defer></script>

<?php
require_once('includes/footer.php');
