<?php
ob_start();
session_start();
require('functions.php');

//DETERMINE WHICH IS THE CURRENT MENU ITEM
$curr_page = preg_replace( '/\//', '', $_SERVER["REQUEST_URI"]);
switch ($curr_page) {
    case 'index.php':
            $menu_item_on = 'home';
        break;
    case 'uploadPage.php':
            $menu_item_on = 'upload';
        break;
    case 'login.php':
            $menu_item_on = 'login';
        break;
    case 'registerPage.php':
            $menu_item_on = 'register';
        break;
    case 'categories.php':
            $menu_item_on = 'categories';
        break;
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Red Rover's Gallery</title>
    <meta charset="utf-8">
    <script src="scripts/jquery.min.js"></script>
    <!--<script src="scripts/skel.min.js"></script>
    <script src="scripts/init.js"></script>
    link rel="stylesheet" href="styles/main-style.css"/-->
    <!--noscript-->
        <link rel="stylesheet" href="styles/skel.css" />
        <link rel="stylesheet" href="styles/style.css" />
        <link rel="stylesheet" href="styles/style-desktop.css" />
        <link rel="stylesheet" href="styles/style-noscript.css" />
    <!--/noscript-->
</head>
<body>
<div id="wrapper">
    
    <header>
        <h1><a href="index.php">Red Rover's Gallery</a></h1>
        <?php
        if (isset($_SESSION['isLogged']) && $_SESSION['isLogged'] == true) {
            echo 'Hello, ' . $_SESSION['userinfo']['first_name'] . ' ' . $_SESSION['userinfo']['last_name']
                . ' (<strong>' . $_SESSION['userinfo']['username'] . '</strong>)!<br>'
                . '<a href="logout.php">Logout</a>';
        }
        ?>
    </header>
    
    <!-- Nav -->
        <nav id="nav">
            <a href="index.php" class="icon fa-home <?=(($menu_item_on == 'home')? 'active':'')?>"><span>Create Album</span></a>
            <a href="uploadPage.php" class="icon fa-folder <?=(($menu_item_on == 'upload')? 'active':'')?>"><span>Upload Photos</span></a>
            <a href="login.php" class="icon fa-envelope <?=(($menu_item_on == 'login')? 'active':'')?>"><span>Login</span></a>
            <a href="registerPage.php" class="icon fa-twitter <?=(($menu_item_on == 'register')? 'active':'')?>"><span>Register</span></a>
            <a href="categories.php" class="icon fa-twitter <?=(($menu_item_on == 'categories')? 'active':'')?>"><span>Categories</span></a>
        </nav>

    <!-- Main -->
        <div id="main">
            