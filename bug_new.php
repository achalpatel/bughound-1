<!DOCTYPE html>
<html>
<head>
	<title></title>
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
    $con = mysqli_connect("localhost","root");
    mysqli_select_db($con, "bughound_test1");
    if(! $con ) {
        die('Could not connect: ' . mysqli_error());
    }  
    $program=$_POST['program'];
    $r_type=$_POST['report-type'];
    $severity=$_POST['severity'];
    $summary=$_POST['summary'];
    $reproduce=$_POST['reproduce'];
    $problem=$_POST['problem'];
    $r_by=$_POST['reported-by'];
    $r_date=$_POST['reported-date'];

    echo "prog = ".$program;
    echo "Date = ".$r_date;
    echo "type = ".$r_type;
    echo "sev = ".$severity;
    echo "sum = ".$summary;
    echo "prob = ".$problem;
    echo "by = ".$r_by;

        
    $query="INSERT INTO bug(Program, Report_type, Severity, Problem_Summary, Reproducable, Problem, Reported_By, Report_Date) 
            Values ('".$program."', '".$r_type."', '".$severity."', '".$summary."', '".$reproduce."', '".$problem."', '".$r_by."', '".$r_date."');";
    
    $result=mysqli_query($con,$query);
    if($result){
        echo "Bug submitted";
    }
    else{
        echo "Submission failed";
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
    <button onclick="go_back()">Back</button>
</body>
<script type="text/javascript">
    function go_back(){
        window.location.replace("bug.php");
    }            
</script>
</html>