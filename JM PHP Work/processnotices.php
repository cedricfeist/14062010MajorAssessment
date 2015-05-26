<?php
$debugOn = true;
error_reporting(-1);
include("dbconnect.php");
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Process Notices</title>
</head>

<body>
<h2>Process</h2>
<?php
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
    $sql = "INSERT INTO notices (authorID, content, expiration, image) VALUES ( '$_REQUEST[authorID]','$_REQUEST[content]', '$_REQUEST[expiration]', '$target_file')";
    echo "<p>Query: " . $sql . "</p>\n<p>";
    if ($dbh->exec($sql))
        echo "Inserted notice with expiry date: $_REQUEST[expiration]";
    else
        echo "Not inserted";
} else if ($_REQUEST['submit'] == "Delete") {
    $sql = "DELETE FROM notices WHERE id = '$_REQUEST[id]'";
    echo "<p>Query: " . $sql . "</p>\n<p>";
    if ($dbh->exec($sql))
        echo "Deleted notice with expiry date: $_REQUEST[expiration]";
    else
        echo "Not deleted";
} else if ($_REQUEST['submit'] == "Update") {
    $sql = "UPDATE notices SET content = '$_REQUEST[content]', expiration = '$_REQUEST[expiration]' WHERE id = '$_REQUEST[id]'";
    echo "<p>Query: " . $sql . "</p>\n<p>";
    if ($dbh->exec($sql))
        echo "Updated notice by with expiry date: $_REQUEST[expiration]";
    else
        echo "Not updated";
} else {
    echo "No form submission \n";
}
echo "</p>\n";
echo "<h2>Current Notices</h2>\n";
$sql = "SELECT * FROM notices";
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
    echo $row[expiry] . "<br />\n";
}
$dbh = null;
?>
<br>
<a href="dbmanagement.php">BACK</a>
</body>
</html>