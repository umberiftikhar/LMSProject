<?php

    $host="localhost";
    $user="root";
    $password="";
    $db="lms";

$conn = new mysqli($host,$user,$password,$db);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


if(isset($_POST['add_quiz'])){
        if(!empty($_POST['quiz'])){
            
    $quiz_system = $_POST['quiz'];
    $options = $_POST['option'];
    $c_ans = $_POST['corctans'];
    
    
   
    $alloptions = implode(',', $options);
    //print_r($alloptions);
    $quiz = $conn->real_escape_string($quiz_system);
    $alloptions = $alloptions;


        
        $sql = "INSERT INTO quiz_system (quiz, options, correct_ans) VALUES ('$quiz', '$alloptions', '$c_ans')";
        $conn->query($sql);
      //  }

        echo " <script type='text/javascript'>
        
            alert('Question Added Successfully');

            </script>";

    }else{
        echo " <script type='text/javascript'>
        
            alert('Please Add Question First');

            </script>";

    }
}


   $conn->close();

?>



<style type="text/css">
   body {
    font-family: Arial, sans-serif;
    background-image: url('qa.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    margin: 0;
    padding: 0;
}

form {
    background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
    padding: 20px;
    border-radius: 10px;
    margin: 100px auto; /* Center the form */
    max-width: 500px;
}

input[type="text"] {
    width: 100%;
    padding: 10px;
    margin: 8px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

input[type="submit"] {
    width: 100%;
    background-color: #007bff; /* Blue submit button */
    color: #fff;
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #0056b3; /* Darker blue on hover */
}


/* Button Styles */
.button {
  display: inline-block;
  padding: 10px 20px;
  font-size: 16px;
  font-weight: bold;
  text-align: center;
  text-decoration: none;
  cursor: pointer;
  border: none;
  border-radius: 5px;
}

/* Primary Button Styles */
.primary-button {
  color: #fff;
  background-color: #007bff;
}

.primary-button:hover {
  background-color: #0056b3;
}


</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Quiz</title>
    
</head>
<body>

    <form action="" method="post">
        <div id="questions-container">
            <div class="question">
                <p>Question :</p>
                <input type="text" name="quiz" placeholder="Enter Quiz Here">
                <input type="text" name="option[]" placeholder="Enter Option 1">
                <input type="text" name="option[]" placeholder="Enter Option 2">
                <input type="text" name="option[]" placeholder="Enter Option 3">
                <input type="text" name="option[]" placeholder="Enter Option 4">

                <input type="text" name="corctans" placeholder="Write correct Answer Here">
            </div>
        </div>
        <button class="button primary-button" name="add_quiz" type="submit" onsubmit="addQuiz()">Add Quiz</button>
    
    </form>

    <script>
        function addQuiz() {
            const questionsContainer = document.getElementById('questions-container');
            const questionDiv = document.createElement('div');
            questionDiv.classList.add('quiz');
            const questionNumber = questionsContainer.children.length + 1;
            questionDiv.innerHTML = `
                <p>Quiz ${questionNumber}:</p>
                <input type="text" name="quiz" placeholder="Enter Question Here">
                <input type="text" name="options" placeholder="Write Answer Here">
            `;
            questionsContainer.appendChild(questionDiv);
        }
    </script>
</body>
</html>
