<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edit Area</title>
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
    

    <div class="container">
        <h2 class="text-center my-4">Employee List</h2>
       <table class="table">
          <thead>
            <tr>
              <th scope="col">Emp #</th>
              <th scope="col">Name</th>
              <th scope="col">User Name</th>
              <th scope="col">Password</th>
              <th scope="col">UserLevel</th>
            </tr>
          </thead>

          <?php
                  $emp_id = isset($_GET['emp_id']) ? $_GET['emp_id'] : '0' ;
                  $name = isset($_GET['name']) ? $_GET['name'] : '0' ;
                  $username = isset($_GET['username']) ? $_GET['username'] : '0' ;
                  $password = isset($_GET['password']) ? $_GET['password'] : '0' ;
                  $userlevel = isset($_GET['userlevel']) ? $_GET['userlevel'] : '0' ;
                  $con = mysqli_connect("localhost","root");
                    mysqli_select_db($con, "lab3");
                    echo $name;
                  // $username = isset($_GET["$username"]) ? $_GET["$username"] : 0 ;
                  // $password = isset($_GET["$password"]) ? $_GET["$password"] : 0 ;
                  // $userlevel = isset($_GET["$userlevel"]) ? $_GET["$userlevel"] : 0 ;
                    // $query = "UPDATE employees SET name='".$name."' WHERE emp_id = '" .$emp_id. "';";
                    // $query ="update employees set name = 'static' where emp_id = 1000";
                    $query = "UPDATE employees SET name ='".$name."' username='".$username."' password='".$password."' userlevel='".$userlevel."' where emp_id = '".$emp_id."';";
                      
                  // $query = "UPDATE employees SET name='".$name."' username='".$username."' password='".$password."'' userlevel='".$userlevel."' WHERE emp_id = '" .$emp_id. "';"; 
                    mysqli_query($con, $query);
 
                    
                    $query = "SELECT * FROM employees";    
                    mysqli_query($con, $query);
                    if(! $con ) {
            die('Could not connect: ' . mysqli_error());
         }
         
         
         $result = mysqli_query($con, $query);

            ?>
          <tbody>


            <?php
            
              if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
              
               ?>

               <tr>
                   <td><span><?php echo $row["emp_id"] ?> </span></td>
                   <td><span><?php echo $row["name"] ?> </span></td>
                   <td><span><?php echo $row["username"] ?> </span></td>
                   <td><span><?php echo $row["password"] ?> </span></td>
                   <td><span><?php echo $row["userlevel"] ?> </span></td>
                  <td> <button type="submit" name="update" class="btn btn-primary"  style="float: right;" onclick="dance('<?php echo $row["emp_id"]?>');">Update</button></td>
               </tr>
               <?php
            }
?>
            

        <?php } else {
            echo "0 results";
         }
            ?>
            
          </tbody>
        </table>

        <button type="button" class="btn btn-primary" style="float: right;">Done</button>
    </div>

  

     
            


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">
      function dance(emp_id) {
        window.open("editemp.php/?emp_id="+emp_id,"_self");
        // body...
      }
    </script>

</body>
</html>