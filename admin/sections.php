<?php include('../admin/includes/config.php') ?>
<?php include('header.php') ?>
<?php include('sidebar.php') ?>

<?php
  if(isset($_POST['submit'])) {
    $title = $_POST['title'];

    mysqli_query($db_conn , "INSERT INTO sections (title) VALUE ('$title')") or die('asfdasf');
  }
?>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Manage Sections</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Admim</a></li>
          <li class="breadcrumb-item active">Sectionss</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
        <div class="col-lg-8">
             <!-- Info boxes -->
    
    
            <!-- Info boxes -->
            <div class="card">
                <div class="card-header py-2">
                    <h3 class="card-title">Sections</h3>
                    <div class="card-tools">
                       
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive bg-black">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Title</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $count = 1;
                                $query = mysqli_query($db_conn , 'SELECT * FROM sections');
                                while($section = mysqli_fetch_object($query)) { ?>
                                <tr>
                                    <td><?=$count?></td>
                                    <td><?=$section->title?></td>
                                    <td></td>
                                </tr>

                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- /.info-box-content -->
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header py-2">
                    <h3 class="card-title">Add New Sections</h3>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group">
                          <label for="title">Title</label>
                          <input type="text" name="title" placeholder="Title" required class="form-control">
                        </div>
                        

                        <button name="submit" class="btn btn-success float-right">Submit</button>
                    </form>
                </div>

                 <!-- /.info-box-content -->
            </div>
        </div>
    </div>
   
    
  </div> <!--/. container-fluid-->

</section>
<!-- /.content -->
<?php include('footer.php') ?>