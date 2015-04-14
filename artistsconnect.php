<?php
try {
    $dbh = new PDO("sqlite:artistrecords.sqlite"); 
}
catch(PDOException $e)
{
    echo $e->getMessage();
}
?>