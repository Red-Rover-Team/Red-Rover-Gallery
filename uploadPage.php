<?php require_once('includes/header.php'); ?>


<section>
    <h3>Upload Images</h3>
    <?php if (isset ($_GET['album'])) { ?>
    <form method="post" enctype="multipart/form-data" id="uploadForm">
        <label>Maximum image size is 2MB. Only JPEG, PNG and JPG extensions are allowed.</label>
        <div>
            <input type="file" name="file"/>
        </div>
<!--        <button id="addFile" type="button">Add File</button>-->
<!--        <button id="removeFile" type="button">Remove File</button>-->
        <input type="submit" value="Upload" name="submit"/>
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
        <?php if (isset ($_GET['err'])) echo '<p><strong>Invalid name. Please try again or create new album.</strong></p>'; ?>
        <label for="category">Select the category: </label>
        <select id="category" name="alb[]" required>
            <option hidden selected></option>
            <?php
            foreach ($categories as $category) {
                echo "<option value='$category'>$category</option>";
            }
            ?>
        </select>
        <br>
        <label for="name">Enter the name of the album: </label>
        <br>
        <input type="text" name="alb[]" id="name"" required/>
        <input type="submit" value="Select"/>
    </form>
    <?php } ?>
</section>

<?php
require_once('includes/footer.php');
