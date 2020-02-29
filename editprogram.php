<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Add Program</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

    <!-- Jquery UI (Datepicker) -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php 
        $con = mysqli_connect("localhost","root");
        mysqli_select_db($con, "lab3");
        if(isset($_GET['p_id'])){          
          $p_id=$_GET['p_id'];
          $p_name=$_GET['prog_name']; 
          $p_release=$_GET['prog_release'];
          $p_version=$_GET['prog_version']; 
          $query1="UPDATE programs SET program='$p_name', program_release='$p_release', program_version='$p_version' WHERE prog_id=$p_id;";
          mysqli_query($con,$query1);
        }      

     ?>
    <div class="container" style="">
        <h2 class="text-center my-4">Programs</h2>    
          <?php 
            
            $query="SELECT * FROM programs";
            $result=mysqli_query($con,$query);
            echo "<table border=1 ><th>Program</th><th>Version</th><th>Release</Th>\n";
            if(mysqli_num_rows($result)>0){
              while($row=mysqli_fetch_row($result)){
                ?>
                <tr>
                  <td><a href="program_edit.php/?id=<?php echo $row[0]; ?>"><?php echo $row[1]; ?></a></td>
                  <td><?php echo $row[2]; ?></td>
                  <td><?php echo $row[3]; ?></td>
                </tr>
                <?php  
              }
            }
            ?>
        </table>
        </div>
    </div>
  

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</body>
</html>