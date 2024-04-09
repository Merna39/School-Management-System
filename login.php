<?php include('header.php') ?>


<!-- Default form login -->
<div class="container-fluid">
  <section class=" vh-100 d-flex ">
    <div class="col col-lg-4 col-sm-4   m-auto">
      <form method="POST" class="text-center border border-light p-5">
        <!-- action="actions/login.php" -->
        <p class="h4 mb-4 text-center">Sign in</p>

        <!-- Email -->
        <input name="email" type="email" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="email" required>

        <!-- Password -->
        <input name="password" type="password" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="password" required>

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
        <button class="btn btn-info btn-block my-4" name="login" type="submit">Login </button>

        <!-- Register -->
        <!-- <p>Not a member?
          <a href="">Register</a>
        </p> -->

        <!-- Social login -->
        <!-- <p>or sign in with:</p>

        <a href="#" class="mx-2" role="button"><i class="fab fa-facebook-f light-blue-text"></i></a>
        <a href="#" class="mx-2" role="button"><i class="fab fa-twitter light-blue-text"></i></a>
        <a href="#" class="mx-2" role="button"><i class="fab fa-linkedin-in light-blue-text"></i></a>
        <a href="#" class="mx-2" role="button"><i class="fab fa-github light-blue-text"></i></a> -->

      </form>

      <?php
      include('./admin/includes/config.php') ;

      $email = "admin@example.com";
      $password = "admin@sms";
      if (isset($_POST['login'])) {
        $getemail = $_POST['email'];
        $getpassword = $_POST['password'];

        $getpassword_md5 = md5($getpassword);
 
         $query = mysqli_query($db_conn,"SELECT * FROM `accounts` WHERE `email` ='$getemail' AND `password` = '$getpassword_md5' ");

         if (mysqli_num_rows($query) > 0){
          $user = mysqli_fetch_object($query);
          $_SESSION['LOGIN'] = true;
          $_SESSION['session_id'] = uniqid();
          $user_type = $user->type;
          $_SESSION['user_type'] = $user_type;
          // $_SESSION['user_id'] = $user->id;
          header('Location: ./admin/'.$user_type.'/dashboard.php');
          exit();

         }
         else if ($email == $getemail && $password == $getpassword) {
        
          $_SESSION['LOGIN'] = true;
          // $_SESSION['email'] =   $getemail;
          // $_SESSION['password'] = $getpassword;
          // echo"<script> location.replace('../admin/dashboard.php') </script>" ;
          header('Location:./admin/dashboard.php');
        } 
        else {
          echo 'Invailid Credentials';
        }
      }
      ?>



    </div>
  </section>
</div>
<!-- Default form login -->
<?php include('footer.php') ?>