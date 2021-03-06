 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DB maintenance</title>
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
    <?php if(isset($_SESSION['username'])): ?>
    <ul class="nav justify-content-end">
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
    </ul>
  <?php else: ?>
      <ul class="nav justify-content-end">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Login</a>
      </li>
    </ul>
  <?php endif; ?>
  <?php 
  if(!isset($_SESSION['userlevel'])):?>
    <style type="text/css">
      #addbug{
        display: None;
      }
      #updatebug{
        display: None;
      }
      #dbmaintenance{
        display: None;
      }
    </style>
  <?php elseif($_SESSION['userlevel']==1): ?>
    <style type="text/css">
      #updatebug{
        display: None;
      }
      #dbmaintenance{
        display: None;
      }
    </style>
    <?php elseif($_SESSION['userlevel']==2): ?>
    <style type="text/css">
      #dbmaintenance{
        display: None;
      }
    </style>
    <?php endif; ?>
    
    

   <div class="container" style="">
        <h2 class="text-center my-4">Home</h2>

        <div id="addempForm">                          
          <div id="addbug" class="row">
            <div class="col-md-6">
              <div class="form-group">
                 <label for="name" style="font-size: 35px;">Add Bug</label>
                 <button class="btn btn-info w-60" style="margin-left: 20px" type="button" onclick="go_bug()">Go!</button>
              </div>
            </div> 
          </div>

           <div id="updatebug" class="row">
            <div class="col-md-6">
              <div class="form-group">
                 <label for="name" style="font-size: 35px;">Update Existing Bug</label>
                 <button class="btn btn-info w-60" style="margin-left: 20px" type="button" onclick="go_update()">Go!</button>
              </div>
            </div> 
          </div>

           <div id="dbmaintenance" class="row">
            <div class="col-md-6">
              <div class="form-group">
                 <label for="name" style="font-size: 35px; margin-right: 27px;">Database Maintenance</label>
                 <button class="btn btn-info w-60" style="margin-left: 20px" type="button" onclick="go_db()">Go!</button>
              </div>
            </div> 
          </div>

          
          <script type="text/javascript">
            function go_db(){
              window.location.assign("maintaindb.php");
            }
            function go_update(){
              window.location.assign("searchbug.php");
            }
            function go_bug(){
              window.location.assign("bug.php");
            }
          </script>
          
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</body>
</html>