<?php require_once('includes/header.php'); ?>
<div class="panel">
        <section>
            <h3>Create new album</h3>
            <form method="post">
                <div class="row">
                    <!--label for="name">Album Name: </label-->
                    <div class="4u">
                        <input type="text" id="name" name="album[]" maxlength="25" pattern=".{3,}" required
                           title="The name can contain only english characters and numbers from zero to nine." placeholder="Album Name:"/>
                    </div>
                <!--/div-->
                    <!--br-->
                    <!--label for="category">Category: </label-->
                <!--div class="row"-->
                    <div class="4u">
                        <select id="category" name="album[]" required>
                            <option hidden selected></option>
                            <?php
                            foreach ($categories as $category) {
                                echo "<option value='$category'>$category</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="4u">
                        <input type="submit" value="Create"/>
                    </div>
                </div>
            </form>
            <div class="validateField">
                <?php
                if (isset($_POST['album'])) {
                    createAlbum($_POST['album']);
                }
                ?>
            </div>
        </section>


        <section>
            <h3>Top Rated Albums</h3>
            <p><strong>TO DO</strong></p>
        </section>

    </div>

</div><!--End Main-->

<script src="scripts/albumNameValidator.js" defer></script>

<?php
require_once('includes/footer.php');
