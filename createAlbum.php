<?php

if (isset($_POST['album'])) {
    $album = ($_POST['album']);

    $albumName = htmlentities(trim($album[0]));
    $category = htmlentities($album[1]);

    if ((preg_match('/\w{3,}/', $albumName))) {

        $pathToAlbum = "albums/$category/$albumName";

        if (!(file_exists($pathToAlbum))) {
            mkdir($pathToAlbum);
            header("Location: uploadPage.php?album=$albumName");
            die();
        } else {
            echo '<p>Album with this name already exist!<p>';
        }
    } else {
        echo '<p>The name of album must have at least three symbols and'
            . 'can contain only english characters and numbers from zero to nine.</p>';
    }
}