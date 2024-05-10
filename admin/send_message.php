<?php
session_start();

// Function to retrieve user role based on account ID
function getUserRole($accountId, $db_conn) {
    $query = "SELECT role FROM accounts WHERE id = ?";
    $stmt = mysqli_prepare($db_conn, $query);
    mysqli_stmt_bind_param($stmt, 'i', $accountId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row['role'];
    } else {
        return 'unknown'; // Default to unknown if account ID is not found
    }
}

// Ensure user is authenticated and retrieve user ID from session
if (!isset($_SESSION['user_id'])) {
    die("User not authenticated");
}

$userId = $_SESSION['user_id'];

// Establish database connection
$db_conn = mysqli_connect('localhost', 'root', '', 'sms_project');

if (!$db_conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve user role based on user ID
$userRole = getUserRole($userId, $db_conn);

// Handle message submission based on user role
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize message data
    $message = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '';

    // Determine incoming_msg and outcoming_msg based on user role
    if ($userRole === 'student') {
        $incomingMsg = 'teacher';    // Student receives message from teacher
        $outgoingMsg = 'student';    // Student sends message to teacher
    } elseif ($userRole === 'teacher') {
        $incomingMsg = 'student';    // Teacher receives message from student
        $outgoingMsg = 'teacher';    // Teacher sends message to student
    } else {
        die("Unknown user role");     // Handle unknown user role
    }

    // Prepare and execute the SQL query using prepared statement
    $query = "INSERT INTO messages (incoming_msg, outcoming_msg, msg) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($db_conn, $query);

    if (!$stmt) {
        die("Error preparing statement: " . mysqli_error($db_conn));
    }

    // Bind parameters and execute the statement
    mysqli_stmt_bind_param($stmt, 'sss', $incomingMsg, $outgoingMsg, $message);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        echo "Message sent successfully";
    } else {
        echo "Error sending message: " . mysqli_error($db_conn);
    }

    // Close statement
    mysqli_stmt_close($stmt);
}

// Close database connection
mysqli_close($db_conn);
?>
