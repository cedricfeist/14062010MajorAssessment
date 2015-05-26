<?php
include("dbconnect.php");
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Register User</title>
</head>

<body>
<form id="insert" name="insert" method="post" action="processusers.php">
    <fieldset>
        <h2>New User Account:</h2>
        <input type="hidden" name="type" id="type" value="free">
        <table>
            <tr>
                <td><label for="username">Username: </label></td>
                <td><input type="text" name="username" id="username"></td>
            </tr>

            <tr>
                <td><label for="password">Password: </label></td>
                <td><input type="password" name="password" id="password"></td>
            </tr>
        </table>
        Do you wish to become a volunteer.
        <br>
        <input type="radio" name="volunteer" id="volunteer" value="true">Yes
        <br>
        <input type="radio" name="volunteer" id="volunteer" value="false">No
        <p>
            <input type="submit" name="submit" id="submit" value="Insert">
        </p>
    </fieldset>
</form>

<a href="index.php">Home</a>
</body>
</html>