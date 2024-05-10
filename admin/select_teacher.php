


<?php
// this page not use yet
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $teacherId = $_POST['teacher_id'];
    $_SESSION['selected_teacher'] = $teacherId; // Store selected teacher ID in session

    // Debugging: Check if teacher ID is stored in session
    var_dump($_SESSION['selected_teacher']);

    // Redirect to student_chat.php
    header("Location: student_chat.php");
    exit();
}

// Retrieve list of teachers from accounts table
$db_conn = mysqli_connect('localhost', 'root', '', 'sms_project');
$query = "SELECT id, name FROM accounts WHERE role = 'teacher'";
$result = mysqli_query($db_conn, $query);

$teachers = [];
while ($row = mysqli_fetch_assoc($result)) {
    $teachers[] = $row;
}

mysqli_close($db_conn);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Select Teacher</title>
</head>
<body>
    <h2>Select a Teacher</h2>
    <form method="POST" action="">
        <label for="teacher">Choose a teacher:</label>
        <select name="teacher_id" id="teacher">
            <?php foreach ($teachers as $teacher): ?>
                <option value="<?php echo $teacher['id']; ?>"><?php echo $teacher['name']; ?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit" value="Start Chat">
    </form>
</body>
</html>
