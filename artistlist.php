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


    <table id="artiststable">
        <?php
        $sql = "SELECT * FROM  artists";
        foreach ($dbh->query($sql) as $row) {
            printf("<tr><td><a href = \"ArtistsInfoPage.php?tag=%s\">%s</a></td><td>%s</td><td><img src=\"%s\"></td></tr>\n  ", $row[id], $row[name], $row[description], $row[image]);

        }
        $dbh = null;
        ?>
    </table>
</div>


</body>
</html>