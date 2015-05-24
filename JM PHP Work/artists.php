<?php
include("dbconnect.php");
?>

<!doctype html>

<html>
<head>
    <meta charset="UTF-8">
    <title>Database Management</title>
</head>

<body>
<h1>Artists Database Management</h1>

<form id="insert" name="insert" method="post" action="processartists.php">
    <fieldset>
        <h2>Insert new Artist:</h2>

        <p>
            <label for="name">Name: </label>
            <input type="text" name="name" id="name">
        </p>

        <p>
            <label for="details">Details: </label>
            <input type="text" name="details" id="details">
        </p>

        <p>
            <label for="phone">Phone: </label>
            <input type="text" name="phone" id="phone">
        </p>

        <p>
            <label for="email">Email: </label>
            <input type="text" name="email" id="email">
        </p>

        <p>
            <label for="website">Website: </label>
            <input type="text" name="website" id="website">
        </p>

        <p>
            <label for="image">Image: </label>
            <input type="text" name="image" id="image">
        </p>

        <p>
            <input type="submit" name="submit" id="submit" value="Insert">
        </p>
    </fieldset>
</form>

<fieldset>
    <h2>Artists: </h2>
    <table>
        <tr>
            <th>Name</th>
            <th>Details</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Website</th>
            <th>Image Filepath</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php
        $sql = "SELECT * FROM artists";
        foreach ($dbh->query($sql) as $row) {
            ?>
            <form id="delete" name="delete" method="post" action="processartists.php">

                <?php
                echo "<tr><input type='hidden' name='id' value='$row[id]' />
                <td><input type='text' name='name' value='$row[name]' /></td>
                <td><input type='text' name='details' value='$row[details]'/></td>
                <td><input type='text' name='phone' value='$row[phone]'/></td>
                <td><input type='text' name='email' value='$row[email]'/></td>\n
                <td><input type='text' name='website' value='$row[website]'/></td>\n
                <td><input type='text' name='image' value='$row[image]'/></td>\n";
                ?>
                <td><input type="submit" name="submit" value="Update"/></td>
                <td><input type="submit" name="submit" value="Delete" class="delete"></td>
                </tr>
            </form>
        <?php
        }
        echo "</table>\n";
        echo "</fieldset> \n";
        ?>
        <div>
            <h2>All Artists</h2>
            <?php
            $sql = "SELECT * FROM  artists";
            foreach ($dbh->query($sql) as $row) {
                printf("<a href = \"artistinfo.php?tag=%s\">%s</a><br>\n", $row[id], $row[name]);
            }
            $dbh = null;
            ?>
        </div>
</body>
</html>