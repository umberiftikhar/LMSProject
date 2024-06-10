<?php
    $host="localhost";
    $user="root";
    $password="";
    $db="lms";

// Create database connection
$conn = new mysqli($host,$user,$password,$db);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Content and Course Inquiries</title>
    <link rel="stylesheet" href="">
</head>
<body>
    <div class="container">
<?php 

        $sql = "SELECT * FROM content_inquiries ORDER BY created_at DESC";
            $result = $conn->query($sql);
     if ($result->num_rows > 0) {
        echo "<h2>Content and Course Inquiries</h2>";
        echo "<table>";
        echo "<tr><th>Name</th><th>Email</th><th>Inquiry</th><th>Date</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["inquiry"] . "</td>";
        echo "<td>" . $row["created_at"] . "</td>";
        echo "</tr>";
    }
        echo "</table>";
} else {
        echo "No inquiries found";
}

?> 
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

h2 {
    color: #333;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    border: 1px solid #ccc;
    padding: 8px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
    font-weight: bold;
}

tr:nth-child(even) {
    background-color: #f9f9f9;
}

</style>