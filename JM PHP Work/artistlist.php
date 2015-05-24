<?php
include("dbconnect.php");
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Artists List</title>
</head>

<body>
        <div>
            <h1>All Artists</h1>
            <ul>
            <?php
            $sql = "SELECT * FROM  artists";
            foreach ($dbh->query($sql) as $row) {
                printf("<li><a href = \"artistinfo.php?tag=%s\">%s</a></li>\n", $row[id], $row[name]);
            }
            $dbh = null;
            ?>
            </ul>
        </div>

        <br/><a href="index.php">Return to homepage</a>

</body>
</html>