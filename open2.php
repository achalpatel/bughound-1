<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
    <?php 
  		
  		$con = mysqli_connect("localhost","root");
		mysqli_select_db($con, "bughound_test1");		
        $file_name=$_GET['filename'];
        $bug_id=1018;
        $query="SELECT * FROM attachment WHERE bug='".$bug_id."' AND file_name='".$file_name."';";
        $result = mysqli_query($con, $query);
        if($result){
            $row=mysqli_fetch_array($result);
            header('Content-Description: File Transfer');
            header('Content-Type: application/pdf');
            header('Content-Disposition: inline; filename="abc.pdf"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            readfile('uploads/abc.pdf');
        }
        else{
            echo mysqli_error($con);
        }
        
  	?>
    
    

    
</body>
<script>
   
</script>
</html>