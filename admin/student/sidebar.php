<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="http://localhost/School-Management-System" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <!-- <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">2</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <!-- <img src="./dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3"> -->
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Teacher 
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Hi</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          
          <div class="dropdown-divider"></div>
          <a href="http://localhost/School-Management-System/admin/chat.php"  class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <!-- <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a> -->
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a href="../../logout.php" class="nav-link" title="Logout">
        Logout <i class="fa fa-sign-out-alt"></i>
        </a>
      </li>
    </ul>
</nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="http://localhost/School-Management-System/admin/dashboard.php" class="brand-link">
      <!-- <img src="./dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8"> -->
           <i class="fas fa-school "></i>
      <span class="brand-text font-weight-light"> Student panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Dashboard -->
          <li class="nav-item">
            <a href="http://localhost/School-Management-System/admin/student/dashboard.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt "></i>
              <p>Dashboard</p>
            </a>
          </li>
          <!-- Accounts -->
          

          <!-- Manage Classes -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chalkboard"></i>
              <p>
                Classes
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              
            
              <li class="nav-item">
                <a href="http://localhost/School-Management-System/admin/student/courses.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Courses</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="http://localhost/School-Management-System/admin/student/subjects.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Subjects</p>
                </a>
              </li>
              
              <!-- <li class="nav-item">
                <a href="http://localhost/School-Management-System/admin/student/lessons.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lessons</p>
                </a>
              </li> -->
            </ul>
          </li>
          
          <!-- Class Routine -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chalkboard-teacher"></i>
              <p>
                 Class Routines
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="http://localhost/School-Management-System/admin/student/periods.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Periods</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="http://localhost/School-Management-System/admin/student/timetable.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Time Table</p>
                </a>
              </li>
            </ul>
          </li>
          
          <!-- Examination
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                Manage Examinations
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="http://localhost/School-Management-System/admin/exam-form.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Examination Form</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=$site_url?>admin/admin-card.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Admin card</p>
                </a>
              </li> -->
              <!-- <li class="nav-item">
                <a href="<?=$site_url?>admin/paper-schedule.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Paper Schedule</p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="<?=$site_url?>admin/results.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Results</p>
                </a>
              </li>
            </ul>
          </li>
          -->

          <!-- Attendance -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Manage Attendance
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>       
            <ul class="nav nav-treeview">  
              <li class="nav-item">
                <a href="http://localhost/School-Management-System/admin/student/attendance.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Attendance</p>
                </a>
              </li>
            </ul>        
          </li>  
          <li class="nav-item has-treeview" id="communications-menu">
          <a href="http://localhost/School-Management-System/admin/chat.php" class="nav-link">
            <i class="nav-icon far fa-comments"></i>
            <p>
              Communications
              <span id="message-count-badge" class="badge badge-danger right">0</span>
            </p>
          </a>
        </li>
    <!-- Fees -->
    <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-money-check"></i>
              <p>
                Fee Details
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>   
             
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="http://localhost/School-Management-System/admin/student/fee-details.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tuition Fee</p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="<?=$site_url?>student/examination-fee.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Examination Fee</p>
                </a>
              </li> -->
            </ul>        
          </li>  

            <!-- Study Materials -->
           <li class="nav-item has-treeview">
           <a href="http://localhost/School-Management-System/admin/student/study-materials.php" class="nav-link">
           <i class="nav-icon fas fa-book-open"></i>
              <p>
              Study Materials
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>   
           
        
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="http://localhost/School-Management-System/admin/student/study-materials.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Study Materials</p>
                </a>
              </li>
              </ul>        
          </li>  
          <!-- Event 
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-calendar-check"></i>
              <p>
                Manage Events
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>     
            <ul class="nav nav-treeview">
               <li class="nav-item">
                <a href="<?=$site_url?>admin/campus-functions.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Campus Functions</p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="<?=$site_url?>admin/webinar-seminar.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Webinar/Seminar</p>
                </a>
              </li>
            </ul>        
          </li>
          -->
          
          <!-- communications
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
            <i class="nav-icon far fa-comments"></i>
              <p>
              Communications
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>    -->
          
            </ul>          
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  // Function to update message count badge and dropdown menu
  function updateNotificationAndDropdown(newMessageCount) {
    // Update badge count
    $('#message-count-badge').text(newMessageCount);

    // Show/hide badge based on count
    if (newMessageCount > 0) {
      $('#message-count-badge').show();
    } else {
      $('#message-count-badge').hide();
    }
  }

  // Function to periodically check for new messages (simulated)
  function checkForNewMessages() {
    setInterval(function() {
      // Simulate new messages count (replace with actual logic)
      var newMessageCount = Math.floor(Math.random() * 5); // Random number for demonstration
      updateNotificationAndDropdown(newMessageCount); // Update UI based on new messages
    }, 5000); // Check every 5 seconds (adjust as needed)
  }

  // Initial load of messages and setup for checking new messages
  $(document).ready(function() {
    checkForNewMessages(); // Start checking for new messages
  });
</script>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">