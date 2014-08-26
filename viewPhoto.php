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
            addImageComment($comment_text, $comment_auth, $imgName);
            Header('Location: ' . $_SERVER['PHP_SELF'] . '?img=' . $img);
            die();
        }
        ?>
    </div>
    <div class="all-comments">
        <?php
        $comments = getImageComments(basename($img));
        foreach ($comments as $comment) : ?>
            <div class="comment">
                <p class="comment-author"><strong><?=$comment['comment_auth']?></strong></p>
                <p class="comment-date"><strong><?=$comment['time_added']?></strong></p>
                <p class="comment-text"><?=$comment['comment_text']?></p>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<?php
} else {
    echo '<section class="panel"><h3>This photo do not exist</h3></section>';
}

require_once('includes/footer.php');
