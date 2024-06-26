<?php include ('../admin/includes/config.php') ?>
<?php
   

  if(isset($_POST['submit']))
  {
    $title = $_POST['title'];
    // $type = $_POST['type'];

    mysqli_query($db_conn, "INSERT INTO classes (title) VALUE ('$title')") or die('DB error');
  }
  
  
?>
<?php include('header.php') ?>
<?php include('sidebar.php') ?>

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Subjects </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Subjects</li>
            </ol>
          </div><!-- /.col -->
          <?php
           
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
        <?php
        if (isset($_REQUEST['action'])) { ?>
        <!-- Info boxes -->
        
        <!-- /.row -->
        <?php }else{?>
        <!-- Info boxes -->
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header py-2">
                        <h3 class="card-title">
                            Add New Subject
                        </h3>
                    </div>
                    <div class="card-body" >
                        <form action="" method="post">
                            <div class="form-group">
                                <!-- <label for="class">Select Class</label>
                                <select require name="class" id="class" class="form-control">
                                    <option value="">-Select Class-</option>
                                    <?php
                                    $args = array(
                                      'type' => 'class',
                                      'status' => 'publish',
                                    );
                                    $classes = get_the_classes(); 
                                    foreach ($classes as $key => $class) { ?>
                                    <option value="<?php echo $class->id ?>"><?php echo $class->title ?></option>
                                    <?php } ?>
                                </select> -->
                            </div>

                            <!-- <div class="form-group" id="section-container" style="display:none">
                                <label for="section">Select Section</label>
                                <select require name="section" id="section" class="form-control">
                                    <option value="">-Select Section-</option>
                                </select>
                            </div> -->

                            <div class="form-group">
                                <label for="subject">Subject Name</label>
                                <input require type="text" name="subject" id="subject" placeholder="Subject Name" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header py-2">
                        <h3 class="card-title">
                        Subjects
                        </h3>
                      
                    </div>
                    <div class="card-body">
                        <div class="table-responsive bg-white">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count = 1;
                                    $args = array(
                                      'type' => 'subject',
                                      'status' => 'publish',
                                    );
                                    $subjects = get_posts($args);
                                    foreach($subjects as $subject){?>
                                    <tr>
                                        <td><?=$count++?></td>
                                        <td><?=$subject->title?></td>
                                        <td><?=$subject->publish_date?></td>
                                        <td>
                                            <a href="?action=pay&month=<?php echo $value ?>&std_id=<?php echo $std_id 
                                                 ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash fa-fw"></i>Delete</a>
                                            <a href="?action=pay&month=<?php echo $value ?>&std_id=<?php echo $std_id 
                                                 ?>" class="btn btn-sm btn-primary edit-record" id="edit"><i class="fa-regular fa-user-pen"></i>Edit</a>             
                                        </td>
                                    </tr>

                                    <?php } ?>

                                </toby>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <?php } ?>
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
<?php include('footer.php') ?>