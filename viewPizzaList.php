<?php include 'config.php';?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <title id="title">Category</title>
    <!-- Favicons -->
  <link href="img/logo.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/venobox/venobox.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
  
    <link rel = "icon" href ="img/logo.jpg" type = "image/x-icon">
    <style>
    .jumbotron {
        padding: 2rem 1rem;
    }
    #cont {
        min-height : 570px;
    }
    </style>
</head>
<body>
    <?php include 'partials/_dbconnect.php';?>
    <?php require 'partials/_nav.php' ?>

    <div>&nbsp;
        <a href="index.php" class="active text-dark">
        <i class="fas fa-qrcode"></i>
            <span>All Category</span>
        </a>
    </div>

    <?php
       $id = $_GET['catid'];
       $sql = "SELECT * FROM public.categories WHERE \"categorieId\" = $1";
       $result = pg_query_params($conn, $sql, array($id));
       while ($row = pg_fetch_assoc($result)) {
           $catname = $row['categorieName'];
           $catdesc = $row['categorieDesc'];
       }
       
    ?>
  
    <!-- Pizza container starts here -->
    <div class="container my-3 mt-5" id="cont">
        <div class="col-lg-4 text-center bg-light my-3" style="margin:auto; margin-top:5px;border-bottom: 2px groove black;">     
            <h2 class="text-center"><span id="catTitle"></span></h2>
        </div>
        <div class="row">
        <?php
            $id = $_GET['catid'];
            $sql = "SELECT * FROM  public.pizza WHERE \"pizzaCategorieId\" = $1";
            $result = pg_query_params($conn, $sql, array($id));
            $noResult = true;
            while ($row = pg_fetch_assoc($result)) {
                $noResult = false;
                $pizzaId = $row['pizzaId'];
                $pizzaName = $row['pizzaName'];
                $pizzaPrice = $row['pizzaPrice'];
                $pizzaDesc = $row['pizzaDesc'];
                
                echo '<div class="mx-auto">
                        <div class="card m-2" style="width: 18rem;">
                            <img src="img/pizza-' . $pizzaId . '.jpg" class="card-img-top" alt="image for this pizza" width="249px" height="270px">
                            <div class="card-body">
                                <h5 class="card-title">' . substr($pizzaName, 0, 20) . '...</h5>
                                <h6 style="color: #ff0000">Rs. ' . $pizzaPrice . '/-</h6>
                                <p class="card-text">' . substr($pizzaDesc, 0, 29) . '...</p>   
                                <div class="row justify-content-center">';
                                if ($loggedin) {
                                    $quaSql = 'SELECT "itemQuantity" FROM public.viewcart WHERE "pizzaId"= $1 AND "userId" = $2';
                                    $quaresult = pg_query_params($conn, $quaSql, array($pizzaId, $userId));
                                    $quaExistRows = pg_num_rows($quaresult);
                                    if ($quaExistRows == 0) {
                                        echo '<form action="partials/_manageCart.php" method="POST">
                                              <input type="hidden" name="itemId" value="' . $pizzaId . '">
                                              <button type="submit" name="addToCart" class="btn btn-primary mx-2">Add to Cart</button>';
                                    } else {
                                        echo '<a href="viewCart.php"><button class="btn btn-primary mx-2">Go to Cart</button></a>';
                                    }
                                } else {
                                    echo '<button class="btn btn-primary mx-2" data-toggle="modal" data-target="#loginModal">Add to Cart</button>';
                                }
                            echo '</form>                            
                                <a href="viewPizza.php?pizzaid=' . $pizzaId . '" class="mx-2"><button class="btn btn-primary">Quick View</button></a> 
                                </div>
                            </div>
                        </div>
                    </div>';
            }
            
            if($noResult) {
                echo '<div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <p class="display-4">Sorry In this category No items available.</p>
                        <p class="lead"> We will update Soon.</p>
                    </div>
                </div> ';
            }
            ?>
        </div>
    </div>


    <?php require 'partials/_footer.php' ?>
    
    
<!-- JavaScript Libraries -->
<script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/venobox/venobox.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>

  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>          -->
  <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>



    <script> 
        document.getElementById("title").innerHTML = "<?php echo $catname; ?>"; 
        document.getElementById("catTitle").innerHTML = "<?php echo $catname; ?>"; 
    </script> 
</body>
</html>