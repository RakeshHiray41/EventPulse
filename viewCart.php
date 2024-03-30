<?php include 'config.php'; ?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <title>Cart</title>
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

    <link rel="icon" href="img/logo.jpg" type="image/x-icon">
    <style>
        #cont {
            min-height: 626px;
        }
    </style>

</head>

<body>

    <?php include 'partials/_dbconnect.php'; ?>
    <?php require 'partials/_nav.php' ?>
    <?php
    if ($loggedin) {
    ?>

        <div class="container mt-5 pt-5" id="cont">
            <div class="row">
                <div class="alert alert-info mb-0" style="width: -webkit-fill-available;">
                    <strong>Info!</strong> online payment are currently disabled so please choose cash on delivery.
                </div>
                <?php
                if (isset($_GET['info'])) {
                    if ($_GET['info'] == 1) {
                        echo '<div class="alert alert-warning  mb-0" role="alert" style="width: -webkit-fill-available;">
                All Ready Book
              </div>';
                    } else if ($_GET['info'] == 3) {
                        //     echo '<div class="alert alert-success  mb-0" role="alert" style="width: -webkit-fill-available;">
                        //     Available To Book
                        //   </div>';
                    } else if ($_GET['info'] == 2) {
                        echo '<div class="alert alert-danger  mb-0" role="alert" style="width: -webkit-fill-available;">
                Please Fill The Proper detail!
              </div>';
                    }
                }

                ?>
                <div class="col-lg-12 text-center border rounded bg-light my-2">
                    <h1>My Bookings</h1>
                </div>
                <div class="col-lg-8">
                    <div class="card wish-list mb-3">
                        <table class="table text-center">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Item Name</th>
                                    <th scope="col">Item Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total Price</th>
                                    <th scope="col">
                                        <form action="partials/_manageCart.php" method="POST">
                                            <button name="removeAllItem" class="btn btn-sm btn-outline-danger">Remove All</button>
                                            <input type="hidden" name="userId" value="<?php $userId = $_SESSION['userId'];
                                                                                        echo $userId ?>">
                                        </form>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM viewcart WHERE \"userId\" = $1";
                                $result = pg_query_params($conn, $sql, array($userId));
                                $counter = 0;
                                $totalPrice = 0;
                                while ($row = pg_fetch_assoc($result)) {
                                    $pizzaId = $row['pizzaId'];
                                    $Quantity = $row['itemQuantity'];
                                    $mysql = "SELECT * FROM pizza WHERE \"pizzaId\" = $1";
                                    $myresult = pg_query_params($conn, $mysql, array($pizzaId));
                                    $myrow = pg_fetch_assoc($myresult);
                                    $pizzaName = $myrow['pizzaName'];
                                    $pizzaPrice = $myrow['pizzaPrice'];
                                    $total = $pizzaPrice * $Quantity;
                                    $counter++;
                                    $totalPrice = $totalPrice + $total;

                                    echo '<tr>
                                            <td>' . $counter . '</td>
                                            <td>' . $pizzaName . '</td>
                                            <td>' . $pizzaPrice . '</td>
                                            <td>
                                                <form id="frm' . $pizzaId . '">
                                                    <input type="hidden" name="pizzaId" value="' . $pizzaId . '">
                                                    <input type="number" name="quantity" value="' . $Quantity . '" class="text-center" onchange="updateCart(' . $pizzaId . ')" onkeyup="return false" style="width:60px" min=1 oninput="check(this)" onClick="this.select();">
                                                </form>
                                            </td>
                                            <td>' . $total . '</td>
                                            <td>
                                                <form action="partials/_manageCart.php" method="POST">
                                                    <button name="removeItem" class="btn btn-sm btn-outline-danger">Remove</button>
                                                    <input type="hidden" name="itemId" value="' . $pizzaId . '">
                                                </form>
                                            </td>
                                        </tr>';
                                }
                                if ($counter == 0) {
                                ?><script>
                                        document.getElementById("cont").innerHTML = '<div class="col-md-12 my-5"><div class="card"><div class="card-body cart"><div class="col-sm-12 empty-cart-cls text-center"> <img src="https://i.imgur.com/dCdflKN.png" width="130" height="130" class="img-fluid mb-4 mr-3"><h3><strong>Your Cart is Empty</strong></h3><h4>Add something to make me happy :)</h4> <a href="home.php" class="btn btn-primary cart-btn-transform m-3" data-abc="true">continue booking</a> </div></div></div></div>';
                                    </script> <?php
                                            }

                                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-4 position-sticky">
                    <div class="card wish-list mb-3">
                        <div class="pt-4 border bg-light rounded p-3">
                            <div class="form-check">
                                <!-- To do list -->

                                <form id="myForm">
                                    Event Start Date Time <input class="form-control" type="datetime-local" name="start_date_time" id="start_date_time"><br>
                                    Event End Date Time <input type="datetime-local" class="form-control" name="end_date_time" id="end_date_time"><br>

                                    <select class="form-control" name="caffe" id="caffe">
                                        <option>Select Caffe</option>
                                        <?php
                                        $sql = 'SELECT * FROM public.caffe_list;';
                                        $result = pg_query($conn, $sql);
                                        while ($row = pg_fetch_assoc($result)) {
                                            echo '<option value="' . $row['caffe_id'] . '">' . $row['caffe_name'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                    <hr>

                                    <div id="availabilityMessage">

                                    </div>

                                    <hr>
                                    <button type="button" class="btn btn-primary" onclick="submitForm()" name="submit">Check For Availability</button>
                                </form>

                                <script>
                                    function submitForm() {
                                        var startDateTime = $('#start_date_time').val();
                                        var endDateTime = $('#end_date_time').val();
                                        var caffe = $('#caffe').val();

                                        $.ajax({
                                            type: 'POST',
                                            url: 'check_avilable.php',
                                            data: {
                                                start_date_time: startDateTime,
                                                end_date_time: endDateTime,
                                                caffe: caffe
                                            },
                                            success: function(response) {
                                                if (response.trim() === "1") {
                                                    $('#availabilityMessage').html('<div class="alert alert-warning  mb-0 falert myalert" role="alert" style="width: -webkit-fill-available;">All Ready Book</div>');
                                                } else if (response.trim() === "2") {
                                                    $('#availabilityMessage').html('<div class="alert alert-danger  mb-0 falert myalert" role="alert" style="width: -webkit-fill-available;" Please Fill The Proper detail!</div>');
                                                } else if (response.trim() === "3") {

                                                    $('#availabilityMessage').html('<div class="alert alert-success mb-0 falert myalert" role="alert" style="width: -webkit-fill-available;">Available To Book </div>');
                                                
                                                
                                                   
                                                
                                                }
                                            },
                                            error: function(xhr, status, error) {
                                                alert('Error: ' + error); // Display error message
                                            }
                                        });
                                    }
                                </script>
                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

                                <script>
                                    $(document).ready(function() {


                                        window.setTimeout(function() {
                                            $(".falert").fadeTo(1000, 0).slideUp(1000, function() {
                                                $(this).remove();
                                            });
                                        }, 5000);

                                        


                                    });
                                </script>
                                <hr>
                            </div>
                            <h5 class="mb-3 text-uppercase font-weight-bold text-center">Booking summary</h5>

                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0 bg-light">Total Price<span>Rs. <?php echo $totalPrice ?></span></li>
                                <!-- <li class="list-group-item d-flex justify-content-between align-items-center px-0 bg-light">Shipping<span>Rs. 0</span></li> -->
                                <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3 bg-light">
                                    <div>
                                        <strong>The total amount of</strong>
                                        <strong>
                                            <p class="mb-0">(including Tax & Charge)</p>
                                        </strong>
                                    </div>
                                    <span><strong>Rs. <span id="amount"><?php echo $totalPrice ?></span></strong></span>
                                </li>
                            </ul>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Cash On Delivery
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault1" id="flexRadioDefault1" disabled>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Online Payment
                                </label>
                            </div><br>
                            <form id="conformBooking">
                                <button type="button" class="btn btn-primary btn-block" onclick="conformBooking()">Confirm Booking</button>
                            </form>
                            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

                            <script>
                                function conformBooking() {

                                    var caffe = $('#caffe').val();
                                    var amount = <?php echo $totalPrice; ?>;

                                    $.ajax({
                                        type: 'POST',
                                        url: '/partials/_manageCart.php',
                                        data: {
                                            address: caffe,
                                            checkout: "checkout",
                                            amount: amount
                                        },
                                        success: function(response) {

                                            if (response.trim() === "success") {

                                                swal({
                                                        title: "Booking successfull..",
                                                        text: "we are redirecting to home page",
                                                        icon: "success"
                                                    })
                                                    .then((value) => {
                                                        window.location = "home.php";
                                                    });
                                            }

                                        },
                                        error: function(xhr, status, error) {
                                            alert('Error: ' + error); // Display error message
                                        }
                                    });
                                }
                            </script>

                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="pt-4">
                            <a class="dark-grey-text d-flex justify-content-between" style="text-decoration: none; color: #050607;" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                Add a discount code (optional)
                                <span><i class="fas fa-chevron-down pt-1"></i></span>
                            </a>
                            <div class="collapse" id="collapseExample">
                                <div class="mt-3">
                                    <div class="md-form md-outline mb-0">
                                        <input type="text" id="discount-code" class="form-control font-weight-light" placeholder="Enter discount code">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php
    } else {
        echo '<div class="container" style="min-height : 610px;">
        <div class="alert alert-info my-3">
            <font style="font-size:22px"><center>Before checkout you need to <strong><a class="alert-link" data-toggle="modal" data-target="#loginModal">Login</a></strong></center></font>
        </div></div>';
    }
    ?>
    <?php require 'partials/_checkoutModal.php'; ?>
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
        function check(input) {
            if (input.value <= 0) {
                input.value = 1;
            }
        }

        function updateCart(id) {
            $.ajax({
                url: 'partials/_manageCart.php',
                type: 'POST',
                data: $("#frm" + id).serialize(),
                success: function(res) {
                    location.reload();
                }
            })
        }
    </script>
</body>

</html>