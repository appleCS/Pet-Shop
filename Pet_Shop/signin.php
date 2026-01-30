<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $uname = $_POST["uname"];
        $pass = $_POST["pass"];
        
        $con = new mysqli("localhost", "root", 123, "petshop", 3306);
        
        $result = $con->query("SELECT nic from user WHERE uname='".$uname."' AND password='".$pass."'");
         
         if(mysqli_num_rows($result)>0){
             $row = mysqli_fetch_assoc($result);
             
             $_SESSION["nic"] = $row["nic"];
//             echo $_SESSION["nic"];
             
               header("location:index.php");
         }
         else{
             header("location:signup.php");
         }
        ?>
    </body>
</html>
