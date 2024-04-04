<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>EventPulse</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicons -->
    <link href="img/favicon.png" rel="icon">
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
    <style>
        iframe{
            height: 300px;
            width: 300px;
        }
    </style>

</head>

<body>

    <!--==========================
    Header
  ============================-->
    <?php
    include("partials/_nav.php");

    $id =  $_GET['id']


    ?>

    <?php
    $sql = "select * FROM public.caffe_list where caffe_id=" . $_GET['id'] . ";";
    $result = pg_query($conn, $sql);
    $row = pg_fetch_assoc($result);

    echo ' 
    <main id="main" class="main-page">

    <!--==========================
      Speaker Details Section
    ============================-->
    <section id="speakers-details" class="wow fadeIn">
      <div class="container">
        <div class="section-header">
          <h2>' . $row['caffe_name'] . '</h2>
          <p>' . $row['description'] . '</p>
        </div>

        <div class="row">
          <div class="col-md-6">
            <img src="img/cafe-'.$row['caffe_id'].'.jpg" alt="Speaker 1" class="img-fluid">
          </div>
          

          <div class="col-md-6">
            <div class="details">
            <div class="stars">
            rating:
            ';
              for($i =0; $i<$row['rating']; $i++){
              echo '<i class="fa fa-star"></i>';
              };
              echo'
              </div>
               <p>Address:'.$row['address'].'</p>'.$row['map'].'

               </div>
              
            </div>
            

        
        
            </div>
        
        </div>
      </div>

    </section>
   
  </main>';
    ?>


    <!--==========================
    Footer
  ============================-->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-info">
                        <a href="#intro" class="scrollto"><span id="logo">Event<span id="sub-logo">Pulse</span></span></a>
                        <p>
                            Event Pulse is your premier destination for seamless birthday celebration planning. Our mission is to make every birthday unforgettable by providing access to top-notch venues, personalized services, and expert support.</p>
                    </div>
                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="fa fa-angle-right"></i> <a href="#intro">Home</a></li>
                            <li><i class="fa fa-angle-right"></i> <a href="#about">About us</a></li>
                            <li><i class="fa fa-angle-right"></i> <a href="#">Services</a></li>

                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>

                            <li><i class="fa fa-angle-right"></i> <a href="#">Terms of service</a></li>
                            <li><i class="fa fa-angle-right"></i> <a href="#">Privacy policy</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h4>Contact Us</h4>
                        <p>
                            College Road <br>
                            Near Kabra Book,Malegaon<br>
                            Maharashtra , India<br>
                            <strong>Phone:</strong> +91 8112345667<br>
                            <strong>Email:</strong> eventpulse@gmail.com<br>
                        </p>

                        <div class="social-links">
                            <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                            <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
                            <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong>EventPulse</strong>. All Rights Reserved
            </div>
            <div class="credits">

                Designed by <a href="">EventPulse Dev Team</a>
            </div>
        </div>
    </footer><!-- #footer -->

    <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>

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


</body>

</html>