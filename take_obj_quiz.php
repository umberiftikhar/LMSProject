<?php
session_start();
if(!isset($_SESSION['username']))
{
    header("location:login.php");
}

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
        $qsid = $_POST['hiddn_id'];
             $answer = $_POST['options'];

             foreach ($answer as $key => $selcted) {  
            
             $sql = "UPDATE quiz_system SET submitted_ans = '$selcted' WHERE id = '$key'";
             $conn->query($sql);
    


             $sql2 = "SELECT * FROM quiz_system WHERE id = '$key'";
                $result=mysqli_query($conn,$sql2);

                  while($row = mysqli_fetch_array($result)){
                    if($row['submitted_ans'] === $row['correct_ans']){
                        echo 'Correct Answer </br>';
                    }else{
                        echo 'Wrong Answer </br>';
                    }
                    }
          
                }

        // }
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
.rad {
    display: block;
    position: relative;
}

</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Take Objective Quiz</title>
    
</head>
<body>
<?php
     
    if(isset($_SESSION['id'])){

    $std_id = $_SESSION['id'];

    $sqlstd="SELECT * FROM studentcourses WHERE std_id='".$std_id."'";

    $resultstd=mysqli_query($conn, $sqlstd);
   // echo $i;
    if($resultstd->num_rows > 0){ 

?>
    <form action="" method="post">
        <div id="questions-container">
<?php
  // Loop through submitted questions and answers and save to database
  
    $sql = "SELECT * FROM quiz_system WHERE 1";
    $result=mysqli_query($conn,$sql);
       
      while($row = mysqli_fetch_array($result)){
        $ansopts = explode(',', $row['options']);
        //print_r($ansopts);

        
        //$sql= "SELECT * FROM quiz_system WHERE id = '$number'";
        

?>
            <div class="question">
                
                <p>Question : <?php echo $row['quiz']; ?> </p>
                
                <?php  foreach ($ansopts as $key => $opt) {
                  $id = $row['id'];
                  //echo $opt; 

                ?>

        <label class="rad"><input type="radio" name="options[<?php echo $id ?>]" value="<?php echo $opt; ?>">
        <?php echo $opt; ?>
        </label>
            <?php } ?> 
                <!--<input type="text" name="answers[]" placeholder="Write Answer Here">-->
                <input type="hidden" name="hiddn_id[]" value="<?php echo $row['id']; ?>">
               
            </div>

    <?php } ?>
            
        </div>

        <br>

       <button class="button primary-button" name="add_answer" type="submit">Submit Answers</button>

   <a href="feedback.php" class="button primary-button">Show Feedback</a>

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
