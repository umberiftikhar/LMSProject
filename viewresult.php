<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Result</title>
</head>
<style>
    body {
  font-family: Arial, sans-serif;
  background-color: #f0f0f0;
  margin: 0;
  padding: 0;
}

.container {
  height: 300px;
  width: 400px;
  margin: 10px auto;
  background-color: #acd2f5;
  padding: 10px;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}
table, th, td {
  border: 1px solid rgb(87, 87, 87);
  background-color: #acd2f5;
  box-shadow: #acd2f5;
  border-radius: 3px solid rgb(0, 89, 255);
}
h2 {
  text-align: center;
  color: #333;
}

form {
  margin-top: 20px;
}



    </style>

<body> --> 
<?php 
//     $host="localhost";
//     $user="root";
//     $password="";
//     $db="lms";

// $conn = new mysqli($host, $user, $password, $db);

// Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// $sql = "SELECT * FROM result WHERE 1";
// $result = $conn->query($sql);

// if ($result !== false && $result->num_rows > 0) {
//     echo '<h2>Result</h2>';
    
//     $row_question = $result->fetch_assoc(); 
    
    
//     echo '<div class="container">';
//     echo '<table>';
//     echo '<tr>';
//     echo '<th><label for="Course">Course:</label></th>';
    // echo '<th><label for="papertype">Paper Type:</label></th>';
    // echo '<th><label for="totalpoints">Total Points:</label></th>';
    // echo '<th><label for="obtainedmarks">Obtained Marks:</label></th>';
    // echo '</tr>';
    // echo '<tr>';
    
    // // Display Course
    // echo '<td>';
    // switch ($row_question["Course"]) {
    //     case "os":
    //         echo 'Operating System';
    //         break;
    //     case "dbstruct":
    //         echo 'Data Structure';
    //         break;
    //     case "auto":
    //         echo 'Theory of Automata';
    //         break;
    //     case "oop":
    //         echo 'C++';
    //         break;
    //     default:
    //         echo 'Unknown Course';
    // }
    // echo '</td>';

    // // Display Paper Type
    // echo '<td>';
    // switch ($row_question["papertype"]) {
    //     case "Obj":
    //         echo 'MCQ';
    //         break;
    //     case "Short":
    //         echo 'Short';
    //         break;
    //     case "Long":
    //         echo 'Long';
    //         break;
    //     case "assign":
    //         echo 'Assignment';
    //         break;
    //     default:
//             echo 'Unknown Paper Type';
//     }
//     echo '</td>';

//     // Display Total Points
//     echo '<td>' . $row_question["totalpoints"] . '</td>';
    
//     // Display Obtained Marks
//     echo '<td>' . $row_question["obtainedmarks"] . '</td>';

//     echo '</tr>';
//     echo '</table>';
//     echo '</div>';
  
// }


// ?>
<!-- 
</body>
</html>
 -->




 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
    <style type="text/css">
        body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 800px;
    margin: 20px auto;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    padding: 10px;
    border: 1px solid #ddd;
}

th {
    background-color: #f2f2f2;
    font-weight: bold;
}

th, td {
    text-align: left;
}

h2 {
    text-align: center;
    color: #333;
}

    </style>
</head>
<body> 
<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "lms";

    $conn = new mysqli($host, $user, $password, $db);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM result WHERE 1";
    $result = $conn->query($sql);

    if ($result !== false && $result->num_rows > 0) {
        echo '<h2>Result</h2>';

        echo '<div class="container">';
        echo '<table>';
        echo '<tr>';
        echo '<th><label for="StudentID">Student ID:</label></th>';
        echo '<th><label for="Course">Course:</label></th>';
        echo '<th><label for="papertype">Paper Type:</label></th>';
        echo '<th><label for="totalpoints">Total Marks:</label></th>';
        echo '<th><label for="obtainedmarks">Obtained Marks:</label></th>';
        echo '</tr>';

        while ($row_question = $result->fetch_assoc()) {
            echo '<tr>';

            echo '<td>' . $row_question["StudentID"] . '</td>';


            // Display Course
            echo '<td>';
            switch ($row_question["Course"]) {
                case "os":
                    echo 'Operating System';
                    break;
                case "dbstruct":
                    echo 'Data Structure';
                    break;
                case "auto":
                    echo 'Theory of Automata';
                    break;
                case "oop":
                    echo 'C++';
                    break;
                default:
                    echo 'Unknown Course';
            }
            echo '</td>';

            // Display Paper Type
            echo '<td>';
            switch ($row_question["papertype"]) {
                case "obj":
                    echo 'MCQ';
                    break;
                case "short":
                    echo 'Short';
                    break;
                case "long":
                    echo 'Long';
                    break;
                case "assign":
                    echo 'Assignment';
                    break;
                default:
                    echo 'Unknown Paper Type';
            }
            echo '</td>';

            // Display Total Points
            echo '<td>' . $row_question["totalpoints"] . '</td>';

            // Display Obtained Marks
            echo '<td>' . $row_question["obtainedmarks"] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
        echo '</div>';
    } else {
        echo "No results found.";
    }
    $conn->close();
?>
</body>
</html>
