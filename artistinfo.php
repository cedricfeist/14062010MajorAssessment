<?php
include("artistsconnect.php");
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
    printf("ID: %s<br>", $row[id]);
    printf("Name: %s<br>", $row[name]);
    printf("Details: %s<br>", $row[details]);
    printf("Contact: %s<br>", $row[contact]);
    printf("Date: %s<br>", $row[date]);
}

$dbh = null;
?>

<a href="artists.php">BACK</a>
</body>
</html>