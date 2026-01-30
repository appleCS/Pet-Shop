<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>view pet</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link type="text/css" href="css1.css" rel="stylesheet"/>
        <style>
            input{
                background-image: url("img/bg2.jpg");
            }
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row sticky-top">
                <div class="col-12 p-0">
                    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                        <!-- Brand -->
                        <!--<a class="navbar-brand" href="#"><img src="image/biz-logo.png" style="width:150px;"/> </a>-->

                        <!-- Toggler/collapsibe Button -->
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <!-- Navbar links -->
                        <div class="collapse navbar-collapse" id="collapsibleNavbar">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Contact</a>
                                </li>
                            </ul>
                        </div>
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <button type="button" class="btn btn-dark mr-5-5 p-3" data-toggle="collapse" data-target="#demo"><?php
                                     if(isset($_SESSION["nic"])){
                                         
                                         $con = new mysqli("localhost", "root", 123, "petshop", 3306);
                                         $resuname = $con->query("SELECT uname FROM user WHERE nic='".$_SESSION["nic"]."'");
                                         
                                         $sessuname = mysqli_fetch_assoc($resuname);
                                         echo $sessuname["uname"];
                                     }
                                     else{
                                         echo "Sign In";
                                     }
                                    ?>
                                    </button>
                                </li>
                            </ul>
                    </nav>
                </div>
            </div>
        </div>
        
        <div id="demo" class="sign1 collapse bg-secondary">
            <?php
               if(isset($_SESSION["nic"])){
                 echo "<div class=\"form-check-inline\">";
                   echo "<form action=\"logout.php\" method=\"POST\">";
                      echo "<button type=\"submit\" class=\"btn btn-dark p-1 mr-1\">Logout</button>";
                   echo "</form>";
                   
                   echo "<form action=\"...\" method=\"...\">";
                      echo "<button type=\"submit\" class=\"btn btn-dark p-1 ml-5\">Setting</button>";
                   echo "</form>";
                   echo "</div>";
               }
               else{
            ?>
            <form class="needs-validation" novalidate action="signin.php" method="POST">
                <div class="form-group">
                <label>Username:</label>
                <input class="form-control" type="text" name="uname" required/>
                </div>
                <div class="form-group">
                <label>Password:</label>
                <input class="form-control" type="password" name="pass" required/>
                </div>
                <button type="submit" class="btn btn-dark p-1">Submit</button>
            </form>
            <?php
               }//else of my Account(Sign in) div's closing
            ?>
            
            
            
            <div class="container">
                
                <form action=""  method="POST">
                    
                </form>
                
            </div>
            
            
             <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        </div>
        
    </body>
</html>
