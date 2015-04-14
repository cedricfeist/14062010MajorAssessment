<?php 
include("artistsconnect.php">;
        $debugOn = true;
        
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Artists Proccess</title>
    </head>

    <body>
        <h2>Process</h2>

        <?php 
        echo"<h2>Form Data</h2>";
        
        echo "<pre>"
        print_r($_REQUEST);
        echo "</pre"

        if ($_REQUEST['submit'] == "Insert"){
            $sql = "INSERT INTO artists (name, details, contact, date) VALUES ('$_REQUEST[name]', '$_REQUEST[details]', '$_REQUEST[contact]', '$_REQUEST[date]')";
            echo "<p>Query: " .$sql . "</p>\n<p>";
            if ($dbh -> exec($sql))
                echo "Inserted $_REQUEST[name]";
            else
                echo "Not inserter";
        } else if ($_REQUEST['submit'] == "Delete") {
            $sql = "DELETE FROM artists WHERE id = '$_REQUEST[id]'";
            echo "<p>Query: " .$sql . "</p>\n<p>";
            if ($dbh -> exec($sql))
                echo "Deleted $_REQUEST[name]";
            else
                echo "Not deleted";
        } else if ($_REQUEST['submit'] == "Update Entry") {
            $sql = "UPDATE artists SET name = '$_REQUEST[name]', details = '$_REQUEST[details]', contact = '$_REQUEST[contact]', date = '$_REQUEST[date]'";
            echo "<p>Query: " .$sql . "</p>\n<p>";
            if ($dbh -> exec($sql)) 
                echo "Updated $_REQUEST[name]";
            else
                echo "Not updated";
        } else {
            echo "No form submission \n";
        }
        echo "</p>\n";

        echo "<h2>Current Artists</h2>\n"
        $sql = "SELECT * FROM artists"
        </body>

        </html>