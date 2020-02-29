<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>CECS 544 Lab 1 Page 2</title>
    </head>
    <body>
        <h2>
          

            <?php
                $prog_id = $_POST['prog_id'];
                $area = $_POST['area'];
                

                // printf("You entered %s %s %s %s as your name.<p>",$first,$last,$password,$userlevel);
                    $con = mysqli_connect("localhost","root");
                    mysqli_select_db($con, "lab3");
                     $query = "INSERT INTO areas (prog_id, area) VALUES ('".$prog_id."','".$area."')";
                    // echo $query;
                    mysqli_query($con, $query);
            ?>

            
            You have successfully completed trial!
            <p>
            <input type="button" value="Return" id=button1 name=button1 onclick="go_home()">    
        </h2>
        <script language=Javascript>
            function go_home(){
                window.location.assign("addarea.php");
            }
        </script>
            
    </body>
</html>