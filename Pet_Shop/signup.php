<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sign Up</title>
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
        </div>

        <div class="container-fluid row">
            <div class="col-3">

            </div>
            <div class="col-5 bg-secondary divsignup p-3 mt-6 shadow">
                <h1 class="hh1">Sign Up</h1><br/>
                <form class="needs-validation" novalidate action="uservalidation.php" method="POST">
                    <div class="form-group row">
                        <label class="col-3" for="nic">NIC:</label>
                        <input type="text" class="col-7 form-control" id="nic" placeholder="Enter your nic" name="nic" required>
                        <div class="valid-feedback"></div>
                        <div class="col invalid-feedback">Enter your nic</div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3" for="name">Name:</label>
                        <input type="text" class="col-7 form-control" id="name" placeholder="Enter your name" name="name" required>
                        <div class="valid-feedback"></div>
                        <div class="col invalid-feedback">Enter name</div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3" for="uname">Username:</label>
                        <input type="text" class="col-7 form-control" id="uname" placeholder="Enter username" name="uname" required>
                        <div class="valid-feedback"></div>
                        <div class="col invalid-feedback">Enter user name</div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3" for="pwd">Password:</label>
                        <input type="password" class="col-7 form-control" id="pwd" placeholder="Enter password" name="pass" required>
                        <div class="valid-feedback"></div>
                        <div class="col invalid-feedback">Enter password</div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3" for="gender">Gender:</label>
                        <div class="col-8 form-check-inline">
                            <label class="form-check-label form-check-inline">
                                <input type="radio" class="form-check-input" id="gender" name="gender" value="male" required>Male
                            </label>
                            <!--                        </div>
                                                    <div class="form-check-inline">-->
                            <label class="form-check-label form-check-inline">
                                <input type="radio" class="form-check-input" id="gender" name="gender" value="female" required>Female
                                <div class="valid-feedback"></div>
                                <div class="col invalid-feedback">Select your gender.</div>
                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3" for="adrs">Address:</label>
                        <input type="text" class="col-7 form-control" id="adrs" placeholder="Enter your Address" name="address" required>
                        <div class="valid-feedback"></div>
                        <div class="col invalid-feedback">Enter your address</div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3" for="email">Email:</label>
                        <input type="email" class="col-7 form-control" id="email" placeholder="Enter your email" name="email" required>
                        <div class="valid-feedback"></div>
                        <div class="col invalid-feedback">Enter valid email</div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3" for="mobile">Mobile number:</label>
                        <input type="number" class="col-7 form-control" id="mobile" placeholder="Enter your mobile" name="mobile" required>
                        <div class="valid-feedback"></div>
                        <div class="col invalid-feedback">Enter existing mobile no.</div>
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
        ?>



        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </body>
</html>
