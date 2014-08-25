<?php
require_once('includes/header.php');

if (isset($_SESSION['isLogged']) && $_SESSION['isLogged'] == true) {
    header('Location: index.php');
    exit();
} else {
    ?>
    <form method="POST">
        <label for="user">Username: </label>
        <input type="text" name="username" id="user">
        <br>
        <label for="pass">Password: </label>
        <input type="password" name="password" id="pass">
        <br>
        <input type="hidden" name="formLogin" value="1">
        <input type="submit" value="Login">
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
    }
}
require_once('includes/footer.php');
