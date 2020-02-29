<!DOCTYPE html>
<html>
<head>
	<title>Logout</title>
</head>
<body>
	<?php 
		session_start();
		if(isset($_SESSION['username'])){
			unset($_SESSION['username']);
			unset($_SESSION['userlevel']);
			header("Location: home.php");
		}
		else{
			header("Location: home.php");
		}
	 ?>
</body>
</html>