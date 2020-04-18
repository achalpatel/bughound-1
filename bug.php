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
    <?php if(isset($_SESSION['username'])): ?>
        <ul class="nav justify-content-end">
        <li class="nav-item">
            <a class="nav-link" href="home.php">Home</a>
        </li>
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
    <?php if($_SESSION['userlevel']==1){ ?>
        <style type="text/css">
            #lvl{
                display:None;
            }
        </style>

    <?php } ?>
        

        <?php
            $con = mysqli_connect("localhost","root");
            if(! $con ) {
                die('Could not connect: ' . mysqli_error());
            }
            mysqli_select_db($con, "bughound_test1");
            $query_prog="SELECT prog_id, program FROM programs";
            $query_emp="SELECT emp_id, name  FROM employees ";
            $result_prog=mysqli_query($con, $query_prog);
            $result_emp=mysqli_query($con, $query_emp);
        ?>

    

    <div class="container">
        <h2 class="text-center my-4">New Bug Report Entry Page</h2>
        <div id="newBugForm" class="container">
            <form action="<?php if($_SESSION['userlevel']==1){ echo "bug_new.php"; }?>" method="POST">                
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="program">Program</label>                            
                            <select class="form-control" id="program" name="program">
                            <?php while($row_prog=mysqli_fetch_assoc($result_prog)) { ?>                        
                            <?php echo "<option value=".$row_prog['prog_id'].">". $row_prog['program']." </option>"; ?>
                            <?php } ?>
                            </select>                            
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="report-type">Report type</label>
                            <select class="form-control" id="report-type" name="report-type">
                                <option value="Coding Error">Coding Error</option>
                                <option value="Design Issue">Design Issue</option>
                                <option value="Suggestion">Suggestion</option>
                                <option value="Documentation">Documentation</option>
                                <option value="Hardware">Hardware</option>
                                <option value="Query">Query</option>                        
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="severity">Severity</label>
                            <select class="form-control" id="severity" name="severity">
                            <option value="Minor">Minor</option>
                            <option value="Serious">Serious</option>
                            <option value="Fatal">Fatal</option>                              
                            </select>
                        </div>
                    </div>
                </div>
    
                <div class="row">
                    <div class="col-12 col-md-8">
                        <div class="form-group">
                            <label for="problem-summary">Problem summary</label>
                            <input type="text" class="form-control" id="problem-summary" name="summary">
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="reporductible">Reproductible?</label>
                            <select class="form-control" id="reporductible" name="reproduce">
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-12">
                        <div class="form-group">
                            <label for="problem">Problem</label>
                            <textarea class="form-control" id="problem" rows="2" name="problem"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="reported-by">Reported by</label>
                            <select class="form-control" id="reported-by" name="reported-by">                              
                            <?php while($row_emp=mysqli_fetch_assoc($result_emp)) { ?>                        
                            <?php echo "<option value=".$row_emp['emp_id'].">". $row_emp['name']." </option>"; ?>
                            <?php } ?> 
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="reported-date" class="d-block">Date</label>
                            <input type="date" class="datepicker" placeholder="Date" name="reported-date" id="reported-date">
                        </div>
                    </div>
                </div>
                <div id="lvl">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="functional-area">Functional Area</label>
                                <select class="form-control" id="report-type">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="assigned-to">Assigned to</label>
                                <select class="form-control" id="assigned-to">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                </select>
                            </div>
                        </div>
                    </div>
        
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="comments">Comments</label>
                                <textarea class="form-control" id="comments" rows="2"></textarea>
                            </div>
                        </div>
                    </div>
        
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" id="status">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="priority">Priority</label>
                                <select class="form-control" id="priority">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="resolution">Resolution</label>
                                <select class="form-control" id="resolution">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="resolution-v">Resolution version</label>
                                <select class="form-control" id="resolution-v">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                </select>
                            </div>
                        </div>
                    </div>
        
        
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="resolved-by">Resolved by</label>
                                <select class="form-control" id="resolved-by">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="resolved-date" class="d-block">Date</label>
                                <input type="date" class="datepicker" placeholder="Date" name="resolved-date" id="resolved-date">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="tested-by">Tested by</label>
                                <select class="form-control" id="tested-by">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="tested-date" class="d-block">Date</label>
                                <input type="date" class="datepicker" placeholder="Date" name="tested-date" id="tested-date">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="treat-as">Treat as?</label>
                                <select class="form-control" id="treat-as">
                                <option>YES</option>
                                <option>NO</option>
                                
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 mb-3">
                        <button class="btn btn-primary w-100" type="submit">Submit</button>
                    </div>
                    <div class="col-6">
                        <input class="btn btn-outline-primary w-100" type="reset" value="Reset">
                    </div>
                    <div class="col-6">
                        <a class="btn btn-outline-primary w-100 text-primary" role="button">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    

</body>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</html>