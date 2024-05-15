<?php
// this page not use yet
$db_conn = mysqli_connect('localhost', 'root', '', 'sms_project');

// Check connection
if (!$db_conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query to select teachers
$query = "SELECT id, name FROM accounts WHERE role = 'student'";
$result = mysqli_query($db_conn, $query);

// Fetch and store the results in an array
$teachers = [];
while ($row = mysqli_fetch_assoc($result)) {
    $teachers[] = $row;
}

// Close database connection
mysqli_close($db_conn);

// Return the list of teachers as JSON response
header('Content-Type: application/json');
echo json_encode($teachers);
?>
