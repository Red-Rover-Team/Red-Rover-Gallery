<?php
function createNewUser($username, $password,
         $repeatPassword, $firstName, $lastName) {

    $request = 1;

    if (strlen($username) > 20 && strlen($username) < 3) {
        $request = 0;
    } else if ($password !== $repeatPassword || strlen($password) < 2 || strlen($repeatPassword) < 2) {
        $request = -1;
    } else if (strlen($firstName) > 20) {
        $request = -2;
    } else if (strlen($lastName) > 20) {
        $request = -3;
    }

    if ($request > 0) {
        // will be included later, the must be removed
        $hostname = 'localhost';
        $dbName = '1279150_redrover';
        $db_username = 'root';
        $db_password = '';
        $db_dsn = "mysql:host=$hostname; dbname=$dbName; charset=utf8";
        // end

        $dbh = new PDO($db_dsn, $db_username, $db_password);
        $sql = "SELECT username "
             . "FROM users "
             . "WHERE username = '$username'";
        $q = $dbh->prepare($sql);
        $q->execute();
        if ($q->rowCount() > 0) {
            echo '<p>This username already exist.<p>';
        } else {
            $sql = "INSERT INTO users (username, password, first_name, last_name) "
                 . "VALUES ('$username', '$password', '$firstName', '$lastName')";
            $q = $dbh->prepare($sql);
            $q->execute();
            echo '<p>Registration successful.<p>';
        }
    } else {
        switch ($request) {
            case 0:
                echo '<p>The username must be between 3 and 20 symbols.</p>';
                break;
            case -1:
                echo '<p>Passwords do not match or the password is too short.</p>';
                break;
            case -2:
                echo '<p>The first name can have maximum 20 symbols!</p>';
                break;
            case -3:
                echo '<p>The last name can have maximum 20 symbols!</p>';
                break;
            default :
                echo '<p>Something went wrong, please try again.</p>';
        }
    }
}
?>
