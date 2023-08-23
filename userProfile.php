<!DOCTYPE html>

<html>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>eShop | User Profile</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resourses/logo.svg" />

</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <?php

                session_start();

                require "header.php";

                require "connection.php";

                if (isset($_SESSION["u"])) {

                    $email = $_SESSION["u"]["email"];

                    $details_rs =Database::search("SELECT * FROM `users`INNER JOIN `gender` ON 
                    users.gender_id=gender.id WHERE email='".$email."'");

                    $image_rs = Database::search("SELECT * FROM `profile_img` WHERE `users_email`='".$email."'");

                    $address_rs = Database::search("SELECT * FROM `users_has_address` INNER JOIN `city`ON
                                    users_has_address.city_city_id=city.city_id INNER JOIN `district` ON
                                    city.district_district_id=district.district_id INNER JOIN `province` ON
                                    district.province_province_id=province.province_id WHERE `users_email`='".$email."'");

                    $details_data = $details_rs->fetch_assoc();

                    $image_data = $image_rs->fetch_assoc();

                    $address_data = $address_rs->fetch_assoc();
                    

                    
                    
                    

            ?>
                <div class="col-12 bg-primary">
                    <div class="row">

                        <div class="col-12 bg-body mt-4 mb-4">
                            <div class="row g-2">

                                <div class="col-md-3 border-end">
                                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">

                                        <?php 

                                        if(empty($image_data["path"])){
                                        ?>
                                        <img src="resources/github-mark.svg" alt="profile picture" class="rounded mt-5" style="width:150px">
                                        <?php



                                        }else{
                                            ?>
                                            <img src="<?php echo $image_data["path"]; ?>" alt="profile picture" class="rounded mt-5" style="width:150px">
                                            <?php
                                            
                                        }
                                        
                                        ?>
                                      
                                        <br />
                                        <span class="fw-bold"><?php $details_data["fname"]." ".$details_data["lname"]; ?></span>
                                        <span class="fw-bold text-black-50"><?php echo($email) ?></span>

                                        <input type="file" class="d-none" id="profileImage" />
                                        <label for="profileImage" class="btn btn-primary mt-5">Update Profile Picture</label>



                                    </div>

                                </div>


                                <div class="col-md-5 border-end">
                                    <div class="p-3 py-5">

                                        <div class="d-flex justify-content-center align-items-center mb-3">
                                            <h4 class="fw-bold">Profile Settings</h4>
                                        </div>

                                        <div class="row g-2">

                                            <div class="col-6">
                                                <label class="form-label">First Name</label>
                                                <input type="text" class="form-control" value="<?php echo $details_data["fname"]; ?>" />
                                            </div>

                                            <div class="col-6">
                                                <label class="form-label">Last Name</label>
                                                <input type="text" class="form-control" value="<?php echo $details_data["lname"]; ?>" />
                                            </div>

                                            <div class="col-12">
                                                <label class="form-label">Password</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" value="<?php echo $details_data["password"]; ?>" aria-describedby="basic-addon3">
                                                    <span class="input-group-text"><i class="bi bi-eye-fill"></i></span>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <label class="form-label">Email</label>
                                                <input type="text" class="form-control" value="<?php echo $email; ?>" />
                                            </div>

                                            <div class="col-12">
                                                <label class="form-label">Registered Date</label>
                                                <input type="text" class="form-control" readonly value="<?php echo $details_data["joined_date"]; ?>" />
                                            </div>


                                            <?php
                                            if (empty($address_data["line1"])){
                                                ?>
                                                <div class="col-12">
                                                <label class="form-label">Address Line 01</label>
                                                <input type="text" class="form-control" placeholder="Enter Address Line 01" />
                                                </div>

                                                <?php

                                            }else{
                                                ?>
                                                <div class="col-12">
                                                <label class="form-label">Address Line 01</label>
                                                <input type="text" class="form-control"  value="<?php echo $address_data["line1"]; ?>"/>
                                                </div>
                                                <?php


                                            }
                                            ?>


                                            <?php
                                            if (empty($address_data["line2"])){
                                                ?>
                                                <div class="col-12">
                                                <label class="form-label">Address Line 02</label>
                                                <input type="text" class="form-control" placeholder="Enter Address Line 02" />
                                                </div>

                                                <?php

                                            }else{
                                                ?>
                                                <div class="col-12">
                                                <label class="form-label">Address Line 02</label>
                                                <input type="text" class="form-control" value="<?php echo $address_data["line2"]; ?>"/>
                                                </div>
                                                <?php


                                            }


                                            $province_rs = Database::search("SELECT * FROM `province`");
                                            $district_rs = Database::search("SELECT * FROM `district`");
                                            $city_rs = Database::search("SELECT * FROM `city`");

                                            $province_num = $province_rs->num_rows;
                                            $district_num = $district_rs->num_rows;
                                            $city_num = $city_rs->num_rows;






                                            ?>

                                       

                                            <div class="col-6">
                                                <label class="form-label">Province</label>
                                                <select class="form-select">
                                                    <option value="0">Select Province</option>

                                                    <?php
                                                    for ($x = 0; $x < $province_num; $x++) {
                                                        $province_data = $province_rs->fetch_assoc();
                                                        ?>
                                                        <option value="<?php echo $province_data["province_id"] ;?>"

                                                        <?php
                                                        if (!empty($address_data["province_province_id"])){
                                                            if ($address_data["province_province_id"]==$province_data["province_id"]){
                                                                ?> selected <?php
                                                            }
                                                            
                                                        }


                                                        ?>
                                                        
                                                        ><?php echo $province_data["province_name"] ;?></option>
                                                        <?php
                                                    }

                                                    ?>
                                                    
                                                </select>
                                            </div>

                                            <div class="col-6">
                                                <label class="form-label">District</label>
                                                <select class="form-select">
                                                    <option value="0">Select District</option>
                                                    <option value="1">Colombo</option>
                                                    <option value="2">Gampaha</option>

                                                </select>
                                            </div>

                                            <div class="col-6">
                                                <label class="form-label">City</label>
                                                <select class="form-select">
                                                    <option value="0">Select City</option>
                                                    <option value="1">Bambalapitiya</option>
                                                    <option value="2">Kolupitiya</option>
                                                </select>
                                            </div>

                                            <?php 
                                            if(empty($address_data["postal_code"])){

                                                ?>
                                                <div class="col-6">
                                                <label class="form-label">Postal Code</label>
                                                <input type="text" class="form-control" placeholder="enter Postal Code"/>
                                                </div>
                                                
                                                <?php

                                            }else{
                                                ?>
                                                <div class="col-6">
                                                <label class="form-label">Postal Code</label>
                                                <input type="text" class="form-control" value="<?php echo $address_data["postal_code"]; ?>"/>
                                                </div>



                                                <?php
                                            }
                                            
                                            
                                            ?>

                                           


                                            <div class="col-6">
                                                <label class="form-label">Gender</label>
                                                <input type="text" class="form-control" readonly value="<?php echo $details_data["gender_name"]; ?>" />
                                            </div>

                                            <div class="col-12 d-grid mt-4">
                                                <button class="btn btn-primary" type="button">Update My Profile</button>

                                            </div>

                                        </div>

                                    </div>


                                </div>


                                <div class="col-md-4 text-center">
                                    <div class="row">

                                        <span class="fw-bold text-black mt-5 h1">Display Ads</span>


                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>


            <?php

                } else {


                }

            ?>


            <?php

                require "footer.php";

            ?>

        </div>
    </div>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>

</body>

</html>