<?php include('includes/config.php') ?>

<?php
$error = '';
if (isset($_POST['submit'])) {
  $name     = $_POST['name'];
  $email    = $_POST['email'];
  $password = md5(1234567890);
  $type     = $_POST['type'];
  $level     = $_POST['level'];
  /*
  $id     = $_POST['id'];
  $user_id     = $_POST['user_id'];
  $meta_key     = $_POST['meta_key'];
  $value_key     = $_POST['value_key'];
*/

  $check_query = mysqli_query($db_conn, "SELECT * FROM accounts  WHERE email = '$email'");
  if (mysqli_num_rows($check_query) > 0) {
    $error = 'Email already exists';
  } else {
    mysqli_query($db_conn, "INSERT INTO accounts (`name`,`email`,`password`,`type`,`level`) VALUES ('$name','$email','$password','$type','$level')") or die(mysqli_error($db_conn));

    $_SESSION['success_msg'] = 'User has been succefuly registered';
    header('location: user-account.php?user=student');
    exit;
  }
}



if(isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "DELETE FROM `accounts` WHERE id = $id";        

  if($db_conn->query($sql) === TRUE){
    // بعد حذف السجل، يتم إعادة توجيه المستخدم
    header('location: user-account.php?user=student');
    exit;
  }
  mysqli_query($db_conn, "DELETE FROM `accounts` WHERE `id` = '$id'");
  
 $_SESSION['success_msg'] = 'User has been successfully deleted';
 header('location: user-account.php?user=student');
}



?>


<?php include('header.php') ?>
<?php include('sidebar.php') ?>
<style>
  /* span#loader {
    position: absolute;
    left: 50;
    width: 100%;
    height: 100%;
    background: #e2e2e2b5;
}

i.fas.fa-circle-notch.fa-spin {
    left: 50%;
    position: absolute;
    top: 50%;
    font-size: 10rem;
    transform: translate(-50%,-50%);
    transform-origin: center;
} */
</style>

<!-- <script>
  function @tDel(v) {
    $(v).parent().parent().delete();
  }
</script> -->
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <div class="d-flex">
          <h1 class="m-0 text-dark">Manage Accounts</h1>
          <!-- <a href="user-account.php?user=<?php echo $_REQUEST['user'] ?>&action=add-new" class="btn btn-primary btn-sm">Add New</a> -->
        </div>

      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Accounts</a></li>
          <li class="breadcrumb-item active"><?php echo ucfirst($_REQUEST['user']) ?></li>
        </ol>
      </div><!-- /.col -->
      <?php
      // $_SESSION['success_msg'] = 'User has been succefuly registered';
      // print_r($_SESSION);
      if (isset($_SESSION['success_msg'])) { ?>
        <div class="col-12">
          <small class="text-success" style="font-size:16px"><?= $_SESSION['success_msg'] ?></small>
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


    <?php if (isset($_GET['action'])) { ?>
      <div class="card">
        <div class="card-body" id="form-container">
          <?php if (isset($_GET['action']) && $_GET['action']) { ?>
            <form action="" id="student-registration" method="post">
              <fieldset class="border border-secondary p-3 form-group">
                <legend class="d-inline w-auto h6">Student Information</legend>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label for="">Full Name</label>
                      <input type="text" class="form-control" placeholder="Full Name" name="name">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label for="">DOB</label>
                      <input type="date"  required class="form-control" placeholder="DOB" name="dob">
                    </div>
                  </div>

                  <div class="col-lg-4">
                    <div class="form-group">
                      <label for="">Level</label>
                      <input type="number" min="1" max="3" step="1" required class="form-control" placeholder="Level" name="level">
                      
                    </div>
                  </div>

                  <div class="col-lg-4">
                    <div class="form-group">
                      <label for="">Mobile</label>
                      <input type="text" class="form-control" placeholder="Mobile" name="mobile">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label for="">Email</label>
                      <input type="email" required class="form-control" placeholder="Email Address" name="email">
                    </div>
                  </div>

                  <!-- Address Fields -->
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label for="">Address</label>
                      <input type="text" class="form-control" placeholder="Address" name="address">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label for="">Country</label>
                      <input type="text" class="form-control" placeholder="Country" name="country">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label for="">State</label>
                      <input type="text" class="form-control" placeholder="State" name="state">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label for="">Pin/Zip Code</label>
                      <input type="text" class="form-control" placeholder="Pin/Zip Code" name="zip">
                    </div>
                  </div>
                </div>
              </fieldset>

              <fieldset class="border border-secondary p-3 form-group">
                <legend class="d-inline w-auto h6">Parents Information</legend>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="">Father's Name</label>
                      <input type="text" class="form-control" placeholder="Father's Name" name="father_name">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="">Father's Mobile</label>
                      <input type="text" class="form-control" placeholder="Father's Mobile" name="father_mobile">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="">Mother's Name</label>
                      <input type="text" class="form-control" placeholder="Mother's Name" name="mother_name">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="">Mothers's Mobile</label>
                      <input type="text" class="form-control" placeholder="Mothers's Mobile" name="mother_mobile">
                    </div>
                  </div>
                  <!-- Address Fields -->
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label for="">Address</label>
                      <input type="text" class="form-control" placeholder="Address" name="parents_address">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label for="">Country</label>
                      <input type="text" class="form-control" placeholder="Country" name="parents_country">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label for="">State</label>
                      <input type="text" class="form-control" placeholder="State" name="parents_state">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label for="">Pin/Zip Code</label>
                      <input type="text" class="form-control" placeholder="Pin/Zip Code" name="parents_zip">
                    </div>
                  </div>
                </div>
              </fieldset>

      

              <fieldset class="border border-secondary p-3 form-group">
                <legend class="d-inline w-auto h6">Admission Details</legend>
                <div class="row">
                  <div class="col-lg">
                    <div class="form-group">
                      <label for="class">Class</label>
                  
                      <select name="class" id="class" class="form-control">
                        <option value="">Select Class</option>
                        <?php
                        $args = array(
                          'type' => 'class',
                          'status' => 'publish',
                        );
                        $classes = get_posts($args);
                        foreach ($classes as $class) {
                          echo '<option value="' . $class->id . '">' . $class->title . '</option>';
                        } ?>

                      </select>
                    </div>
                  </div>

                  <div class="col-lg">
                    <div class="form-group" id="section-container">
                      <label for="section">Select Section</label>
                      <select require name="section" id="section" class="form-control">
                        <option value="">-Select Section-</option>
                      
                      </select>
                    </div>
                  </div>

                
                  <div class="col-lg">
                    <div class="form-group">
                      <label for="">Date of Admission</label>
                      <input type="date" class="form-control" placeholder="Date of Admission" name="doa">
                    </div>
                  </div>
                </div>
              </fieldset>

              <div class="form-group">
                <label for="online-payment"><input type="radio" name="payment_method" value="online" id="online-payment"> Online Payment</label>
                <label for="offline-payment"><input type="radio" name="payment_method" value="offline" id="offline-payment"> Offline Payment</label>
              </div>
              <input type="hidden" name="type" value="<?php echo $_REQUEST['user'] ?>">
              <button type="submit" name="submit" class="btn btn-primary"></span> Register</button>
            </form>
          <?php } elseif ($_GET['action'] == 'fee-payment') { ?>
            <form action="" id="registration-fee" method="post">
              <div class="row">
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="">Reciept Number</label>
                    <input type="text" name="reciept_number" placeholder="Reciept Number" class="form-control">
                  </div>

                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="">Registration Fee</label>
                    <input type="text" name="registration_fee" placeholder="Registration Fee" class="form-control">
                  </div>
                </div>

              </div>
              <input type="hidden" name="std_id" value="<?php echo isset($_GET['std_id']) ? $_GET['std_id'] : '' ?>">
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          <?php } ?>

        </div>
      </div>

    <?php  } else { ?>
      <!-- Info boxes -->
      <div class="card">
        <div class="card-header py-2">
          <h3 class="card-title">
            <?php echo ucfirst($_REQUEST['user']) ?>s
          </h3>
          <div class="card-tools">
            <a href="?user=<?php echo $_REQUEST['user'] ?>&action=add-new" class="btn btn-primary btn-xs"><i class="fa fa-plus mr-2"></i>Add New</a>
          </div>
        </div>
        <div class="card-body">
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
              <tbody id="tody">
                <?php

                $count = 1;
                $user_query = 'SELECT * FROM accounts  WHERE type = "' . $_REQUEST['user'] . '" ';
                $user_result = mysqli_query($db_conn, $user_query);
                while ($users = mysqli_fetch_object($user_result)) {

                ?>
                  <tr id="trow">
                    <td><?= $count++ ?></td>
                    <td><?= $users->name ?></td>
                    <td><?= $users->email ?></td>
                    <td><?= $users->level ?></td>
                    <td>
                    
                    <a href="user-account.php?user=student&action=delete&id=<?php echo $users->id; ?>" onclick="return confirm('Are you sure you want to delete this user?');" class="btn btn-sm btn-danger delete-record"><i class="fa fa-trash fa-fw"></i>Delete</a>

    <a href="?action=edit&id=<?php echo $users->id; ?>" class="btn btn-sm btn-primary edit-record"><i class="fas fa-pen"></i>Edit</a>

                    </td>
                                 
                  </tr>
                <?php } ?>
              </tbody>
            </table>

          </div>
        </div>
      </div>
      <!-- /.row -->
    <?php } ?>
  </div><!--/. container-fluid -->
</section>
<!-- /.content -->

<script>
  // jQuery(document).ready(function(){
  //   jQuery('#users-table').DataTable({
  //     ajax: {
  //       url: 'ajax.php?user=<?php echo $_GET['user'] ?>',
  //       type: 'POST'
  //     },
  //     columns: [
  //         { data: 'serial' },
  //         { data: 'name' },
  //         { data: 'email' },
  //         { data: 'action' ,orderable: false}
  //     ],
  //     processing: true,
  //     serverSide: true,

  //   });
  // })

  jQuery('#student-registration').on('submit', function() {
    console.log();
    if (true) {
      var formdata = jQuery(this).serialize();

      jQuery.ajax({
        type: "post",
        url: "http://localhost/School-Management-System/actions/student-registration.php",
        data: formdata,
        dataType: 'json',
        beforeSend: function() {
          jQuery('#loader').show();
        },
        success: function(response) {
          console.log(response);
          if (response.success == true) {
            location.href = 'http://localhost/School-Management-System/admin/user-account.php?user=student&action=fee-payment&std_id=' + response.std_id + '&payment_method=' + response.payment_method;
          }
        },
        complete: function() {
          // jQuery('#loader').hide();
        }
      });
    }
    return false;
  });
</script>

<script>
  jQuery(document).ready(function() {

    jQuery('#class').change(function() {
      jQuery.ajax({
        url:'ajax.php',
        type: 'POST',
        data: {
          'class_id': jQuery(this).val()
        },
        dataType: 'json',
        success: function(response) {
          if (response.count > 0) {
            jQuery('#section-container').show();
          } else {
            jQuery('#section-container').hide();
          }
          jQuery('#section').html(response.options);
        }
      });
    });

  });
</script>
<?php include('footer.php') ?>