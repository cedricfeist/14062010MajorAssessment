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
var_dump ($dbh);
echo"<br>";

echo $sql;
echo"<br>";

$results = $dbh->query($sql);
echo"<br>";
var_dump ($results);

printf("Name:%s <br>", $results[name]);

$dbh = null;

?>

    </body>


</html>