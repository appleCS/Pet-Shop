<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Pet details</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link type="text/css" href="css1.css" rel="stylesheet"/>
        <style>
            label{
                color: white;
                font-family: Arial;
                font-size: 1.2em;
            }
            input,select{
                background-image: url("img/bg2.jpg");
            }
            textArea{
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
        </div>
        
        <?php
        if(isset($_SESSION["nic"])){
            
        ?>
        

        <div class="container">

            <div class="col-10 bg-secondary divsignup p-3 mt-6 shadow">
                <h1 class="hh1">Sign Up</h1><br/>
                <form class="needs-validation" novalidate action="petvalidation.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label class="col-3" for="title">Title about your Ad:</label>
                        <input type="text" class="col-7 form-control" id="title" placeholder="eg: This is title about my pat" name="title" required>
                        <div class="valid-feedback"></div>
                        <div class="col invalid-feedback">Enter Title</div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3" for="petname">Your Pet Name:</label>
                        <input type="text" class="col-7 form-control" id="petname" placeholder="eg: 'kitty'" name="petname" required>
                        <div class="valid-feedback"></div>
                        <div class="col invalid-feedback">Enter pet name</div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3" for="age">Your Pet's Age:</label>
                        <input type="number" class="col-2 form-control" id="age" placeholder="pet's age here" name="age" required>
                        <label class="col-2 text-right" for="color">pet's Color:</label>
                        <input type="text" class="col-2 form-control" id="color" placeholder="eg: brown, black" name="color" required>
                        <!--TOOLTIP adding-->
                    </div>
                    <div class="form-group row">
                        <label class="col-3" for="ctgry">Category:</label>
                        <input type="text" class="col-2 form-control" id="ctgry" placeholder="eg: 'cat', 'rabbit' or 'fish'" name="ctgry" required>
                        <label class="col-2 text-right" for="price">Price in LKR:</label>
                        <input type="number" class="col-2 form-control" id="price" placeholder="eg:12470" name="price" required>
                        <select class="form-control col-1" id="currency" name="currency" required="">
                            <option value="LKR">LKR</option>
                            <option value="EUR">EUR</option>
                            <option value="GBP">GBP</option>
                            <option value="USD">USD</option>
                        </select>
                        <div class="valid-feedback"></div>
                        <div class="col invalid-feedback">these all required</div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3" for="description">Description:</label>
                        <textarea class="col-7 form-control" rows="5" id="description" name="desc" required></textarea>
                        <div class="valid-feedback"></div>
                        <div class="col invalid-feedback">description required</div>
                    </div>
                    <div class="form-group row">
                        <!--                        <label class="col-3" for="img">pet's image:</label>
                                                <input type="file" class="col-7 form-control" id="img" placeholder="" name="img" required>-->
                        <label class="col-3" for="img">Pet's image:</label>
                        <input type="file" class="col-4" id="img" name="imgg" required>
                        <div class="valid-feedback"></div>
                        <div class="col invalid-feedback">img required</div>
                    </div>
                    <div class="row">
                        <div class="col-9"></div>
                        <button type="submit" class="btn btn-dark p-1">Submit</button><br/><br/>
                    </div>
                </form>

                <script>
                    // Disable form submissions if there are invalid fields
                    (function () {
                        'use strict';
                        window.addEventListener('load', function () {
                            // Get the forms we want to add validation styles to
                            var forms = document.getElementsByClassName('needs-validation');
                            // Loop over them and prevent submission
                            var validation = Array.prototype.filter.call(forms, function (form) {
                                form.addEventListener('submit', function (event) {
                                    if (form.checkValidity() === false) {
                                        event.preventDefault();
                                        event.stopPropagation();
                                    }
                                    form.classList.add('was-validated');
                                }, false);
                            });
                        }, false);
                    })();
                </script>

            </div>
        </div>
        <?php
            str_replace('<br />', PHP_EOL, $textarea);
        }
        
        else{
            header("location:signup.php");
        }
        ?>



        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </body>
</html>
