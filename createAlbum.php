<?php
require_once('includes/header.php');

//don't change or delete this
function createAlbum($album) {
    $albumName = htmlentities($album[0]);
    $category = htmlentities($album[1]);

    if ((preg_match('/\w{3,}/', $albumName))) {
        $pathToAlbum = "albums/$category/$albumName";

        if ((file_exists($pathToAlbum))) {
            echo '<p style="display:inline-block">Album with this name already exist!</p>';
            die();
        }

        //addToDatabase($albumName, $category);
        mkdir($pathToAlbum);
        header("Location: uploadPage.php?album=$category/$albumName");
        die();
    } else {
        echo '<p style="display:inline-block">The name of album must have at least three symbols and'
           . 'can contain only english characters and numbers from zero to nine.</p>';
    }
}

// creating database entry for the album
function addToDatabase($albumName, $category) {
    global $dbName, $hostname, $username, $password;
    $date = date('d-m-Y');
    $dsn = "mysql:host=$hostname; dbname=$dbName; charset=utf8";

    $dbh = new PDO($dsn, $username, $password);
    $sql = "INSERT INTO albums (album_name, album_category, date_of_creation) "
         . "VALUES ('$albumName', '$category', '$date')";
    $q = $dbh->prepare($sql);
    $q->execute();
}
?>

<section>
    <h3>Create new album</h3>
    <form method="post">
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
    <div class="validateField">
    <?php
    //don't change or delete this
    if (isset($_POST['album'])) {
        createAlbum($_POST['album']);
    }
    ?>
    </div>
</section>

<script src="scripts/albumNameValidator.js" defer></script>