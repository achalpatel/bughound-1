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
    // other fields
    if($_SESSION['userlevel']!=1){
        $area=$_POST['function-area'];
        $assigned_to=$_POST['assigned-to'];
        $comments=$_POST['comments'];
        $status=$_POST['status'];
        $priority=$_POST['priority'];
        $resolution=$_POST['resolution'];
        $resolution_v=$_POST['resolution-v'];
        $resolved_by=$_POST['resolved-by'];
        $resolved_date=$_POST['resolved-date'];
        $tested_by=$_POST['tested-by'];
        $tested_date=$_POST['tested-date'];
        $treat=$_POST['treat-as'];
        $query="INSERT INTO bug(Program, Report_type, Severity, Problem_Summary, Reproducable, Problem, Reported_By, Report_Date,
            Functional_Area, Assigned_To, Comments, Status_bug, Priority, Resolution, Resolution_Version, Resolved_By, Resolve_Date,
            Tested_By, Test_Date, Deferred) 
            Values ('".$program."', '".$r_type."', '".$severity."', '".$summary."', '".$reproduce."', '".$problem."', '".$r_by."', '".$r_date."'
            ,'".$area."', '".$assigned_to."', '".$comments."', '".$status."', '".$priority."', '".$resolution."', '".$resolution_v."',
            '".$resolved_by."', '".$resolved_date."', '".$tested_by."', '".$tested_date."', '".$treat."');";
    }
    else{
        $query="INSERT INTO bug(Program, Report_type, Severity, Problem_Summary, Reproducable, Problem, Reported_By, Report_Date) 
            Values ('".$program."', '".$r_type."', '".$severity."', '".$summary."', '".$reproduce."', '".$problem."', '".$r_by."', '".$r_date."');";
    }
    
    echo "prog = ".$program;
    echo "Date = ".$r_date;
    echo "type = ".$r_type;
    echo "sev = ".$severity;
    echo "sum = ".$summary;
    echo "prob = ".$problem;
    echo "by = ".$r_by;

        
    
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