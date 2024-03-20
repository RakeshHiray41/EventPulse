<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    $username = $_POST["loginusername"];
    $password = $_POST["loginpassword"]; 
    
   
$sql = "SELECT * FROM users WHERE \"username\"='$username'";
$result = pg_query($conn, $sql);

if ($result) {
    $num = pg_num_rows($result);
    if ($num == 1) {
        $row = pg_fetch_assoc($result);
        $userId = $row['id'];
        if (password_verify($password, $row['password'])) {
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['userId'] = $userId;
            header("location: /EventPulse/home.php?loginsuccess=true");
            exit();
        } else {
            header("location: /EventPulse/home.php?loginsuccess=false");
            exit();
        }
    } else {
        header("location: /EventPulse/home.php?loginsuccess=false");
        exit();
    }
} else {
    echo "Error: Could not execute the query.";
}
}    
?>