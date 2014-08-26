<form method="POST">
    <input type="text" name="author" id="author" title = "Input comment author's nickname here." placeholder="Comment author..."/><br/>
    <textarea name="comment" id="commentbox" title = "Input comment here." placeholder="Insert comment..."></textarea><br/>
    <input type="submit" value="Post Comment"/><br/>

</form>
<?php
$hostname = 'pdb11.awardspace.net';
$dbName = '1279150_redrover';
$db_username = '1279150_redrover';
$db_password = 'kal!nk3moQ';
$db_dsn = "mysql:host=$hostname; dbname=$dbName; charset=utf8";
//$server = 'localhost';
//$user = 'root';
//$pass = '';
//$dbname = 'commentsdb';
//$con = mysqli_connect($server, $user, $pass, $dbname) or die("Can't connect");
//mysqli_set_charset($con, 'utf8');
if($_POST) {
    $comment_auth = trim($_POST['author']);
    $comment_text = trim($_POST['comment']);
    echo $comment_text;
    $request = 1;
    if(strlen($comment_auth) < 4 || strlen($comment_auth) > 20) {
        $request = -1;
    }
    if($request > 0) {
        global $db_dsn, $db_username, $db_password;

        $dbh = new PDO($db_dsn, $db_username, $db_password);
        $sql = "INSERT INTO comments (comment_auth, comment_text) "
                . "VALUES ('$comment_auth', '$comment_text')";

        $q = $dbh->prepare($sql);
        $q->execute();
        $_SESSION['comments']['comment_auth'] = $comment_auth;
        $_SESSION['comments']['comment_text'] = $comment_text;
        $_SESSION['comments']['page_URL'] = getCurrentPageURL();
        echo("Comment posted.");
    } else {
        if($request == -1) {
            echo "Nickname needs to be between 4 and 20 symbols.";
            return 0;
        }
    }
//   $comment_auth = mysqli_real_escape_string($con, trim($_POST['author']));
//   $comment_text = mysqli_real_escape_string($con, trim($_POST['comment']));
//   $sql="INSERT INTO comments (comment_auth, comment_text) "
//    ."VALUES ('$comment_auth', '$comment_text')";
//   if(mysqli_query($con, $sql)) {
//   echo "Comment posted!";
//
//   else {
//       echo 'Error! ';
//   }
}
?>