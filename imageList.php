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
        <section class="panel">
            <header>
                <h2>Images from album: <?= $albumName ?></h2>
            </header>
            <div>
                <?php foreach ($images as $img) : $href = "$album/$img"; ?>
                    <a href='<?=$href?>'
                       data-lightbox='pics'
                       data-title='<a href="<?=$href?>" download class="italic">Download</a>&nbsp;&nbsp; | &nbsp;&nbsp;
                                   <a href="viewPhoto.php?img=<?=$href?>" class="italic">Vote and comment</a>'>

                        <img src='<?=$href?>' alt='img'/>
                    </a>
                <?php endforeach; ?>
            </div>
            <a href="albumList.php?cat=<?=$currentDir?>" class="back">back to <?=$currentDir?> albums</a>
        </section>
<!--        Displays Like/Dislike form-->
        <?php
        $DisplayLikeForm = true;
        if (isset ($_POST['like-button'])) {
            global $db_dsn, $db_username, $db_password;
            $dbh = new PDO($db_dsn, $db_username, $db_password);
            $sql= "UPDATE albums "
                    ."SET rating = rating + 1 "
                    ."WHERE album_name = '$albumName'";
            $q = $dbh->prepare($sql);
            $q->execute();
            $DisplayLikeForm = false;
        }
        else if (isset ($_POST['dislike-button'])) {
            global $db_dsn, $db_username, $db_password;
            $dbh = new PDO($db_dsn, $db_username, $db_password);
            $sql= "UPDATE albums "
                   ."SET rating = rating - 1 "
                   ."WHERE album_name = '$albumName'";
            $q = $dbh->prepare($sql);
            $q->execute();
            $DisplayLikeForm = false;
        }
        if ($DisplayLikeForm) {
            ?>
            <section class="panel">
                <header>
                    <h3>Vote for album: <span class="album-name"><?=$albumName?></span></h3>
                </header>
                <form method="POST">
                    <div class="row">
                        <div class="12u">
                            <input type="submit" value="Like!" name="like-button"/>
                            <input type="submit" value="Dislike!" name="dislike-button"/>
                        </div>
                    </div>
                </form>
            </section>
        <?php
        } else {
            echo '
            <section class="panel success">
                <header>
                    <h2>Vote submitted!</h2>
                </header>
            </section>';
        }
        ?>

<!--        Needs some class I suppose-->
        <section class="panel">
            <?php
            $comments = getComments($albumName, 'album');
            foreach ($comments as $comment) : ?>
            <div class="comment">
                <p class="comment-author">
                    <strong><?=$comment['comment_auth']?></strong>
                    <small class="comment-date"><?=$comment['time_added']?></small>
                </p>
                <blockquote class="comment-text"><?=$comment['comment_text']?></blockquote>
            </div>
            <hr>
            <?php endforeach; ?>

            <div class="new-comment">
                <header>
                    <h3>Comment album: <span class="album-name"><?=$albumName?></span></h3>
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
                    $sql = "INSERT INTO album_comments (comment_auth, comment_text, album_name) "
                        . "VALUES ('$comment_auth', '$comment_text', '$albumName')";
                    $q = $dbh->prepare($sql);
                    $q->execute();
                    Header('Location: ' . $_SERVER['PHP_SELF'] . '?cat=' . $currentDir . '&album=' . $albumName);
                    die();
                }
                ?>
            </div>
            <a href="albumList.php?cat=<?=$currentDir?>" class="back">back to <?=$currentDir?> albums</a>
        </section>
    <?php
    } else {
        echo '
        <section class="panel error">
            <header>
                <h2>This album do not exist</h2>
            </header>
            <a href="albumList.php?cat=<?=$currentDir?>" class="back">back to <?=$currentDir?> albums</a>
        </section>';
    }
} else {
    echo '
    <section class="panel error">
        <header>
            <h2>This album do not exist</h2>
        </header>
        <a href="albumList.php?cat=<?=$currentDir?>" class="back">back to <?=$currentDir?> albums</a>
    </section>';
}
?>

<?php
require_once('includes/footer.php');
?>
