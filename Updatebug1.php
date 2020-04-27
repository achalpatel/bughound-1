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
    mysqli_select_db($con, "bughound");
    if(! $con ) {
        die('Could not connect: ' . mysqli_error());
    }
    $bug_id=  $_POST['bug_id'];
    $program=$_POST['program'];
    $r_type=$_POST['report-type'];
    $severity=$_POST['severity'];
    $summary=$_POST['summary'];
    $reproduce=$_POST['reproduce'];
    $problem=$_POST['problem'];
    $r_by=$_POST['reported-by'];
    $r_date=$_POST['reported-date'];
    // other fields
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
        $query="Update bug Set Program='".$program."', Report_type='".$r_type."', Severity='".$severity."', Problem_Summary='".$summary."', Reproducable='".$reproduce."', Problem='".$problem."', Reported_By='".$r_by."', Report_Date='".$r_date."',
            Functional_Area='".$area."', Assigned_To='".$assigned_to."', Comments='".$comments."', Status_bug='".$status."', Priority='".$priority."', Resolution='".$resolution."', Resolution_Version='".$resolution_v."', Resolved_By='".$resolved_by."', Resolve_Date='".$resolved_date."',
            Tested_By='".$tested_by."', Test_Date='".$tested_date."', Deferred='".$treat."' WHERE bug_id=".$bug_id;
   

        
    
    $result=mysqli_query($con,$query);
    if($result){
        echo "Bug Updated";
    }
    else{
        echo "Update failed";
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
        window.location.replace("searchbug.php");
    }            
</script>
</html>