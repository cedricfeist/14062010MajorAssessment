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
    <title>Process Artist</title>
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
    $sql = "INSERT INTO artists (name, details, phone, email, website, image) VALUES ('$_REQUEST[name]', '$_REQUEST[details]', '$_REQUEST[phone]', '$_REQUEST[email]', '$_REQUEST[website]', '$target_file')";


    echo "<p>Query: " . $sql . "</p>\n<p>";
    if ($dbh->exec($sql)) {
        echo "Inserted $_REQUEST[name]";
        $_SESSION['processMsg'] = "Artist $_REQUEST[name] inserted";
    } else {
        echo "Not inserted";
        $_SESSION['processMsg'] = "Artist $_REQUEST[name] not inserted";
    }
    $genreString = "$_REQUEST[genres]";
    $genres = explode(", ", $genreString);

    foreach ($genres as $gen) {
        $sql552 = "SELECT id FROM artists WHERE name = '$_REQUEST[name]'";
        foreach ($dbh->query($sql552) as $row) {
            $currentId = $row[id];
        }
        echo $currentId;
        $sql234 = "INSERT INTO genres (artistid, genre) VALUES ('$currentId', '$gen')";
        $dbh->exec($sql234);
    }
} else if ($_REQUEST['submit'] == "Delete") {
    $sql = "DELETE FROM artists WHERE id = '$_REQUEST[id]'";
    echo "<p>Query: " . $sql . "</p>\n<p>";
    if ($dbh->exec($sql)) {
        echo "Deleted $_REQUEST[name]";
        $_SESSION['processMsg'] = "Artist $_REQUEST[name] deleted";
    } else {
        echo "Not deleted";
        $_SESSION['processMsg'] = "Artist $_REQUEST[name] not deleted";
    }
} else if ($_REQUEST['submit'] == "Update") {
    $sql = "UPDATE artists SET name = '$_REQUEST[name]', details = '$_REQUEST[details]', phone = '$_REQUEST[phone]', email = '$_REQUEST[email]', website = '$_REQUEST[website]', image = '$_REQUEST[image]' WHERE id = '$_REQUEST[id]'";
    echo "<p>Query: " . $sql . "</p>\n<p>";
    if ($dbh->exec($sql)) {
        echo "Updated $_REQUEST[name]";
        $_SESSION['processMsg'] = "Artist $_REQUEST[name] updated";
    } else {
        echo "Not updated";
        $_SESSION['processMsg'] = "Artist $_REQUEST[name] not updated";
    }
} else if ($_REQUEST['submit'] == "Make Featured") {
    $sql = "UPDATE artists SET featured = 'false'";
    if ($dbh->exec($sql))
        echo "Reset all featured fields";
    else
        echo "Fields not reset";
    $sql = "UPDATE artists SET featured ='true' WHERE id = '$_REQUEST[id]'";
    if ($dbh->exec($sql)) {
        echo "Set featured to true for: $_REQUEST[id]";
        $_SESSION['processMsg'] = "Artist with ID $_REQUEST[id] set to featured";
    } else {
        echo "Featured not set.";
        $_SESSION['processMsg'] = "Artist with ID $_REQUEST[id] could not be set to featured";
    }
} else {
    echo "No form submission \n";
    $_SESSION['processMsg'] = "No valid form submitted";
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
<?php
header("Location: DBManagementPage.php");
?>
<a href="DBManagementPage.php">BACK</a>
</body>
</html>