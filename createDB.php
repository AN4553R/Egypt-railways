<?php
include_once ('constants.php');
function CreateDB($dbname)
{
    $host="localhost";
    $root="root";
    $root_password="";
    try
    {
        $dbh = new PDO("mysql:host=$host", $root, $root_password);
        $dbh->exec("CREATE DATABASE IF NOT EXISTS $dbname;")
        or die(print_r($dbh->errorInfo(), true));
    }
    catch (PDOException $e)
    {
        die("DB ERROR: ". $e->getMessage());
    }
}
CreateDB(DB);
?>
