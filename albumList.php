<?php
require_once('includes/header.php');

if (isset($_GET['cat']) && in_array($_GET['cat'], $categories)) {
    $currentDir = $_GET['cat'];
    $albums = scandir("albums/$currentDir", 1);
    $albums = array_diff($albums, ['.', '..']);
?>
<section class="panel">
    <header>
        <h2>Category: <?=$currentDir?></h2>
    </header>
    <p>Pick an album to view and enjoy its pictures!</p>

    <ul id="album-list">
    <?php
    foreach ($albums as $album) {
        echo '<li><a href=imageList.php?cat=' . $currentDir. '&album=' . $album . '>' . $album . '</a></li>';
    }
    ?>
    </ul>
    <a href="categories.php" class="back">back to categories</a>
</section>
<?php
} else {
    echo '
    <section class="panel error">
        <header>
            <h2>Invalid Category</h2>
        </header>
        <a href="categories.php" class="back">back to categories</a>
    </section>';
}

require_once('includes/footer.php');
