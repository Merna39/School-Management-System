<?php include('./includes/config.php') ?>

<?php

if (isset($_POST['class_id']) && !empty($_POST['class_id'])) {
    $class_id = mysqli_real_escape_string($db_conn, $_POST['class_id']);

    // Fetch the sections for the given class_id
    $query = mysqli_query($db_conn, "SELECT id, section AS title FROM classes WHERE id = '$class_id'");

    $count = mysqli_num_rows($query);
    $options = '<option value="">-Select Section-</option>';

    if ($count > 0) {
        while ($section = mysqli_fetch_object($query)) {
            $options .= '<option value="' . $section->id . '">' . $section->title . '</option>';
        }
    }

    $output['count'] = $count;
    $output['options'] = $options;

    echo json_encode($output);
} else {
    // Return an empty result if no class_id is provided
    $output['count'] = 0;
    $output['options'] = '<option value="">No sections found</option>';

    echo json_encode($output);
}
?>