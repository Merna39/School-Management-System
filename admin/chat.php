<?php
session_start();

// Function to retrieve user role and name based on account ID
function getUserInfo($accountId, $db_conn)
{
    $query = "SELECT role, name, email, level FROM accounts WHERE id = ?";
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
$userEmail = $userInfo['email'];
$userLevel = $userInfo['level'];

// Fetch all users for sidebar based on user role and level
$query = $userRole === 'teacher' ?
    "SELECT id, name, email FROM accounts WHERE id != ? AND (role = 'teacher' OR (role = 'student' AND level = ?))" :
    "SELECT id, name, email FROM accounts WHERE id != ?  AND level = ?";
$stmt = mysqli_prepare($db_conn, $query);
mysqli_stmt_bind_param($stmt, 'ii', $userId, $userLevel);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

$users = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
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
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .chat-container {
            display: flex;
            height: 100vh;
            background-color: #2c2f33;
            color: white;
        }

        .sidebar {
            width: 25%;
            background-color: #23272a;
            padding: 20px;
            overflow-y: auto;
        }

        .sidebar .user {
            display: flex;
            align-items: center;
            padding: 10px;
            margin-bottom: 10px;
            cursor: pointer;
            background-color: #2c2f33;
            border-radius: 10px;
            transition: background-color 0.2s;
        }

        .sidebar .user:hover,
        .sidebar .user.active {
            background-color: #40444b;
        }

        .sidebar .user img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .chat-area {
            width: 75%;
            display: flex;
            flex-direction: column;
            background-color: #36393f;
            padding: 20px;
            position: relative;
        }

        .chat-area .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid #40444b;
            padding-bottom: 10px;
        }

        .chat-area .header .user-info {
            display: flex;
            align-items: center;
        }

        .chat-area .header .user-info img {
            width: 50px;
            height: 50px;
            border-radius: 60%;
            margin-right: 10px;
        }

        .chat-area .header .user-info .name-email {
            display: flex;
            flex-direction: column;
        }

        .chat-area .header .user-info .name-email div {
            line-height: 1.2;
        }

        .chat-area .header .back-to-login {
            margin-left: auto;
        }

        .chat-area .messages {
            flex-grow: 1;
            overflow-y: auto;
            margin-top: 20px;
            padding: 20px;
        }

        .message {
            padding: 15px;
            border-radius: 15px;
            margin-bottom: 15px;
            display: flex;
            flex-direction: column;
            max-width: 70%;
            word-wrap: break-word;
        }

        .message.outgoing {
            background-color: #7289da;
            color: white;
            align-self: flex-end;
            text-align: right;
            margin-left: auto;
        }

        .message.incoming {
            background-color: #40444b;
            color: white;
            align-self: flex-start;
            text-align: left;
        }

        .message .sender-info {
            font-size: 0.9em;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .message .timestamp {
            font-size: 0.8em;
            color: #b9bbbe;
            margin-top: 5px;
        }

        .input-group {
            margin-top: 20px;
        }

        .input-group .form-control {
            border-radius: 20px 0 0 20px;
        }

        .input-group .input-group-append .btn {
            border-radius: 0 20px 20px 0;
        }

        .notification {
            position: absolute;
            top: 20px;
            right: 20px;
            padding: 10px 20px;
            background-color: #7289da;
            color: white;
            border-radius: 5px;
            display: none;
        }

        .file-label {
            display: flex;
            align-items: center;
            cursor: pointer;
            border-radius: 0 20px 20px 0;
            /* Match button's rounded corners */
        }

        .file-label:hover {
            background-color: #e9ecef;
            /* Light background color on hover */
        }

        .file-label i {
            font-size: 18px;
            /* Adjust icon size */
        }

        .input-group-append {
            display: flex;
            align-items: center;
        }

        .input-group-append .btn-primary {
            border-radius: 20px 0 0 20px;
            /* Adjust button's rounded corners */
        }

        .form-control {
            border-radius: 20px 0 0 20px;
            /* Adjust input field's rounded corners */
            flex-grow: 1;
            /* Take remaining space in the input group */
        }
    </style>
</head>

<body>
    <div class="chat-container">
        <div class="sidebar" id="sidebar">
            <h3>Chats</h3>
            <?php foreach ($users as $user) : ?>
                <?php if ($user['id'] != $userId) : ?>
                    <div class="user" data-user-id="<?php echo $user['id']; ?>">
                        <img src="../images/student.png" alt="User Avatar">
                        <div>
                            <div><?php echo $user['name']; ?></div>
                            <small><?php echo $user['email']; ?></small>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>

        <div class="chat-area">
            <div class="header">
                <div class="user-info">
                    <img src="../images/student.png" alt="User Avatar">
                    <div class="name-email">
                        <div id="chat-header-name"><?php echo $userName; ?></div>
                        <small id="chat-header-email"><?php echo $userEmail; ?></small>
                    </div>
                </div>
                <a href="../login.php" class="btn btn-danger back-to-login">Back to Login</a>
            </div>
            <div class="messages" id="messages-container"></div>
            <div class="input-group">
                <input type="text" id="msg-input" class="form-control" placeholder="Type a message...">
                <div class="input-group-append">
                    <label for="file-input" class="file-label btn btn-outline-secondary">
                        Attach File <i class="fas fa-paperclip ml-1"></i>
                    </label>
                    <input type="file" id="file-input" accept="image/*,application/pdf" style="display:none;">
                    <button class="btn btn-primary" type="button" onclick="sendMessage()">Send</button>
                </div>
            </div>

        </div>
    </div>

    <div class="notification">
        <!-- Notification Content -->
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        var selectedRecipientId = null;

        function loadMessages() {
            $.ajax({
                url: 'get_messages.php',
                type: 'GET',
                data: {
                    recipient_id: selectedRecipientId
                },
                success: function(messages) {
                    var messagesContainer = $('#messages-container');
                    var shouldScroll = messagesContainer.scrollTop() + messagesContainer.innerHeight() >= messagesContainer[0].scrollHeight;

                    messagesContainer.empty();
                    messages.forEach(function(message) {
                        var messageClass = message.outgoing ? 'outgoing' : 'incoming';
                        var senderInfo = '<div class="sender-info">' + (message.outgoing ? 'You' : message.sender_name) + '</div>';
                        var timestamp = '<div class="timestamp">' + message.timestamp + '</div>';

                        var messageContent = '';
                        if (message.file_path) {
                            var fileExtension = message.file_path.split('.').pop().toLowerCase();
                            if (['jpg', 'jpeg', 'png', 'gif'].includes(fileExtension)) {
                                messageContent = '<img src="' + message.file_path + '" alt="Image" style="max-width: 100%; border-radius: 10px;">';
                            } else {
                                messageContent = '<a href="' + message.file_path + '" target="_blank">Download File</a>';
                            }
                        } else {
                            messageContent = '<div class="msg-content">' + message.msg + '</div>';
                        }

                        var messageHtml = '<div class="message ' + messageClass + '">';
                        messageHtml += senderInfo;
                        messageHtml += messageContent;
                        messageHtml += timestamp;
                        messageHtml += '</div>';
                        messagesContainer.append(messageHtml);
                    });

                    if (shouldScroll) {
                        messagesContainer.scrollTop(messagesContainer[0].scrollHeight);
                    }
                    showNotification();
                },
                error: function() {
                    console.error('Error loading messages');
                }
            });
        }

        $(document).ready(function() {
            $('.user').click(function() {
                selectedRecipientId = $(this).data('user-id');
                $('#chat-header-name').text($(this).find('div > div').text());
                $('#chat-header-email').text($(this).find('small').text());
                loadMessages();
                $(this).addClass('active').siblings().removeClass('active');
            });

            $('#msg-input').keypress(function(event) {
                if (event.keyCode === 13) {
                    sendMessage();
                }
            });

            setInterval(loadMessages, 5000);
        });

        function sendMessage() {
            var messageInput = $('#msg-input');
            var fileInput = $('#file-input');
            var message = messageInput.val().trim();
            var file = fileInput[0].files[0];

            if (message !== '' || file) {
                var formData = new FormData();
                formData.append('message', message);
                formData.append('recipient_id', selectedRecipientId);
                if (file) {
                    formData.append('file', file);
                }

                $.ajax({
                    url: 'send_message.php',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        messageInput.val('');
                        fileInput.val('');
                        loadMessages();
                    },
                    error: function() {
                        console.error('Error sending message');
                    }
                });
            }
        }

        // function showNotification() {
        //     var notification = $('.notification');
        //     notification.fadeIn(400).delay(3000).fadeOut(400);
        // }
    </script>
</body>

</html>