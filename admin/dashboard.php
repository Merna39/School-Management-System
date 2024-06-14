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
      <div  class="container-fluid">
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
        </div><!--/. container-fluid -->
        <hr>
<div class="row">
<div class="col-lg-5">
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
      </div>
      
      <style>
      .todo-app {
  width: 100%;
  max-width: 540px;
  background: #fff;
  margin: 100px auto 20px;
  padding: 40px 30px 70px;
  border-radius: 10px;
}

.todo-app h2 {
  color: #002765;
  display: flex;
  align-items: center;
  margin-bottom: 20px;
}

.todo-app h2 img {
  width: 30px;
  margin-left: 10px;
}

.row2 {
  display: flex;
  align-items: center;
  justify-content: space-between;
  background: #edeefe;
  border-radius: 30px;
  padding-left: 20px;
  margin-bottom: 25px;
}

input {
  flex: 1;
  border: none;
  outline: none;
  background: transparent;
  padding: 10px;
}

button {
  border: none;
  outline: none;
  padding: 16px 50px;
  background: #9796f0;
  color: #fff;
  font-size: 16px;
  cursor: pointer;
  border-radius: 40px;
}

.list1 li {
  list-style: none;
  font-size: 17px;
  padding: 12px 8px 12px 50px;
  user-select: none;
  cursor: pointer;
  position: relative;
}

.list1 li::before {
  content: '';
  position: absolute;
  height: 28px;
  width: 28px;
  border-radius: 50%;
  background-image: url(../images/unchecked.png);
  background-size: cover;
  background-position: center;
  top: 12px;
  left: 8px;
}

.list1 li.checked {
  color: #555;
  text-decoration: line-through;
}

.list1 li.checked::before {
  background-image: url(../images/checked.png);
}

.list1 li span {
  position: absolute;
  right: 0;
  top: 5px;
  width: 40px;
  height: 40px;
  font-size: 22px;
  color: #555;
  line-height: 40px;
  text-align: center;
  border-radius: 50%;
}

.list1 li span:hover {
  background: #edeefe;
}

      </style>

<div class="col-lg-5">
      <div class="todo-app">
        <h2> To_Do List <img src="../images/icon.png"> </h2>
      <div class="row2">
        <input type="text" id="input-box" placeholder="Add Your text"> </input>
        <button onclick="addTask()"> Add</button>
     </div> 
     <ul class="list1" id="list-container">
      <!-- <li class="list1 checked">Task 1</li>
      <li class="list1 checked">Task 2</li>
      <li class="list1 checked">Task 3</li>
      <li class="list1 checked">Task 4</li> -->

     </ul>
     </div>
     </div>
     
     </div>
    </section>

    
    
    <!-- /.content -->

    <script>
  const inputBox = document.getElementById("input-box");
  const listContainer = document.getElementById("list-container");

  function addTask() {
    if (inputBox.value === '') {
      alert("You must write something!");
    } else {
      let li = document.createElement("li");
      li.innerHTML = inputBox.value;
      listContainer.appendChild(li);
      let span = document.createElement("span");
      span.innerHTML = "\u00d7";
      li.appendChild(span);
    }
    inputBox.value = "";
    saveData();
  }

  listContainer.addEventListener("click", function (e) {
    if (e.target.tagName === "LI") {
      e.target.classList.toggle("checked");
      saveData();
    } else if (e.target.tagName === "SPAN") {
      e.target.parentElement.remove();
      saveData();
    }
  }, false);

  function saveData() {
    localStorage.setItem("data", listContainer.innerHTML);
  }

  function showTask() {
    listContainer.innerHTML = localStorage.getItem("data");
  }

  showTask();
</script>
<?php include('footer.php') ?>
