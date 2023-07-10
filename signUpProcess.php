<?php
//import connection.php for database connection,iud and search(curd)
require "connection.php";

//getting data from the form XMLHttpRequest object which is come to the server side
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$password = $_POST["password"];
$mobile = $_POST["mobile"];
$gender = $_POST["gender"];


//vadlidating firstname
if (empty($fname)) {
    echo "First name is required";
} else if (strlen($fname) > 45) {
    echo "First name must be less than 45 characters";
}

//vadlidating Lastname
else if (empty($lname)) {
    echo "Last name is required";
} else if (strlen($lname) > 45) {
    echo "Last name must be less than 45 characters";
}

//vadlidating email
else if (empty($email)) {
    echo "Email is required";
} else if (strlen($email) > 100) {
    echo "Email must be less than 100 characters";
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format";
}

//vadlidating password
else if (empty($password)) {
    echo "Password is required";
} else if (strlen($password) < 5 || strlen($password) > 20) {
    echo "Password must be between 5 and 20 characters";
}

//vadlidating mobile
else if (empty($mobile)) {
    echo "Mobile number is required";
} else if (strlen($mobile) != 10) {
    echo "Mobile number must be 10 characters";
} else if (!preg_match("/07[0,1,2,4,5,6,7,8][0-9]/", $mobile)) {
    echo "Invalid mobile number";
}

//vadlidating gender
else if ($gender == 0) {
    echo "Gender is required";
} else {
    //checking whether the user is already exists
    $rs = Database::search("SELECT * FROM `users` WHERE `email` = '" . $email . "' OR `mobile` = '" . $mobile . "'");

    // $jsonResult = json_encode($rs); // Convert the array to JSON
    // echo $jsonResult; // Sending back down as JSON

    //getting the number of rows inside $rs
    $n = $rs->num_rows;
    //checking 
    if ($n > 0) {
        echo "User with the same Mobile Number or Email is already exists";
    }
    //if not user exists then insert the user
    else {

        //insert the data and time
        $d = new DateTime();
        $tz = new DateTimeZone('Asia/Colombo');
        $d->setTimezone($tz);
        $date = $d->format('Y-m-d H:i:s');

        Database::iud("INSERT INTO `users`(`fname`, `lname`, `email`, `password`, `mobile`, `gender_id`,`status`,`joined_date`)
        VALUES ('" . $fname . "','" . $lname . "','" . $email . "','" . $password . "','" . $mobile . "','" . $gender . "','1','" . $date . "')");

        //creating a object and assign the values
        $user = new stdClass();
        $user->fname = $fname;
        $user->lname = $lname;
        $user->email = $email;

        //converting the object to json
        $json = json_encode($user);

        //sending the json to the client side
        echo $json;
    }
}
