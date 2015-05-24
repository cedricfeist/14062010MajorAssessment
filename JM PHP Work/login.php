<?php session_start();
// Report all PHP errors 
error_reporting(E_ALL);
/*	This file is a login page that will send the user to a secure page.
	There's a session 'msg' variable, which will be blank the first time (when not set).
*/
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
</head>
<body>
<h1>Login Page</h1>
<?php
// print message from session, if one exists
if (isset($_SESSION['msg'])) {
    echo "<p style='color:red'>" . $_SESSION['msg'] . "</p>";
}
// Only display the login form if the user is not logged in
if (!isset($_SESSION['username'])) {
    ?>
    <form id="login" name="login" method="post" action="secureUserPage.php">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username">
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
        <br>
        <input type="submit" name="submit" value="Login">
    </form>
<?php }
if (isset($_SESSION['username'])) echo '<a href="logout.php">Logout</a>';
?>
<a href="index.php">Home</a>
</body>
</html>