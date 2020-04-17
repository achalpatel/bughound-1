<<<<<<< HEAD
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
      if(isset($_GET['id'])){
        $p_id=$_GET['id'];      
        $query="SELECT * FROM programs WHERE prog_id='".$p_id."';";
        $result=mysqli_query($con,$query);
        $row=mysqli_fetch_row($result);
      }
  		
  	?>
    <div class="container" style="">
        <h2 class="text-center my-4">Edit Program</h2>    
        <form name="form_prog_add" action="../editprogram.php" method="GET">
        <div id="addempForm">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                 <label for="name"> Program Name</label>
                 <input type="text" class="form-control" id="problem-summary" name="prog_name" placeholder="" value="<?php echo $row[1] ?>">
              </div>
            </div> 
          </div>        

           <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                 <label for="name">Program Release</label>
                 <input type="text" class="form-control" id="problem-summary" name="prog_release" placeholder="" value="<?php echo $row[2] ?>">
              </div>
            </div> 
          </div>
           <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                 <label for="name">Program Version</label>
                 <input type="text" class="form-control" id="problem-summary" name="prog_version" placeholder="" value="<?php echo $row[3] ?>">
              </div>
            </div> 
          </div>
          
          

          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <button class="btn btn-primary w-100" style="margin-top: 10px" type="submit">Submit</button>
              </div>
            </div> 
             
          </div>
          </div>
          <input type="hidden" value="<?php echo "$p_id" ?>" name="p_id"/>
          </div>
            </form>
            <div class="col-md-2">
              <div class="form-group">
                <button class="btn btn-primary w-100" style="margin-top: 10px">Cancel</button>
              </div>
            </div> 
            </div>
        </div>
    </div>
    <script type="text/javascript">
      function go_back(){
        window.location.replace("../editprogram.php");
      }
    </script>  

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</body>
=======
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
  	<?php
      $con = mysqli_connect("localhost","root");
      mysqli_select_db($con, "bughound");
      
      
      if(isset($_GET['id'])){
        $p_id=mysqli_real_escape_string($con,$_GET['id']);      
        $query="SELECT * FROM programs WHERE prog_id='".$p_id."';";       
        $result=mysqli_query($con,$query);
        $row=mysqli_fetch_row($result);
      }
  		?>
  	
    <div class="container" style="">
        <h2 class="text-center my-4">Edit Program</h2>    
        <form name="form_prog_add" action="../editprogram.php" method="GET">
        <div id="addempForm">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                 <label for="name"> Program Name</label>
                 <input type="text" class="form-control" id="problem-summary" name="prog_name" placeholder="" value="<?php echo $row[1] ?>" required>
              </div>
            </div> 
          </div>        

           <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                 <label for="name">Program Release</label>
                 <input type="text" class="form-control" id="problem-summary" name="prog_release" placeholder="" value="<?php echo $row[2] ?>" required>
              </div>
            </div> 
          </div>
           <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                 <label for="name">Program Version</label>
                 <input type="text" class="form-control" id="problem-summary" name="prog_version" placeholder="" value="<?php echo $row[3] ?>" required>
              </div>
            </div> 
          </div>
          
          

          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <button class="btn btn-primary w-100" style="margin-top: 10px" type="submit">Submit</button>
              </div>
            </div> 
             
          </div>
          </div>
          <input type="hidden" value="<?php echo "$p_id" ?>" name="p_id"/>
          </div>
            </form>
            <div class="col-md-2">
              <div class="form-group">
                <button class="btn btn-primary w-100" style="margin-top: 10px" onclick="go_back()">Cancel</button>
              </div>
            </div> 
            </div>
        </div>
    </div>
    <script type="text/javascript">
      function go_back(){
        window.location.assign("../editprogram.php");
      }
    </script>  

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</body>
>>>>>>> branch_achal
</html>