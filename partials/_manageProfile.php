<?php
    include '_dbconnect.php';
    session_start();
    $userId = $_SESSION['userId'];
    
    
    if(isset($_POST["updateProfilePic"])){
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check !== false) {
            $newfilename = "person-".$userId.".jpg";

            $uploaddir = $_SERVER['DOCUMENT_ROOT'].'/img/';
            $uploadfile = $uploaddir . $newfilename;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
                echo "<script>alert('success');
                        window.location=document.referrer;
                    </script>";
            } else {
                echo "<script>alert('image upload failed, please try again.');
                        window.location=document.referrer;
                    </script>";
            }
        }
        else{
            echo '<script>alert("Please select an image file to upload.");
                window.history.back(1);
            </script>';
        }
    }

    if(isset($_POST["updateProfileDetail"])){
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $password =$_POST["password"];

        $passSql = "SELECT * FROM \"users\" WHERE \"id\"=$1";
        $passResult = pg_query_params($conn, $passSql, array($userId));
        $passRow = pg_fetch_assoc($passResult);
        
        if ($passRow && password_verify($password, $passRow['password'])) {
            $sql = "UPDATE users SET \"firstName\"=$1, \"lastName\"=$2, \"email\"=$3, \"phone\"=$4 WHERE \"id\"=$5";
            $result = pg_query_params($conn, $sql, array($firstName, $lastName, $email, $phone, $userId));
            if ($result) {
                echo '<script>alert("Update successfully.");
                    window.history.back(1);
                    </script>';
            } else {
                echo '<script>alert("Update failed, please try again.");
                    window.history.back(1);
                    </script>';
            }
        } else {
            echo '<script>alert("Password is incorrect.");
                    window.history.back(1);
                    </script>';
        }
        
    }
    
    if(isset($_POST["removeProfilePic"])){
        $filename = $_SERVER['DOCUMENT_ROOT']."/img/person-".$userId.".jpg";
        if (file_exists($filename)) {
            unlink($filename);
            echo "<script>alert('Removed');
                window.location=document.referrer;
            </script>";
        }
        else {
            echo "<script>alert('no photo available.');
                window.location=document.referrer;
            </script>";
        }
    }
    
?>