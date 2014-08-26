<?php
ob_start();
session_start();
require('functions.php');
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
            <a href="index.php" class="icon fa-home active"><span>Create Album</span></a>
            <a href="uploadPage.php" class="icon fa-folder"><span>Upload Photos</span></a>
            <a href="login.php" class="icon fa-envelope"><span>Login</span></a>
            <a href="registerPage.php" class="icon fa-twitter"><span>Register</span></a>
            <a href="categories.html" class="icon fa-twitter"><span>Categories</span></a>
        </nav>

    <!-- Main -->
        <div id="main">
            