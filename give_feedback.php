<?php
// Database configuration
    $host="localhost";
    $user="root";
    $password="";
    $db="lms";

$conn = new mysqli($host,$user,$password,$db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $student_name = $_POST['student_name'];
    $feedback = $conn->real_escape_string($_POST['feedback']); // Escape special characters
    $teacher_name = $_POST['teacher_name'];

    // Insert feedback into database
    $sql = "INSERT INTO feedback (student_name, feedback, teacher_name) VALUES ('$student_name', '$feedback', '$teacher_name')";
    if ($conn->query($sql) === TRUE) {
        echo "<script type='text/javascript'>
                alert('Feedback submitted successfully!');
                </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Feedback Form</title>
     <style>
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="text"],
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Teacher Feedback Form</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="student_name">Student Name:</label>
            <input type="text" id="student_name" name="student_name" required><br><br>

            <label for="feedback">Feedback:</label><br>
            <textarea id="feedback" name="feedback" rows="4" required></textarea><br><br>

            <label for="teacher_name">Your Name:</label>
            <input type="text" id="teacher_name" name="teacher_name" required><br><br>

            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
</body>
</html>

<?php
// Close database connection
$conn->close();
?>
