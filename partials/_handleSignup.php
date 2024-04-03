<?php
$showAlert = false;
$showError = false;

if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php'; // Ensure this file is adjusted for PostgreSQL connection
    $username = pg_escape_string($conn, $_POST["username"]);
    $firstName = pg_escape_string($conn, $_POST["firstName"]);
    $lastName = pg_escape_string($conn, $_POST["lastName"]);
    $email = pg_escape_string($conn, $_POST["email"]);
    $phone = pg_escape_string($conn, $_POST["phone"]);
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    // Check whether this username exists
    $existSql = "SELECT * FROM users WHERE \"username\" = '$username'";
    $result = pg_query($conn, $existSql);
    $numExistRows = pg_num_rows($result);
    if($numExistRows > 0){
        // Username already exists
        $showError = "Username Already Exists";
        header("Location: /index.php?signupsuccess=false&error=$showError");
        
    }
    else{
        if($password == $cpassword){
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (\"username\",\"firstName\", \"lastName\", \"email\", \"phone\", \"password\") VALUES ('$username', '$firstName', '$lastName', '$email', '$phone', '$hash')";   
            echo($sql);
            $result = pg_query($conn, $sql);
            if ($result){
                $showAlert = true;
                ?>
                 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                 <script>
                    console.log("hello");
                    swal({
                                          title: "Signup successfull..",
                                          text: "we are redirecting to home page",
                                          icon: "success"
                                      })
                                      .then((value) => {
                                          window.location = "home.php";
                                      });
                 </script>

                <?php
                header("Location: /index.php?signupsuccess=true");
               
            }
        }
        else{
            // Passwords do not match
            $showError = "Passwords do not match";
            header("Location: /index.php?signupsuccess=false&error=$showError");
            
        }
    }
}
?>
