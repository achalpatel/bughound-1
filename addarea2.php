<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
<<<<<<< HEAD
        <title>CECS 544 Lab 1 Page 2</title>
    </head>
    <body>
=======
        <title>Area</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

		<!-- Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

		<!-- Jquery UI (Datepicker) -->
		<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		<!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
		<!-- Custom CSS -->
		<link rel="stylesheet" href="css/style.css">
    </head>
    <?php   
        session_start();
        if(isset($_SESSION['last_action']))
        {
          if(time() - $_SESSION['last_action']>1800)
          {
            session_unset();
            session_destroy();  
          }
        }
        $_SESSION['last_action'] = time();
        if(isset($_SESSION['username'])){
             'Username - '.$_SESSION['username']." ";
             'User Level - '.$_SESSION['userlevel'];
        }
        else{
          header("Location: index.php");
        }
    ?>
    <body>
    	<?php if($_SESSION['userlevel']!=3){
        	header("Location: home.php");
    	}?>
>>>>>>> branch_achal
        <h2>
          

            <?php
<<<<<<< HEAD
                $prog_id = $_POST['prog_id'];
                $area = $_POST['area'];
                

                // printf("You entered %s %s %s %s as your name.<p>",$first,$last,$password,$userlevel);
                    $con = mysqli_connect("localhost","root");
                    mysqli_select_db($con, "lab3");
                     $query = "INSERT INTO areas (prog_id, area) VALUES ('".$prog_id."','".$area."')";
                    // echo $query;
                    mysqli_query($con, $query);
            ?>

            
            You have successfully completed trial!
            <p>
            <input type="button" value="Return" id=button1 name=button1 onclick="go_home()">    
        </h2>
        <script language=Javascript>
            function go_home(){
                window.location.assign("addarea.php");
            }
        </script>
            
=======
                $con = mysqli_connect("localhost","root");
                if(! $con ) {
                    die('Could not connect: ' . mysqli_error());
                } 
                $prog_id = mysqli_real_escape_string($con, $_POST['prog_id']);
                $area = mysqli_real_escape_string($con, $_POST['area']);       
                      
	            mysqli_select_db($con, "bughound");
	            $query1 = "INSERT INTO areas (prog_id, area) VALUES ('".$prog_id."','".$area."')";
	            $query2 = "SELECT areas.area_id, areas.prog_id, areas.area, programs.program FROM areas INNER JOIN programs ON areas.prog_id=programs.prog_id WHERE areas.prog_id=$prog_id AND areas.area='$area';";
	            $result2=mysqli_query($con, $query2);
                if(mysqli_num_rows($result2)>0):?>
                    <h1>Area name already exists!!</h1>
                <?php else:mysqli_query($con, $query1); ?>
                    <h1>Area added sucessfully!!</h1>
                <?php endif; ?>
         
            <!-- <input type="button" value="Return" id=button1 name=button1 onclick="go_home()"> -->
            <button class="btn btn-primary w-80"  style="float: right; margin-left: 15px;" type="button" onclick="go_home()">Return Home</button>
            <button class="btn btn-primary w-80"  style="float: right; margin-left: 15px;" type="button" onclick="go_back()">Add again</button>
            
        <script language=Javascript>
            function go_back(){
                window.location.replace("addarea.php");
            }
            function go_home(){
                window.location.replace("home.php");
            }
        </script>
 

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
>>>>>>> branch_achal
    </body>
</html>