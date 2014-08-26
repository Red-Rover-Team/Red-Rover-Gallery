<?php
require_once('includes/header.php');

if (isset($_GET['img'])) { $img = $_GET['img']; ?>

<section class="panel">
    <div class="pic">
        <img src="<?=$img?>" alt="pic" style="width: 500px"/>
    </div>
    <div class="comments">

    </div>
</section>

<?php
} else {
    echo '<section  class="panel"><h3>This photo do not exist</h3></section>';
}

require_once('includes/footer.php');