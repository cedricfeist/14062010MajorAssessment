<?php session_start();
$username = $_SESSION['username'];
unset($_SESSION['username']);
unset($_SESSION['msg']);
unset($_SESSION['accountType']);
unset($_SESSION['id']);
session_destroy();
?>
<!doctype html>
<html>
<head>
    <title>Forms Test Entry Page</title>
    <link href="styles.css" rel="stylesheet">
</head>

<body>
<h1>Logged out</h1>
<p>You are now logged out of: <?php echo $username; ?>.</p>
<a href="login.php">Login</a>
<a href="index.php">Home</a>
</body>
</html>
