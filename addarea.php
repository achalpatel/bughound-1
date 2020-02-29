<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>New bug</title>
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
                     $query = "SELECT * FROM programs";
                     mysqli_query($con, $query);
                    if(! $con ) {
                      die('Could not connect: ' . mysqli_error());
                    }
                    $result = mysqli_query($con, $query);
                    if (mysqli_num_rows($result) > 0) {
                      
                      ?>
                      <div class="container">
                      <h2 class="text-center my-4">Add Area</h2>
                      <div id="newBugForm" class="container">
                          <form action="addarea2.php" method="post">
                              <div class="row">
                                  <div class="col-12 col-md-4">
                                     <div class="form-group">
                                          <label for="program">Program</label>
                                          <select name="prog_id" class="form-control" id="program">                      
                      <?php
                      while($row = mysqli_fetch_assoc($result)) {
                         ?>
                              <option value="<?php echo $row["prog_id"] ?>"><?php echo $row["program"] ?><h6>&nbsp-</h6> <?php echo $row["program_version"] ?><h6>&nbsp-</h6> <?php echo $row["program_release"] ?></option>        
              <?php
            }
            ?>
             </select>

              <label for="name"     style="margin-top: 15px;"">Area Name</label>
                             <input id= "area" type="text" class="form-control update" name="area" value="<?php echo $row["area"]; ?>">

              </div>
                    <button class="btn btn-primary w-80"  style="float: right" type="submit" >Submit</button>
                    <button class="btn btn-primary w-80"  style="float: right; margin-left: 15px;" type="button" onclick="go_back()">Back</button>
                    </div>
                    

                    </div>
                  </div>     

            </form>
        </div>
    </div>     
             <?php
         } else {
            echo "0 results";
         }
            ?>


                     
    

    
    



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script type="text/javascript">
     function go_back(){
        window.location.replace("maintaindb.php");
      }
    </script>

</body>
</html>