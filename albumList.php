<?php
require_once('includes/header.php');

if (isset($_GET['cat']) && in_array($_GET['cat'], $categories)) {
    $currentDir = $_GET['cat'];
    $albums = scandir("albums/$currentDir", 1);
    $albums = array_diff($albums, ['.', '..']);
?>
<section>
    <h3><?=$currentDir?></h3>
    <ul>
        <?php
        foreach ($albums as $album) {
            echo "<li><a href='imageList.php?cat=$currentDir&album=$album'>$album</a></li>";
        }
        ?>
    </ul>
</section>
<?php
} else {
    echo "<section><h3>Invalid Category</h3></section>";
}

require_once('includes/footer.php');
