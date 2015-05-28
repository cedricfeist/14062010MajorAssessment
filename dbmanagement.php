<?php
require('authenticate.php');
include("dbconnect.php");
?>

<!doctype html>

<html>
<head>
    <meta charset="UTF-8">
    <title>Database Management</title>
</head>

<body>

<h1>Notices Database Table Management</h1>

<fieldset>
    <form id="insert" name="insert" method="post" action="processnotices.php" enctype="multipart/form-data">
        <h2>Insert new Notice:</h2>
        <input type="hidden" name="authorID" id="authorID" value="<?php echo $_SESSION['userID'] ?>">
        <table id="managementTable">
            <tr>
                <td><label for="content">Content: </label></td>
                <td><input type="text" name="content" id="content"></td>
            </tr>

            <tr>
                <td><label for="contact">Contact Details: </label></td>
                <td><input type="text" name="contact" id="contact"></td>
            </tr>

            <tr>
                <td><label for="expiration">Expiration Date: </label></td>
                <td><input type="date" name="expiration" id="expiration"></td>
            </tr>

            <tr>
                <td><label for="imagefile">Image: </label></td>
                <td><input type="file" name="imagefile" id="imagefile"></td>
            </tr>
        </table>

        <p>
            <input type="submit" name="submit" id="submit" value="Insert">
        </p>
    </form>
</fieldset>

<fieldset>
<!--Notices will not delete themselves, but they will not display after the expiry date.-->
    <h2>Notices: </h2>
    <table id="managementTable">
        <tr>
            <th>AuthorID</th>
            <th>Content</th>
            <th>Contact Details</th>
            <th>Expiry Date</th>
            <th>Image Filepath</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php
        if ($_SESSION["accountType"] != 'admin')
            $sql = sprintf("SELECT * FROM notices WHERE authorID = '%s'", $_SESSION["userID"]);
        else
            $sql = "SELECT * FROM notices";
        foreach ($dbh->query($sql) as $row) {
            ?>
            <form id="delete" name="delete" method="post" action="processnotices.php">

                <?php
                echo "<tr><input type='hidden' name='id' value='$row[id]' />
                <td><p>$row[authorID]</p></td>
                <td><input type='text' name='content' value='$row[content]'/></td>
                <td><input type='text' name='contact' value='$row[contactdetails]'/></td>
                <td><input type='date' name='expiration' value='$row[expiration]'/></td>
                <td><input type='text' name='image' value='$row[image]'/></td>";
                ?>
                <td><input type="submit" name="submit" value="Update"/></td>
                <td><input type="submit" name="submit" value="Delete" class="delete"></td>
                </tr>
            </form>
        <?php
        }
        ?>
    </table>
</fieldset>

<?php
if ($_SESSION["accountType"] != 'free') {
    ?>
    <h1>Artists Database Table Management</h1>

    <fieldset>
        <form id="insert" name="insert" method="post" action="processartists.php" enctype="multipart/form-data">
            <h2>Insert new Artist:</h2>
            <table id="managementTable">
                <tr>
                    <td><label for="name">Name: </label></td>
                    <td><input type="text" name="name" id="name"></td>
                </tr>

                <tr>
                    <td><label for="details">Details: </label></td>
                    <td><input type="text" name="details" id="details"></td>
                </tr>

                <tr>
                    <td><label for="phone">Phone: </label></td>
                    <td><input type="text" name="phone" id="phone"></td>
                </tr>

                <tr>
                    <td><label for="email">Email: </label></td>
                    <td><input type="text" name="email" id="email"></td>
                </tr>

                <tr>
                    <td><label for="website">Website: </label></td>
                    <td><input type="text" name="website" id="website"></td>
                </tr> 
                
                <tr>
                    <td><label for="website">Genres(separated by , ): </label></td>
                    <td><input type="text" name="genres" id="genres"></td>
                </tr>

                <tr>
                    <td><label for="imagefile">Image: </label></td>
                    <td><input type="file" name="imagefile" id="imagefile"></td>
                </tr>
            </table>

            <p>
                <input type="submit" name="submit" id="submit" value="Insert">
            </p>
        </form>
    </fieldset>

    <fieldset>
        <h2>Artists: </h2>
        <table id="managementTable">
            <tr>
                <th>Name</th>
                <th>Details</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Website</th>
                <th>Image Filepath</th>
                <th>Update</th>
                <th>Delete</th>
                <th>Make Featured</th>
            </tr>
            <?php
            $sql = "SELECT * FROM artists";
            foreach ($dbh->query($sql) as $row) {
                ?>
                <form id="delete" name="delete" method="post" action="processartists.php">

                    <?php
                    echo "<tr><input type='hidden' name='id' value='$row[id]' />
                <td><input type='text' name='name' value='$row[name]' /></td>
                <td><input width=300 height=100 type='text' name='details' value='$row[details]'/></td>
                <td><input type='text' name='phone' value='$row[phone]'/></td>
                <td><input type='text' name='email' value='$row[email]'/></td>
                <td><input type='text' name='website' value='$row[website]'/></td>
                <td><input type='text' name='image' value='$row[image]'/></td>";
                    ?>
                    <td><input type="submit" name="submit" value="Update"/></td>
                    <td><input type="submit" name="submit" value="Delete" class="delete"></td>
                    <td><input type="submit" name="submit" value="Make Featured"></td>
                    </tr>
                </form>
            <?php
            }
            ?>
        </table>
    </fieldset>
<?php
}
?>

<?php
if ($_SESSION["accountType"] == "admin") {
    ?>
    <h1>Events Database Table Management</h1>
<!--Events will not delete themselves, but they will not display after the expiry date.-->  
    <fieldset>
        <form id="insert" name="insert" method="post" action="processevents.php" enctype="multipart/form-data">
            <h2>Insert new Event:</h2>
            <table id="managementTable">
                <tr>
                    <td><label for="name">Name: </label></td>
                    <td><input type="text" name="name" id="name"></td>
                </tr>

                <tr>
                    <td><label for="artistID">ArtistID: </label></td>
                    <td><input type="text" name="artistID" id="artistID"></td>
                </tr>

                <tr>
                    <td><label for="location">Location: </label></td>
                    <td><input type="text" name="location" id="location"></td>
                </tr>

                <tr>
                    <td><label for="eventDate">Date: </label></td>
                    <td><input type="date" name="eventDate" id="eventDate"></td>
                </tr>

                <tr>
                    <td><label for="details">Details: </label></td>
                    <td><input type="text" name="details" id="details"></td>
                </tr>

                <tr>
                    <td><label for="ticketLink">Ticket Link: </label></td>
                    <td><input type="text" name="ticketLink" id="ticketLink"></td>
                </tr>

                <tr>
                    <td><label for="imagefile">Image: </label></td>
                    <td><input type="file" name="imagefile" id="imagefile"></td>
                </tr>
            </table>

            <p>
                <input type="submit" name="submit" id="submit" value="Insert">
            </p>
        </form>
    </fieldset>

    <fieldset>
        <h2>Events: </h2>
        <table id="managementTable">
            <tr>
                <th>Name</th>
                <th>ArtistID</th>
                <th>Location</th>
                <th>Date</th>
                <th>Details</th>
                <th>Ticket Sales Link</th>
                <th>Image Filepath</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            <?php
            $sql = "SELECT * FROM events";
            foreach ($dbh->query($sql) as $row) {
                ?>
                <form id="delete" name="delete" method="post" action="processevents.php">
                    <?php
                    echo "<tr><input type='hidden' name='id' value='$row[id]' />
                <td><input type='text' name='name' value='$row[name]' /></td>
                <td><input type='text' name='artistID' value='$row[artistID]' /></td>
                <td><input type='text' name='location' value='$row[location]'/></td>
                <td><input type='date' name='eventDate' value='$row[eventDate]'/></td>
                <td><input type='text' name='details' value='$row[details]'/></td>
                <td><input type='text' name='ticketLink' value='$row[ticketLink]'/></td>
                <td><input type='text' name='image' value='$row[image]'/></td>";
                    ?>
                    <td><input type="submit" name="submit" value="Update"/></td>
                    <td><input type="submit" name="submit" value="Delete" class="delete"></td>
                    </tr>
                </form>
            <?php
            }
            ?>
        </table>
    </fieldset>


    <h1>Manage Users</h1>
    <fieldset>
        <h2>Users: </h2>
        <table id="managementTable">
            <tr>
                <th>Username</th>
                <th>Password Hash</th>
                <th>Type</th>
                <th>Volunteer</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            <?php
            $sql = "SELECT * FROM users";
            foreach ($dbh->query($sql) as $row) {
                ?>
                <form id="delete" name="delete" method="post" action="processusers.php">

                    <?php
                    echo "<tr><input type='hidden' name='id' value='$row[id]' />
                    <td><input type='text' name='username' value='$row[username]' /></td>
                    <td>$row[password]</td>";
                    ?>
                    <td>
                        <select name='type'>
                            <option value='free'<?php if ($row['type'] == 'free') echo " selected='selected'";?>>Free</option>
                            <option value='paid'<?php if ($row['type'] == 'paid') echo " selected='selected'";?>>Paid</option>
                            <option value='admin'<?php if ($row['type'] == 'admin') echo " selected='selected'";?>>Admin</option>
                        </select>
                    </td>
                    <td><input type="radio" name="volunteer" id="volunteer" value="true"<?php if ($row['volunteer'] == 'true') echo " checked";?>>Yes <input type="radio" name="volunteer" id="volunteer" value="false"<?php if ($row['volunteer'] == 'false') echo " checked";?>>No</td>
                    <?php
                    echo "<td><input type='text' name='name' value='$row[name]' /></td>
                    <td><input type='text' name='surname' value='$row[surname]' /></td>
                    <td><input type='text' name='address' value='$row[address]' /></td>
                    <td><input type='text' name='phone' value='$row[phone]' /></td>
                    <td><input type='text' name='mobile' value='$row[mobile]' /></td>
                    <td><input type='text' name='email' value='$row[email]' /></td>";
                    ?>
                    <td><input type="submit" name="submit" value="Update"/></td>
                    <td><input type="submit" name="submit" value="Delete" class="delete"></td>
                    </tr>
                </form>
            <?php
            }
            ?>
        </table>
    </fieldset>
<?php
}
if ($_SESSION["accountType"] == 'free') {
    ?>
    <nav>
        <a href="SecureUserPage.php">Return to account page</a>
    </nav>
<?php
}
?>
</body>
</html>