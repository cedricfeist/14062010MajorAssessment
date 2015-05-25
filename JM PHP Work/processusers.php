<?php
$debugOn = true;
error_reporting(-1);
include("dbconnect.php");
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Add User</title>
</head>

<body>
<h2>Process</h2>
<?php
echo "<h2>Form Data</h2>";
echo "<pre>";
print_r($_REQUEST);
echo "</pre>";
if ($_REQUEST['submit'] == "Insert") {
    // Check if the submitted username already exists in the db
    $sql = "SELECT * FROM users";
    $userExists = false;
    foreach ($dbh->query($sql) as $row)
        if ($row[username] == $_REQUEST[username])
            $userExists = true;

    $sql = sprintf("INSERT INTO users (username, password, type) VALUES ( '$_REQUEST[username]', '%s', '$_REQUEST[type]')", md5($_REQUEST[password]));
    echo "<p>Query: " . $sql . "</p>\n<p>";
    if (!$userExists)
        if ($dbh->exec($sql))
            echo "Inserted $_REQUEST[username]";
        else
            echo "Not inserted";
    else
        echo "User not inserted: Username already exists";
} else if ($_REQUEST['submit'] == "Delete") {
    $sql = "DELETE FROM users WHERE id = '$_REQUEST[id]'";
    echo "<p>Query: " . $sql . "</p>\n<p>";
    if ($dbh->exec($sql))
        echo "Deleted $_REQUEST[username]";
    else
        echo "Not deleted";
} else if ($_REQUEST['submit'] == "Update") {
    $sql = "UPDATE users SET username = '$_REQUEST[username]', type = '$_REQUEST[type]' WHERE id = '$_REQUEST[id]'";
    echo "<p>Query: " . $sql . "</p>\n<p>";
    if ($dbh->exec($sql))
        echo "Updated $_REQUEST[username]";
    else
        echo "Not updated";
} else {
    echo "No form submission \n";
}
echo "</p>\n";
echo "<h2>Current Users</h2>\n";
$sql = "SELECT * FROM users";
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
    echo $row[username] . "<br />\n";
}
$dbh = null;
?>
<br>
<a href="index.php">BACK</a>
</body>
</html>