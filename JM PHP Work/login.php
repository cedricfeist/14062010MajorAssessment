<?php session_start();
error_reporting(E_ALL);
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
</head>
<body>
<?php
if (isset($_SESSION['msg'])) {
    echo "<p style='color:red'>" . $_SESSION['msg'] . "</p>";
}
if (!isset($_SESSION['username'])) {
    ?>
    <fieldset>
        <form id="login" name="login" method="post" action="SecureUserPage.php">
            <table>
                <tr>
                    <td><label for="username">Username:</label></td>
                    <td><input type="text" name="username" id="username"></td>
                </tr>
                <tr>
                    <td><label for="password">Password:</label></td>
                    <td><input type="password" name="password" id="password"></td>
                </tr>
            </table>
            <input type="submit" name="submit" value="Login">
        </form>
    </fieldset>
<?php }
if (isset($_SESSION['username'])) echo '<a href="logout.php">Logout</a>';
?>
<a href="home.php">Home</a>
</body>
</html>