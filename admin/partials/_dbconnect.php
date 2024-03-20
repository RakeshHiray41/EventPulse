<?php
$host = "localhost";
$port = "5432"; 
$dbname = "Demo";
$user = "postgres"; 
$password = "1234"; 

$connection_string = "host={$host} port={$port} dbname={$dbname} user={$user} password={$password}";

$conn = pg_connect($connection_string);

if (!$conn) {
    die("Error: Could not connect to the database.");
}

?>

