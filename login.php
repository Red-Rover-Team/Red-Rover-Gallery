<?php
require_once('includes/header.php');

if (isset($_SESSION['isLogged']) && $_SESSION['isLogged'] == true) {
    header('Location: index.php');
    exit();
} else {
    ?>
    <div class="panel">
        <form method="POST">
            <div class="row">
                <div class="4u">
                    <label for="user">Username: </label>
                </div>
                <div class="8u">
                    <input type="text" name="username" id="user">
                </div>
            </div>
            <div class="row">
                <div class="4u">
                    <label for="pass">Password: </label>
                </div>
                <div class="8u">
                    <input type="password" name="password" id="pass">
                </div>
            </div>
            <div class="row">
                <div class="12u">
                    <input type="submit" value="Login">
                </div>
            </div>
            <input type="hidden" name="formLogin" value="1">
        </form>
    <?php
    if (isset($_POST['formLogin']) && $_POST['formLogin'] == 1) {

        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        if (strlen($username) >= 3 && strlen($password) >= 3) {

            global $db_dsn, $db_username, $db_password;

            $dbh = new PDO($db_dsn, $db_username, $db_password);
            $sql = "SELECT username, first_name, last_name "
                    . "FROM users "
                    . "WHERE username = '$username' AND password = '$password'";
            $q = $dbh->prepare($sql);
            $q->execute();
            if (($user = $q->fetchAll(PDO::FETCH_ASSOC)) != null) {
                $_SESSION['userinfo'] = $user[0];
                $_SESSION['isLogged'] = true;
                header('Location: index.php');
                exit();
            } else {
                echo '<p>The user do not exist or the password is wrong. Please try again.</p>';
            }
        }
    }?>
    </div>
<?php 
}
require_once('includes/footer.php');
