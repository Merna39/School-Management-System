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
        <h1 class="m-0 text-dark">Manage Time Table
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

    <?php if (isset($_GET['action']) && $_GET['action'] == 'add') { ?>
      <div class="card">
        <div class="card-body">
          <form action="" method="post">
            <div class="row">
              <div class="col-lg">
                <div class="form-group">
                  <label for="class_id">Select Class</label>
                  <select require name="class_id" id="class_id" class="form-control">
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
                  </select>
                </div>
              </div>
              <div class="col-lg">
                <div class="form-group" id="section-container">
                  <label for="section_id">Select Section</label>
                  <select required name="section_id" id="section_id" class="form-control">
                    <option value="">-Select Section-</option>
                    <?php
                    $args = array(
                      'type' => 'section',
                      'status' => 'publish',
                    );
                    $classes = get_the_sections();
                    foreach ($sections as $key => $section) { ?>
                      <option value="<?php echo $section->name ?>"><?php echo $section->title ?></option>
                    <?php } ?>

                  </select>
                </div>
              </div>


            </div>
            <div class="col-lg">
              <div class="form-group" id="section-container">
                <label for="teacher_id">Select Teacher</label>
                <select require name="teacher_id" id="teacher_id" class="form-control">
                  <option value="">-Select Teacher-</option>
                  <option value="1"> Mohamed khaled </option>
                  <option value="2"> Ashraf Gaid </option>
                  <option value="7"> Melad Moner </option>
                  <option value="44"> Talaat Zaky </option>
                  <option value="45"> Youssef Abdallah </option>
                  <option value="46"> Mariam Ebrahem </option>
                  <option value="47"> Abdalah Mohamed </option>
                  <option value="48"> Markus Essa </option>
                  <option value="49"> Ahmed Shady </option>
                  <option value="50"> Marwa Ahmed </option>
                  <option value="50"> khaled Mohsen </option>
                  <option value="50"> Adel Hassan </option>

                </select>
              </div>
            </div>
            <div class="col-lg">
              <div class="form-group" id="section-container">
                <label for="period_id">Select Period</label>
                <select require name="period_id" id="period_id" class="form-control">
                  <option value="">-Select Period-</option>
                  <?php
                  $args = array(
                    'type' => 'period',
                    'status' => 'publish',
                  );
                  $periods = get_posts($args);
                  foreach ($periods as $key => $period) { ?>
                    <option value="<?php echo $period->id ?>"><?php echo $period->title ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-lg">
              <div class="form-group" id="section-container">
                <label for="day_name">Select Day</label>
                <select require name="day_name" id="day_name" class="form-control">
                  <option value="">-Select Day-</option>

                  <?php
                  $days = ['saturday', 'sunday', 'monday', 'tuesday', 'wednesday', 'thursday'];
                  foreach ($days as $key => $day) { ?>
                    <option value="<?php echo $day ?>"><?php echo ucwords($day) ?></option>
                  <?php } ?>

                </select>
              </div>
            </div>
            <div class="col-lg">
              <div class="form-group" id="section-container">
                <label for="subject_id">Select Subject</label>
                <select require name="subject_id" id="subject_id" class="form-control">
                  <option value="">-Select Subject-</option>
                  <option value="12">Mathematics</option>
                  <option value="13">English</option>
                  <option value="17">Sciences</option>
                  <option value="18">Computer</option>
                  <option value="19">History</option>
                  <option value="20">Geography</option>
                  <option value="21">Chemistry</option>
                  <option value="22">Physics</option>
                  <option value="23">Philosophy</option>
                  <option value="24">Psychology</option>
                  <option value="25">Biology</option>
                  <option value="26">Geology</option>
                </select>
              </div>
            </div>
            <div class="col-lg">
              <div class="form-group">
                <label for="">&nbsp;</label>
                <input type="submit" value="submit" name="submit" class="btn btn-primary form-control">
              </div>
            </div>
        </div>
        </form>
      </div>
  </div>
<?php } else { ?>
  <!-- <div class="card">
      <div class="card-body">
        <form action="">
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label for="class">Select Class</label>
                <select require name="class" id="class" class="form-control">
                  <option value="">-Select Class-</option>
                  <?php
                  $args = array(
                    'type' => 'class',
                    'status' => 'publish',
                  );
                  $classes = get_posts($args);
                  foreach ($classes as $key => $class) { ?>
                    <option value="<?php echo $class->id ?>"><?php echo $class->title ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group" id="section-container">
                <label for="section">Select Section</label>
                <select require name="section" id="section" class="form-control">
                  <option value="">-Select Section-</option>
                </select>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div> -->


  <div class="card">
    <div class="card-body">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Timing</th>
            <th>Saturday</th>
              <th>Sunday</th>
              <th>Monday</th>
              <th>Tuesday</th>
              <th>Wednesday</th>
              <th>Thursday</th>
            

          </tr>
        </thead>
        <tbody>
          <?php
          $args = array(
            'type' => 'period',
            'status' => 'publish',
          );
          $periods = get_posts($args);
          foreach ($periods as $period) {
            $from = get_metadata($period->id, 'from')[0]->meta_value;
            $to = get_metadata($period->id, 'to')[0]->meta_value;
          ?>

            <tr>
              <td><?php echo date('h:i A', strtotime($from)) ?> - <?php echo date('h:i A', strtotime($to)) ?></td>
              <?php
              $days = ['saturday', 'sunday', 'monday', 'tuesday', 'wednesday', 'thursday'];
              foreach ($days as  $day) {

                $query =  mysqli_query($db_conn, "SELECT * FROM posts AS p 
                  INNER JOIN metadata AS md ON(md.item_id = p.id)
                   INNER JOIN metadata AS mp ON(mp.item_id = p.id)
                    WHERE p.type ='timetable' AND p.status ='publish' 
                    AND md.meta_key ='day_name' AND md.meta_value ='$day'
                    AND mp.meta_key ='period_id' AND mp.meta_value =$period->id");

                if (mysqli_num_rows($query) > 0) {
                  while ($timetabl = mysqli_fetch_object($query)) {


              ?>
                    <td>

                      <p>
                        <b>Teacher: </b>
                        <?php
                        $teacher_id = get_metadata($timetabl->item_id, 'teacher_id',)[0]->meta_value;
                        echo get_user_data($teacher_id)[0]->name;
                        ?>
                        <br>
                        <b>Class: </b>
                        <?php
                        $class_id = get_metadata($timetabl->item_id, 'class_id',)[0]->meta_value;
                        echo get_post(array('id' => $class_id))->title;
                        ?>
                        <br>
                        <b>Section: </b>
                        <?php
                        $section_id = get_metadata($timetabl->item_id, 'section_id',)[0]->meta_value;
                        echo get_post(array('id' => $section_id))->title;
                        ?>
                        <br>
                        <b>Subject: </b>
                        <?php
                        $subject_id = get_metadata($timetabl->item_id, 'subject_id',)[0]->meta_value;
                        echo get_post(array('id' => $subject_id))->title;
                        ?>
                        <br>
                      </p>
                    </td>
                  <?php  }
                } else { ?>
                   <td>
                    unscheduled
                  </td>
              <?php }
              } ?>
            </tr>

          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
<?php } ?>
</div><!--/. container-fluid -->
</section>
<!-- /.content -->

<!-- Subject -->
<!-- Subject -->
<script>
  jQuery(document).ready(function() {

    jQuery('#class_id').change(function() {
      jQuery.ajax({
        url: 'fetch_sections.php',
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
          jQuery('#section_id').html(response.options);
        }
      });
    });

  });
</script>


<?php include('footer.php') ?>