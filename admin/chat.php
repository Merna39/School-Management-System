<?php
session_start();

// Function to retrieve user role and name based on account ID
function getUserInfo($accountId, $db_conn)
{
    $query = "SELECT role, name FROM accounts WHERE id = ?";
    $stmt = mysqli_prepare($db_conn, $query);
    mysqli_stmt_bind_param($stmt, 'i', $accountId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result);
    } else {
        return null;
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

// Retrieve user info based on user ID
$userInfo = getUserInfo($userId, $db_conn);
if (!$userInfo) {
    die("User not found");
}

$userRole = $userInfo['role'];
$userName = $userInfo['name'];

// Handle message submission based on user role
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize message data
    $message = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '';

    // Prepare and execute the SQL query using prepared statement
    $query = "INSERT INTO messages (outcoming_msg, msg, timestamp) VALUES (?, ?, NOW())";
    $stmt = mysqli_prepare($db_conn, $query);

    if (!$stmt) {
        die("Error preparing statement: " . mysqli_error($db_conn));
    }

    // Bind parameters and execute the statement
    mysqli_stmt_bind_param($stmt, 'is', $userId, $message); // Use $userId as the sender
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        echo "Message sent successfully";
    } else {
        echo "Error sending message: " . mysqli_error($db_conn);
    }

    // Close statement
    mysqli_stmt_close($stmt);
}

// Fetch messages with sender information
$query = "
    SELECT m.*, a.name AS sender_name
    FROM messages m
    JOIN accounts a ON m.outcoming_msg = a.id
";
$result = mysqli_query($db_conn, $query);

$messages = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Determine if the sender is the current user or another user
        $senderName = $row['outcoming_msg'] == $userId ? 'You' : $row['sender_name'];

        $messages[] = [
            'msg' => $row['msg'],
            'outgoing' => $row['outcoming_msg'] == $userId, // True if message is outgoing (sent by current user)
            'sender_name' => $senderName,
            'timestamp' => $row['timestamp']
        ];
    }
}

mysqli_close($db_conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Chat</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        #chat-container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        .message {
            padding: 10px;
            border-radius: 10px;
            margin-bottom: 10px;
            display: flex;
            flex-direction: column;
            max-width: 100%;
            word-wrap: break-word;
        }

        .message.outgoing {
            background-color: #E6E6FA; /* Light Blue */
            color: #000;
            align-self: flex-end;
            text-align: right;
        }

        .message.incoming {
            background-color: #F8F9FA; /* Light Grey */
            color: black;
            align-self: flex-start;
            text-align: left;
        }

        .message .sender-info {
            font-size: 0.9em;
            font-weight: bold;
            text-transform: uppercase;
            color: #6495ED; /* Cornflower Blue */
            margin-bottom: 5px;
        }

        .message .msg-content {
            max-width: 100%;
            word-wrap: break-word;
        }

        .message .timestamp {
            font-size: 0.8em;
            color: #6c757d; /* Gray */
            margin-top: 5px;
        }

        #messages-container {
            max-height: 400px;
            overflow-y: auto;
            margin-bottom: 20px;
        }

        #msg-input {
            border-radius: 20px 0 0 20px;
        }

        .input-group-append .btn {
            border-radius: 0 20px 20px 0;
        }

        .navbar-nav .nav-item .nav-link {
            color: #007bff; /* Blue */
            font-weight: bold;
        }

        .navbar-nav .nav-item .nav-link:hover {
            color: #0056b3; /* Darker Blue */
        }

        .navbar-nav .nav-item .nav-link i {
            margin-left: 5px;
        }
    </style>
</head>
<body>

<!-- Navigation bar -->
<nav class="navbar navbar-expand navbar-white navbar-light shadow-sm">
    <ul class="navbar-nav ml-auto">
        <!-- <li class="nav-item">
            <a href="javascript:history.back()" class="nav-link" title="Go Back">Go Back</a>
        </li> -->
        <li class="nav-item">
            <a href="../logout.php" class="nav-link" title="Logout">Logout <i class="fa fa-sign-out-alt"></i></a>
        </li>
    </ul>
</nav>

<!-- Chat container -->
<div id="chat-container" class="container">
    <h2 class="text-center mb-4">Welcome, <?php echo $userName; ?>!</h2>
    <div id="messages-container" class="mb-3">
        <!-- Messages will be displayed here -->
        <?php foreach ($messages as $message) : ?>
            <?php if ($message['outgoing']) : ?>
                <div class="message outgoing">
                    <div class="sender-info">You</div>
                    <div class="msg-content"><?php echo $message['msg']; ?></div>
                    <div class="timestamp"><?php echo $message['timestamp']; ?></div>
                </div>
            <?php else : ?>
                <div class="message incoming">
                    <div class="sender-info"><?php echo $message['sender_name']; ?></div>
                    <div class="msg-content"><?php echo $message['msg']; ?></div>
                    <div class="timestamp"><?php echo $message['timestamp']; ?></div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
    <div class="input-group mb-3">
        <input type="text" id="msg-input" class="form-control" placeholder="Type a message...">
        <div class="input-group-append">
            <button class="btn btn-primary" type="button" onclick="sendMessage()">Send</button>
        </div>
    </div>
</div>

<!-- Include jQuery and Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    // Function to load messages
    function loadMessages() {
        $.ajax({
            url: 'get_messages.php',
            type: 'GET',
            success: function(messages) {
                var messagesContainer = $('#messages-container');
                messagesContainer.empty();
                messages.forEach(function(message) {
                    var messageClass = message.outgoing ? 'outgoing' : 'incoming';
                    var senderInfo = '<div class="sender-info">' + (message.outgoing ? 'You' : message.sender_name) + '</div>';
                    var timestamp = '<div class="timestamp">' + message.timestamp + '</div>';

                    var messageHtml = '<div class="message ' + messageClass + '">';
                    messageHtml += senderInfo;
                    messageHtml += '<div class="msg-content">' + message.msg + '</div>';
                    messageHtml += timestamp;
                    messageHtml += '</div>';
                    messagesContainer.append(messageHtml);
                });
                // Scroll to bottom of messages container
                messagesContainer.scrollTop(messagesContainer[0].scrollHeight);
            },
            error: function() {
                console.error('Error loading messages');
            }
        });
    }

    // Function to send a message
    function sendMessage() {
        var messageInput = $('#msg-input');
        var message = messageInput.val().trim();

        if (message !== '') {
            $.ajax({
                url: 'send_message.php',
                type: 'POST',
                data: { message: message },
                success: function(response) {
                    console.log(response);
                    messageInput.val(''); // Clear input field after sending
                    loadMessages(); // Reload messages after sending
                },
                error: function() {
                    console.error('Error sending message');
                }
            });
        }
    }

    // Load messages on page load
    $(document).ready(function() {
        loadMessages();
    });
</script>
</body>
</html>
