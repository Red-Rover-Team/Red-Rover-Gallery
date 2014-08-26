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
                       data-title='<a href="<?=$href?>" download>Download</a>&nbsp;&nbsp;
                                   <a href="viewPhoto.php?img=<?=$href?>">Vote and comment</a>'>

                        <img src='<?=$href?>' alt='img'/>
                    </a>
                <?php endforeach; ?>
            </div>
        </section>
        <div class="new-comment">
            <form method="POST">
                <input type="text" name="author" id="author" title = "Input comment author's nickname here." placeholder="Comment author..."/><br>
                <textarea name="comment" id="commentbox" title = "Input comment here." placeholder="Insert comment..."></textarea><br>
                <input type="submit" value="Post Comment"/><br>
            </form>
            <?php
            if(isset($_POST['author']) && isset($_POST['comment'])) {
                $albumName = basename($album);
                $comment_auth = trim($_POST['author']);
                $comment_text = trim($_POST['comment']);
                global $db_dsn, $db_username, $db_password;
                $dbh = new PDO($db_dsn, $db_username, $db_password);
                $sql = "INSERT INTO album_comments (comment_auth, comment_text, album_name) "
                    . "VALUES ('$comment_auth', '$comment_text', '$albumName')";
                $q = $dbh->prepare($sql);
                $q->execute();
                Header('Location: ' . $_SERVER['PHP_SELF'] . '?cat=' . $currentDir . '&album=' . $albumName);
                die();
            }
            ?>
        </div>
    <?php
    } else {
        echo '<section  class="panel"><h3>This album do not exist</h3></section>';
    }
} else {
    echo '<section  class="panel"><h3>This album do not exist</h3></section>';
}
?>

<?php
require_once('includes/footer.php');
?>
