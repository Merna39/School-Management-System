<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Chat</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom CSS for chat container */
        #chat-container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 50px;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
        <a href="javascript:history.back()" class="nav-link" title="Go Back">Go Back</a>
    </li>
        <li class="nav-item">
            <a href="../logout.php" class="nav-link" title="Logout">Logout <i class="fa fa-sign-out-alt"></i></a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Content -->
<div class="content-wrapper">
    <div id="chat-container">
        <h2>Welcome Teacher!</h2>
        <div id="messages-container" class="mb-3">
            <!-- Messages will be displayed here -->
        </div>
        <div class="input-group mb-3">
            <input type="text" id="msg-input" class="form-control" placeholder="Type a message...">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button" onclick="sendMessage()">Send</button>
            </div>
        </div>
    </div>
</div>
<!-- /.content-wrapper -->

<!-- Bootstrap JS and jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    // Function to load messages from server
    function loadMessages() {
        $.ajax({
            url: 'get_messages.php',
            type: 'GET',
            success: function(messages) {
                var messagesContainer = $('#messages-container');
                messagesContainer.empty();
                messages.forEach(function(message) {
                    messagesContainer.append('<div class="alert alert-primary" role="alert">' + message.msg + '</div>');
                });
            },
            error: function() {
                console.error('Error loading messages');
            }
        });
    }

    // Function to send message to server
    function sendMessage() {
        var message = $('#msg-input').val().trim();
        if (message !== '') {
            $.ajax({
                url: 'send_message.php',
                type: 'POST',
                data: { message: message },
                success: function(response) {
                    console.log(response);
                    $('#msg-input').val('');
                    loadMessages(); // Reload messages after sending
                },
                error: function() {
                    console.error('Error sending message');
                }
            });
        }
    }

    // Function to update notification badge and message dropdown
    function updateNotificationAndDropdown(count) {
        $('#message-count').text(count);
        if (count > 0) {
            $('#message-count').show();
            $('#message-dropdown').show();
        } else {
            $('#message-count').hide();
            $('#message-dropdown').hide();
        }
    }

    // Function to check for new messages periodically
    function checkForNewMessages() {
        setInterval(function() {
            loadMessages(); // Load messages from server
            // Simulate new messages count (replace with actual logic)
            var newMessageCount = Math.floor(Math.random() * 5); // Random number for demonstration
            updateNotificationAndDropdown(newMessageCount); // Update UI based on new messages
        }, 5000); // Check every 5 seconds (adjust as needed)
    }

    // Initial load of messages and setup for checking new messages
    $(document).ready(function() {
        loadMessages(); // Load messages on page load
        checkForNewMessages(); // Start checking for new messages
    });
</script>
</body>
</html>
