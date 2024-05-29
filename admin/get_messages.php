<?php
session_start();
$db_conn = mysqli_connect('localhost', 'root', '', 'sms_project');

if (!$db_conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$userId = $_SESSION['user_id'];
$query = "SELECT * FROM messages";
$result = mysqli_query($db_conn, $query);

$messages = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $messages[] = [
            'msg' => $row['msg'],
            'incoming_msg' => $row['incoming_msg'],
            'outcoming_msg' => $row['outcoming_msg']
        ];
    }
}

header('Content-Type: application/json');
echo json_encode($messages);
mysqli_close($db_conn);
?>
