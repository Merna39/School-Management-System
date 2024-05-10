<?php
session_start();

// Redirect to login if user is not authenticated
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Retrieve user role from session
$userRole = $_SESSION['user_role'];

// Display different chat interfaces based on user role
if ($userRole === 'student') {
    include('student_chat.php');
} elseif ($userRole === 'teacher') {
    include('teacher_chat.php');
}
?>
