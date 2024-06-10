<?php
// Step 1: Establishing a connection to the database
    $host="localhost";
    $user="root";
    $password="";
    $db="lms";



$conn = new mysqli($host, $user, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 2: Retrieve form data and insert into database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $StudentIDs = $_POST["StudentID"];
    $Courses = $_POST["Course"];
    $papertypes = $_POST["papertype"];
    $pointsperquestions = $_POST["pointsperquestion"];
    $totalpoints = $_POST["totalpoints"];
    $obtainedmarks = $_POST["obtainedmarks"];

    // Loop through each set of data
    for ($i = 0; $i < count($StudentIDs); $i++) {
        // Escape values to prevent SQL injection
        $StudentID = $conn->real_escape_string($StudentIDs[$i]);
        $Course = $conn->real_escape_string($Courses[$i]);
        $papertype = $conn->real_escape_string($papertypes[$i]);
        $pointsperquestion = $conn->real_escape_string($pointsperquestions[$i]);
        $totalpointsval = $conn->real_escape_string($totalpoints[$i]);
        $obtainedmarksval = $conn->real_escape_string($obtainedmarks[$i]);

        // Insert data into the database
        $sql = "INSERT INTO result (StudentID, Course, papertype, pointsperquestion, totalpoints, obtainedmarks) 
                VALUES ('$StudentID', '$Course', '$papertype', '$pointsperquestion', '$totalpointsval', '$obtainedmarksval')";
        
        if ($conn->query($sql) !== TRUE) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }else{
            echo "Data Submitted Successfully! </br>";
        }
    }

    // if ($conn->query($sql) === TRUE) {
    //     echo "<script type='text/javascript'>
    //             alert('Data submitted successfully!');
    //             </script>";
    // } else {
    //     echo "Error: " . $sql . "<br>" . $conn->error;
    // }
}

// Close connection
$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="subjective.css">
    <title>Performance Report</title>
</head>
<body> 
    <h2>Performance Report</h2>
        
    <form action="" method="post">
        <div class="container">
        <?php for ($i = 0; $i < 4; $i++) { ?>
            <table>
                <tr>
                    <th><label for="StudentID">Student ID:</label></th>
                    <th><label for="Course">Course:</label></th>
                    <th><label for="papertype">Paper Type:</label></th>
                    <th><label for="pointsperquestion">Points Per Question:</label></th>
                    <th><label for="totalpoints">Total Points:</label></th>
                    <th><label for="obtainedmarks">Obtained marks:</label></th>
                </tr>
                <tr>
                    <td><input type="number" name="StudentID[]" id="StudentID" ><br></td>
                    <td><select name="Course[]" id="Course" >
                            <option value="os">Operating System</option>
                            <option value="dbstruct">Data Structure</option>
                            <option value="auto">Theory of Automata</option>
                            <option value="oop">C++</option>
                        </select></td>
                    <td><select name="papertype[]" id="papertype" >
                            <option value="Obj">MCQ</option>
                            <option value="Short">Short</option>
                            <option value="Long">Long</option>
                            <option value="assign">Assignment</option>
                        </select></td>
                    <td><input type="number" name="pointsperquestion[]" id="pointsperquestion" ><br></td>
                    <td><input type="number" name="totalpoints[]" id="totalpoints" ><br></td>
                    <td><input type="number" name="obtainedmarks[]" id="obtainedmarks" ><br></td>
                </tr>
            </table>
            <br>
            <br>
            <?php } ?>
           
            <input type="submit" value="Submit">
        </div>
    </form>
</body>
</html>
