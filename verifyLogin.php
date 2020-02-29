<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Verify</title>
    </head>
    <?php


        session_start(); 
        // if(isset($_SESSION['username'])){
        //     echo $_SESSION['username'];
        //     echo $_SESSION['userlevel'];
        // }
    ?>

    <?php
        
    	$username=$_POST['username'];
        $password=$_POST['password'];
    	$con=mysqli_connect("localhost","root");
    	mysqli_select_db($con,"lab3");
    	$query="SELECT * FROM employees WHERE username='$username' AND password='$password';";
    	$result=mysqli_query($con,$query);
        $num_rows=mysqli_num_rows($result);
    	$row=mysqli_fetch_assoc($result);
    	
        if($num_rows==1){   
            session_start();     
            $_SESSION['username']=$username;
            $_SESSION['userlevel']=$row['userlevel'];  
            header('Location: home.php');
        }
        else{
            $_SESSION['error']="invalid username or password";
            header("Location: index.php");
        }
    ?>
    <body>
        <h2>
           
            
        </h2>
            
    </body>

</html>