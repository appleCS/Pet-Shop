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
        
         $nic = $_POST["nic"];
         $name = $_POST["name"];
         $uname = $_POST["uname"];
         $pass = $_POST["pass"];
         $gender = $_POST["gender"];
         $address = $_POST["address"];
         $email = $_POST["email"];
         $mobile = $_POST["mobile"];
         
         $con = new mysqli("localhost", "root", 123, "petshop", 3306);
         $con->query("INSERT INTO user(nic, name, uname, password, gender, address, email, mobile) VALUES('".$nic."', '".$name."', '".$uname."', '".$pass."', '".$gender."', '".$address."', '".$email."', '".$mobile."')");
         
         header("location:index.php");
        ?>
    </body>
</html>
