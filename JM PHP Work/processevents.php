<?php
session_start();
$debugOn = true;
error_reporting(-1);
include("dbconnect.php");
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Process Events</title>
</head>

<body>
<h2>Process</h2>
<?php
// Image upload handling
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["imagefile"]["name"]);
move_uploaded_file($_FILES["imagefile"]["tmp_name"], $target_file);
?>
<h2>Form Data</h2>
<pre>
    <?php
    print_r($_REQUEST);
    ?>
</pre>
<?php
if ($_REQUEST['submit'] == "Insert") {
    $sql = "INSERT INTO events (name, artistID, location, eventDate, details, ticketLink, image) VALUES ( '$_REQUEST[name]','$_REQUEST[artistID]', '$_REQUEST[location]', '$_REQUEST[eventDate]', '$_REQUEST[details]', '$_REQUEST[ticketLink]', '$target_file')";
    echo "<p>Query: " . $sql . "</p>\n<p>";
    if ($dbh->exec($sql)) {
        echo "Inserted $_REQUEST[name]";
        $_SESSION['processMsg'] = "Event $_REQUEST[name] inserted";
    } else {
        echo "Not inserted";
        $_SESSION['processMsg'] = "Event $_REQUEST[name] not inserted";
    }
} else if ($_REQUEST['submit'] == "Delete") {
    $sql = "DELETE FROM events WHERE id = '$_REQUEST[id]'";
    echo "<p>Query: " . $sql . "</p>\n<p>";
    if ($dbh->exec($sql)) {
        echo "Deleted $_REQUEST[name]";
        $_SESSION['processMsg'] = "Event $_REQUEST[name] deleted";
    } else {
        echo "Not deleted";
        $_SESSION['processMsg'] = "Event $_REQUEST[name] not deleted";
    }
} else if ($_REQUEST['submit'] == "Update") {
    $sql = "UPDATE events SET name = '$_REQUEST[name]', artistID = '$_REQUEST[artistID]', location = '$_REQUEST[location]', eventDate = '$_REQUEST[eventDate]', details = '$_REQUEST[details]', ticketLink = '$_REQUEST[ticketLink]' WHERE id = '$_REQUEST[id]'";
    echo "<p>Query: " . $sql . "</p>\n<p>";
    if ($dbh->exec($sql)) {
        echo "Updated $_REQUEST[name]";
        $_SESSION['processMsg'] = "Event $_REQUEST[name] updated";
    } else {
        echo "Not updated";
        $_SESSION['processMsg'] = "Event $_REQUEST[name] not updated";
    }
} else {
    echo "No form submission \n";
    $_SESSION['processMsg'] = "No valid form submitted";
}
echo "</p>\n";
echo "<h2>Current Events</h2>\n";
$sql = "SELECT * FROM events";
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
    <?php
    header("Location: DBManagementPage.php");
    ?>
<a href="DBManagementPage.php">BACK</a>
</body>
</html>