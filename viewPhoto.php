<?php
require_once('includes/header.php');

if (isset($_GET['img'])) { $img = $_GET['img']; ?>

<section class="panel">
    <div class="pic">
        <img src="<?=$img?>" alt="pic" style="width: 500px"/>
    </div>
    <div class="new-comment">
        <form method="POST">
            <input type="text" name="author" id="author" title = "Input comment author's nickname here." placeholder="Comment author..."/><br>
            <textarea name="comment" id="commentbox" title = "Input comment here." placeholder="Insert comment..."></textarea><br>
            <input type="submit" value="Post Comment"/><br>
        </form>
        <?php
        if(isset($_POST['author']) && isset($_POST['comment'])) {

            $imgName = basename($img);
            $comment_auth = trim($_POST['author']);
            $comment_text = trim($_POST['comment']);
            global $db_dsn, $db_username, $db_password;

            $dbh = new PDO($db_dsn, $db_username, $db_password);
            $sql = "SELECT photo_id FROM photos "
                 . "WHERE photo_name = '$imgName'";
            $q = $dbh->prepare($sql);
            $q->execute();
            $photo_id = $q->fetch()[0];

            $sql = "INSERT INTO image_comments (comment_auth, comment_text, image_ID) "
                 . "VALUES ('$comment_auth', '$comment_text', $photo_id)";
            $q = $dbh->prepare($sql);
            $q->execute();
            echo("Comment posted.");
        }
        ?>
    </div>
    <div class="comments">

    </div>
</section>

<?php
} else {
    echo '<section  class="panel"><h3>This photo do not exist</h3></section>';
}

require_once('includes/footer.php');