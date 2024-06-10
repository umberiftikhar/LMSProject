
<?php

    $host="localhost";
    $user="root";
    $password="";
    $db="lms";

$conn = new mysqli($host,$user,$password,$db);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

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
    background-color: rgba(255, 255, 255, 0.8);
    padding: 20px;
    border-radius: 10px;
    margin: 100px auto;
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
    background-color: #007bff; 
    color: #fff;
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #0056b3; 
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
    <title>View Questions</title>
    
</head>
<body>
<?php


    if(isset($_POST['add_score'])){
        if(!empty($_POST['score'])){
        $score = $_POST['score'];
        $qid = $_POST['qid'];
       // print_r($score);
        foreach ($score as $key => $val) {
        //$gain_score = $conn->real_escape_string($score);
            // echo $key;
            // echo $val;
        $sql2 = "UPDATE questions SET gain_score = '$val' WHERE id = '$key'";
        $conn->query($sql2);
        
        }

        echo " <script type='text/javascript'>
        
            alert('Gain Score Added Successfully!');

            </script>";
     }
     else
     {
        echo " <script type='text/javascript'>
        
            alert('Please Add Gain Score!');

            </script>";

     }
}
    
  // Loop through submitted questions and answers and save to database
    $sql = "SELECT * FROM questions WHERE 1 ";
    $result=mysqli_query($conn,$sql);
?>
<form action="" method="post">      
    
<?php
      while($row = mysqli_fetch_array($result)){
    

?>
    
        <div id="questions-container">
            <div class="question">
                <p style="font-weight: bold;">Question :</p>
               <p style="background-color: rgba(255, 255, 255, 0.8);"> <?php echo $row['question']; ?> </p>
                <p style="font-weight: bold;">Answer :</p>
                <p style="background-color: rgba(255, 255, 255, 0.8);"> <?php echo $row['answer']; ?> </p>

                <input type="hidden" name="qid[]" value="<?php echo $row['id']; ?>" placeholder="">
                <input type="text" name="score[<?php echo $row['id']; ?>]" placeholder="Enter Gain Score">
            </div>
        </div>

   

   
       
 <?php
 
}
?>
 <button class="button primary-button" name="add_score" type="submit">Add Gain Score</button>
 </form>
<?php
    $conn->close();

    ?>      

    
    <script>
        function addGainscore() {
            const questionsContainer = document.getElementById('questions-container');
            const questionDiv = document.createElement('div');
            questionDiv.classList.add('question');
            const questionNumber = questionsContainer.children.length + 1;
            questionDiv.innerHTML = `
                <input type="text" name="score" placeholder="Enter Score Of Question">
            `;
            questionsContainer.appendChild(questionDiv);
        }
    </script>


</body>
</html>
