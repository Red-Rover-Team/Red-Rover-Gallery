<?php require_once('includes/header.php'); ?>
<div class="panel">
        <section>
            <header>
                <h2>Create new album</h2>
            </header>
            <form method="post">
                <div class="row">
                    <div class="4u">
                        <label for="name">Album Name: </label>
                    </div>
                    <div class="8u">
                        <input type="text" id="name" name="album[]" maxlength="25" pattern=".{3,}" required
                           title="The name can contain only english characters and numbers from zero to nine." placeholder="Album Name:"/>
                    </div>
                </div>
                    <!--br-->
                    
                <div class="row">
                    <div class="4u">
                        <label for="category">Category: </label>
                    </div>
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
            <header>
                <h2>TO DO - Top Rated Albums</h2>
            </header>
            <div class="row">
                <div class="4u">
                    <h3>Top Rated Album Name #1</h3>
                    <a class="image fit" href="#"><img alt="" src="img/pic01.jpg"></a>
                    <p>Votes: 125</p>
                </div>
                <div class="4u">
                    <h3>Top Rated Album Name #2</h3>
                    <a class="image fit" href="#"><img alt="" src="img/pic02.jpg"></a>
                    <p>Votes: 85</p>
                </div>
                <div class="4u">
                    <h3>Top Rated Album Name #3</h3>
                    <a class="image fit" href="#"><img alt="" src="img/pic03.jpg"></a>
                    <p>Votes: 65</p>
                </div>
            </div>
        </section>

    </div>

</div><!--End Main-->

<script src="scripts/albumNameValidator.js" defer></script>

<?php
require_once('includes/footer.php');
