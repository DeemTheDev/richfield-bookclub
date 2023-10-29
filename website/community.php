<!DOCTYPE html>
<html>
<head>
    <title>WhatsApp Group Chat</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/community.css">
    <link rel="stylesheet" href="css/normalize.css">




<header class="header container">
        <nav class="navbar">
            <div class="navbar__logo">
            <img class="MainLogo"src="web-media/Book_Club_tps.png"  />
            </div>
            <!-- HAMBURGER MENU -->
            <a href="#" class="toggle">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </a>
            <!-- AMBURGER MENU -->
            <div class="navbar__links">
                <ul>
                    <li><a href="community.php">COMMUNITY</a></li>
                    <li><a href="admin.php">ADMIN</a></li>
                    <li><a href="login.php">LOG-OUT</a></li>
                </ul>
            </div>
        </nav>
    </header>

</head>




<body>
    <div class="chat-container">
        <div id="chat-messages"></div>
        <form id="message-form">
            <input type="text" id="username" placeholder="Username" required>
            <input type="text" id="message" placeholder="Type a message..." required>
            <button type="submit">Send</button>
        </form>
    </div>

    <script>
        // Save message to local storage and update chat box
        function saveMessage(username, message) {
            const timestamp = new Date().toLocaleString();
            const formattedMessage = `<div class="message">
                <span class="username">${username}</span>
                <span class="time">${timestamp}</span>
                <p>${message}</p>
            </div>`;
            const chatMessages = document.getElementById('chat-messages');
            chatMessages.innerHTML += formattedMessage;

            // Save messages to local storage
            const existingMessages = localStorage.getItem('chatMessages');
            const updatedMessages = existingMessages ? `${existingMessages}\n${formattedMessage}` : formattedMessage;
            localStorage.setItem('chatMessages', updatedMessages);
        }

        // Load messages from local storage and display in chat box
        function loadMessages() {
            const chatMessages = document.getElementById('chat-messages');
            const existingMessages = localStorage.getItem('chatMessages');
            if (existingMessages) {
                chatMessages.innerHTML = existingMessages;
            }
        }

        // Submit message form
        document.getElementById('message-form').addEventListener('submit', function(event) {
            event.preventDefault();
            const username = document.getElementById('username').value;
            const message = document.getElementById('message').value;
            saveMessage(username, message);
            document.getElementById('message').value = '';
        });

        // Load messages on page load
        window.addEventListener('load', function() {
            loadMessages();
        });
    </script>
</body>
</html>
