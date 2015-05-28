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

    echo "<table id='detailstable'><tr><td id='left'>";

    printf("<b>Name: </b>%s<br><br>", $row[name]);
    printf("<b>Details: </b>%s<br><br>", $row[details]);
    printf("<b>Phone: </b>%s<br><br>", $row[phone]);
    printf("<b>Email: </b>%s<br><br>", $row[email]);
    printf("<b>Website: </b>%s</td>", $row[website]);

    printf("<td id='right'><img src=\"%s\"></td></tr></table>", $row[image]);
}


$dbh = null;
?>

</body>
</html>