<?php include('../includes/config.php') ?>
<?php include('header.php') ?>
<?php include('sidebar.php') ?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Manage Student Attendance</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Student</a></li>
                    <li class="breadcrumb-item active">Student Attendance</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <?php
        // $std_id = isset($_GET['std_id']) ? $_GET['std_id'] : '';
        $usermeta = get_user_metadata($std_id);
        ?>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Student Detail</h3>
            </div>
            <div class="card-body">
                <strong>Name: </strong> <?php echo get_users(array('id' => $std_id))[0]->name ?> <br>
                <strong>Class: </strong> <?php echo $usermeta['class'] ?>

            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Attendance</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                             
                            <td>Date</td>
                            <td>Status</td>
                            <td>Singin Time</td>
                            <td>Singout Time</td>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        $sql = "SELECT * FROM attendance WHERE attendance_month = date('F') AND year(current_session) = date('Y');";


                        $query = mysqli_query($db_conn, $sql);

                        $row = mysqli_fetch_object($query);

                        foreach (unserialize($row->attendance_value) as $date => $value) { ?>
                            <tr>
                                <td><?php echo $date; ?></td>
                                <td><?php echo $date; ?></td>
                                <td><?php echo ($value['signin_at']) ? 'Present' : 'Absent'; ?></td>
                                <td><?php echo ($value['signin_at']) ? date('d-m-yyy h:i:s', $value['signin_at']) : ''; ?></td>
                                <td><?php echo ($value['signout_at']) ? date('d-m-yyy h:i:s', $value['signout_at']) : ''; ?></td>
                            </tr>

                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>


    </div><!--/. container-fluid -->
</section>
<!-- /.content -->





<?php include('footer.php') ?>