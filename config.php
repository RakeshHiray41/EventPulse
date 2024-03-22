<?php 
if(session_status()!=PHP_SESSION_ACTIVE){
  session_start();
}
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
  $loggedin= true;
  $userId = $_SESSION['userId'];
  $username = $_SESSION['username'];
}
else{
  $loggedin = false;
  $userId = 0;
}
$host = "localhost";
$port = "5432"; 
$dbname = "Demo";
$user = "postgres"; 
$password = "Harish"; 

$connection_string = "host={$host} port={$port} dbname={$dbname} user={$user} password={$password}";

$conn = pg_connect($connection_string);

$sql = "SELECT * FROM sitedetail";
$result = pg_query($conn, $sql);
$row = pg_fetch_assoc($result);

$systemName = $row['systemName'];