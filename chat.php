<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Chat</title>
    <link rel="stylesheet" href="">
</head>
<body>
    <div class="container">
        <h2>Live Chat</h2>
        <div id="chatBox" class="chat-box">
            <div id="chatMessages" class="chat-messages"></div>
            <input type="text" id="messageInput" placeholder="Type your message...">
             <br><br>
            <button id="sendButton">Send</button>
        </div>
    </div>

</body>
</html>


<style type="text/css">




/* Chat container */
.container {
    max-width: 400px;
    margin: 20px auto;
    font-family: Arial, sans-serif;
}

/* Chat box */
.chat-box {
    background-color: #f4f4f4;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

/* Chat messages */
.chat-messages {
    padding: 15px;
    max-height: 300px;
    overflow-y: auto;
}

/* Individual chat message */
.chat-message {
    margin-bottom: 15px;
    clear: both;
    overflow: hidden;
    position: relative;
}

/* Sender's message */
.chat-message.sent {
    background-color: #007bff;
    color: #fff;
    border-radius: 20px;
    padding: 10px 15px;
    max-width: 70%;
    float: right;
}

/* Received message */
.chat-message.received {
    background-color: #fff;
    color: #333;
    border-radius: 20px;
    padding: 10px 15px;
    max-width: 70%;
    float: left;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

/* Message time */
.message-time {
    font-size: 12px;
    color: #999;
    position: absolute;
    bottom: -20px;
    right: 10px;
}

/* Input area */
#messageInput {
    width: calc(100% - 90px);
    padding: 10px;
    border: none;
    border-radius: 20px;
    margin-right: 15px;
    background-color: #fff;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

/* Send button */
#sendButton {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 20px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

/* Send button on hover */
#sendButton:hover {
    background-color: #0056b3;
}





  /*  .container {
    max-width: 600px;
    margin: 50px auto;
}

.chat-box {
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 10px;
}

.chat-messages {
    height: 300px;
    overflow-y: scroll;
    margin-bottom: 10px;
    padding: 10px;
    border: 1px solid #eee;
    border-radius: 5px;
}

input[type="text"] {
    width: calc(100% - 70px);
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button {
    padding: 8px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}*/

</style>


<script type="text/javascript">
    // DOM elements
const chatMessages = document.getElementById('chatMessages');
const messageInput = document.getElementById('messageInput');
const sendButton = document.getElementById('sendButton');

// Dummy messages (for demonstration)
const dummyMessages = [
    { text: 'Hello!', sender: 'user' },
    { text: 'Hi there!', sender: 'bot' }
];

// Function to add message to chat
function addMessage(message, sender) {
    const messageElement = document.createElement('div');
    messageElement.className = `message ${sender}`;
    messageElement.innerText = message;
    chatMessages.appendChild(messageElement);
    chatMessages.scrollTop = chatMessages.scrollHeight;
}

// Function to handle sending message
function sendMessage() {
    const message = messageInput.value.trim();
    if (message !== '') {
        addMessage(message, 'user');
        messageInput.value = '';
        // Simulate bot response (in real chat system, this will be replaced with server response)
        setTimeout(() => {
            addMessage('This is a bot response.', 'bot');
        }, 1000);
    }
}

// Event listeners
sendButton.addEventListener('click', sendMessage);
messageInput.addEventListener('keypress', function(event) {
    if (event.key === 'Enter') {
        sendMessage();
    }
});

// Display dummy messages (for demonstration)
dummyMessages.forEach(({ text, sender }) => addMessage(text, sender));

</script>















<!-- // JavaScript code to open Live Chat modal
var liveChatModal = document.getElementById('liveChatModal');
var liveChatContainer = document.getElementById('liveChatContainer');
var liveChatBtn = document.getElementById('liveChatBtn');
var closeLiveChatModal = document.querySelector('#liveChatModal .close');

// Function to open Live Chat modal
function openLiveChatModal() {
    liveChatModal.style.display = 'block';
    loadLiveChat(); // Load live chat interface
}

// Function to close Live Chat modal
function closeLiveChatModal() {
    liveChatModal.style.display = 'none';
}

// Event listener for opening Live Chat modal
liveChatBtn.addEventListener('click', openLiveChatModal);

// Event listener for closing Live Chat modal
closeLiveChatModal.addEventListener('click', closeLiveChatModal);

// Function to load live chat interface
function loadLiveChat() {
    // Here, you would implement code to dynamically load the live chat interface
    // It could involve making AJAX requests to retrieve chat data from the server
    // and rendering it within the liveChatContainer element
    // For simplicity, let's assume you have a separate chat.php file to handle live chat functionality
    // You would use AJAX to load the content of chat.php into the liveChatContainer
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            liveChatContainer.innerHTML = xhr.responseText;
        }
    };
    xhr.open('GET', 'chat.php', true);
    xhr.send();
}
 -->




















<!-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Chat</title>
    <style>
        /* CSS styles */
        /* CSS styles */
        .container {
            max-width: 600px;
            margin: 50px auto;
        }

        .chat-box {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
        }

        .chat-messages {
            height: 300px;
            overflow-y: scroll;
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #eee;
            border-radius: 5px;
        }

        input[type="text"] {
            width: calc(100% - 70px);
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            padding: 8px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            border-radius: 8px;
            width: 80%;
            max-width: 400px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="chat-box">
            <div class="chat-messages" id="chatMessages"></div>
            <input type="text" id="messageInput" placeholder="Type your message...">
            <button id="sendButton">Send</button>
        </div>
    </div> -->

    <!-- Live Chat Modal -->
    <!-- <div id="liveChatModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeLiveChatModal">&times;</span>
            <div id="liveChatContainer"></div>
        </div>
    </div> -->

    <!-- <script>
        // JavaScript code
        // DOM elements
        const chatMessages = document.getElementById('chatMessages');
        const messageInput = document.getElementById('messageInput');
        const sendButton = document.getElementById('sendButton');
        const liveChatModal = document.getElementById('liveChatModal');
        const liveChatContainer = document.getElementById('liveChatContainer');
        const liveChatBtn = document.createElement('button');
        liveChatBtn.textContent = 'Live Chat';
        liveChatBtn.style.marginRight = '10px';
        document.body.insertBefore(liveChatBtn, document.getElementById('sendButton'));

        // Function to add message to chat
        function addMessage(message, sender) {
            const messageElement = document.createElement('div');
            messageElement.className = `message ${sender}`;
            messageElement.innerText = message;
            chatMessages.appendChild(messageElement);
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }

        // Function to handle sending message
        function sendMessage() {
            const message = messageInput.value.trim();
            if (message !== '') {
                addMessage(message, 'user');
                messageInput.value = '';
                // Simulate bot response (in real chat system, this will be replaced with server response)
                setTimeout(() => {
                    addMessage('This is a bot response.', 'bot');
                }, 1000);
            }
        }

        // Event listeners
        sendButton.addEventListener('click', sendMessage);
        messageInput.addEventListener('keypress', function(event) {
            if (event.key === 'Enter') {
                sendMessage();
            }
        });

        // Function to open Live Chat modal
        function openLiveChatModal() {
            liveChatModal.style.display = 'block';
            loadLiveChat(); // Load live chat interface
        }

        // Function to close Live Chat modal
        function closeLiveChatModal() {
            liveChatModal.style.display = 'none';
        }

        // Event listener for opening Live Chat modal
        liveChatBtn.addEventListener('click', openLiveChatModal);

        // Event listener for closing Live Chat modal
        document.getElementById('closeLiveChatModal').addEventListener('click', closeLiveChatModal);

        // Function to load live chat interface
        function loadLiveChat() {
            // Here, you would implement code to dynamically load the live chat interface
            // It could involve making AJAX requests to retrieve chat data from the server
            // and rendering it within the liveChatContainer element
            // For simplicity, let's assume you have a separate chat.php file to handle live chat functionality
            // You would use AJAX to load the content of chat.php into the liveChatContainer
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    liveChatContainer.innerHTML = xhr.responseText;
                }
            };
            xhr.open('GET', 'chat.php', true);
            xhr.send();
        }
    </script> -->
<!-- </body>
</html> -->
