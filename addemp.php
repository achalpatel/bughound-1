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
<<<<<<< HEAD
<body>

   <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           Area
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Add area</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown link
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown link
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
=======
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
            <a class="nav-link" href="home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
        </ul>
      <?php endif; ?>

>>>>>>> branch_achal
    

    <div class="container" style="">

        <h2 class="text-center my-4">Add Employee</h2>
<<<<<<< HEAD
        <form name="theform" action="page2.php" method= "POST" >
=======
        <form name="theform"  action="emp_add.php" method= "POST" onsubmit="return validate()" >
>>>>>>> branch_achal
        <div id="addempForm">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                 <label for="name">Name</label>
<<<<<<< HEAD
                 <input type="text" class="form-control" id="problem-summary" name="name" placeholder="">
=======
                 <input type="text" class="form-control" id="problem-summary" name="name" placeholder="" required maxlength="32">
>>>>>>> branch_achal
              </div>
            </div> 
          </div>

           <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                 <label for="username">User Name</label>
<<<<<<< HEAD
                 <input type="text" class="form-control" id="problem-summary" name="username" placeholder="">
=======
                 <input type="text" class="form-control" id="problem-summary" name="username" placeholder="" required maxlength="32">
>>>>>>> branch_achal
              </div>
            </div> 
          </div>
           <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                 <label for="password">Password</label>
<<<<<<< HEAD
                 <input type="password" class="form-control" id="problem-summary" name="password" placeholder="">
=======
                 <input type="password" class="form-control" id="problem-summary" name="password" placeholder="" required maxlength="32">
>>>>>>> branch_achal
              </div>
            </div> 
          </div>
           <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                 <label for="name">User Level</label>
<<<<<<< HEAD
                 <input type="text" class="form-control" id="problem-summary" name="userlevel" placeholder="">
=======
                 <input type="number" class="form-control" id="userlevel" name="userlevel" placeholder="" required>
>>>>>>> branch_achal
              </div>
            </div> 
          </div>
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <button class="btn btn-primary w-100" style="margin-top: 10px" type="submit">Submit</button>
              </div>
            </div> 
            <div class="col-md-3">
              <div class="form-group">
                <button class="btn btn-primary w-100" style="margin-top: 10px" type="button" onclick="go_back()">Back</button>
              </div>
            </div> 
          </div>
          </div>

          </div>
            </form>
        </div>
    </div>   

    <!--  <script language=Javascript>
            function validate(theform) {
                if(theform.name.value === ""){
                    alert ("First name field must contain characters");
                    return false;
                }
                if(theform.last.value === ""){
                    alert ("Last name field must contain characters");
                    return false;
                }
                return true;
            }
</script>
 -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">
<<<<<<< HEAD
       function go_back(){
        window.location.replace("maintaindb.php");
=======
       function validate(){
          var x=document.getElementById("userlevel").value;
          if(x>3 || x<1){
            alert("User Level can be between 1, 2 or 3");
            return false;
          }
          else{
            return true;
          }
       }

       function go_back(){
        window.location.assign("maintaindb.php");
>>>>>>> branch_achal
      }
    </script>

</body>
</html>