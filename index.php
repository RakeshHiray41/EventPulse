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
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
</head>

<body>

  <!--==========================
    Header
  ============================-->
   <?php 
      include "partials/_nav.php";
      // include "header1.php";
   ?>



  <!--==========================
    Intro Section
  ============================-->
  <section id="intro">
    <div class="intro-container wow fadeIn">
      <h1 class="mb-4 pb-0">Welcome to <span>Event Pulse </span> Planning <br><p>Your Ultimate Birthday Celebration Hub</p></h1>
    <!-- <a href="#about" class="about-btn scrollto">About The EventPulse</a> -->
    <a class = "about-btn scrollto" href="index.php#buy-tickets">Book Event</a></div>
  </section>

  <main id="main">

    <!--==========================
      About Section
    ============================-->
    <section id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h2>About The EventPulse</h2>
            <p>Are you ready to make birthdays unforgettable? Look no further! Event Pulse is your go-to platform for seamlessly managing and organizing birthday celebrations. From booking the perfect café to coordinating all the details, we've got you covered.</p>
          </div>
          
        </div>
      </div>
    </section>

    <!--==========================
     BIRTHDAY THEMES
    ============================-->
    <section id="speakers" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>BIRTHDAY THEMES</h2>
          <p>Surprise your loved ones on their birthday with beautiful decorations, get creative with our guide to the most popular kids’ party ideas and themes.</p>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6">
            <div class="speaker">
              <img src="img/cack.jpg" alt="Speaker 1" class="img-fluid1">
              <div class="details">
                <h3><a href="2d_theme.php">2D THEMES</a></h3>
                <p>We provide high-quality 2D Themes for all Birthday Party needs.
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="speaker">
              <img src="img/cack1.jpg" alt="Speaker 2" class="img-fluid">
              <div class="details">
                <h3><a href="3d_theme.php">3D THEMES</a></h3>
                <p>Why just celebrate in a simple way, do it in a very dreamful way.</p>
                
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="speaker">
              <img src="img/ballons.jpg" alt="Speaker 3" class="img-fluid">
              <div class="details">
                <h3><a href="ballon_theme.php">BALOONS THEMES</a></h3>
                <p>We offer a wide range of balloon decorations for Birthday Parties.</p>
               
              </div>
            </div>
          </div>
         
          
          
        </div>
      </div>

    </section>

 




    <!--==========================
      Hotels Section
    ============================-->
    <section id="hotels" class="section-with-bg wow fadeInUp">

      <div class="container">
        <div class="section-header">
          <h2>Cafe</h2>
          <p>Here are some nearby Cafe</p>
        </div>

       
        
       
        <div class="row">

        <?php 
          $sql = "select * FROM public.caffe_list;";
          $result = pg_query($conn, $sql);
          while ($row = pg_fetch_assoc($result)) {
        
          echo '<div class="col-lg-4 col-md-6">
            <div class="hotel">
              <div class="hotel-img">
                <img src="img/hotels/'.$row['caffe_id'].'.jpg" alt="Hotel 1" class="img-fluid">
              </div>

              <h3><a href="cafe.php?id='.$row['caffe_id'].'">'.$row['caffe_name'].'</a></h3>
              <div class="stars">
              ';
                for($i =0; $i<$row['rating']; $i++){
                echo '<i class="fa fa-star"></i>';
                };
                echo'
                </div>
                 <p>'.$row['address'].'</p>
                 </div>
          </div>';

          }
        ?>
       

        </div>
      </div>

    </section>

    <!--==========================
      Gallery Section
    ============================-->
    <section id="gallery" class="wow fadeInUp">

      <div class="container">
        <div class="section-header">
          <h2>Gallery</h2>
          <p>Check our gallery from the recent events</p>
        </div>
      </div>

      <div class="owl-carousel gallery-carousel">
        <a href="img/gallery/1.jpg" class="venobox" data-gall="gallery-carousel"><img src="img/gallery/1.jpg" alt=""></a>
        <a href="img/gallery/2.jpg" class="venobox" data-gall="gallery-carousel"><img src="img/gallery/2.jpg" alt=""></a>
        <a href="img/gallery/3.jpg" class="venobox" data-gall="gallery-carousel"><img src="img/gallery/3.jpg" alt=""></a>
        <a href="img/gallery/4.jpg" class="venobox" data-gall="gallery-carousel"><img src="img/gallery/4.jpg" alt=""></a>
        <a href="img/gallery/5.jpg" class="venobox" data-gall="gallery-carousel"><img src="img/gallery/5.jpg" alt=""></a>
        <a href="img/gallery/6.jpg" class="venobox" data-gall="gallery-carousel"><img src="img/gallery/6.jpg" alt=""></a>
        <a href="img/gallery/7.jpg" class="venobox" data-gall="gallery-carousel"><img src="img/gallery/7.jpg" alt=""></a>
        <a href="img/gallery/8.jpg" class="venobox" data-gall="gallery-carousel"><img src="img/gallery/8.jpg" alt=""></a>
      </div>

    </section>
    <!-- <iframe src="http://localhost/index.php" title="description" width="100%" height="100%"></iframe> -->
    <!--==========================
      F.A.Q Section
    ============================-->
    <section id="faq" class="wow fadeInUp">

      <div class="container">

        <div class="section-header">
          <h2>F.A.Q </h2>
        </div>

        <div class="row justify-content-center">
          <div class="col-lg-9">
              <ul id="faq-list">

                <li>
                  <a data-toggle="collapse" class="collapsed" href="#faq1">How does Event Pulse work? <i class="fa fa-minus-circle"></i></a>
                  <div id="faq1" class="collapse" data-parent="#faq-list">
                    <p>
                      Event Pulse is a platform designed to simplify the process of planning and booking birthday celebrations. Simply browse through our selection of venues, choose your desired location, date, and time, and complete the booking process online. Our team is here to assist you every step of the way.
                    </p>
                  </div>
                </li>
      
                <li>
                  <a data-toggle="collapse" href="#faq2" class="collapsed">What types of venues are available on Event Pulse? <i class="fa fa-minus-circle"></i></a>
                  <div id="faq2" class="collapse" data-parent="#faq-list">
                    <p>
                      We offer a diverse range of venues suitable for birthday celebrations, including cafes, restaurants, event spaces, and more. Whether you're planning an intimate gathering or a large party, you'll find the perfect venue to suit your needs.
                    </p>
                  </div>
                </li>
      
                <li>
                  <a data-toggle="collapse" href="#faq3" class="collapsed">Can I customize my birthday celebration? <i class="fa fa-minus-circle"></i></a>
                  <div id="faq3" class="collapse" data-parent="#faq-list">
                    <p>
                      Absolutely! Event Pulse allows you to personalize your celebration with optional add-ons such as themed decorations, custom cakes, entertainment, and more. Our team can assist you in creating a customized experience that reflects your unique style and preferences.
                    </p>
                  </div>
                </li>
      
                <li>
                  <a data-toggle="collapse" href="#faq4" class="collapsed">How far in advance should I book my venue? <i class="fa fa-minus-circle"></i></a>
                  <div id="faq4" class="collapse" data-parent="#faq-list">
                    <p>
                      We recommend booking your venue as early as possible to ensure availability, especially for popular dates and times. However, we also offer last-minute booking options for those spontaneous celebrations!.
                    </p>
                  </div>
                </li>
      
                <li>
                  <a data-toggle="collapse" href="#faq5" class="collapsed">What safety measures are in place at the venues? <i class="fa fa-minus-circle"></i></a>
                  <div id="faq5" class="collapse" data-parent="#faq-list">
                    <p>
                      We prioritize the safety and well-being of our customers. Many of our venues have implemented enhanced cleaning protocols and safety measures in accordance with local guidelines. We encourage you to check with individual venues for specific details.
                    </p>
                  </div>
                </li>
      
                <li>
                  <a data-toggle="collapse" href="#faq6" class="collapsed">Is there a fee to use Event Pulse? <i class="fa fa-minus-circle"></i></a>
                  <div id="faq6" class="collapse" data-parent="#faq-list">
                    <p>
                      Event Pulse is free to use for customers seeking to book venues for birthday celebrations. However, please note that there may be charges associated with optional add-ons or services provided by individual venues.
                    </p>
                  </div>
                </li>
      
              </ul>
          </div>
        </div>

      </div>

    </section>


    <!--==========================
      Buy Ticket Section
    ============================-->
    <section id="buy-tickets" class="section-with-bg wow fadeInUp">
      <div class="container">

        <div class="section-header">
          <h2>Book Event</h2>
          <p>Velit consequatur consequatur inventore iste fugit unde omnis eum aut.</p>
        </div>

        <div class="row">
          <div class="col-lg-4">
            <div class="card mb-5 mb-lg-0">
              <div class="card-body">
                <h5 class="card-title text-muted text-uppercase text-center">Standard Access</h5>
                <h6 class="card-price text-center">&#x20B9 150</h6>
                <hr>
                <ul class="fa-ul">
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Cafe</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Decorations</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Cake</li>
                  <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>Food</li>
                  <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>Cold-Drinks</li>
                  <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>Photo Shoot</li>
                </ul>
                <hr>
                <div class="text-center">
                  <button type="button" class="btn" data-toggle="modal" data-target="#buy-ticket-modal" data-ticket-type="standard-access">Book Now</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card mb-5 mb-lg-0">
              <div class="card-body">
                <h5 class="card-title text-muted text-uppercase text-center">Pro Access</h5>
                <h6 class="card-price text-center">&#x20B9 250</h6>
                <hr>
                <ul class="fa-ul">
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Cafe</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>decorations</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Cake</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Food</li>
                  <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>Cold-Drinks</li>
                  <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>Photo Shoot</li>
                </ul>
                <hr>
                <div class="text-center">
                  <button type="button" class="btn" data-toggle="modal" data-target="#buy-ticket-modal" data-ticket-type="pro-access">Book Now</button>
                </div>
              </div>
            </div>
          </div>
          <!-- Pro Tier -->
          <div class="col-lg-4">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title text-muted text-uppercase text-center">Premium Access</h5>
                <h6 class="card-price text-center">&#x20B9 350</h6>
                <hr>
                <ul class="fa-ul">
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Cafe</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>decorations</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Cake</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Food</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Cold-Drinks</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Photo Shoot</li>
                </ul>
                <hr>
                <div class="text-center">
                  <button type="button" class="btn" data-toggle="modal" data-target="#buy-ticket-modal" data-ticket-type="premium-access">Book Now</button>
                </div>

              </div>
            </div>
          </div>
        </div>

      </div>

      <!-- Modal Order Form -->
      <div id="buy-ticket-modal" class="modal fade">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Book Event</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST" action="index.php">
                <div class="form-group">
                  <input type="text" class="form-control" name="username" placeholder="Your Name">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="email" placeholder="Your Email">
                </div>
                <div class="form-group">
                  <select id="ticket-type" name="event-type" class="form-control" >
                    <option value="">-- Select Your Ticket Type --</option>
                    <option value="standard-access">Standard Access</option>
                    <option value="pro-access">Pro Access</option>
                    <option value="premium-access">Premium Access</option>
                  </select>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn">Book Now</button>
                </div>
              </form>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->

    </section>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>         
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
    <!--==========================
      Contact Section
    ============================-->
    <section id="contact" class="section-bg wow fadeInUp">

      <div class="container mt-5">

        <div class="section-header">
          <h2>Contact Us</h2>
          <p>We're here to help! Whether you have questions, feedback, or need assistance with your birthday celebration plans, our dedicated team is ready to assist you. Feel free to reach out to us using the following contact information</p>
        </div>

        <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="ion-ios-location-outline"></i>
              <h3>Address</h3>
              <address>College Road , Near Kabra Book ,Malegaon ,Nashik,Maharashtra 423203</address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="ion-ios-telephone-outline"></i>
              <h3>Phone Number</h3>
              <p><a href="tel:+155895548855">+91 8123456712</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="ion-ios-email-outline"></i>
              <h3>Email</h3>
              <p><a href="mailto:info@example.com">eventpulse@gmail.com</a></p>
            </div>
          </div>

        </div>

        <div class="form">
          <div id="sendmessage">Your message has been sent. Thank you!</div>
          <div id="errormessage"></div>
          <form action="" method="post" role="form" class="contactForm">
            <div class="form-row">
              <div class="form-group col-md-6">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
              </div>
              <div class="form-group col-md-6">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validation"></div>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
              <div class="validation"></div>
            </div>
            <div class="text-center"><button type="submit">Send Message</button></div>
          </form>
        </div>

      </div>
    </section><!-- #contact -->

  </main>


  <!--==========================
    Footer
  ============================-->

  <?php include_once("partials/_footer.php");?>


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

  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>         
  <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>




</body>

</html>
