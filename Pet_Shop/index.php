<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Pet Shop</title>
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
               $id[] = array();
            ?>
        </div>
        <div ></div>
    
        <?php
           $con = new mysqli("localhost", "root", 123, "petshop", 3306);
           $resultrow = $con->query("SELECT * FROM pets");
           
           $count = mysqli_num_rows($resultrow);
           
           
           

         echo "<div class=\"container\">";
            for($x=0; $x<$count; $x++){
//                
                $toprow = mysqli_fetch_assoc($resultrow);
                
                
                $setid = $x+1;
//               $_SESSION["setid"] = $toprow["id"];
//             echo $_SESSION["setid"];
                
                
              echo "<div class=\"roww form-check-inline\">";
//                echo "<div class=\"imgg\">";
               
                 
              
                    echo "<img class = \"imag\" src=".$toprow["imgpath"]." />";
//                echo "</div>";
                echo "<h2 style=\"margin-top: -10%;padding-left: 3%;\">".$toprow["title"]."</h2>";
                echo "<h5 style=\"position:absolute; margin-left: 18%\">".$toprow["currency"]." ".$toprow["price"]."</h5>";
             
             ?>
            
               <form action="itemview.php" method="POST">
             
                   <input id="idd" name="iddd" type="hidden" value="<?php echo $setid; ?>"/>
                   <input class="viewad form-control btn btn-secondary" type="submit" value="view" />
              </form>
            
              
             <?php
                 echo "</div>";
            
            }
            
            echo "</div>";
                    
        ?>
        
        <br/>
        <br/>
        <br/>
        
        
        
        <script type="text/javascript" src="js1.js"></script>
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </body>
</html>
