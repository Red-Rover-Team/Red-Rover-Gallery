<?php
function createNewUser($username
, $password
, $repeatPassword
, $firstName
, $lastName) {

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

        $connection = mysqli_connect('localhost', 'root', '', 'accounts');

        $sql = "
        SELECT username FROM users WHERE username='${username}';
        ";
        $result = mysqli_query($connection, $sql);
        $existUser = mysqli_fetch_array($result)['username'];

        if ($existUser === NULL) {
            $sql = "
            INSERT INTO users(username,password,first_name,last_name)
            VALUES('${username}','${password}','${firstName}','${lastName}')
            ";
            mysqli_set_charset($connection, 'UTF8');
            mysqli_query($connection, $sql);
        } else {
            echo '<p>The user with this name already exist.<p>';
        }
    } else {
        switch ($request) {
            case 0:
                echo '<p>The username must have at least 3 and '
                . 'maximum 20 symbols!</p>';
                break;
            case -1:
                echo '<p>The passwords not match'
                . 'or the password is too short!</p>';
                break;
            case -2:
                echo '<p>The first name can have maximum 20 symbols!</p>';
                break;
            case -3:
                echo '<p>The last name can have maximum 20 symbols!</p>';
                break;
            default :
                echo '<p>ERROR!</p.';
        }
    }
}
?>


