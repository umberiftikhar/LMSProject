<?php 

	$host="localhost";
	$user="root";
	$password="";
	$db="lms";

	if(!empty($_POST["selcted_course"])) {

	$course_id = $_POST['selcted_course'];

	$data=mysqli_connect($host,$user,$password,$db);
	$subjects="select * from courses where id = '$course_id'";
	$sbj=mysqli_query($data, $subjects);
	print_r($sbj);
	while($sbjdata=mysqli_fetch_array($sbj)){
	$parts = explode(',', $sbjdata['subjects']); 
	foreach ($parts as $pardata) {
	
	?>
	<option name=""><?php echo $pardata; ?></option>
<?php
		}
	}
	
}

?>