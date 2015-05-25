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
    <form id="insert" name="insert" method="post" action="processnotices.php">
        <h2>Insert new Notice:</h2>
        <input type="hidden" name="authorID" id="authorID" value="<?php echo $_SESSION['userID'] ?>">
        <table>
            <tr>
                <td><label for="content">Content: </label></td>
                <td><input type="text" name="content" id="content"></td>
            </tr>

            <tr>
                <td><label for="expiration">Expiration Date: </label></td>
                <td><input type="date" name="expiration" id="expiration"></td>
            </tr>
        </table>

        <p>
            <input type="submit" name="submit" id="submit" value="Insert">
        </p>
    </form>
</fieldset>

<fieldset>
    <h2>Notices: </h2>
    <table>
        <tr>
            <th>AuthorID</th>
            <th>Content</th>
            <th>Expiration Date</th>
            <th>Modify Expiry Date</th>
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
                <td>$row[expiration]</td>
                <td><input type='date' name='expiration'/></td>";
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
            <table>
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
                <td><input width=300 height=100 type='text' name='details' value='$row[details]'/></td>
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

    <fieldset>
        <form id="insert" name="insert" method="post" action="processevents.php">
            <h2>Insert new Event:</h2>
            <table>
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
            </table>

            <p>
                <input type="submit" name="submit" id="submit" value="Insert">
            </p>
        </form>
    </fieldset>

    <fieldset>
        <h2>Events: </h2>
        <table>
            <tr>
                <th>Name</th>
                <th>ArtistID</th>
                <th>Location</th>
                <th>Date</th>
                <th>Modify Date</th>
                <th>Details</th>
                <th>Ticket Sales Link</th>
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
                <td>$row[eventDate]</td>
                <td><input type='date' name='eventDate' value='$row[eventDate]'/></td>
                <td><input type='text' name='details' value='$row[details]'/></td>
                <td><input type='text' name='ticketLink' value='$row[ticketLink]'/></td>";
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
        <table>
            <tr>
                <th>Username</th>
                <th>Password Hash</th>
                <th>Type</th>
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
?>


<nav>
    <a href="secureUserPage.php">Return to account page</a>
</nav>

</body>
</html>