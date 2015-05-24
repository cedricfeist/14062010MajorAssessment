<?php require("authenticate.php");
/*	Use include/require to avoid duplicating code.
	In this case, authenticate is included for every page we want to secure/protect.
*/

// count number of visits
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
<p><?php echo "Welcome ".$_SESSION['username']; ?>
</p>
<h2>Variables:</h2>
<pre>
<strong>Post:</strong>
    <?php
    print_r($_GET);
    echo "<strong>GET:</strong><br>";
    print_r($_POST);
    echo "<strong>Session:</strong><br/>";
    print_r($_SESSION);
    echo "<strong>Session ID: </strong>" . session_id();
    echo "\n<strong>Visits:</strong> $_SESSION[count]\n";
    ?>
</pre>
<nav>
    <a href="secureUserPage.php">Reload</a> <a href="dbmanagement.php">Manage</a> <a href="logout.php">Logout</a>
</nav>
</body>
</html>