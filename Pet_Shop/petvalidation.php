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
        $savedate = date("l")."  ".date("d F Y")."  ".date("h:i:sa");
        $title = $_POST["title"];
        $petname = $_POST["petname"];
        $age = $_POST["age"];
        $color = $_POST["color"];
        $ctgry = $_POST["ctgry"];
        $curncy = $_POST["currency"];
        $price = $_POST["price"];
        $desc = $_POST["desc"];
        $img = $_FILES["imgg"];
        
        $img_path = $img["tmp_name"];
        
        $img_loc = "petimage/".time().".jpeg";
        move_uploaded_file($img_path, $img_loc);
        
        $con = new mysqli("localhost","root", 123, "petshop", 3306);
        $con->query("INSERT INTO pets(title, currency, price, petname, category, age, color, description, imgpath, ad_date, seller_nic) VALUES('".$title."', '".$curncy."', '".$price."', '".$petname."', '".$ctgry."', '".$age."', '".$color."', '".$desc."', '".$img_loc."', '".$savedate."', '".$_SESSION["nic"]."')");
        ?>
    </body>
</html>
