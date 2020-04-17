<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<h2>hiii</h2>
</body>
</html>
<?php
                    $emp_id = isset($_GET['emp_id']) ? $_GET['emp_id'] : '0';
// $emp_id = $_GET['emp_id'];
                   $con = mysqli_connect("localhost","root");
                    mysqli_select_db($con, "bughound");
                     $query = "delete from employees where emp_id = '".$emp_id."';";
                     mysqli_query($con, $query);
                     header('location: ../showemp.php');
                    if(! $con ) {
                      die('Could not connect: ' . mysqli_error());
                    }    
            
          else {
            echo "0 results";
         }
?>
