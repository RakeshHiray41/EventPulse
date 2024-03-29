<?php
include '_dbconnect.php'; // Ensure this file is updated for PostgreSQL connection
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_SESSION['userId'];
    if(isset($_POST['addToCart'])) {
        $itemId = $_POST["itemId"];
        // Check whether this item exists
        $existSql = 'SELECT * FROM  public.viewcart WHERE "pizzaId" = $1 AND "userId" = $2';
        $result = pg_query_params($conn, $existSql, array($itemId, $userId));
        $numExistRows = pg_num_rows($result);
        if($numExistRows > 0){
            echo "<script>alert('Item Already Added.');
                    window.history.back(1);
                    </script>";
        }
        else{
            $quantity=1;
            $sql ="INSERT INTO public.viewcart (\"pizzaId\",\"itemQuantity\",\"userId\",\"addedDate\") VALUES ($1, $quantity, $2, current_timestamp)";
            
            $result = pg_query_params($conn, $sql, array($itemId, $userId));
            
            if ($result){
                echo "<script>
                    window.history.back(1);
                    </script>";
            }
        }
    }
    if(isset($_POST['removeItem'])) {
        $itemId = $_POST["itemId"];
        $sql = "DELETE FROM viewcart WHERE \"pizzaId\" = $1 AND \"userId\" = $2";   
        $result = pg_query_params($conn, $sql, array($itemId, $userId));
        echo "<script>alert('Removed');
                window.history.back(1);
            </script>";
    }
    if(isset($_POST['removeAllItem'])) {
        $sql = "DELETE FROM viewcart WHERE \"userId\" = $1";   
        $result = pg_query_params($conn, $sql, array($userId));
        echo "<script>alert('Removed All');
                window.history.back(1);
            </script>";
    }
    if(isset($_POST['checkout'])) {
        $amount = $_POST["amount"];
        $table_no = $_POST["address"]; //table no
        $sql = "INSERT INTO orders (\"userId\", \"cafe_no\", \"amount\", \"paymentMode\", \"orderStatus\", \"orderDate\") VALUES ($1, $2, $3, '0', '0', current_timestamp)";
        $result = pg_query_params($conn, $sql, array($userId, $table_no, $amount));
        if ($result) {
            $orderId = pg_fetch_result(pg_query($conn,"SELECT LASTVAL();"), 0, 0);
            $addSql = "SELECT * FROM viewcart WHERE \"userId\" = $1"; 
            $addResult = pg_query_params($conn, $addSql, array($userId));
            while($addrow = pg_fetch_assoc($addResult)){
                $pizzaId = $addrow['pizzaId'];
                $itemQuantity = $addrow['itemQuantity'];
                $itemSql = "INSERT INTO orderitems (\"orderId\", \"pizzaId\", \"itemQuantity\") VALUES ($1, $2, $3)";
                $itemResult = pg_query_params($conn, $itemSql, array($orderId, $pizzaId, $itemQuantity));
            }
            $deletesql = "DELETE FROM viewcart WHERE \"userId\" = $1";   
            $deleteresult = pg_query_params($conn, $deletesql, array($userId));
            echo 'success';
                // header("location:/home.php");
                // exit();
        } 
    }    
    // if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    //     $pizzaId = $_POST['pizzaId'];
    //     $qty = $_POST['quantity'];
    //     $updatesql = "UPDATE viewcart SET \"itemQuantity\" = $2 WHERE \"pizzaId\" = $1 AND \"userId\" = $3";
    //     $updateresult = pg_query_params($conn, $updatesql, array($pizzaId, $qty, $userId));
    // }
}
?>
