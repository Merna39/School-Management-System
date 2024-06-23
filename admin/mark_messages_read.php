// mark_messages_read.php
<?php
session_start();

// Ensure user is authenticated and retrieve user ID from session
if (!isset($_SESSION['user_id'])) {
    http_response_code(401); // Unauthorized
    die("User not authenticated");
}

$userId = $_SESSION['user_id'];
$recipientId = isset($_POST['recipient_id']) ? intval($_POST['recipient_id']) : null;

// Establish database connection
$db_conn = mysqli_connect('localhost', 'root', '', 'sms_project');

if (!$db_conn) {
    http_response_code(500); // Internal Server Error
    die("Connection failed: " . mysqli_connect_error());
}

if ($recipientId) {
    $query = "UPDATE messages SET status = 'read' WHERE incoming_msg = ? AND outcoming_msg = ?";
    $stmt = mysqli_prepare($db_conn, $query);
    mysqli_stmt_bind_param($stmt, 'ii', $userId, $recipientId);
    mysqli_stmt_execute($stmt);
}

mysqli_close($db_conn);
http_response_code(200); // OK
?>
