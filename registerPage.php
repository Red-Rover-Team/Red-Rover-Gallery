<?php
require_once('includes/header.php');
header('Content-Type: text/html; charset=UTF-8');
require ('register.php');
?>
<section>
    <div class="reg-field-frame">
        <form method="post" id="form">
            <label>
                <span>
                    The username and password must have
                    at least 3 and maximum 20 symbols.
                </span>
                <span>
                    The first and last name can have
                    maximum 20 symbols
                </span>
            </label>

            <div>
                <label for="user" class="required">
                    <span>Username</span>
                </label>
                <input type="text" name="user" id="user" maxlength="20" required>
                <span id="user-status"></span>
            </div>

            <div>
                <label for="pass" class="required">
                    <span>Password</span>
                </label>
                <input type="password" name="pass" id="pass" maxlength="20" required>
                <span id="pass-status"></span>
            </div>

            <div>
                <label for="repass" class="required">
                    <span>Re-type</span>
                </label>
                <input type="password"  name="repass" id="repass" maxlength="20" required="">
                <span id="repass-status"></span>
            </div>

            <div>
                <label for="first-name" class="label">
                    <span>First name</span>
                </label>
                <input type="text"  name="firstName" maxlength="20" id="first-name">
                <span id="fname-status"></span>
            </div>

            <div>
                <label for="last-name" class="label">
                    <span>Last name</span>
                </label>
                <input type="text"  name="lastName" maxlength="20" id="last-name">
                <span id="lname-status"></span>
            </div>
            <input type="submit" value="Register">
        </form>
    </div>
</section>
<script src="scripts/registrationValidator.js" defer></script>
<link rel="stylesheet" href="styles/register-page-styles.css"/>
<?php
if (isset($_POST['user']) && isset($_POST['pass']) && isset($_POST['repass'])) {

    createNewUser($_POST['user']
            , $_POST['pass']
            , $_POST['repass']
            , $_POST['firstName']
            , $_POST['lastName']);
}

require_once('includes/footer.php');
?>
