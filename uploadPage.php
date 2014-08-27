<?php require_once('includes/header.php'); ?>


<section class="panel">
    <header>
        <h2>Upload Images</h2>
    </header>

    <?php if (isset ($_GET['album'])) { ?>
    <form method="post" enctype="multipart/form-data" id="uploadForm">
        <div class="row">
            <div class="12u">
                <label>Maximum image size is 2MB. Only JPEG, PNG and JPG extensions are allowed.</label>
            </div>
        </div>
        <div class="row">
            <div class="8u">
                <input type="file" name="file"/>
            </div>
            <div class="4u">
                <input type="submit" value="Upload" name="submit"/>
            </div>
        </div>
    </form>
    <?php
        if (!empty($_FILES['file']) && $_FILES['file']['name'] != '') {
            uploadFile($_FILES['file']);
        }

    } else if (isset ($_GET['alb'])) {
        $cat = $_GET['alb'][0];
        $alb = $_GET['alb'][1];
        $dir = "albums/$cat/$alb";

        if (file_exists($dir)) {
            header("Location: uploadPage.php?album=$cat/$alb");
            die();
        } else {
            header("Location: uploadPage.php?err=1");
            die();
        }

    } else { ?>
    <form method="get">
        <?php if (isset ($_GET['err'])) echo '<p class="error"><strong>Invalid name. Please try again or create new album.</strong></p>'; ?>
        <div class="row">
            <div class="4u">
                <label for="category">Select the category: </label>
            </div>
            <div class="8u">
                <select id="category" name="alb[]" required>
                    <option hidden selected></option>
                    <?php
                    foreach ($categories as $category) {
                        echo "<option value='$category'>$category</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="4u">
                <label for="name">Enter the name of the album: </label>
            </div>
            <div class="8u">
                <input type="text" name="alb[]" id="name" required />
            </div>
        </div>
        <div class="row">
            <div class="12u">
                <input type="submit" value="Select"/>
            </div>
        </div>
    </form>
    <?php } ?>
</section>

<?php
require_once('includes/footer.php');
