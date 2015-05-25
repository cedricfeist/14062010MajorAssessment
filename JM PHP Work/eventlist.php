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
            echo("<tr><td>Event name: $row[name]</td><td>Location: $row[location]</td><td>Date: $row[eventDate]</td><td>Details: $row[details]</td><td>Buy tickets: $row[ticketLink]</td></tr>");
        }
        $dbh = null;
        ?>
    </table>
</div>

<br/><a href="index.php">Return to homepage</a>

</body>
</html>
