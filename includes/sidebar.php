<?php
$categories = ['Fun', 'Sports', 'Landmarks', 'Animals', 'Nature'];
?>
<aside>
    <h4>Browse albums</h4>
    <ul>
        <?php
        foreach ($categories as $category) {
            echo "<li><a href='#'>$category</a></li>";
        }
        ?>
    </ul>
</aside>