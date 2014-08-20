<?php

//dont change or delete this!
function createAlbum($album) {

    $albumName = htmlentities($album[0]);
    $category = htmlentities($album[1]);

    if ((preg_match('/\w{3,}/', $albumName))) {

        $pathToAlbum = "albums/$category/$albumName";

        if (!(file_exists($pathToAlbum))) {
            mkdir($pathToAlbum);
            header("Location: uploadPage.php?album=$category/$albumName");
            die();
        } else {
            echo '<p style="display:inline-block">Album with this name already exist!</p>';
        }
    } else {
        echo '<p style="display:inline-block">The name of album must have at least three symbols and'
        . 'can contain only english characters and numbers from zero to nine.</p>';
    }
}
