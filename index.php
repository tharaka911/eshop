<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>eShop</title>
    <link rel="icon" href="resources.logo.svg">

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">

</head>

<body class="main-body">

    <div class="container-fluid vh-100 d-flex justify-content-center">
        <div class="row align-content-center">

            <!-- header -->
            <div class="col-12">
                <div class="row">
                    <div class="col-12 logo"></div>
                    <div class="col-12">
                        <p class="text-center title1">Hi, Welcome to eshop</p>
                    </div>
                </div>
            </div>
            <!-- header -->


            <!-- content -->
            <div class="col-12 p-3">
                <div class="row">
                    <div class="col-6 d-none d-lg-block background"></div>

                    <!-- signup-box -->

                    <div class="col-12 col-lg-6 " id="signupbox">
                        <div class="row g-2">
                            <div class="col-12">
                                <p class="title02">Create New Account.</p>
                            </div>

                            <div class="col-6">
                                <label class="form-lable">First Name</label>
                                <input type="text" class="form-control" placeholder="lakshan" id="fname">
                            </div>

                            <div class="col-6">
                                <label class="form-lable">Last Name</label>
                                <input type="text" class="form-control" placeholder="Tharaka" id="lname">
                            </div>

                            <div class="col-12">
                                <label class="form-lable">Email</label>
                                <input type="email" class="form-control" placeholder="lakshan@spaceX.com" id="email" >
                            </div>

                            <div class="col-12">
                                <label class="form-lable">Password</label>
                                <input type="text" class="form-control" placeholder="lakshan@spaceX.com" id="password" >
                            </div>

                            <div class="col-6">
                                <label class="form-lable">Mobile</label>
                                <input type="email" class="form-control" placeholder="070 999 9999" id="mobile" >
                            </div>

                            <div class="col-6">
                                <label class="form-lable">Gender</label>
                                <select class="form-select" id="gender" >
                                    <option value="0">Select Your Gender</option>
                                    <!-- 
                                    <option value="1">Male</option>
                                    <option value="2">Femail</option>
                                    -->

                                    <!-- getting data form db and fetch the dropdown -->
                                    <?php
                                       require "connection.php";

                                       $rs = Database::search("SELECT * FROM `gender`");
                                       $n = $rs->num_rows;

                                        for($i=0; $i < $n; $i++){
                                             $row = $rs->fetch_assoc(); 
                                         
                                    ?>

                                        <option value="<?php echo $row["id"];?>"><?php echo $row["gender_name"];?></option>
                                    
                                    <?php

                                    }

                                    ?>



                                   
                                </select>
                            </div>

                            <div class="col-12 col-lg-6 d-grid mt-3">
                                <button class="btn btn-primary" onclick="signUp();">Sign Up</button>
                            </div>

                            <div class="col-12 col-lg-6 d-grid mt-3">
                                <button class="btn btn-dark" onclick="changeView();">Already have an Account? Sign In</button>
                            </div>


                        </div>

                    </div>

                    <!-- signup-box -->


                    <!-- signin-box -->
                    <div class="col-12 col-lg-6 d-none" id="signinbox">

                        <div class="row g-2">

                            <div class="col-12">
                                <p class="title02">Sign In</p>
                            </div>

                            <div class="col-12">
                                <label class="form-lable">Email</label>
                                <input type="email" class="form-control" placeholder="lakshan@spaceX.com" />
                            </div>

                            <div class="col-12">
                                <label class="form-lable">Password</label>
                                <input type="text" class="form-control" placeholder="**********" />
                            </div>

                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="rememberme">
                                    <label class="form-check-label" for="rememberme">
                                        Remember me.
                                    </label>
                                </div>
                            </div>

                            <div class="col-6 text-end">
                                <a href="#" class="link-primary"> Forgotten password?</a>
                            </div>

                            <div class="col-12 col-lg-6 d-grid mt-3">
                                <button class="btn btn-primary">Sign In</button>
                            </div>

                            <div class="col-12 col-lg-6 d-grid mt-3">
                                <button class="btn btn-dark" onclick="changeView();">New to eShop? Join Now</button>
                            </div>

                        </div>

                    </div>

                    <!-- signin-box -->

                    <!-- content -->


                    <!-- footer -->

                    <div class="col-12 d-none d-lg-block fixed-bottom">
                        <div class="row">
                            
                                <p class="text-center">&copy; 20233 eSop.lk | All Right Reserved</p>
                            
                        </div>

                    <!-- footer -->

                </div>
            </div>





            <script src="script.js"></script>
</body>

</html>