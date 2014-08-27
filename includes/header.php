<?php
ob_start();
session_start();
require('functions.php');

//DETERMINE WHICH IS THE CURRENT MENU ITEM
$curr_page = preg_replace( '/\//', '', $_SERVER["REQUEST_URI"]);
$occurances = preg_match( '/.+?(?=\?)/',  $curr_page, $matches );
if( $occurances != 0 ) {
    $curr_page = $matches[0];
}

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
    case 'albumList.php':
    case 'imageList.php':
    case 'viewPhoto.php':
            $menu_item_on = 'categories';
        break;
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Red Rover's Gallery</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles/skel.css" />
    <link rel="stylesheet" href="styles/style.css" />
    <link rel="stylesheet" href="styles/style-desktop.css" />
    <script src="scripts/jquery.min.js"></script>

    <?php if( $curr_page == 'imageList.php' ) : ?>

        <link href="styles/lightbox.css" rel="stylesheet"/>
        <script src="scripts/lightbox.min.js" defer></script>

    <?php elseif( $curr_page == 'registerPage.php' ) : ?>

        <link rel="stylesheet" href="styles/register-page-styles.css"/>
        <script src="scripts/registrationValidator.js" defer></script>

    <?php endif; ?>
</head>
<body>
<div id="wrapper">
    
    <header id="header-main">
        <h1 id="site-name"><a href="index.php">Red Rover's Gallery</a></h1>
        <?php
        if (isset($_SESSION['isLogged']) && $_SESSION['isLogged'] == true) {
            echo '
            <div class="row">
                <div class="6u greeting">
                    <strong>Hello</strong>, ' . $_SESSION['userinfo']['first_name'] . ' ' . $_SESSION['userinfo']['last_name']
                    . ' "<strong>' . $_SESSION['userinfo']['username'] . '</strong>"!
                </div>
                <div class="6u">
                    <a href="profile.php" class="bold italic">Profile | <a href="logout.php" class="bold italic">Logout</a>
                </div>
            </div>';
        }
        ?>
    </header>
    
    <!-- Nav -->
        <nav id="nav">
            <a href="index.php" class="icon fa-calendar-o <?=(($menu_item_on == 'home')? 'active':'')?>"><span>Create Album</span></a>
            <a href="uploadPage.php" class="icon fa-file-image-o <?=(($menu_item_on == 'upload')? 'active':'')?>"><span>Upload Photos</span></a>
            <?php if (!isset($_SESSION['isLogged']) && !$_SESSION['isLogged'] == true) :?>
                <a href="login.php" class="icon fa-key <?=(($menu_item_on == 'login')? 'active':'')?>"><span>Login</span></a>
                <a href="registerPage.php" class="icon fa-bell-o <?=(($menu_item_on == 'register')? 'active':'')?>"><span>Register</span></a>
            <?php endif; ?>
            <a href="categories.php" class="icon fa-folder <?=(($menu_item_on == 'categories')? 'active':'')?>"><span>Categories</span></a>
        </nav>

    <!-- Main -->
        <div id="main">
            