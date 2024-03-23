
<?php 
$username ="";
 include 'config.php';
// $systemName = "ABC";

$loggedin_li = '

<li class=""><a href="home.php">Home</a></li>
<li><a href="index.php#hotels">Cafe</a></li>
<li><a href="index.php#gallery">Gallery</a></li>
<li><a href="index.php#contact">Contact</a></li>
<li class="nav-item"><a class="nav-link" href="viewOrder.php">Your Orders</a></li>


<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"> Welcome ' .$username. '</a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
      <div class="d-flex flex-column">
      <a style="color:#f82249;" href="index.php#speakers">Themes</a>
      <a style="color:#f82249;" href="index.php#about">About</a>
      <a style="color:#f82249;"class="dropdown-item" href="partials/_logout.php">Logout</a>
      </div>
    </div>
</li>
<li>
   <form method="get" action="/search.php" class="form-inline ">
    <input class="form-control mr-sm-2 search-input p-1" type="search" name="search" id="search" placeholder="Search" aria-label="Search" required>
    <button class="btn btn-outline-success my-2 my-sm-0 p-1 search-input" type="submit">Search</button>
  </form>
</li>
<li>
  <div class="image-size-small myimg">
            <a href="viewProfile.php"><img src="img/person-' .$userId. '.jpg" class="rounded-circle" onError="this.src = \'img/profilePic.jpg\'" style="width:40px; height:40px"></a>
  </div>
</li>

';

$not_login_li = '
<li class=""><a href="index.php">Home</a></li>
<li><a href="index.php#about">About</a></li>
<li><a href="index.php#speakers">Themes</a></li>
<li><a href="index.php#hotels">Cafe</a></li>
<li><a href="index.php#gallery">Gallery</a></li>
<li><a href="index.php#contact">Contact</a></li>
<li class="Login"><a href="login.php">Login</a></li>
<li ><a id="signup" data-toggle="modal" data-target="#signupModal">SignUp</a></li>
<li>
   <form method="get" action="/search.php" class="form-inline ">
    <input class="form-control mr-sm-2 search-input p-1" type="search" name="search" id="search" placeholder="Search" aria-label="Search" required>
    <button class="btn btn-outline-success my-2 my-sm-0 p-1 search-input" type="submit">Search</button>
  </form>
</li>';



echo ' 
<header id="header" class="header-fixed" style="margin-bottom:40px;">
<div class="container">

  <div id="logo" class="pull-left">
    <!-- Uncomment below if you prefer to use a text logo -->
    <!-- <h1><a href="#main">C<span>o</span>nf</a></h1>-->
     <a href="index.php" class="scrollto"><span id="logo">Event<span id="sub-logo">Pulse</span></span></a>
  </div>

  <nav id="nav-menu-container">
    <ul class="nav-menu">
    
  ';



  
        if($loggedin){
          echo $loggedin_li;
        }
        else {
          echo $not_login_li;
        }
            
  echo ' </ul>           
  </div>
    </nav> </header>';


    // include 'partials/_loginModal.php';
    include 'partials/_signupModal.php';

    if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true") {
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Success!</strong> You can now login.
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
            </div>';
    }
    if(isset($_GET['error']) && $_GET['signupsuccess']=="false") {
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>Warning!</strong> ' .$_GET['error']. '
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
            </div>';
    }
    if(isset($_GET['loginsuccess']) && $_GET['loginsuccess']=="true"){
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Success!</strong> You are logged in
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
            </div>';
    }
    if(isset($_GET['loginsuccess']) && $_GET['loginsuccess']=="false"){
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>Warning!</strong> Invalid Credentials
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
            </div>';
    }
?>



