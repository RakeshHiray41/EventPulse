<?php
include '_dbconnect.php';
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_SESSION['userId'];
    
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $orderId = $_POST["orderId"];
    $message = $_POST["message"];
    $password = $_POST["password"];

    // Check user password is match or not
    $passSql = "SELECT * FROM \"users\" WHERE \"id\"=$1";
$passResult = pg_query_params($conn, $passSql, array($userId));
$passRow = pg_fetch_assoc($passResult);

if ($passRow && password_verify($password, $passRow['password'])) {
    $sql = "INSERT INTO contact (\"userId\", \"email\", \"phoneNo\", \"orderId\", \"message\",\"time\") VALUES ($1, $2, $3, $4, $5, current_timestamp)";
    $result = pg_query_params($conn, $sql, array($userId, $email, $phone, $orderId, $message));
    $contactId = pg_last_oid($result);
    echo '<script>alert("Thanks for Contacting us. Your contact id is ' . $contactId . '. We will contact you very soon.");
        window.location.href="http://localhost/index.php";  
        </script>';
    exit();
} else {
    echo "<script>alert('Password incorrect!!');
        window.history.back(1);
        </script>";
}

    
}
?>