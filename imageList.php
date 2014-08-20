<?php
require_once('includes/header.php');

if (isset($_GET['album']) && !empty($_GET['album']) &&
        isset($_GET['cat']) && in_array($_GET['cat'], $categories)) {
    $currentDir = $_GET['cat'];
    $albumName = $_GET['album'];
    $album = "albums/$currentDir/$albumName";
    if (file_exists($album)) {
        $images = scandir($album, 1);
        $images = array_diff($images, ['.', '..']);
        ?>
        <section>
            <h3><?= $albumName ?></h3>
            <div>
                <?php
                foreach ($images as $img) {
                    echo "<img src='$album/$img' alt='img'/>";
                }
                ?>
            </div>
        </section>
        <?php
    } else {
        echo "<section><h3>This album do not exist</h3></section>";
    }
} else {
    echo "<section><h3>This album do not exist</h3></section>";
}

require_once('includes/footer.php');
