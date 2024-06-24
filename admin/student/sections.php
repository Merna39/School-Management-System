<?php include('../includes/config.php') ?>
<?php include('header.php') ?>
<?php include('sidebar.php') ?>

<?php
if(isset($_POST['submit']))
{
    $title = $_POST['title'];
    $query = mysqli_query($db_conn, "INSERT INTO `posts`(`author`, `title`, `description`, `type`, `status`, `parent`) VALUES ('1','$title','description','section','publish',0)") or die('DB error');
}

if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "DELETE FROM `posts` WHERE `id` = $id";

  // if ($db_conn->query($sql) === TRUE) {
  //     header('location: sections.php');
      exit;
  } 

?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"> Sections</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Student</a></li>
                    <li class="breadcrumb-item active">Sections</li>
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
            <div class='col-lg-9'>

                <!-- Info boxes -->
                <div class="card">
                    <div class="card-header py-2">
                        <h3 class="card-title">
                            Sections
                        </h3>
                        <div class="card-tools">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive bg-white">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>S.No.</th>
                                        <th>Title</th>
                                        <!-- <th>Action</th> -->
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $count = 1;
                                    $args = array(
                                        'type' => 'section',
                                        'status' => 'publish',
                                    );
                                    $sections = get_posts($args);
                                    foreach($sections as $section) {?>
                                        <tr>
                                            <td><?=$count++?></td>
                                            <td><?=$section->title?></td>
                                            <!-- <td>
                                                <a href="sections.php?action=delete&id=<?php echo $section->id ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash fa-fw"></i>Delete</a>
                                                <a href="?action=pay&month=<?php echo $value ?>&std_id=<?php echo $std_id ?>" class="btn btn-sm btn-primary edit-record" id="edit"><i class="fas fa-pen"></i>Edit</a>
                                            </td> -->
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            
        </div>

    </div><!--/. container-fluid -->
</section>
<!-- /.content -->
<?php include('footer.php') ?>
