<?php include('./includes/config.php') ?>


<?php
if (isset($_POST['submit'])) {
  $class_id = isset($_POST['class_id']) ? isset($_POST['class_id']) : '';
  $section_id = isset($_POST['section_id']) ? $_POST['section_id'] : '';
  $teacher_id = isset($_POST['teacher_id']) ? $_POST['teacher_id'] : '';
  $period_id = isset($_POST['period_id']) ? $_POST['period_id'] : '';
  $day_name = isset($_POST['day_name']) ? $_POST['day_name'] : '';
  $subject_id = isset($_POST['subject_id']) ? $_POST['subject_id'] : '';
  $date_add = date('Y-m-d g:i:s');
  $status = 'publish';
  $author = 1;
  $type = 'timetable';

  $query = mysqli_query($db_conn, "INSERT INTO Posts (`type`,`author`,`status`,`publish_date`) VALUES ('$type','$author','$status','$date_add')");
  if ($query) {
    $item_id = mysqli_insert_id($db_conn);
  }
  $metadata = array(
    'class_id' => $class_id,
    'section_id' => $section_id,
    'teacher_id' => $teacher_id,
    'period_id' => $period_id,
    'day_name' => $day_name,
    'subject_id' => $subject_id
  );

  foreach ($metadata as $key => $value) {
    mysqli_query($db_conn, "INSERT INTO metadata (`item_id`,`meta_key`,`meta_value`) VALUES ('$item_id','$key','$value')");
  }

  header('Location: timetable.php');
} ?>

<?php include('header.php') ?>
<?php include('sidebar.php') ?>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Time Table Of Level 3
          <a href="?action=add" class="btn btn-primary btn-sm">Add New</a>
        </h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Admin</a></li>
          <li class="breadcrumb-item active">Time Table</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
  <form action="" method="get">
        <?php
        $class_id = isset($_GET['class']) ? $_GET['class'] : 43;
        $section_id = isset($_GET['section']) ? $_GET['section'] : 3;
        ?>
        <div class="row">
          <div class="col-auto">
            <div class="form-group">
              <select name="class" id="class" class="form-control">
                <option value="">Select Class</option>
                <?php
                $args = array(
                  'type' => 'class',
                  'status' => 'publish',
                );
                $classes = get_posts($args);
                foreach ($classes as $class) {
                  $selected = ($class_id ==  $class->id) ? 'selected' : '';
                  echo '<option value="' . $class->id . '" ' . $selected . '>' . $class->title . '</option>';
                } ?>
              </select>
            </div>
          </div>
          <div class="col-auto">
            <div class="form-group" id="section-container">
              <select name="section" id="section" class="form-control">
                <option value="">Select Section</option>
                <?php
                $args = array(
                  'type' => 'section',
                  'status' => 'publish',
                );
                $sections = get_posts($args);
                foreach ($sections as $section) {
                  $selected = ($section_id ==  $section->id) ? 'selected' : '';
                  echo '<option value="' . $section->id . '" ' . $selected . '>' . $section->title . '</option>';
                } ?>
              </select>
            </div>
          </div>
          <div class="col-auto">
            <button class="btn btn-primary">Apply</button>
          </div>
        </div>

      </form>
    <div class="card">
      <div class="card-body">
      <table class="table table-bordered border-info  table-striped table-hover">
          <thead>
            <tr>
              <th>Timing</th>
              <th>Saturday</th>
              <th>Sunday</th>
              <th>Monday</th>
              <th>Tuesday</th>
              <th>Wednesday</th>
              <th>Thursday</th>
              <th>Friday</th>
            </tr>
          </thead>
          <tbody>

            <tr>
              <td>07:00 AM - 07:45 AM</td>
              <td>
                <p>
                  <b>Teacher : </b>Teacher 1 <br>
                  <b>Class: </b>Class-1 <br>
                  <b>Section: </b> Section B <br>
                  <b>Subject: </b> Mathematics <br>
                </p>
              </td>
              <td>
              <p>
                  <b>Teacher : </b>Teacher 3 <br>
                  <b>Class: </b>Class-1 <br>
                  <b>Section: </b> Section B <br>
                  <b>Subject: </b>English <br>
                </p>
              </td>
              <td>
              <p>
                  <b>Teacher : </b>Teacher 5 <br>
                  <b>Class: </b>Class-1 <br>
                  <b>Section: </b> Section B <br>
                  <b>Subject: </b> Arabic <br>
                </p>
              </td>
              <td>
              <p>
                  <b>Teacher : </b>Teacher 2 <br>
                  <b>Class: </b>Class-1 <br>
                  <b>Section: </b> Section B <br>
                  <b>Subject: </b> History <br>
                </p>
              </td>
              <td>
              <p>
                  <b>Teacher : </b>Teacher 7 <br>
                  <b>Class: </b>Class-1 <br>
                  <b>Section: </b> Section B <br>
                  <b>Subject: </b> Chemistry<br>
                </p>
              </td>
              <td>
              <p>
                  <b>Teacher : </b>Teacher 4 <br>
                  <b>Class: </b>Class-1 <br>
                  <b>Section: </b> Section B <br>
                  <b>Subject: </b>Physics <br>
                </p>
              </td>
              <td>
              unscheduled
              </td>
            </tr>
            <tr>
              <td>07:45 AM - 08:30 AM</td>
              <td>
              <b>Teacher : </b>Teacher 8 <br>
                  <b>Class: </b>Class-1 <br>
                  <b>Section: </b> Section B <br>
                  <b>Subject: </b> Philosophy <br>
              </td>
              <td>
              <b>Teacher : </b>Teacher 9 <br>
                  <b>Class: </b>Class-1 <br>
                  <b>Section: </b> Section B <br>
                  <b>Subject: </b> Biology <br>
              </td>
              <td>
              <b>Teacher : </b>Teacher 5 <br>
                  <b>Class: </b>Class-1 <br>
                  <b>Section: </b> Section B <br>
                  <b>Subject: </b> Arabic <br>
              </td>
              <td>
              <b>Teacher : </b>Teacher 3 <br>
                  <b>Class: </b>Class-1 <br>
                  <b>Section: </b> Section B <br>
                  <b>Subject: </b> English <br>
              </td>
              <td>
              <b>Teacher : </b>Teacher 1<br>
                  <b>Class: </b>Class-1 <br>
                  <b>Section: </b> Section B <br>
                  <b>Subject: </b> Mathematics <br>
              </td>
              <td>
              <b>Teacher : </b>Teacher 6 <br>
                  <b>Class: </b>Class-1 <br>
                  <b>Section: </b> Section B <br>
                  <b>Subject: </b> Geology <br>
              </td>
              <td>
              unscheduled
              </td>
            </tr>
            <tr>
              <td>08:30 AM - 09:15 AM</td>
              <td>
              <b>Teacher : </b>Teacher 7 <br>
                  <b>Class: </b>Class-1 <br>
                  <b>Section: </b> Section B <br>
                  <b>Subject: </b> Chemistry <br>
              </td>
              <td>
              <b>Teacher : </b>Teacher 1 <br>
                  <b>Class: </b>Class-1 <br>
                  <b>Section: </b> Section B <br>
                  <b>Subject: </b> Mathematics <br>
              </td>
              <td>
              <b>Teacher : </b>Teacher 3 <br>
                  <b>Class: </b>Class-1 <br>
                  <b>Section: </b> Section B <br>
                  <b>Subject: </b> English <br>
              </td>
              <td>
              <b>Teacher : </b>Teacher 4 <br>
                  <b>Class: </b>Class-1 <br>
                  <b>Section: </b> Section B <br>
                  <b>Subject: </b> Physics <br>
              </td>
              <td>
              <b>Teacher : </b>Teacher 5 <br>
                  <b>Class: </b>Class-1 <br>
                  <b>Section: </b> Section B <br>
                  <b>Subject: </b> Arabic <br>
              </td>
              <td>
              <b>Teacher : </b>Teacher 9 <br>
                  <b>Class: </b>Class-1 <br>
                  <b>Section: </b> Section B <br>
                  <b>Subject: </b> Biology <br>
              </td>
              <td>  unscheduled</td>
            </tr>
            <tr>
              <td>09:15 AM - 10:00 AM</td>
              <td>
                <b>Teacher : </b>Teacher 10 <br>
                  <b>Class: </b>Class-1 <br>
                  <b>Section: </b> Section B <br>
                  <b>Subject: </b> Computer <br>
                </td>
              <td>
              <b>Teacher : </b>Teacher 2 <br>
                  <b>Class: </b>Class-1 <br>
                  <b>Section: </b> Section B <br>
                  <b>Subject: </b> History <br>
              </td>
              <td>
              <b>Teacher : </b>Teacher 11 <br>
                  <b>Class: </b>Class-1 <br>
                  <b>Section: </b> Section B <br>
                  <b>Subject: </b> Geography <br>
              </td>
              <td>
              <b>Teacher : </b>Teacher 12 <br>
                  <b>Class: </b>Class-1 <br>
                  <b>Section: </b> Section B <br>
                  <b>Subject: </b> Psychology <br>
              </td>
              <td>
              <b>Teacher : </b>Teacher 3 <br>
                  <b>Class: </b>Class-1 <br>
                  <b>Section: </b> Section B <br>
                  <b>Subject: </b> English <br>
              </td>
              <td>
              <b>Teacher : </b>Teacher 5 <br>
                  <b>Class: </b>Class-1 <br>
                  <b>Section: </b> Section B <br>
                  <b>Subject: </b> Arabic <br>
              </td>
              <td>  unscheduled</td>
            </tr>
            <tr>
              <td>10:00 AM - 10:30 AM</td>
              <td colspan ="7"> <h2 class="text-center">Lunch Break</h2>  </td>
              
            </tr>
            <tr>
              <td>10:30 AM - 11:15 AM</td>
              <td>
              <b>Teacher : </b>Teacher 5 <br>
                  <b>Class: </b>Class-1 <br>
                  <b>Section: </b> Section B <br>
                  <b>Subject: </b> Arabic <br>
              </td>
              <td>
              <b>Teacher : </b>Teacher 8 <br>
                  <b>Class: </b>Class-1 <br>
                  <b>Section: </b> Section B <br>
                  <b>Subject: </b> Philosophy <br>
              </td>
              <td>
              <b>Teacher : </b>Teacher 11 <br>
                  <b>Class: </b>Class-1 <br>
                  <b>Section: </b> Section B <br>
                  <b>Subject: </b> Geography <br>
              </td>
              <td>
              <b>Teacher : </b>Teacher 7 <br>
                  <b>Class: </b>Class-1 <br>
                  <b>Section: </b> Section B <br>
                  <b>Subject: </b> Chemistry <br>
              </td>
              <td>
              <b>Teacher : </b>Teacher 4 <br>
                  <b>Class: </b>Class-1 <br>
                  <b>Section: </b> Section B <br>
                  <b>Subject: </b> Physics <br>
              </td>
              <td>
              <b>Teacher : </b>Teacher 3 <br>
                  <b>Class: </b>Class-1 <br>
                  <b>Section: </b> Section B <br>
                  <b>Subject: </b> English <br>
              </td>
              <td>
              unscheduled
              </td>
            </tr>
            <tr>
              <td>11:15 AM - 12:00 pM</td>
              <td>
              <b>Teacher : </b>Teacher 1 <br>
                  <b>Class: </b>Class-1 <br>
                  <b>Section: </b> Section B <br>
                  <b>Subject: </b> Mathematics <br>
              </td>
              <td>
              <b>Teacher : </b>Teacher 10 <br>
                  <b>Class: </b>Class-1 <br>
                  <b>Section: </b> Section B <br>
                  <b>Subject: </b> Computer <br>
              </td>
              <td>
              <b>Teacher : </b>Teacher 4 <br>
                  <b>Class: </b>Class-1 <br>
                  <b>Section: </b> Section B <br>
                  <b>Subject: </b> Physics <br>
              </td>
              <td>
              <b>Teacher : </b>Teacher 11 <br>
                  <b>Class: </b>Class-1 <br>
                  <b>Section: </b> Section B <br>
                  <b>Subject: </b> Geography <br>
              </td>
              <td>
              <b>Teacher : </b>Teacher 6 <br>
                  <b>Class: </b>Class-1 <br>
                  <b>Section: </b> Section B <br>
                  <b>Subject: </b> Geology <br>
              </td>
              <td>
              <b>Teacher : </b>Teacher 12 <br>
                  <b>Class: </b>Class-1 <br>
                  <b>Section: </b> Section B <br>
                  <b>Subject: </b> Psychology <br>
              </td>
  
              <td>
              unscheduled
              </td>
            </tr>
          </tbody>
      </div>
    </div>
  </div>

  </div><!--/. container-fluid -->
</section>
<!-- /.content -->

<?php include('footer.php') ?>