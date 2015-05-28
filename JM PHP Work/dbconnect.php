<?php
try {
    $dbh = new PDO("sqlite:database/sitedb.sqlite"); 
}
catch(PDOException $e)
{
    echo $e->getMessage();
}
?>