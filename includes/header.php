<?php
ob_start();
$hostname = 'localhost';
$dbName = '1279150_redrover';
$db_username = 'root';
$db_password = '';
$db_dsn = "mysql:host=$hostname; dbname=$dbName; charset=utf8";
$categories = ['Fun', 'Sports', 'Landmarks', 'Animals', 'Nature'];
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
    <h4>Browse albums</h4>
    <ul>
        <?php foreach ($categories as $category) : ?>
            <li><a href="albumList.php?cat=<?=$category?>"><?=$category?></a></li>
        <?php endforeach; ?>
    </ul>
</aside>