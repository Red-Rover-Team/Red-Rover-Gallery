<?php
require_once('includes/header.php');
?>

<section>
    <h3>Upload Images</h3>
    <form method="post" enctype="multipart/form-data" id="uploadForm">
        <p>Maximum image size is 1MB. Only JPEG, PNG and JPG extensions are allowed.</p>
        <div>
            <input type="file" name="upload[]"/>
        </div>
        <button id="addFile" type="button">Add File</button>
        <button id="removeFile" type="button">Remove File</button>
        <br>
        <input type="submit" value="Upload" name="submit"/>
    </form>
</section>

<?php
require_once('includes/footer.php');