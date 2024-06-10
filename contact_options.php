<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Options</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <div class="contact-options">
            <h2>Contact Options</h2>
            <p>Live Chat, Email Support, FAQs, Community Forums</p>
            <button id="liveChatBtn">Live Chat</button>
            <button id="emailSupportBtn">Email Support</button>
            <button id="faqBtn">FAQs</button>
            <button id="communityForumsBtn">Community Forums</button>
        </div>
    </div>
    
    <!-- Live Chat Modal -->
    <div id="liveChatModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p>Live Chat is currently unavailable. Please check back later.</p>
        </div>
    </div>

    <!-- Email Support Modal -->
    <div id="emailSupportModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p>You can reach us via email at support@example.com</p>
        </div>
    </div>

    <!-- FAQs Modal -->
    <div id="faqModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p>Visit our FAQs page for commonly asked questions and answers.</p>
        </div>
    </div>

    <!-- Community Forums Modal -->
    <div id="communityForumsModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p>Join our community forums to engage with other users and get help.</p>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>

<style type="text/css">
    /* Add your existing styles here */

.container {
    max-width: 800px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

.contact-options {
    margin-top: 20px;
}

.contact-options h2 {
    color: #333;
}

.contact-options p {
    margin-bottom: 20px;
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

<script type="text/javascript">
// Get the modal elements
var liveChatModal = document.getElementById('liveChatModal');
var emailSupportModal = document.getElementById('emailSupportModal');
var faqModal = document.getElementById('faqModal');
var communityForumsModal = document.getElementById('communityForumsModal');

// Get the buttons that open the modals
var liveChatBtn = document.getElementById('liveChatBtn');
var emailSupportBtn = document.getElementById('emailSupportBtn');
var faqBtn = document.getElementById('faqBtn');
var communityForumsBtn = document.getElementById('communityForumsBtn');

// Get the close buttons for each modal
var closeBtns = document.getElementsByClassName('close');

// Function to open modal
function openModal(modal) {
    modal.style.display = 'block';
}

// Function to close modal
function closeModal(modal) {
    modal.style.display = 'none';
}

// Event listeners for opening modals
liveChatBtn.addEventListener('click', function() {
    openModal(liveChatModal);
});

emailSupportBtn.addEventListener('click', function() {
    openModal(emailSupportModal);
});

faqBtn.addEventListener('click', function() {
    openModal(faqModal);
});

communityForumsBtn.addEventListener('click', function() {
    openModal(communityForumsModal);
});

// Event listeners for closing modals
for (var i = 0; i < closeBtns.length; i++) {
    closeBtns[i].addEventListener('click', function() {
        var modal = this.parentElement.parentElement;
        closeModal(modal);
    });
}

// Close modal when clicking outside of it
window.addEventListener('click', function(event) {
    if (event.target === liveChatModal ||
        event.target === emailSupportModal ||
        event.target === faqModal ||
        event.target === communityForumsModal) {
        closeModal(event.target);
    }
});




</script>