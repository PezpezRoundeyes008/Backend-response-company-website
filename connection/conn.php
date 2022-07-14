<?php
$hostname = "127.0.0.1";
$database = "projectdb";
$username = "root";
$password = "";

function getDBconnection(){
    global $hostname, $username, $password, $database;
    $DBconn = mysqli_connect($hostname, $username, $password, $database) // DO NOT MODIFY any order of global
    or die(mysqli_connect_error());
    return $DBconn; // return the DB connection
}
// $conn = mysqli_connect($hostname, $username, $pwd, $db)
// or die(mysqli_connect_error());

?>