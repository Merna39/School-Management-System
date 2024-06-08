<?php include('../includes/config.php') ?>
<?php include('header.php') ?>
<?php include('sidebar.php') ?>
    <!-- Content Header (Page header) -->
    <div class="content-header ">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Student</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-graduation-cap"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Students</span>
                <span class="info-box-number">
                  2000
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Teachers</span>
                <span class="info-box-number">50</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-book-open"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Courses</span>
                <span class="info-box-number">100</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <!-- <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-question"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">New Inquiries</span>
                <span class="info-box-number">10</span>
              </div> -->
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <hr>

        <?php
            
          
            $current_month = strtolower(date('F'));
            $current_year = date('Y');
            $current_date = date('d');
            $sql = "SELECT * FROM `attendance_std` WHERE `attendance_month` = '$current_month' AND year(current_session) = $current_year AND std_id = $std_id";
  
            $query = mysqli_query($db_conn, $sql);
  
            $row = mysqli_fetch_object($query);
            $attendance = unserialize($row->attendance_value) ;
            // echo '<pre>';
            // print_r($attendance);
            // echo '</pre>';
          if(isset($_POST['sign-in'])){
            // $att_data = [];
  
            // for ($i=1; $i <= 31; $i++) { 
            //   $att_data[$i] = [
            //     'signin_at' => (date('d') == $i)? time() :'',
            //     'signout_at' => (date('d') == $i)? time() :'',
            //     'date' => $i
            //   ];
            // }
  
            $attendance[$current_date] = [
                'signin_at' => time(),
                'signout_at' => '',
                'date' => $current_date
            ];
  
            $att_data = serialize($attendance);
            $current_month = strtolower(date('F'));
            $sql = "UPDATE `attendance_std` SET `attendance_value` = '$att_data' WHERE `attendance_month` = '$current_month' AND std_id = $std_id";
  
            mysqli_query($db_conn,$sql) or die('DB error');;
          }
          if(isset($_POST['sign-out'])){
            $attendance[$current_date] = [
                'signin_at' => $attendance[$current_date]['signin_at'],
                'signout_at' => time(),
                'date' => $current_date
            ];
  
            $att_data = serialize($attendance);
            $current_month = strtolower(date('F'));
            $sql = "UPDATE `attendance_std` SET `attendance_value` = '$att_data' WHERE `attendance_month` = '$current_month' AND std_id = $std_id";
  
            mysqli_query($db_conn,$sql) or die('DB error');;
          }
          ?>
        
        
          <div class="row">
          <div class="col-lg-5">
          <div class="calendar">
        <div class="calendar-header">
          <span class="month-picker" id="month-picker"> May </span>
          <div class="year-picker" id="year-picker">
            <span class="year-change" id="pre-year">
              <pre><</pre>
            </span>
            <span id="year">2024 </span>
            <span class="year-change" id="next-year">
              <pre>></pre>
            </span>
          </div>
        </div>
 
        <div class="calendar-body">
          <div class="calendar-week-days">
            <div>Sun</div>
            <div>Mon</div>
            <div>Tue</div>
            <div>Wed</div>
            <div>Thu</div>
            <div>Fri</div>
            <div>Sat</div>
          </div>
          <div class="calendar-days">
          </div>
        </div>
        <div class="calendar-footer">
        </div>
        <div class="date-time-formate">
          <div class="day-text-formate">TODAY</div>
          <div class="date-time-value">
            <div class="time-formate">02:51:20</div>
            <div class="date-formate">23 - july - 2022</div>
          </div>
        </div>
        <div class="month-list"></div>
      </div>
      </div>
    
        
      <div class="col-lg-3">
            <div class="card">
            <div class="card-header">
              Sign in Info
            </div>
            <div class="card-body">
              <form action="" method="post">
                <?php
  
                if(empty($attendance[$current_date]['signin_at']) || $attendance[$current_date]['signout_at'])
                {
                  echo '<button name="sign-in" class="btn bg-info ">Sign in</button>';
                }
                else{
                  echo '<button name="sign-out" class="btn btn-primary">Sign Out</button>';
                }
                ?>
              </form>
            </div>
          </div>
          </div>  
          
        </div><!--/. container-fluid -->
      </section>
      <!-- /.content -->
  <?php include('footer.php') ?>