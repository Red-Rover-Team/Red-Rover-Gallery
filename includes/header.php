<?php
ob_start();
require('functions.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Red Rover's Gallery</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles/main-style.css"/>
</head>
<body>
<div id="wrapper">
<header>
    <h1><a href="index.php">Red Rover's Gallery</a></h1>
</header>

<aside>
    <h4><a href="registerPage.php">Register</a></h4>
    <h4><a href="login.php">Login</a></h4>
    <h4><a href="uploadPage.php">Upload photos</a></h4>
    <h4>Browse albums</h4>
    <ul>
        <?php foreach ($categories as $category) : ?>
            <li><a href="albumList.php?cat=<?=$category?>"><?=$category?></a></li>
        <?php endforeach; ?>
    </ul>
</aside>