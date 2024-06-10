<?php
    $host="localhost";
    $user="root";
    $password="";
    $db="lms";

// Create database connection
$conn = new mysqli($host,$user,$password,$db);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $issue = $_POST['issue'];

    // Insert support request into database
    $sql = "INSERT INTO support_requests (name, email, issue) VALUES ('$name', '$email', '$issue')";
    if ($conn->query($sql) === TRUE) {
        echo "<script type='text/javascript'>
                alert('Support request submitted successfully!');
                </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Technical Support</title>
    <link rel="stylesheet" href="">
</head>
<body>
    <div class="container">
        <h1>Technical Support</h1>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="name">Your Name:</label>
            <input type="text" name="name" id="name" required><br><br>
            
            <label for="email">Your Email:</label>
            <input type="email" name="email" id="email" required><br><br>
            
            <label for="issue">Describe Your Issue:</label><br>
            <textarea name="issue" id="issue" rows="5" required></textarea><br><br>
            
            <button type="submit">Submit Support Request</button>
        </form>
    </div>
</body>
</html>


<style type="text/css">
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

.container {
    max-width: 800px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

h1 {
    color: #333;
}

form {
    margin-top: 20px;
}

label {
    display: block;
    margin-bottom: 5px;
    color: #555;
}

input[type="text"],
input[type="email"],
textarea {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

textarea {
    height: 150px;
}

button {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}

</style>