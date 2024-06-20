<?php
session_start();

// Ensure user is authenticated and retrieve user ID from session
if (!isset($_SESSION['user_id'])) {
    http_response_code(401); // Unauthorized
    die("User not authenticated");
}

$userId = $_SESSION['user_id'];

// Establish database connection
$db_conn = mysqli_connect('localhost', 'root', '', 'sms_project');

if (!$db_conn) {
    http_response_code(500); // Internal Server Error
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve user role based on user ID
$query = "SELECT role FROM accounts WHERE id = ?";
$stmt = mysqli_prepare($db_conn, $query);
mysqli_stmt_bind_param($stmt, 'i', $userId);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (!$result || mysqli_num_rows($result) === 0) {
    http_response_code(404); // Not Found
    die("User not found");
}

$row = mysqli_fetch_assoc($result);
$userRole = $row['role'];

// Retrieve and sanitize message data
$message = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '';

// Prepare and execute the SQL query using prepared statement
$query = "INSERT INTO messages (outcoming_msg, msg, timestamp) VALUES (?, ?, NOW())";
$stmt = mysqli_prepare($db_conn, $query);

if (!$stmt) {
    http_response_code(500); // Internal Server Error
    die("Error preparing statement: " . mysqli_error($db_conn));
}

// Bind parameters and execute the statement
mysqli_stmt_bind_param($stmt, 'is', $userId, $message); // Use $userId as the sender
$result = mysqli_stmt_execute($stmt);

if ($result) {
    http_response_code(200); // OK
    echo "Message sent successfully";
} else {
    http_response_code(500); // Internal Server Error
    echo "Error sending message: " . mysqli_error($db_conn);
}

// Close statement and database connection
mysqli_stmt_close($stmt);
mysqli_close($db_conn);
?>
