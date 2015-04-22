<?php
$debugOn = true;
error_reporting(-1);
include("artistsconnect.php");
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Artists Process</title>
    </head>

    <body>
        <h2>Process</h2>

        <?php 
        echo"<h2>Form Data</h2>";

        echo "<pre>";
        print_r($_REQUEST);
        echo "</pre>";

        if ($_REQUEST['submit'] == "Insert"){
            $sql = "INSERT INTO artists (name, details, phone, email, website, image) VALUES ('$_REQUEST[name]', '$_REQUEST[details]', '$_REQUEST[phone]', '$_REQUEST[email]', '$_REQUEST[website]', '$_REQUEST[image]')";
            echo "<p>Query: " .$sql . "</p>\n<p>";
            if ($dbh->exec($sql))
                echo "Inserted $_REQUEST[name]";
            else
                echo "Not inserted";
        }
        else if ($_REQUEST['submit'] == "Delete") {
            $sql = "DELETE FROM artists WHERE id = '$_REQUEST[id]'";
            echo "<p>Query: " . $sql . "</p>\n<p>";
            if ($dbh -> exec($sql)) 
                echo "Deleted $_REQUEST[name]";
             else
                echo "Not deleted";
        }
        else if ($_REQUEST['submit'] == "Update") {
            $sql = "UPDATE artists SET name = '$_REQUEST[name]', details = '$_REQUEST[details]', phone = '$_REQUEST[phone]', email = '$_REQUEST[email]', website = '$_REQUEST[website]', image = '$_REQUEST[image]' WHERE id = '$_REQUEST[id]'";
            echo "<p>Query: " . $sql . "</p>\n<p>";
            if ($dbh->exec($sql)) 
                echo "Updated $_REQUEST[name]";
            else 
            echo "Not updated";
        }
         else {
            echo "No form submission \n";
        }
              
        echo "</p>\n";

        echo "<h2>Current Artists</h2>\n";

        $sql = "SELECT * FROM artists";
        $result = $dbh->query($sql);
        $resultCopy = $result;
        
        if ($debugOn) {
            echo "<pre>";
            
            $rows = $result->fetchall(PDO::FETCH_ASSOC);
            echo count($rows) . " records in table <br />\n";
            echo "</pre>";
            echo "<br />\n";
                
        } 
        foreach ($dbh->query($sql) as $row) {
            echo $row[name] . "<br />\n";
        }

        $dbh = null;
     
        ?>
        <br>
        <a href="artists.php">BACK</a>
        </body>

        </html>