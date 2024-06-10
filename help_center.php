<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help Center</title>
    <link rel="stylesheet" href="">
</head>
<body>
    <div class="container">
        <h1>Welcome to Learning Management System Help Center</h1>
        <div class="options">
            <h2>How Can We Assist You Today?</h2>
            <ul>
                <li><a href="general_inquiries.php">General Inquiries</a></li>
                <li><a href="technical_support.php">Technical Support</a></li>
                <li><a href="content_inquiries.php">Content or Course Inquiries</a></li>
            </ul>
        </div>
        <div class="contact-options">

            <h2>Contact Options</h2>
            <p>Live Chat, Email Support, FAQs</p>
            <button id="liveChatBtn">
                <a href="chat.php">Live Chat</a></button>
            <button id="emailSupportBtn">
                <a href="email.php">Email Support</a></button>
            <button id="faqBtn">
                <a href="faq.php">FAQs</a></button>
        </div>
    </div>
</body>
</html>


<style type="text/css">

    /* Body styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
    margin: 0;
    padding: 0;
}

/* Container styles */
.container {
    max-width: 800px;
    margin: 50px auto;
    padding: 30px;
    border-radius: 10px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Title styles */
h1 {
    color: #007bff;
    font-size: 28px;
    margin-bottom: 30px;
}

/* Section styles */
.section {
    margin-bottom: 30px;
}

.section h2 {
    font-size: 24px;
    color: #333;
    margin-bottom: 15px;
}

.section p {
    font-size: 16px;
    color: #666;
}

/* Options list styles */
.options {
    margin-bottom: 30px;
}

.options ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
}

.options li {
    margin-bottom: 10px;
}

.options li a {
    color: #007bff;
    text-decoration: none;
    font-size: 18px;
    transition: color 0.3s ease;
}

.options li a:hover {
    color: #0056b3;
}

/* Contact options styles */
.contact-options,
.additional-resources {
    margin-bottom: 30px;
}

.contact-options h2,
.additional-resources h2 {
    font-size: 24px;
    color: #333;
    margin-bottom: 15px;
}

.contact-options p,
.additional-resources p {
    font-size: 16px;
    color: #666;
}

/* Footer styles */
.footer {
    text-align: center;
    font-size: 14px;
    color: #999;
    margin-top: 30px;
}

</style>


<script type="text/javascript">
    // Get the modal elements
var liveChatModal = document.getElementById('liveChatModal');
var emailSupportModal = document.getElementById('emailSupportModal');
var faqModal = document.getElementById('faqModal');
//var communityForumsModal = document.getElementById('communityForumsModal');

// Get the buttons that open the modals
var liveChatBtn = document.getElementById('liveChatBtn');
var emailSupportBtn = document.getElementById('emailSupportBtn');
var faqBtn = document.getElementById('faqBtn');
// var communityForumsBtn = document.getElementById('communityForumsBtn');

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
        event.target === faqModal) {
        closeModal(event.target);
    }
});

</script>
