<?php
require_once('includes/header.php');

if (isset($_GET['album']) && !empty($_GET['album']) &&
        isset($_GET['cat']) && in_array($_GET['cat'], $categories)) {
    $currentDir = $_GET['cat'];
    $albumName = $_GET['album'];
    $album = "albums/$currentDir/$albumName";
    if (file_exists($album)) {
        $images = scandir($album, 1);
        $images = array_diff($images, ['.', '..']);
    ?>
        <link href="styles/lightbox.css" rel="stylesheet"/>
        <script src="http://code.jquery.com/jquery-latest.min.js" defer></script>
        <script src="scripts/lightbox.min.js" defer></script>
        <section class="panel">
            <header>
                <h2><?= $albumName ?></h2>
            </header>
            <div>
                <?php foreach ($images as $img) : $href = "$album/$img"; ?>
                    <a href='<?=$href?>'
                       data-lightbox='pics'
                       data-title='<a href="<?=$href?>" download>Download</a>'>

                        <img src='<?=$href?>' alt='img'/>
                    </a>
                <?php endforeach; ?>
            </div>
        </section>
    <?php
    } else {
        echo '<section  class="panel"><h3>This album do not exist</h3></section>';
    }
} else {
    echo '<section  class="panel"><h3>This album do not exist</h3></section>';
}

require_once('includes/footer.php');
