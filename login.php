<?php
session_start();
define('BASE_DIR', __DIR__);

// Include the config file using the absolute path
$configPath = BASE_DIR . '/admin/includes/config.php';
if (file_exists($configPath)) {
    include($configPath);
} else {
    die("Configuration file not found.");
}

// Example database connection (replace with actual connection details)
$db_conn = mysqli_connect('localhost', 'root', '', 'sms_project');
if ($db_conn->connect_error) {
    die("Database connection failed: " . $db_conn->connect_error);
}

// Admin credentials
$admin_email = 'admin@example.com';
$admin_password = 'admin@sms';

// Initialize variables for error message
$error_message = "";


if (isset($_POST['login'])) {
  $getemail = mysqli_real_escape_string($db_conn, $_POST['email']);
  $getpassword = mysqli_real_escape_string($db_conn, $_POST['password']);

  if ($getemail == $admin_email && $getpassword == $admin_password) {
    header('Location: ./admin/dashboard.php');
  } 

  $getpassword_md5 = md5($getpassword);

  $query = mysqli_query($db_conn, "SELECT * FROM `accounts` WHERE `email` = '$getemail' AND `password` = '$getpassword_md5'");
  if (mysqli_num_rows($query) > 0) {
      $user = mysqli_fetch_object($query);
      $_SESSION['LOGIN'] = true;
      $_SESSION['session_id'] = uniqid();
      $_SESSION['user_type'] = $user->role;
      $_SESSION['user_id'] = $user->id;

    if ($user->role == 'student') {
          header('Location: ./admin/student/dashboard.php');
      } elseif ($user->role == 'teacher') {
          header('Location: ./admin/teacher/dashboard.php');
      } else {
          $error_message = "Invalid user role.";
      }
      exit();
  } else {
      $error_message = "Invalid Credentials";
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Student | Login</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js" defer></script>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- jQuery -->
  <script src="../plugins/jquery/jquery.min.js"></script>
</head>
<body class="hold-transition login-page">
  <?php include('header.php') ?>
  <div class="container-fluid">
    <section class="vh-100 d-flex">
      <div class="col col-lg-4 col-sm-4 m-auto">
        <form method="POST" class="text-center border border-light p-5">
          <p class="h4 mb-4 text-center">Sign in</p>

          <!-- Email -->
          <input name="email" type="email" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="Email" required>

          <!-- Password -->
          <input name="password" type="password" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Password" required>

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
              <a href="#">Forgot password?</a>
            </div>
          </div>

          <!-- Sign in button -->
          <button class="btn btn-info btn-block my-4" name="login" type="submit">Login</button>

          <!-- Display error message -->
          <?php if (!empty($error_message)): ?>
          <div class="alert alert-danger" role="alert">
            <?= htmlspecialchars($error_message) ?>
          </div>
          <?php endif; ?>

        </form>
      </div>
    </section>
  </div>
  <?php include('footer.php') ?>
</body>
</html>
