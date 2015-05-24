<?php
include("dbconnect.php");
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
<?php
$sql = "SELECT * FROM artists WHERE id='$_GET[tag]'";
foreach ($dbh->query($sql) as $row) {
    printf("<img src=\"%s\"><br>", $row[image]);
    printf("Name: %s<br>", $row[name]);
    printf("Details: %s<br>", $row[details]);
    printf("Phone: %s<br>", $row[phone]);
    printf("Email: %s<br>", $row[email]);
    printf("Website: %s<br>", $row[website]);
}
$dbh = null;
?>
<a href="artistlist.php">BACK</a>
</body>
</html>