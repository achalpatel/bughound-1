<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edit Area</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

    <!-- Jquery UI (Datepicker) -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h2 class="text-center my-4">Edit Area</h2>

       <table id ="dtBasicExample" class="table table-bordered table-sm dataTables_length">
          <thead>
            <tr>
              <th scope="col">Area ID</th>
              <th scope="col">Program ID</th>
              <th scope="col">Area</th>
              <th scope="col">Update</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
          <?php
                    $area_id = isset($_GET['area_id']) ? $_GET['area_id'] : '0';
                    $area = isset($_GET['area']) ? $_GET['area'] : '0';
                    // $area = $_POST['area'];
                    $prog_id = isset($_GET['prog_id']) ? $_GET['prog_id'] : '0';
                    $con = mysqli_connect("localhost","root");
                    mysqli_select_db($con, "lab3");
                    $query = "UPDATE areas SET area ='".$area."' where area_id = '".$area_id."';";
                    mysqli_query($con, $query);
                    $query = "SELECT * FROM areas where prog_id ='".$prog_id."';";    
                    mysqli_query($con, $query);
                    if(! $con ) {
            die('Could not connect: ' . mysqli_error());
         }
         $result = mysqli_query($con, $query);
            ?>
          <tbody>
            <?php
              if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
               ?>
               <tr>
                   <!-- <td><span><?php echo $row["area_id"] ?> </span></td> -->
                   <!-- <td><a href="../editablearea.php/?area_id=<?php echo $row["area_id"]?>"><?php echo $row["area_id"] ?> </a></td> -->
                   <td><span><?php echo $row["area_id"] ?> </span></td>
                   <td><span><?php echo $abc = $row["prog_id"] ?> </span></td>
                   <td><span><?php echo $row["area"] ?> </span></td>
                   <!-- <td><a href="../editablearea.php/?area_id=<?php echo $row["area_id"]?>"><?php echo $row["area_id"] ?> </a></td> -->
                  <!-- <td><form action="../editablearea.php/?area_id=<?php echo $row["area_id"]?>"> <button type="submit" name="area_id" class="btn btn-primary" style="float: right;">Update</button></form></td> 
                  -->
                  <td> <button type="submit" name="area_id" class="btn btn-primary" style="float:;" onclick="dance('<?php echo $row["area_id"]?>');">Update</button></td>
                  <form action="../deleteareahidden.php" method="post">
                  <td style="padding-left: 0px;"> <button type="submit" name="delete_area" value="<?php echo $row["area_id"] ?>" class="btn btn-danger" style="float: ;" >Delete</button></td></form>
               </tr>
               <?php
            }
?>
        <?php } else {
            echo "0 results";
         }
            ?>
          </tbody>
        </table>
         <button class="btn btn-primary w-80"  style="float: right; margin-left: 15px;" type="button" onclick="go_back()">Back</button>
        <!-- <button type="button" class="btn btn-primary" style="float: right;">Done</button> -->
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">
      $(document).ready(function () {
  $('#dtBasicExample').DataTable();
  $('.dataTables_length').addClass('bs-select');
});
     function go_back(){
        window.location.replace("../programtable.php");
      }
      function dance(area_id)
      {
        window.open("../editablearea.php/?area_id="+area_id,"_self");
      }
    </script>
</body>
</html>