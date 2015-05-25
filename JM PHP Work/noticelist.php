<?php
include("dbconnect.php");
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Notices List</title>
</head>

<body>
<div>
    <table>
        <?php
        $sql = "SELECT * FROM  notices";
        foreach ($dbh->query($sql) as $row) {
            printf("<tr><td>%s</td><td>%s</td><td>%s</td></tr>\n  ", $row[authorID], $row[content], $row[expiration]);
        }
        $dbh = null;
        ?>
    </table>
</div>

<br/><a href="index.php">Return to homepage</a>

</body>
</html>