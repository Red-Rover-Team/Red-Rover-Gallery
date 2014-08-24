<?php
$hostname = 'localhost';
$dbName = '1279150_redrover';
$username = 'root';
$password = '';
$categories = ['Fun', 'Sports', 'Landmarks', 'Animals', 'Nature'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Red Rover's Gallery</title>
    <meta charset="utf-8">
</head>
<body>

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