<?php
$categories = ['Fun', 'Sports', 'Landmarks', 'Animals', 'Nature'];
sort($categories);
?>
<aside>
    <h4>Browse albums</h4>
    <ul>
        <?php
        foreach ($categories as $category) {
            echo "<li><a href='albumList.php?cat=$category'>$category</a></li>";
        }
        ?>
    </ul>
</aside>