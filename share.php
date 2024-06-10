<?php
// Database connection
    $host="localhost";
    $user="root";
    $password="";
    $db="lms";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if name and achievement are set in the POST array
    if (isset($_POST['name']) && isset($_POST['achievement'])) {
        // Get form data
        $name = $_POST['name'];
        $achievement = $_POST['achievement'];

        // Create connection
        $conn = new mysqli($host,$user,$password,$db);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare SQL statement
        $sql = "INSERT INTO achievements (name, achievement) VALUES (?, ?)";
        
        // Prepare and bind parameters
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $name, $achievement);
        
        // Execute SQL statement
        if ($stmt->execute() === TRUE) {
             echo "<script type='text/javascript'>
                alert('Achievement submitted successfully!');
                </script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        // Close connections
        $stmt->close();
        $conn->close();
    } else {
        // Handle case where name or achievement is missing
        echo "Name or achievement is missing!";
    }
} // else {
//     // Handle case where form is not submitted
//     echo "Form not submitted!";
// }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Community</title>
    <link rel="stylesheet" href="">
</head>
<body>
    <div class="container">
        <h1>Welcome to the Student Community!</h1>
        <form action="" method="POST">
            <label for="name">Your Name:</label>
            <input type="text" id="name" name="name" required>
            <label for="achievement">Share Your Achievement or Ask a Question:</label>
            <textarea id="achievement" name="achievement" rows="4" required></textarea>
            <button type="submit">Submit</button> <br><br>
            <div class="share-buttons">
                <a href="#" class="share-facebook"><img src="fb.png" alt="Facebook Icon"></a> 
                <a href="#" class="share-twitter"><img src="tw.png" alt="Twitter Icon"> </a>
                <a href="#" class="share-whatsapp"><img src="wa.png" alt="Whatsapp Icon"></a>
                <a href="#" class="share-instagram"><img src="insta.png" alt="Instagram Icon"></a>
            </div>
        </form>
</body>
</html>



<style type="text/css">
  /* Reset default browser styles */
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

/* Body styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
}

/* Container styles */
.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
}

/* Heading styles */
h1 {
    font-size: 24px;
    margin-bottom: 20px;
    color: #333;
}

/* Form styles */
form {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

input[type="text"],
textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: none;
}

button {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

button:hover {
    background-color: #0056b3;
}

/* Share buttons styles */
.share-buttons {
    margin-top: 20px;
}

.share-buttons a {
    display: inline-block;
    text-decoration: none;
    color: #007bff;
    margin-right: 10px;
}

.share-buttons img {
    width: 34px;
    height: 34px;
    vertical-align: middle;
    margin-right: 5px;
}

</style>




<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
    // Share on Facebook
    document.querySelector('.share-facebook').addEventListener('click', function(e) {
        e.preventDefault();
        var achievement = document.getElementById('achievement').value;
        var url = 'https://www.facebook.com/' + encodeURIComponent(window.location.href) + '&quote=' + encodeURIComponent(achievement);
        window.open(url, '_blank');
    });

    // Share on Twitter
    document.querySelector('.share-twitter').addEventListener('click', function(e) {
        e.preventDefault();
        var achievement = document.getElementById('achievement').value;
        var url = 'https://twitter.com/intent/tweet?url=' + encodeURIComponent(window.location.href) + '&text=' + encodeURIComponent(achievement);
        window.open(url, '_blank');
    });

    // Share on Whatsapp
    document.querySelector('.share-whatsapp').addEventListener('click', function(e) {
        e.preventDefault();
        var achievement = document.getElementById('achievement').value;
        var url = 'https://web.whatsapp.com/' + encodeURIComponent(window.location.href) + '&quote=' + encodeURIComponent(achievement);
        window.open(url, '_blank');
    });

    // Share on Instagram
    document.querySelector('.share-instagram').addEventListener('click', function(e) {
        e.preventDefault();
        var achievement = document.getElementById('achievement').value;
        var url = 'https://www.instagram.com/' + encodeURIComponent(window.location.href) + '&quote=' + encodeURIComponent(achievement);
        window.open(url, '_blank');
    });

});

</script>