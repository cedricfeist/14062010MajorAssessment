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
<h1>User Account: <?php $_SESSION['username'] ?></h1>
<?php
if (isset($_SESSION['msg'])) {
    echo "<p style='color:green'>" . $_SESSION['msg'] . "</p>";
}
?>
<p>
    <?php echo "You are now logged in as: " . $_SESSION['username']; ?>
</p>

<p>
    <?php echo "Account level: " . $_SESSION['accountType']; ?>
</p>

<?php
if ($_SESSION['accountType'] == 'free') {
    ?>
    <br>
    <p>You can support the Music Centre by becoming a Member and derive some benefits for yourself at the same time. Your subscription helps to keep us operating and we provide substantial discounts whenever possible.</p>
    <p>For the Music Centre's own events, Members' ticket discounts can be as high as 50%!</p>
    <br>
    <p>Individual membership costs only $25.00 per year!</p>
    <br>
    <a href="https://www.paypal.com/au/home">Click here to become a member and upgrade your account!</a><br>
    <br>
<?php
}
?>

<nav>
    <a href="DBManagementPage.php">Manage notices</a><br>
    <br>
    <a href="LogoutPage.php">Logout</a>
</nav>
</body>
</html>