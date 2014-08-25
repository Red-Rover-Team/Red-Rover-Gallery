<?php

// global variables
$hostname = 'localhost';
$dbName = '1279150_redrover';
$db_username = 'root';
$db_password = '';
$db_dsn = "mysql:host=$hostname; dbname=$dbName; charset=utf8";
$categories = ['Fun', 'Sports', 'Landmarks', 'Animals', 'Nature'];

// creating new album
function createAlbum($album) {
    $albumName = htmlentities($album[0]);
    $category = htmlentities($album[1]);

    if ((preg_match('/\w{3,}/', $albumName))) {
        $pathToAlbum = "albums/$category/$albumName";

        if ((file_exists($pathToAlbum))) {
            echo '<p style="display:inline-block">Album with this name already exist!</p>';
            die();
        }

        addAlbumToDatabase($albumName, $category);
        mkdir($pathToAlbum);
        header("Location: uploadPage.php?album=$category/$albumName");
        die();

    } else {
        echo '<p>The name of album must have at least three symbols and '
           . 'can contain only english characters and numbers from zero to nine.</p>';
    }
}

// creating database entry for an album
function addAlbumToDatabase($albumName, $category) {
    global $db_dsn, $db_username, $db_password;
    $date = date('d-m-Y');

    $dbh = new PDO($db_dsn, $db_username, $db_password);
    $sql = "INSERT INTO albums (album_name, album_category, date_of_creation) "
        . "VALUES ('$albumName', '$category', '$date')";
    $q = $dbh->prepare($sql);
    $q->execute();
}

// creating new user
function createNewUser($username, $password,
                       $repeatPassword, $firstName, $lastName) {

    $request = 1;

    if (strlen($username) > 20 && strlen($username) < 3) {
        $request = 0;
    } else if ($password !== $repeatPassword || strlen($password) < 2 || strlen($repeatPassword) < 2) {
        $request = -1;
    } else if (strlen($firstName) > 20) {
        $request = -2;
    } else if (strlen($lastName) > 20) {
        $request = -3;
    }

    if ($request > 0) {
        global $db_dsn, $db_username, $db_password;

        $dbh = new PDO($db_dsn, $db_username, $db_password);
        $sql = "SELECT username "
             . "FROM users "
             . "WHERE username = '$username'";
        $q = $dbh->prepare($sql);
        $q->execute();
        if ($q->rowCount() > 0) {
            echo '<p>This username already exist.<p>';
        } else {
            $sql = "INSERT INTO users (username, password, first_name, last_name) "
                 . "VALUES ('$username', '$password', '$firstName', '$lastName')";
            $q = $dbh->prepare($sql);
            $q->execute();
            echo '<p>Registration successful.<p>';
        }
    } else {
        switch ($request) {
            case 0:
                echo '<p>The username must be between 3 and 20 symbols.</p>';
                break;
            case -1:
                echo '<p>Passwords do not match or the password is too short.</p>';
                break;
            case -2:
                echo '<p>The first name can have maximum 20 symbols!</p>';
                break;
            case -3:
                echo '<p>The last name can have maximum 20 symbols!</p>';
                break;
            default :
                echo '<p>Something went wrong, please try again.</p>';
        }
    }
}

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

    // add to database
    addPhotoToDatabase($name);
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

// creating database entry for a photo
function addPhotoToDatabase($photo) {
    global $db_dsn, $db_username, $db_password;

    $date = date('d-m-Y');
    $albumName = getCategoryAlbumNames()[1];

    $dbh = new PDO($db_dsn, $db_username, $db_password);
    $sql = "INSERT INTO photos (photo_name, photo_album, date_of_creation) "
        . "VALUES ('$photo', '$albumName', '$date')";
    $q = $dbh->prepare($sql);
    $q->execute();
}