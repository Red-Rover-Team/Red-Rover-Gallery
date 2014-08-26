<?php

$hostname = 'pdb11.awardspace.net';
$dbName = '1279150_redrover';
$db_username = '1279150_redrover';
$db_password = 'kal!nk3moQ';
$con = mysqli_connect($server, $user, $pass, $dbName) or die("Can't connect");
mysqli_set_charset($con, 'utf8');

$url = getCurrentPageURL();
$q = mysqli_query($con, 'SELECT comment_auth, comment_text, time_added'
                        .'FROM comments '
                        .'ORDER BY time_added ASC '
                        .'WHERE page_URL = $url');

echo '<div class="comments-wrap">';
while($row=$q->fetch_assoc()){
    echo '<div class="comment-author">' . $row['comment_auth'] . '</div>';
    echo '<div class="time-added">' . $row['time_added'] . '</div>';
    echo '<div class="comment-text">' . $row['comment_text'] . '</div>';
}
echo '</div>'


?>