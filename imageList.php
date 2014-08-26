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
        <section class="new-comment panel">
            <header>
                <h3>Comment on album: <span class="album-name"><?=$albumName?></span></h3>
            </header>
            <form method="POST">
                <div class="row">
                    <div class="4u">
                        <label for="author">Author</label>
                    </div>
                    <div class="8u">
                        <input type="text" name="author" id="author" title = "Input comment author's nickname here." placeholder="Comment author..."/><br>
                    </div>
                </div>
                <div class="row">
                    <div class="4u">
                        <label for="commentbox">Comment Text</label>
                    </div>
                    <div class="8u">
                        <textarea name="comment" id="commentbox" title = "Input comment here." placeholder="Insert comment..."></textarea><br>
                    </div>
                </div>
                <div class="row">
                    <div class="12u">
                        <input type="submit" value="Post Comment"/>
                    </div>
                </div>
            </form>
            <?php
            if(isset($_POST['author']) && isset($_POST['comment'])) {

                $albumName = basename($album);
                $comment_auth = trim($_POST['author']);
                $comment_text = trim($_POST['comment']);
                global $db_dsn, $db_username, $db_password;

                $dbh = new PDO($db_dsn, $db_username, $db_password);
                $sql = "SELECT album_id FROM albums "
                    . "WHERE album_name = '$albumName'";
                $q = $dbh->prepare($sql);
                $q->execute();
                $album_id = $q->fetch()[0];

                $sql = "INSERT INTO image_comments (comment_auth, comment_text, album_ID) "
                    . "VALUES ('$comment_auth', '$comment_text', $album_id)";
                $q = $dbh->prepare($sql);
                $q->execute();
                echo("Comment posted.");
            }
            ?>
        </section>
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
