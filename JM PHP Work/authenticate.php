<?php

include("dbconnect.php");
//Start the session
session_start();

//Report all error messages
error_reporting(E_ALL);

//Check the user is not logged in
if (!isset($_SESSION['username'])) {

    //Check that we came from a form
    if (isset($_REQUEST['username'])) {

        //Check we came from the login form
        if ($_REQUEST['submit'] == "Login") {

            $sql = sprintf("SELECT * FROM users WHERE username = '%s'",
                SQLite3::escapeString($_REQUEST['username']));

            $validUser = false;
            foreach ($dbh->query($sql) as $result) {

                $inputPassword = $_REQUEST["password"];
                $inputHash = md5($inputPassword);
                $dbHash = $result['password'];

                if ($inputHash === $dbHash) {
                    $validUser = true;
                    $accountType = $result['type'];
                    $id = $result['id'];
                }
            }

            if ($validUser == true) {
                $_SESSION['username'] = $_REQUEST['username'];
                $_SESSION['msg'] = "Logged In!";
                $_SESSION['accountType'] = $accountType;
                $_SESSION['userID'] = $id;

                //Generate a new session ID for the successful login
                session_regenerate_id();
            } else {
                $_SESSION['msg'] = "Invalid username and/or password!";

                //redirect to the login page, protecting the current page
                header("Location: login.php");
                exit();
            }
        } else {
            $_SESSION['msg'] = "Request not sent from the provided login page";

            header("Location: login.php");
            exit();
        }

    } else {
        $_SESSION['msg'] = "You must log in first";

        header("Location: login.php");
        exit();
    }

}
?>