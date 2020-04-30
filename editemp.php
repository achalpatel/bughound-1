<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Add Employee</title>
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
            echo 'Username - '.$_SESSION['username']." ";
            echo 'User Level - '.$_SESSION['userlevel'];
        }
        else{
          header("Location: index.php");
        }
    ?>
<body>
  <?php if($_SESSION['userlevel']!=3){
        header("Location: home.php");
    }?>
      <?php if(isset($_SESSION['username'])): ?>
        <ul class="nav justify-content-end">
          <li class="nav-item">
            <a class="nav-link" href="../home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../logout.php">Logout</a>
          </li>
        </ul>
      <?php endif; ?>
 <h2 class="text-center my-4">Edit Employee</h2>

         <?php
  
                    $emp_id = isset($_GET['emp_id']) ? $_GET['emp_id'] : '0';
                    $con = mysqli_connect("localhost","root");
                    if(! $con ) {
                    die('Could not connect: ' . mysqli_error());
                    }
                    mysqli_select_db($con, "bughound_test1");
                    $query = "SELECT * FROM employees where emp_id = '".$emp_id."';";                                        
                    $result = mysqli_query($con, $query);
                    $row = mysqli_fetch_assoc($result);
            ?>
            <table>
              <tbody>
            
               <tr>
                <form name= "edit_form" method="POST" action="../editemp2.php">
                  <div id="addempForm" class="container">
                      <div class="row ">
                        <input type="hidden" value="<?php echo $row["emp_id"] ?>" name="e_id"/>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                             <label for="name">Name</label>
                             <input type="text" id="name" class="form-control" name="name" value="<?php echo $row["name"]; ?>">
                          </div>
                        </div> 
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                             <label for="name">Username</label>
                             <input type="text" id="username" class="form-control" name="username" value="<?php echo $row["username"]; ?>">
                          </div>
                        </div> 
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                             <label for="name">Password</label>
                             <input type="text" id="password" class="form-control" name="password" value="<?php echo $row["password"]; ?>">
                          </div>
                        </div> 
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                             <label for="name">Userlevel</label>
                             <input type="text" id="userlevel" class="form-control" name="userlevel" value="<?php echo $row["userlevel"]; ?>">
                          </div>
                        </div> 
                      </div>
                 <button type="submit" name="update" class="btn btn-primary">Update</button>
                 </form>
                 <div class="col-md-1">
              <div class="form-group">
                <button class="btn btn-primary w-100" style="margin-top: 10px" onclick="go_back()">Back</button>
              </div>
            </div> 
            </tr>

            
          
        
            
          </tbody>
        </table>

       
    </div>
   
    

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">
      function go_back(){
        window.location.assign("../showemp.php");
      }
      function dance(emp_id,name) {
        
        var name = document.getElementById("name").value;
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;
        var userlevel = document.getElementById("userlevel").value;
        window.open("../showemp.php/?name="+name+"&username="+username+"&password="+password+"&userlevel="+userlevel,"_self");
        alert(name);
        
        // window.open("../showemp.php/?emp_id="+emp_id+"&name='"+name+"'&username='"+username+"'&password=' "+password+"'userlevel='"+userlevel+"';");
        // body...
      }
    </script>

</body>
</html>