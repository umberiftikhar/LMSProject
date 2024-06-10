<?php

    $host="localhost";
    $user="root";
    $password="";
    $db="lms";

$conn = new mysqli($host,$user,$password,$db);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Loop through submitted questions and answers and save to database
    if(isset($_POST['add_question'])){
        if(!empty($_POST['questions'])){
    $questions = $_POST['questions'];
    $answers = $_POST['answers'];
    $score = $_POST['score'];
    //$count = count($questions);
    
    //for ($i = 0; $i < $count; $i++) {
        $question = $conn->real_escape_string($questions);
        $answer = $conn->real_escape_string($answers);
        $score_of_question = $conn->real_escape_string($score);

        
        $sql = "INSERT INTO questions (question, answer, score_of_question) VALUES ('$question', '$answer', '$score_of_question')";
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
    <title>Add Questions</title>
    
</head>
<body>

    <form action="" method="post">
        <div id="questions-container">
            <div class="question">
                <p>Question :</p>
                <input type="text" name="questions" placeholder="Enter Question Here">
                <input type="text" name="answers" placeholder="Write Answer Here">

                <input type="text" name="score" placeholder="Enter Score Of Question">
            </div>
        </div>
        
        <button class="button primary-button" name="add_question" type="submit" onsubmit="addQuestion()">Add Question</button>
    
    </form>

    <script>
        function addQuestion() {
            const questionsContainer = document.getElementById('questions-container');
            const questionDiv = document.createElement('div');
            questionDiv.classList.add('question');
            const questionNumber = questionsContainer.children.length + 1;
            questionDiv.innerHTML = `
                <p>Question ${questionNumber}:</p>
                <input type="text" name="questions" placeholder="Enter Question Here">
                <input type="text" name="answers" placeholder="Write Answer Here">
                <input type="text" name="score" placeholder="Enter Score Of Question">
            `;
            questionsContainer.appendChild(questionDiv);
        }
    </script>
</body>
</html>
