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

   <style>
      .chat-container {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
}
.message {
    margin-bottom: 10px;
}
.message .username {
    font-weight: bold;
}
.message .time {
    font-size: 12px;
    color: #888;
}
/* Reset default browser styles */
html, body {
	  background: url('https://img.freepik.com/premium-vector/chat-time-chalk-drawing-design-doodle-vector-clip-art-set-elements-seamless-pattern-icons-speech-bubble-message-emoji-letter-gadget-white-monochrome-design-isolated-dark-background_153823-116.jpg?w=740') no-repeat;
      background-size:cover;
	  min-height:100vh;
	  background-position:center;
}

/* Main container */
.chat-container {
    max-width: 600px;
    align-items: center;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
      background-size:cover;
      background-color: white;
    border-radius: 10px;
    box-shadow: 10px 10px 4px rgba(2, 2, 2, 0.5);
}

/* Chat header */
.chat-header {
    display: flex;
    align-items: center;
    justify-content: center;
    padding-bottom: 10px;
    border-bottom: 1px solid #ccc;
   
}

/* Chat messages */
#chat-messages {
    margin-top: 20px;
    overflow-y: scroll;
    height: 300px;
}

.message {
    margin-bottom: 10px;
}

.message .username {
    font-weight: bold;
}

.message .time {
    font-size: 12px;
    color: #888;
}

.message p {
    margin: 0;
}

/* Message form */
#message-form {
    margin-top: 20px;
    display: flex;
}

#message-form input[type="text"] {
    flex: 1;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

#message-form button {
    padding: 10px 20px;
    background-color: #4CAF50;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

#message-form button:hover {
    background-color: #45a049;
}

/* Scrollbar styles */
#chat-messages::-webkit-scrollbar {
    width: 8px;
}

#chat-messages::-webkit-scrollbar-track {
    background: #f1f1f1;
}

#chat-messages::-webkit-scrollbar-thumb {
    background: #888;
}

#chat-messages::-webkit-scrollbar-thumb:hover {
    background: #555;
}


@keyframes popUp {
  0% { transform: scale(0); opacity: 0; }
  80% { transform: scale(1.1); opacity: 1; }
  100% { transform: scale(1); opacity: 1; }
}

/* Apply the animation to the image */
.MainLogo{
	 display:flex;
  animation: popUp 0.5s ease-in-out;
  width:200px;
  height:100px;
position: absolute;


  top: 0;
  left: 0;
   
}


/*==========NAVBAR==========*/
.navbar{
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
  height: 100px;
    color: black;
  background-color: white;
    font-weight: bold;
}
.navbar__logo{
    font-size: 1.5rem;
    margin: .5rem;
}
.navbar__links ul{
    display: flex;
    gap: 1rem;
}
.navbar__links li{
    list-style: none;
}
.navbar__links a{
    text-decoration: none;
    color: black;
    padding: 1.5rem;
    display: block;
}
.toggle{
    position: absolute;
    top: 1rem;
    right: 1rem;
    display: none;
    flex-direction: column;
    justify-content: space-between;
    width: 30px;
    height: 21px;
}
.toggle .bar{
    height: 3px;
    width: 100%;
    background-color: black;
    border-radius: 10px;
}
@media (max-width: 610px){
    .toggle{
        display: flex;
    }
    .navbar__links{
        display:none;
        width: 100%;
    }
    .navbar{
        flex-direction: column;
        align-items: flex-start;
    }
    .navbar__links ul{
        flex-direction: column;
        width: 100%;
    }
    .navbar__links li{
        text-align: center;
    }
    .navbar__links li a{
        padding: .5rem 1rem;
    }
    .navbar__links.active{
        display: flex;
    }
}
.navbar__links li:hover{
    background-color: #00a6fb;
}

    </style>



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
