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

// Retrieve user role and level based on user ID
$query = "SELECT role, level FROM accounts WHERE id = ?";
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
$userLevel = $row['level'];

// Retrieve and sanitize message data
$message = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '';
$recipientId = isset($_POST['recipient_id']) ? intval($_POST['recipient_id']) : null;

// Check if recipient is allowed based on user role and level
if ($userRole === 'student') {
    $query = "SELECT id FROM accounts WHERE id = ? AND (role = 'teacher' AND level = ?) OR (role = 'student' AND level = ?)";
    $stmt = mysqli_prepare($db_conn, $query);
    mysqli_stmt_bind_param($stmt, 'iii', $recipientId, $userLevel, $userLevel);
} else if ($userRole === 'teacher') {
    $query = "SELECT id FROM accounts WHERE id = ? AND (role = 'teacher' OR (role = 'student' AND level = ?))";
    $stmt = mysqli_prepare($db_conn, $query);
    mysqli_stmt_bind_param($stmt, 'ii', $recipientId, $userLevel);
} else {
    http_response_code(403); // Forbidden
    die("Action not allowed");
}

mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (!$result || mysqli_num_rows($result) === 0) {
    http_response_code(403); // Forbidden
    die("Recipient not allowed");
}

// Handle file upload if file is provided
$file_path = null;
if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
    $uploadDir = '../dist/uploads/';
    $filename = basename($_FILES['file']['name']);
    $uploadedFilePath = $uploadDir . $filename;

    // Ensure the upload directory exists and is writable
    if (!is_dir($uploadDir)) {
        if (!mkdir($uploadDir, 0777, true)) {
            http_response_code(500); // Internal Server Error
            die("Failed to create upload directory");
        }
    }

    if (!move_uploaded_file($_FILES['file']['tmp_name'], $uploadedFilePath)) {
        http_response_code(500); // Internal Server Error
        die("File upload failed");
    }
    $file_path = $uploadedFilePath;
}

// Prepare and execute the SQL query using prepared statement
$query = "INSERT INTO messages (outcoming_msg, incoming_msg, msg, file_path, timestamp) VALUES (?, ?, ?, ?, NOW())";
$stmt = mysqli_prepare($db_conn, $query);

if (!$stmt) {
    http_response_code(500); // Internal Server Error
    die("Error preparing statement: " . mysqli_error($db_conn));
}

// Bind parameters and execute the statement
mysqli_stmt_bind_param($stmt, 'iiss', $userId, $recipientId, $message, $file_path);
$result = mysqli_stmt_execute($stmt);

if ($result) {
    http_response_code(200); // OK
    echo json_encode(['status' => 'success', 'message' => 'Message sent successfully']);
} else {
    http_response_code(500); // Internal Server Error
    echo json_encode(['status' => 'error', 'error' => 'Error sending message: ' . mysqli_error($db_conn)]);
}

// Close statement and database connection
mysqli_stmt_close($stmt);
mysqli_close($db_conn);
?>
