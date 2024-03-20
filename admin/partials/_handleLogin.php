<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    $username = $_POST["username"];
    $password = $_POST["password"]; 
    
    $sql = "SELECT * FROM users WHERE username='$username'"; 
$result = pg_query($conn, $sql);
$num = pg_num_rows($result);

    if ($num == 1){
        $row = pg_fetch_assoc($result);

        $userType = $row['userType'];
        if($userType == 1) {
            $userId = $row['id'];
            if (password_verify($password, $row['password'])){ 
                session_start();
                $_SESSION['adminloggedin'] = true;
                $_SESSION['adminusername'] = $username;
                $_SESSION['adminuserId'] = $userId;
                header("location: /EventPulse/admin/index.php?loginsuccess=true");
                exit();
            } 
            else{
                header("location: /EventPulse/admin/login.php?loginsuccess=false");
            }
        }
        else {
            header("location: /EventPulse/admin/login.php?loginsuccess=false");
        }
    } 
    else{
        header("location: /EventPulse/admin/login.php?loginsuccess=false");
    }
}    
?>