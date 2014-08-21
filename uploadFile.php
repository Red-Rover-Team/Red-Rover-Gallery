<?php

function uploadFile($file) {
    $size = round($file['size'] / 1024);
    $type = str_replace('image/', '', $file['type']);

    if ($size <= 2048) {
        if ($type == 'png' || $type == 'jpeg' || $type == 'jpg') {
            uploadImage($file);
        } else {
            echo '<p>The file is not in a valid format.</p>';
        }
    } else {
        $size = round($size / 1024, 2);
        echo "<p>The maximum image size is 2MB your is ${size}MB</p>";
    }
}

function uploadImage($file) {
    $type = str_replace('image/', '', $file['type']);
    $name = getRandomImageName() . ".$type";
    $categoryAlbumNames = getCategoryAlbumNames();

    $categoryName = $categoryAlbumNames[0];
    $albumName = $categoryAlbumNames[1];
    $directory = "albums/$categoryName/$albumName/";

    // don't overwrite an existing file
    $i = 0;
    $parts = pathinfo($name);
    while (file_exists($directory . $name)) {
        $i++;
        $name = $parts['filename'] . "-" . $i . "." . $parts['extension'];
    }

    // preserve file from temporary directory
    $success = move_uploaded_file($file['tmp_name'], $directory . $name);

    if ($success) {
        echo '<p>The file is successfully uploaded.</p>';
    } else {
        echo "<p>Unable to upload file.</p>";
        exit();
    }

    // set proper permissions on the new file
    chmod($directory . $name, 0644);
}

function getCurrentPageURL() {
    //don't delete the comments!
    $pageURL = 'http';
// if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
// $pageURL .= "://";
// if ($_SERVER["SERVER_PORT"] != "80") {
//  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
// } else {
    $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
// }
    return $pageURL;
}

function getRandomImageName() {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < 10; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}

function getCategoryAlbumNames() {

    $url = explode('album=', getCurrentPageURL());
    $catAlbArr = explode('/', $url[1]);
    return $catAlbArr;
}
