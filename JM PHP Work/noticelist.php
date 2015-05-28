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


    <table id="noticestable">
        <tr id="noticesrow">
            <td id='one'><b>Details: </b></td>
            <td id='two'><b>Contact:</b></td>
            <td id='three'><b>Expiry:</b></td>
        </tr>
        <?php
        $sql = "SELECT * FROM  notices";

        foreach ($dbh->query($sql) as $row) {

            $expirationdate = $row[expiration];
            $expirationdate = str_replace('/', '.', $expirationdate);
            $expirationdate = strtotime($expirationdate);
            $currentdate = strtotime("now");

            if ($expirationdate > $currentdate) {

                printf("<tr><td id='one'><br>%s<img src=\"%s\"></td><td id='two'>%s</td><td id='three'>%s</td></tr>\n  ", $row[content], $row[image], $row[contactdetails], $row[expiration]);
            }
        }
        $dbh = null;
        ?>
    </table>
</div>


</body>
</html> 