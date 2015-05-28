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


            <table id="eventstable">
                <?php

$sql = "SELECT * FROM  events";
foreach ($dbh->query($sql) as $row) {   
                
    echo ("<tr><td>$row[name]</td><td>$row[location]</td><td>$row[eventDate]</td><td>$row[details]</td><td><a href='$row[ticketLink]'>Buy Tickets</a></td><td><img src='$row[image]'></td></tr>");


}
$dbh = null;    
                ?>
            </table>
        </div>

   

    </body>
</html>

<?php
