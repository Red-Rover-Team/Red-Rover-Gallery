<?php

function createAlbum($album) {

    $albumName = htmlentities($album[0]);
    $category = htmlentities($album[1]);

    if (!(preg_match('/\W+/', $albumName))) {

        if (strlen($albumName) > 3) {
            $pathToAlbum = "albums/${category}/${albumName}";

            if (!(file_exists($pathToAlbum))) {
                mkdir($pathToAlbum);
            } else {
                echo '<p>Album with this name already exist!<p>';
            }
        } else {
            echo'<p>The name of album must have more than three symbols!</p>';
        }
    } else {
        echo "<script> alert('The name"
        . " can contain only english characters"
        . " and numbers from zero to nine !!!')</script>";
    }
}
?>

