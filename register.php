<?php
// this file is not finish !!!
if (isset($_POST['user'])
        && isset($_POST['pass'])
        && isset($_POST['repass'])) {

    $userPass = $_POST['pass'];
    $userRePass = $userPass = $_POST['repass'];
    
    if ($userPass === $userRePass) {

        //connecting to database
        $accounts = mysql_connect('localhost', 'root', '') OR die();

        //selecting database
        mysql_select_db('accounts', $accounts);

        //initialization request to database
        $request = "
        SELECT UserName FROM users
        ";
        //select column from database
        $users = mysql_query($request, $accounts);

        $userName = strtolower($_POST['user']);
        $userFirstName = $_POST['firstName'];
        $userLastName = $_POST['lastName'];
        $existUser = FALSE;

        //this will returns the first row of the table
        $row = mysql_fetch_array($users);

        //checking if such user existing
        while ($row) {
            $user = strtolower($row['Username']);

            if ($user === $userName) {
                $existUser = TRUE;
                break;
            }

            //this will return the next row of table
            $row = mysql_fetch_array($users);
        }

        if (!$existUser) {
            
        } else {
            echo '<p>User with this name already exists.</p>';
        }
    }else{
        echo '<p>The passwords not match</p>';
    }
}


