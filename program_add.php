<!DOCTYPE html>
<html>
<head>
	<title>Program added</title>
</head>
<body>
	
<?php
	$prog_name=$_POST['prog_name'];
	$prog_version=$_POST['prog_version'];
	$prog_release=$_POST['prog_release'];
	$con = mysqli_connect("localhost","root");
	mysqli_select_db($con, "lab3");
	$query1="INSERT INTO programs (program, program_version, program_release) VALUES ('".$prog_name."','".$prog_version."','".$prog_release."')";
	$query2="SELECT * FROM programs WHERE program='$prog_name' AND program_release='$prog_release' AND program_version='$prog_version';";
	$result2=mysqli_query($con, $query2);
	
	if(isset($result2) && mysqli_num_rows($result2)>0):?>
		<h1>Same Program already exists</h1>

	<?php else: $result1=mysqli_query($con, $query1); endif;
		
	// if($result){
	// 	$_POST['form_submitted']="1";
	// 	header("Location: addprogram.php");
	// }
	// else{
	// 	header("Location: error.php");
	// }
	?>


<?php if(isset($result1)): ?>
	<h1> Sucessfully added </h1>

<?php else: ?>
	<h1> Error </h1>
<?php endif; ?>
	
<input type="button" name="button1" value="Return" onclick="go_home()">


<script language=Javascript>function go_home(){window.location.replace("addprogram.php");}</script>
</body>
</html>


