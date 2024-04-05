<?php
include('includes/config.php');


$db_conn = mysqli_connect('localhost', 'root', '', 'sms_project');

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
?>
<?php
$error = '';
if(isset($_POST['submit']))
{
  $name     = $_POST['name'];
  $email    = $_POST['email'];
  $password = md5(1234567890);
  $type     = $_POST['type'];
  $level    = $_POST['level'];

  $check_query = mysqli_query($db_conn, "SELECT * FROM accounts WHERE email = '$email'");
  if(mysqli_num_rows($check_query) > 0)
  {
    $error = 'Email already exists';
  }
  else
  {    
    mysqli_query($db_conn, "INSERT INTO accounts (`name`,`email`,`password`,`type` ,`level`) VALUES ('$name','$email','$password','$type','$level')") or die(mysqli_error($db_conn));
    $_SESSION['success_msg'] = 'User has been succefuly registered';
    header('location: user-account.php?user='.$type);
    exit;
  }
  
}

?>


<?php include('header.php') ?>
<?php include('sidebar.php') ?>
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <div class="d-flex">
              <h1 class="m-0 text-dark">Manage Accounts</h1>
              
            </div>
              
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Accounts</a></li>
              <li class="breadcrumb-item active"><?php echo ucfirst($_REQUEST['user'])?></li>
            </ol>
          </div><!-- /.col -->
          <?php
          // $_SESSION['success_msg'] = 'User has been succefuly registered';
            // print_r($_SESSION);
            if(isset($_SESSION['success_msg']))
            {?>
              <div class="col-12">
                <small class="text-success" style="font-size:16px"><?=$_SESSION['success_msg']?></small>
              </div>
            <?php 
              unset($_SESSION['success_msg']);
            }
          ?>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <?php if(isset($_GET['action']) && $_GET['action']) { ?>
        <div class="card">
          <div class="card-body">
            <form action="" method="post">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Full Name" name="name">
                <?php echo $error ?>
              </div>
              <div class="form-group">
                <input type="email" class="form-control" placeholder="Email Address" name="email">
              </div>
              <div class="form-group">
                <input type="level" class="form-control" placeholder="Level" name="level">
              </div>
              <input type="hidden" name="type" value="<?php echo $_REQUEST['user'] ?>">
              <input type="submit" name="submit" class="btn btn-primary" value="Register">
            </form>
          </div>
        </div>
        <?php } else {?>
        <!-- Info boxes -->

        <div class="card">
        <div class="card-header py-2">
          <h3 class="card-title">Accounts</h3>
          <div class="card-tools">
          <a href="user-account.php?user=<?php echo $_REQUEST['user'] ?>&action=add-new" class="btn btn-primary btn-sm">Add New</a>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive bg-white">
            <table class="table table-bordered border-info  table-striped table-hover">
              <thead>

        <div class="table-responsive bg-white">
          <table class="table table-bordered border-info  table-striped table-hover">
            <thead>
              <tr>
                <th>S.No.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Level</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              
              $count =1; 
              $user_query = 'SELECT * FROM accounts WHERE `type` = "'.$_REQUEST['user'].'"';
              $user_result = mysqli_query($db_conn , $user_query);
              while ($users = mysqli_fetch_object($user_result)) 
              {  

                ?>
              <tr>
                <td><?=$count++?></td>
                <td><?=$users->name?></td>
                <td><?=$users->email?></td> 
                <td><?=$users->level?></td> 
                <td></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
          
        </div>
        <!-- /.row -->
        <?php } ?>
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
<?php include('footer.php') ?>