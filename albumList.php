<?php
require_once('includes/header.php');

if (isset($_GET['cat']) && in_array($_GET['cat'], $categories)) {
    $currentDir = $_GET['cat'];
    $albums = scandir("albums/$currentDir", 1);
    $albums = array_diff($albums, ['.', '..']);
?>
<section class="panel">
    <header>
        <h2><?=$currentDir?></h2>
    </header>
    <?php
    foreach ($albums as $album) {
        echo '
            <div class="row">
                <div class="12u">
                    <h3>' . $album . '</h3>
                    <a href=imageList.php?cat=' . $currentDir. '&album=' . $album . '>Browse Album</a>
                    <a href="#album-comment-page">Comment</a>
                    <a href="#rate-album">Rate</a>
                </div>
            </div>';
    }
    ?>
</section>
<?php
} else {
    echo '<section class="panel"><h3>Invalid Category</h3></section>';
}

require_once('includes/footer.php');
