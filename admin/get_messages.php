<?php
session_start();

// Ensure user is authenticated and retrieve user ID from session
if (!isset($_SESSION['user_id'])) {
    http_response_code(401); // Unauthorized
    die("User not authenticated");
}

$userId = $_SESSION['user_id'];
$recipientId = isset($_GET['recipient_id']) ? intval($_GET['recipient_id']) : null;

// Establish database connection
$db_conn = mysqli_connect('localhost', 'root', '', 'sms_project');

if (!$db_conn) {
    http_response_code(500); // Internal Server Error
    die("Connection failed: " . mysqli_connect_error());
}

// Prepare query to retrieve messages
if ($recipientId) {
    $query = "
        SELECT m.*, a.name AS sender_name
        FROM messages m
        JOIN accounts a ON m.outcoming_msg = a.id
        WHERE (m.outcoming_msg = ? AND m.incoming_msg = ?)
           OR (m.outcoming_msg = ? AND m.incoming_msg = ?)
        ORDER BY m.timestamp ASC
    ";
    $stmt = mysqli_prepare($db_conn, $query);
    mysqli_stmt_bind_param($stmt, 'iiii', $userId, $recipientId, $recipientId, $userId);
} else {
    $query = "
        SELECT m.*, a.name AS sender_name
        FROM messages m
        JOIN accounts a ON m.outcoming_msg = a.id
        WHERE m.incoming_msg IS NULL
        ORDER BY m.timestamp ASC
    ";
    $stmt = mysqli_prepare($db_conn, $query);
    mysqli_stmt_bind_param($stmt, 'i', $userId);
}

mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

$messages = [];

while ($row = mysqli_fetch_assoc($result)) {
    $messages[] = [
        'msg' => $row['msg'],
        'outgoing' => $_SESSION['user_id'] == $row['outcoming_msg'], // Check if message is outgoing (sent by current user)
        'sender_name' => $row['sender_name'],
        'timestamp' => $row['timestamp'],
        'file_path' => $row['file_path'] // Add file path to the message array
    ];
}

header('Content-Type: application/json');
echo json_encode($messages);

// Close database connection
mysqli_close($db_conn);
?>
