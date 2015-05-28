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
        <?php


        ?>

        <table id="eventstable">
            <tr>
                <td><b>Event</b></td>
                <td><b>Location</b></td>
                <td><b>Date</b></td>
                <td><b>Details</b></td>
                <td><b>Tickets</b></td>
                <td></td>
            </tr>
            <?php

            $sql = "SELECT * FROM  events ORDER BY eventDate ASC";
            foreach ($dbh->query($sql) as $row) {
                $eventdate = $row[eventDate];
                $eventdate = str_replace('/', '.', $eventdate);
                $eventdate = strtotime($eventdate);
                $currentdate = strtotime("now");

                if ($eventdate > $currentdate) {


                    echo("<tr><td>$row[name]</td><td>$row[location]</td><td>$row[eventDate]</td><td>$row[details]</td><td><a href='$row[ticketLink]'>Buy Tickets</a></td><td><img src='$row[image]'></td></tr>");
                }

            }
            $dbh = null;
            ?>
        </table>
    </div>


    </body>
    </html>

<?php
