<?php
session_start();

// Establish database connection
$db_conn = mysqli_connect('localhost', 'root', '', 'sms_project');

if (!$db_conn) {
    http_response_code(500); // Internal Server Error
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve messages with sender information
$query = "
    SELECT m.*, a.name AS sender_name
    FROM messages m
    JOIN accounts a ON m.outcoming_msg = a.id
    ORDER BY m.timestamp ASC
";
$result = mysqli_query($db_conn, $query);

$messages = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $messages[] = [
            'msg' => $row['msg'],
            'outgoing' => $_SESSION['user_id'] == $row['outcoming_msg'], // Check if message is outgoing (sent by current user)
            'sender_name' => $row['sender_name'],
            'timestamp' => $row['timestamp']
        ];
    }
}

header('Content-Type: application/json');
echo json_encode($messages);

// Close database connection
mysqli_close($db_conn);
?>
