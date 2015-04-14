<?php
include("dbconnect.php");
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
            <label for="description">Description: </label>
            <input type="text" name="description" id="description">
            </p>
            <p>
            <input type="submit" name="submit" id="submit" value="Insert">
            </p>
            </fieldset>
        </form>
    
        
        
    </body>
    























</html>