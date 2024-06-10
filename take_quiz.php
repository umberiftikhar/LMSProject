<?php
session_start();

if(!isset($_SESSION['username']))
{
    header("location:login.php");
}
// Process form submission and save answers to the database
    // Connect to your database
    $host="localhost";
    $user="root";
    $password="";
    $db="lms";

$conn = new mysqli($host,$user,$password,$db);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    if(isset($_POST['add_answer'])){
        if(!count( array_filter($_POST['answers'])) == 0){
            
            $answers = $_POST['answers'];
            $qus_id = $_POST['hiddn_id'];
            $count = count($answers);
    
    for ($i = 0; $i < $count; $i++) {
            $answer = $conn->real_escape_string($answers[$i]);
            $id = $conn->real_escape_string($qus_id[$i]);
           
            $sql = "UPDATE questions SET answer = '$answer' WHERE id = '$id'";
            $conn->query($sql);
            }

            echo " <script type='text/javascript'>
        
            alert('Answer Submitted Successfully!');

            </script>";

        }
        else
        {
            echo " <script type='text/javascript'>
        
            alert('Please Write atleast one Answer!');

            </script>";

        }

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
    <title>Take Quiz</title>
    
</head>
<body>
<?php
       
    if(isset($_SESSION['id'])){

    $std_id = $_SESSION['id'];

    $sqlstd="SELECT * FROM studentcourses WHERE std_id='".$std_id."'";

    $resultstd=mysqli_query($conn, $sqlstd);
    
    if($resultstd->num_rows > 0){ 

?>
    <form action="" method="post">
        <div id="questions-container">
<?php
  // Loop through submitted questions and answers and save to database

    $sql = "SELECT * FROM questions WHERE 1 ";
    $result=mysqli_query($conn,$sql);
       
      while($row = mysqli_fetch_array($result)){
    

?>
            <div class="question">
                <p>Question : <?php echo $row['question']; ?> </p>
                <p>Answer :</p>
                <textarea type="text" name="answers[]" placeholder="Write Answer Here"></textarea>
                <!--<input type="text" name="answers[]" placeholder="Write Answer Here">-->
                <input type="hidden" name="hiddn_id[]" value="<?php echo $row['id']; ?>">
            </div>

    <?php } ?>
            
        </div>

        <br>

       <button class="button primary-button" name="add_answer" type="submit">Submit Answers</button>

       <a href="sbj_feedback.php" class="button primary-button">Show Feedback</a>

    </form>

       
 <?php
}else{

        echo " <script type='text/javascript'>
        
            alert('You are not illigable to take quiz! Please first enroll for subjects');

            </script>";
}

}
 

    $conn->close();

    ?>      

</body>
</html>
