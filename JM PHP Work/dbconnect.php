<?php
try {
    $dbh = new PDO("sqlite:sitedb.sqlite");
}
catch(PDOException $e)
{
    echo $e->getMessage();
}
?>