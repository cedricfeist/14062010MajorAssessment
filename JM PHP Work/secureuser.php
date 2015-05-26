<?php
if (isset($_SESSION['count']))
    $_SESSION['count'] += 1;
else
    $_SESSION['count'] = 1;
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>User page</title>
</head>

<body>
<h1>User Account: <?php$_SESSION['username']?></h1>
<?php
if (isset($_SESSION['msg'])) {
    echo "<p style='color:green'>".$_SESSION['msg']."</p>";
}
?>
<p>
    <?php echo "You are now logged in as: ".$_SESSION['username']; ?>
</p>
<p>
    <?php echo "Account level: ".$_SESSION['accountType']; ?>
</p>

<nav>
    <a href="DBManagementPage.php">Manage</a> <a href="LogoutPage.php">Logout</a>
</nav>
</body>
</html>