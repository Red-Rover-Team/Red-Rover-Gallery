<?php
session_start();

require_once('includes/header.php');
if (isset($_SESSION['isLogged']) && $_SESSION['isLogged'] == true) {

    echo 'Hello User: <b>' . $_SESSION['userinfo']['username'] . '</b>!</br>';
    echo 'First Name: ' . $_SESSION['userinfo']['firstname'] . '</br>';
    echo 'Last Name: ' . $_SESSION['userinfo']['lastname'] . '</br>';
    echo '<a href="logout.php">Logout</a>';
} else {
    ?>
    <form method="POST">
        Username:<input type="text" name="username"></br>
        Password:<input type="password" name="password"></br>
        <input type="hidden" name="formLogin" value="1">
        <input type="submit" value="Login"></br>
    </form>
    <?php
    if (isset($_POST['formLogin']) && $_POST['formLogin'] == 1) {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        if (strlen($username) > 3 && strlen($password) > 3) {

            $hostname = 'localhost';
            $dbName = 'team';
            $db_username = 'root';
            $db_password = '';
            $db_dsn = "mysql:host=$hostname; dbname=$dbName; charset=utf8";

            $dbh = new PDO($db_dsn, $db_username, $db_password);
            $sql = "SELECT * "
                    . "FROM users "
                    . "WHERE username = '$username' AND password = '$password'";
            $q = $dbh->prepare($sql);
            $q->execute();
            if ($q->rowCount() > 0) {
                $_SESSION['userinfo'] = $q->fetch();
                $_SESSION['isLogged'] = true;
                header('Location: index.php');
                exit();
            } else {
                echo 'XXXXXXXXXXXXXXXXXXXXX';
            }
        }
    }
}
require_once('includes/footer.php');
