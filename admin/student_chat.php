<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Chat</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
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
        }

        .message.outgoing {
            background-color: #2196F3;
            /* Green */
            color: white;
            align-items: flex-end;
            text-align: right;
        }

        .message.incoming {
            background-color: #F1F1F1;
            /* Light Grey */
            color: black;
            align-items: flex-start;
            text-align: left;
        }

        .message .sender-info {
            font-size: 0.9em;
            font-weight: bold;
            text-transform: uppercase;
            color: #FF5722;
            /* Deep Orange */
            margin-bottom: 5px;
        }

        .message .msg-content {
            max-width: 80%;
            word-wrap: break-word;
        }

        .message .timestamp {
            font-size: 0.8em;
            color: #6c757d;
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
            color: #007bff;
            font-weight: bold;
        }

        .navbar-nav .nav-item .nav-link:hover {
            color: #0056b3;
        }

        .navbar-nav .nav-item .nav-link i {
            margin-left: 5px;
        }
    </style>
</head>

<body>
    <nav class="main-header navbar navbar-expand navbar-white navbar-light shadow-sm">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a href="javascript:history.back()" class="nav-link" title="Go Back">Go Back</a>
            </li>
            <li class="nav-item">
                <a href="../logout.php" class="nav-link" title="Logout">Logout <i class="fa fa-sign-out-alt"></i></a>
            </li>
        </ul>
    </nav>

    <div id="chat-container">
        <h2 class="text-center mb-4">Welcome Student!</h2>
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function loadMessages() {
            $.ajax({
                url: 'get_messages.php',
                type: 'GET',
                success: function(messages) {
                    var messagesContainer = $('#messages-container');
                    messagesContainer.empty();
                    messages.forEach(function(message) {
                        var messageClass = message.outcoming_msg === 'student' ? 'outgoing' : 'incoming';
                        var senderInfo = '<div class="sender-info">' + (message.outcoming_msg === 'student' ? 'You' : 'Teacher') + '</div>';
                        var timestamp = '<div class="timestamp">' + new Date(message.timestamp).toLocaleString() + '</div>';

                        var messageHtml = '<div class="message ' + messageClass + '">';
                        messageHtml += senderInfo;
                        messageHtml += '<div class="msg-content">' + message.msg + '</div>';
                        messageHtml += timestamp;
                        messageHtml += '</div>';
                        messagesContainer.append(messageHtml);
                    });
                },
                error: function() {
                    console.error('Error loading messages');
                }
            });
        }

        function sendMessage() {
            var message = $('#msg-input').val().trim();
            if (message !== '') {
                $.ajax({
                    url: 'send_message.php',
                    type: 'POST',
                    data: {
                        message: message
                    },
                    success: function(response) {
                        console.log(response);
                        $('#msg-input').val('');
                        loadMessages();
                    },
                    error: function() {
                        console.error('Error sending message');
                    }
                });
            }
        }

        $(document).ready(function() {
            loadMessages();
            setInterval(loadMessages, 5000);
        });
    </script>
</body>

</html>
