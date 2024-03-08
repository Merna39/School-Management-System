<?php include('header.php')?>
<!-- Default form login -->
<section class=" vh-100 d-flex ">
  <div class="col-3 m-auto"  >
<form  method="POST" class="text-center border border-light p-5" >
<!-- action="actions/login.php" -->
    <p class="h4 mb-4 text-center">Sign in</p>

    <!-- Email -->
    <input name="email" type="email" id="defaultLoginFormEmail"  class="form-control mb-4" placeholder="email" required>

    <!-- Password -->
   <input name="password" type="password" id="defaultLoginFormPassword"   class="form-control mb-4" placeholder="password" required>

    <div class="d-flex justify-content-around">
        <div>
            <!-- Remember me -->
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember">
                <label class="custom-control-label" for="defaultLoginFormRemember">Remember me</label>
            </div>
        </div>
        <div>
            <!-- Forgot password -->
            <a href="">Forgot password?</a>
        </div>
    </div>

    <!-- Sign in button -->
    <button class="btn btn-info btn-block my-4" name="login" type="submit" >Login </button>

    <!-- Register -->
    <p>Not a member?
        <a href="">Register</a>
    </p>

    <!-- Social login -->
    <p>or sign in with:</p>

    <a href="#" class="mx-2" role="button"><i class="fab fa-facebook-f light-blue-text"></i></a>
    <a href="#" class="mx-2" role="button"><i class="fab fa-twitter light-blue-text"></i></a>
    <a href="#" class="mx-2" role="button"><i class="fab fa-linkedin-in light-blue-text"></i></a>
    <a href="#" class="mx-2" role="button"><i class="fab fa-github light-blue-text"></i></a>

</form>

<?php
$email = "admin@example.com" ;
$password = "admin@sms";
  if (isset($_POST['login'])) {
    $getemail = $_POST['email'];
    $getpassword =$_POST ['password'];

   if ($email == $getemail && $password == $getpassword) {
     session_start();
      $_SESSION['LOGIN'] = true;
      $_SESSION['email'] =   $getemail ;
      $_SESSION['password'] = $getpassword;
      echo"<script> location.replace('index.php') </script>" ;
      //  header('Location:index.php');
     }  else {
      echo 'Invailid Credentials';
    }
  }
  ?>
</div>
</section>

<!-- Default form login -->
<?php include('footer.php')?>