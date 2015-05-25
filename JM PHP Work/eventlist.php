<?php
include("dbconnect.php");
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Event List</title>
</head>

<body>
<div>
    <table>
        <?php

        $sql = "SELECT * FROM  events";
        foreach ($dbh->query($sql) as $row) {
            echo("<tr><td>$row[name]</td><td>$row[location]</td><td>$row[eventDate]</td><td>$row[details]</td><td>$row[ticketLink]</td></tr>");
        }
        $dbh = null;
        ?>
    </table>
</div>

<br/><a href="index.php">Return to homepage</a>

</body>
</html>
