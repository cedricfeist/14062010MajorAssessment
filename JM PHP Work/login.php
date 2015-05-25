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
<h1>Login Page</h1>
<?php
if (isset($_SESSION['msg'])) {
    echo "<p style='color:red'>" . $_SESSION['msg'] . "</p>";
}
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