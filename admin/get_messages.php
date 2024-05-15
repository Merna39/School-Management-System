<?php
// Implement message retrieval from database
$db_conn = mysqli_connect('localhost', 'root', '', 'sms_project');
$query = "SELECT * FROM messages";
$result = mysqli_query($db_conn, $query);

$messages = [];
while ($row = mysqli_fetch_assoc($result)) {
    $messages[] = $row;
}

mysqli_close($db_conn);

// Return messages as JSON response
header('Content-Type: application/json');
echo json_encode($messages);
?>
