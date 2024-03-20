


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>EventPulse</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

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

</head>

<body>





<style>
    .divider:after,
.divider:before {
content: "";
flex: 1;
height: 1px;
background: #eee;
}
</style>


<?php
include_once("header1.php");


?>

<section class="mt-5 mb-5">
  <div class="container  h-100">
    <div class="row d-flex align-items-center justify-content-center h-100">
      <div class="col-md-10 col-lg-7 col-xl-6">
        <img src="./gif/cake.gif"
          class="img-fluid" alt="Phone image">
      </div>
      <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1" >
      <form action="partials/_handleLogin.php" method="post">
           <div class="container" >
               <h3 style="text-align: center; font-weight:500;">Welcome Back !</h3>
           </div> 
          <!-- Email input -->
          <div class="form-outline mb-4">
          <input class="form-control" id="loginusername" name="loginusername" placeholder="Enter Your Username" type="text" required>

            <!-- <label class="form-label" for="form1Example13">Email address</label> -->
          </div>

          <!-- Password input -->
          <div class="form-outline mb-4">
          <input class="form-control" id="loginpassword" name="loginpassword" placeholder="Enter Your Password" type="password" required data-toggle="password">
            <!-- <label class="form-label" for="form1Example23">Password</label> -->
          </div>

          <div class="d-flex justify-content-around align-items-center mb-4">
            <!-- Checkbox -->
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
              <label class="form-check-label" for="form1Example3"> Remember me </label>
            </div>
            <a href="#!">Forgot password?</a>
          </div>

          <!-- Submit button -->
          <button type="submit" class="btn btn-primary  btn-block">Login</button>

         

        </form>


        <!-- 


         <form action="partials/_handleLogin.php" method="post">
              <div class="text-left my-2">
                  <b><label for="username">Username</label></b>
                  <input class="form-control" id="loginusername" name="loginusername" placeholder="Enter Your Username" type="text" required>
              </div>
              <div class="text-left my-2">
                  <b><label for="password">Password</label></b>
                  <input class="form-control" id="loginpassword" name="loginpassword" placeholder="Enter Your Password" type="password" required data-toggle="password">
              </div>
              <button type="submit" class="btn btn-success">Submit</button>
            </form>


         -->
      </div>
    </div>
  </div>
</section>

<?php 
include_once("footer.php");
?>