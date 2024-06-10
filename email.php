<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Simulate email response (replace with actual email sending code)
    $response = "Thank you for your email, $name. We will respond to you at $email as soon as possible.";
    
    // Display response
    echo $response;
} else {
    // If accessed directly without POST request
    // echo "Error: Direct access not allowed.";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Support</title>
    <style>


        /* Body styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
    margin: 0;
    padding: 0;
}

/* Container styles */
.container {
    max-width: 600px;
    margin: 50px auto;
    background-color: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Form styles */
#emailForm {
    margin-top: 20px;
}

label {
    font-weight: bold;
}

input[type="text"],
input[type="email"],
textarea {
    width: 100%;
    padding: 10px;
    margin: 8px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
}

textarea {
    resize: vertical;
    height: 100px;
}

button[type="submit"] {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button[type="submit"]:hover {
    background-color: #0056b3;
}




        /* CSS styles */
        /*.container {
            max-width: 600px;
            margin: 50px auto;
        }

        .email-form {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            width: calc(100% - 40px);
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        textarea {
            resize: vertical;
            height: 100px;
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
        }*/
    </style>
</head>
<body>
    <div class="container">
        <div class="email-form">
            <h2>Contact Us</h2>
            <form id="emailForm" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <label for="name">Your Name:</label><br>
                <input type="text" id="name" name="name" required><br>
                <label for="email">Your Email:</label><br>
                <input type="email" id="email" name="email" required><br>
                <label for="message">Message:</label><br>
                <textarea id="message" name="message" required></textarea><br>
                <button type="submit">Send Email</button>
            </form>
        </div>
    </div>

    <!-- Email Support Modal -->
    <div id="emailSupportModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Email Support Response</h2>
            <p id="emailResponse"></p>
        </div>
    </div>

    <script>
        // JavaScript code
        const emailForm = document.getElementById('emailForm');
        const emailSupportModal = document.getElementById('emailSupportModal');
        const emailResponse = document.getElementById('emailResponse');

        emailForm.addEventListener('submit', function(event) {
            event.preventDefault();
            const formData = new FormData(emailForm);
            const name = formData.get('name');
            const email = formData.get('email');
            const message = formData.get('message');
            
            // Simulating email sending (replace with actual email sending code)
            const response = `Thank you for your email, ${name}. We will respond to you at ${email} as soon as possible.`;
            emailResponse.textContent = response;
            emailSupportModal.style.display = 'block';
        });

        // Close the modal when the close button is clicked
        document.querySelector('.close').addEventListener('click', function() {
            emailSupportModal.style.display = 'none';
        });

        // Close the modal when clicking outside of it
        window.addEventListener('click', function(event) {
            if (event.target === emailSupportModal) {
                emailSupportModal.style.display = 'none';
            }
        });
    </script>
</body>
</html>
