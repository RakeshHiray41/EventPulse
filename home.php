<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="img/logo.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">


  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <title>Home</title>

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/venobox/venobox.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

  <link rel="icon" href="img/logo.jpg" type="image/x-icon">
  <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>   -->
</head>

<body>
  <?php include 'partials/_dbconnect.php'; ?>
  <?php
  require 'partials/_nav.php';

  if (isset($_GET['table_no'])) {
    $_SESSION['table_no'] = $_GET['table_no'];
  }  ?>

  <!-- Category container starts here -->
  <div class="container my-3 mycontainer ">
    <div class="col-lg-2 text-center bg-light my-3 " >
      <!-- <h2 class="text-center">Menu </h2> -->

      <select class="">
        <!-- <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          All Categories
        </a> -->
        <option>Select Categories</option>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">';
         
         <?php
          $sql = 'SELECT "categorieName", "categorieId" FROM public.categories;';
          $result = pg_query($conn, $sql);
          while ($row = pg_fetch_assoc($result)) {
            echo '<option><a class="dropdown-item" href="viewPizzaList.php?catid=' . $row['categorieId'] . '">' . $row['categorieName'] . '</a>'.'</option>';
          }


          ?>

        </div>
      </select>
        </div>

        <div class="row">
          <!-- Fetch all the categories and use a loop to iterate through categories -->
          <?php
          $sql = "SELECT * FROM categories";
          $result = pg_query($conn, $sql);
          while ($row = pg_fetch_assoc($result)) {
            $id = $row['categorieId'];
            $cat = $row['categorieName'];
            $desc = $row['categorieDesc'];
            echo '<div class="col-xs-3 col-sm-3 col-md-3">
                   <div class="card" style="width: 18rem;">
                     <img src="img/card-' . $id . '.jpg" class="card-img-top" alt="image for this category" width="249px" height="270px">
                     <div class="card-body">
                       <h5 class="card-title"><a href="viewPizzaList.php?catid=' . $id . '">' . $cat . '</a></h5>
                       <p class="card-text">' . substr($desc, 0, 30) . '... </p>
                       <a href="viewPizzaList.php?catid=' . $id . '" class="btn btn-primary">View All</a>
                     </div>
                   </div>
                 </div>';
          }

          ?>
        </div>
    </div>



    <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>
    <?php include_once("partials/_footer.php"); ?>
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




</body>

</html>