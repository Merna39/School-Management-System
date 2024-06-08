<?php include('header.php') ?>
<?php include('sidebar.php') ?>
<?php

$conn = mysqli_connect('localhost', 'root', '', 'sms_project');


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Queries to get the real numbers
$totalStudentsQuery = "SELECT COUNT(*) as total_students FROM accounts WHERE role='student'";
$totalTeachersQuery = "SELECT COUNT(*) as total_teachers FROM accounts WHERE role='teacher'";
$totalCoursesQuery = "SELECT COUNT(*) as total_courses FROM courses";
// $newInquiriesQuery = "SELECT COUNT(*) as new_inquiries FROM inquiries"; // Assuming you have an inquiries table

$totalStudentsResult = $conn->query($totalStudentsQuery);
$totalTeachersResult = $conn->query($totalTeachersQuery);
$totalCoursesResult = $conn->query($totalCoursesQuery);
// $newInquiriesResult = $conn->query($newInquiriesQuery);

$totalStudents = $totalStudentsResult->fetch_assoc()['total_students'];
$totalTeachers = $totalTeachersResult->fetch_assoc()['total_teachers'];
$totalCourses = $totalCoursesResult->fetch_assoc()['total_courses'];
// $newInquiries = $newInquiriesResult->fetch_assoc()['new_inquiries'];

$conn->close();
?>
    <!-- Content Header (Page header) -->
    <div class="content-header ">
      <div  class="container-fluid"">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid ">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-graduation-cap"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Students</span>
                <span class="info-box-number">
                  <?php echo $totalStudents; ?>
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
                <span class="info-box-number"><?php echo $totalTeachers; ?></span>
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
                <span class="info-box-number"><?php echo $totalCourses; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <!-- <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-question"></i></span>

               <div class="info-box-content">
                <span class="info-box-text">New Inquiries</span>
                <span class="info-box-number"><//?php echo $newInquiries; ?></span>
              </div> -->
              <!-- /.info-box-content -->
            <!-- </div> -->
            <!-- /.info-box -->
          <!-- </div>  -->
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <hr>

        <div class="calendar">
        <div class="calendar-header">
          <span class="month-picker" id="month-picker"> May </span>
          <div class="year-picker" id="year-picker">
            <span class="year-change" id="pre-year">
              <pre><</pre>
            </span>
            <span id="year">2020 </span>
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
      
      
      </div><!--/. container-fluid -->

      
      
    </section>

    
    
    <!-- /.content -->
<?php include('footer.php') ?>
