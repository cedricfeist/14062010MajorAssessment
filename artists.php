<?php
include("artistsconnect.php");
?>

<!doctype html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Artists Database Trial</title>
    </head>

    <body>
        <h1>Artists Database</h1>
        <form id="insert" name="insert" method="post" action="processartists.php">
            <fieldset>
                <h2>Insert new phone record:</h2>
                <p>
                    <label for="name">Name: </label>
                    <input type="text" name="name" id="name">
                </p>
                <p>
                    <label for="description">Details: </label>
                    <input type="text" name="details" id="details">
                </p>
                <p>
                    <label for="description">Contact: </label>
                    <input type="text" name="contact" id="contact">
                </p>
                <p>
                    <label for="description">Date: </label>
                    <input type="text" name="date" id="date">
                </p>
                <p>
                    <input type="submit" name="submit" id="submit" value="Insert">
                </p>
            </fieldset>
        </form>

        <fieldset>
            <h2>Artists: </h2>

            <?php
$sql = "SELECT * FROM artists";
foreach ($dbh->query($sql) as $row) {
            ?>
            <form  id="delete" name="delete" method="post" action="processartists.php">
                <?php
    echo"<input type='hidden' name='id' value='$row[id]' />
    <input type='text' name='name' value='$row[name]' />
        <input type='text' name='details' value='$row[details]'/>
        <input type='text' name='contact' value='$row[contact]'/>
        <input type='text' name='date' value='$row[date]'/>\n";
                ?>
                <input type="submit" name="submit" value="Update" />
                <input type="submit" name="submit" value="Delete" class="delete">
            </form>
            <?php 
}
echo "</fieldset> \n";
$dbh = null;
            ?>


            </body>

        </html>