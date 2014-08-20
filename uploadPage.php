<?php
require_once('includes/header.php');
require ('uploadFile.php');
?>

<section>
    <h3>Upload Images</h3>
    <form action="" method="post" enctype="multipart/form-data" id="uploadForm">
        <label>Maximum image size is 2MB. Only JPEG, PNG and JPG extensions are allowed.</label>
        <div>
            <input type="file" name="file"/>
        </div>
        <button id="addFile" type="button">Add File</button>
        <button id="removeFile" type="button">Remove File</button>
        <br>
        <input type="submit" value="Upload" name="submit"/>
    </form>
    <?php
    if (!empty($_FILES['file']) && $_FILES['file']['name'] != '') {
        uploadFile($_FILES['file']);
    }
    ?>
</section>

<?php
require_once('includes/footer.php');
