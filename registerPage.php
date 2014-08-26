<?php
require_once('includes/header.php');

if (isset($_SESSION['isLogged']) && $_SESSION['isLogged'] == true) {
    header('Location: index.php');
    exit();
}
?>
<section class="panel">
    <header>
        <h2>Register</h2>
    </header>
    <div class="reg-field-frame">
        <form method="post" id="form">
            <p>
                The username and password must have at least 3 and maximum 20 symbols.
                The first and last name can have maximum 20 symbols.
            </p>

            <div class="row">
                <div class="2u">
                    <label for="user" class="required">
                        <span>Username</span>
                    </label>
                </div>
                <div class="8u">
                    <input type="text" name="user" id="user" maxlength="20" required>
                </div>
                <div class="2u">
                    <span id="user-status"></span>
                </div>
            </div>

            <div class="row">
                <div class="2u">
                    <label for="pass" class="required">
                        <span>Password</span>
                    </label>
                </div>
                <div class="8u">
                    <input type="password" name="pass" id="pass" maxlength="20" required>
                </div>
                <div class="2u">
                    <span id="pass-status"></span>
                </div>
            </div>

            <div class="row">
                <div class="2u">
                    <label for="repass" class="required">
                        <span>Re-type</span>
                    </label>
                </div>
                <div class="8u">
                    <input type="password"  name="repass" id="repass" maxlength="20" required="">
                </div>
                <div class="2u">
                    <span id="repass-status"></span>
                </div>
            </div>

            <div class="row">
                <div class="2u">
                    <label for="first-name" class="label">
                        <span>First name</span>
                    </label>
                </div>
                <div class="8u">
                    <input type="text"  name="firstName" maxlength="20" id="first-name">
                </div>
                <div class="2u">    
                    <span id="fname-status"></span>
                </div>
            </div>

            <div class="row">
                <div class="2u">
                    <label for="last-name" class="label">
                        <span>Last name</span>
                    </label>
                </div>
                <div class="8u">
                    <input type="text"  name="lastName" maxlength="20" id="last-name">
                </div>
                <div class="2u">
                    <span id="lname-status"></span>
                </div>    
            </div>
            <div class="row">
                <div class="12u">
                    <input type="submit" value="Register">
                </div>
            </div>
        </form>
    </div>
</section>
<script src="scripts/registrationValidator.js" defer></script>
<link rel="stylesheet" href="styles/register-page-styles.css"/>
<?php

if (isset($_POST['user']) && isset($_POST['pass']) && isset($_POST['repass'])) {

    createNewUser($_POST['user'], $_POST['pass'], $_POST['repass'],
            $_POST['firstName'], $_POST['lastName']);
}

require_once('includes/footer.php');
