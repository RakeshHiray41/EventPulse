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
include_once("header.php");


?>

<section class="mt-5 mb-5">
  <div class="container  h-100">
    <div class="row d-flex align-items-center justify-content-center h-100">
      <div class="col-md-10 col-lg-7 col-xl-6">
        <img src="./gif/cake.gif"
          class="img-fluid" alt="Phone image">
      </div>
      <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1" >
        <form>
           <div class="container" >
               <h3 style="text-align: center; font-weight:500;">Welcome Back !</h3>
           </div> 
          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="email" id="form1Example13" class="form-control" placeholder="Enter Email"/>
            <!-- <label class="form-label" for="form1Example13">Email address</label> -->
          </div>

          <!-- Password input -->
          <div class="form-outline mb-4">
            <input type="password" id="form1Example23" class="form-control " placeholder="Enter Password" />
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
      </div>
    </div>
  </div>
</section>

<?php 
include_once("footer.php");
?>