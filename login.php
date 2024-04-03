<?php
?>

<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/c/CodingLabYT-->
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <!--<title> Login and Registration Form in HTML & CSS | CodingLab </title>-->
  <link rel="stylesheet" href="css/loginpage.css">
  <!-- Fontawesome CDN Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
  <?php
  include("partials/_nav.php");
  ?>
  <section class="mt-5 mx-auto section1">
    <div class="lcontainer">
      <input type="checkbox" id="flip">
      <div class="cover">
        <div class="front1">
          <img src="gif/cake.gif" alt="">
          <div class="text">
            <!-- <span class="text-1">Every new friend is a <br> new adventure</span> -->
            <!-- <span class="text-2">Let's get connected</span> -->
          </div>
        </div>
        <div class="back">
          <img class="backImg" src="img/backImg.jpg" alt="">
          <div class="text">
            <span class="text-1">Complete miles of journey <br> with one step</span>
            <span class="text-2">Let's get started</span>
          </div>
        </div>
      </div>
      <div class="forms">
        <div class="form-content">
          <div class="login-form">
            <div class="title">Login</div>
            <form action="partials/_handleLogin.php" method="POST">
              <div class="input-boxes">
                <div class="input-box">
                  <i class="fas fa-envelope"></i>
                  <input type="text" placeholder="Enter your username" id="loginusername" name="loginusername" required>
                </div>
                <div class="input-box">
                  <i class="fas fa-lock"></i>
                  <input type="password" placeholder="Enter your password" id="loginpassword" name="loginpassword" required>
                </div>
                <div class="text"><a href="#">Forgot password?</a></div>
                <div class="button input-box">
                  <input type="submit" value="Submit" >
                </div>
                <div class="text sign-up-text">Don't have an account? <label for="flip">Sigup now</label></div>
              </div>
            </form>
          </div>

          <div class="signup-form">
            <div class="title">Signup</div>

            <form action="partials/_handleSignup.php" method="post">
              <div class="input-boxes">
                <div class="input-box">
                  <i class="fas fa-user"></i>
                  <input  id="username" name="username" placeholder="Choose a unique Username" type="text" required minlength="3" maxlength="15">
                </div>
                <div class="form-row">
                  <div class="input-box col-md-6">
                    <i class="fas fa-user"></i>
                    <input type="text"  id="firstName" name="firstName" placeholder="First Name" required>
                  </div>
                  <div class="input-box col-md-6">
                    <i class="fas fa-user"></i>
                    <input type="text"  id="lastName" name="lastName" placeholder="Last name" required>
                  </div>
                </div>
                <div class="input-box">
                  <i class="fas fa-envelope"></i>
                  <input type="email"  id="email" name="email" placeholder="Enter Your Email" required>
                </div>
                <div class="input-box">
                  <i class="fas fa-phone"></i>
                  <input type="tel"  id="phone" name="phone" placeholder="Enter Your Phone Number" required pattern="[0-9]{10}" maxlength="10">
                </div>
                <div class="text-left input-box">
                  <i class="fa fa-key"></i>
                  <input  id="password" name="password" placeholder="Enter Password" type="password" required data-toggle="password" minlength="4" maxlength="21">
                </div>
                <div class="text-left input-box">
                  <i class="fas fa-lock"></i>
                  <input  id="cpassword" name="cpassword" placeholder="Renter Password" type="password" required data-toggle="password" minlength="4" maxlength="21">
                </div>
                <div class="button input-box">
                  <input type="submit" value="submit" >
                </div>
              </div>
              <div class="text sign-up-text">Already have an account? <label for="flip">Login now</label></div>
            </form>
          </div>
          <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
              <script>
                  function signUp() {

                      var username = $('#username').val();
                      var firstname = $("#firstname").val();
                      var lastname = $('#lastname').val();
                      var email = $('#email').val();
                      var phone = $('#phone').val();
                      var password = $("#password").val();
                      var cpassword = $('#cpassword').val();
                     

                      $.ajax({
                          type: 'POST',
                          url: '/partials/_handleSignup.php',
                          data: {
                              username: username,
                              firstname: firstname,
                              lastname:lastname,
                              email:email,
                              phone:phone,
                              password:password,
                              cpassword:cpassword
                          },
                          success: function(response) {
                            console.log(response);
                              // if (response.trim() === "success") {

                                  swal({
                                          title: "Signup successfull..",
                                          text: "we are redirecting to home page",
                                          icon: "success"
                                      })
                                      .then((value) => {
                                          window.location = "home.php";
                                      });
                              // }

                          },
                          error: function(xhr, status, error) {
                              alert('Error: ' + error); // Display error message
                          }
                      });
                  }
              </script>

        </div>
      </div>
    </div>
  </section>

  <?php
  include_once("footer.php");
  ?>