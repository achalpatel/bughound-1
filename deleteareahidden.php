<?php
                    $area_id = $_POST['delete_area'];
                    $con = mysqli_connect("localhost","root");
<<<<<<< HEAD
                    mysqli_select_db($con, "lab3");
=======
                    mysqli_select_db($con, "bughound");
>>>>>>> branch_achal
                     $query = "delete from areas where area_id = '".$area_id."';";
                     mysqli_query($con, $query);
                     header('location: programtable.php');
                    if(! $con ) {
                      die('Could not connect: ' . mysqli_error());
                    }    
            
          else {
            echo "0 results";
         }
?>
