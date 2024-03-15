<?php
include_once("header.php");



$name = $_POST['username'];
$email = $_POST['email'];
$event_type = $_POST['event-type'];

?>

<style>

/* @media (min-width: 1025px) {
.h-custom {
height: 100vh !important;
}
} */

</style>



 <section class="h-80 h-custom " style="background-color: #8fc4b7;">
  <div class="container py-5 h-100 ">
    <div class="row d-flex justify-content-center align-items-center mt-5 " >
      <div class="col-lg-10 ">
        <div class="card   rounded-3">
          <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/img3.webp"
            class="w-100 h-20" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;"
            alt="Sample photo">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Registration Info</h3>

            <form class="px-md-2">

              <div class="form-outline mb-4">
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
                    <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>Soft Drinks</li>
                    <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>Photo Shoot</li>
                  </ul>
                  <hr>
                </div>
              </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4">

                  <div class="form-outline datepicker">
                    <input type="text" class="form-control" id="exampleDatepicker1" />
                    <label for="exampleDatepicker1" class="form-label">Select a date</label>
                  </div>

                </div>
                <div class="col-md-6 mb-4">

                  <select class="select">
                    <option value="1" disabled>Gender</option>
                    <option value="2">Female</option>
                    <option value="3">Male</option>
                    <option value="4">Other</option>
                  </select>

                </div>
              </div>

              <div class="mb-4">

                <select class="select">
                  <option value="1" disabled>Class</option>
                  <option value="2">Class 1</option>
                  <option value="3">Class 2</option>
                  <option value="4">Class 3</option>
                </select>

              </div>

              <div class="row mb-4 pb-2 pb-md-0 mb-md-5">
                <div class="col-md-6">

                  <div class="form-outline">
                    <input type="text" id="form3Example1w" class="form-control" />
                    <label class="form-label" for="form3Example1w">Registration code</label>
                  </div>

                </div>
              </div>

              <button type="submit" class="btn btn-success  mb-1">Submit</button>

            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
include_once("footer.php");
?>