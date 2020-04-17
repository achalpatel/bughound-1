<<<<<<< HEAD
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
  		$prog_name=$_POST['prog_name'];
  		$prog_release=$_POST['prog_release'];
  		$prog_version=$_POST['prog_version'];
  		$con = mysqli_connect("localhost","root");
		mysqli_select_db($con, "lab3");
		
		$result=mysqli_query($con,$query);
		
		header("Location: ../editprogram.php");

  	?>
</body>
=======
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
  		$prog_name=$_POST['prog_name'];
  		$prog_release=$_POST['prog_release'];
  		$prog_version=$_POST['prog_version'];
  		$con = mysqli_connect("localhost","root");
		mysqli_select_db($con, "bughound");
		
		$result=mysqli_query($con,$query);
		
		header("Location: ../editprogram.php");

  	?>
</body>
>>>>>>> branch_achal
</html>