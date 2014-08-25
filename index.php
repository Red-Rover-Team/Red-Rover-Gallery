<?php

session_start();
require_once('includes/header.php');

if (isset($_SESSION['isLogged']) && $_SESSION['isLogged'] == true) {

    echo 'Hello User: <b>' . $_SESSION['userinfo']['username'] . '</b>!</br>';
    echo 'First Name: ' . $_SESSION['userinfo']['firstname'] . '</br>';
    echo 'Last Name: ' . $_SESSION['userinfo']['lastname'] . '</br>';
    echo '<a href="logout.php">Logout</a>';
}
require_once('createAlbum.php');
require_once('topRated.php');
require_once('includes/footer.php');

//we should add some info and/or greeting on the homepage