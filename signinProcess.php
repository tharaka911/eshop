<?php

//session start
session_start();

//import connection.php for database connection,iud and search(curd)
require "connection.php";

//getting data from the form XMLHttpRequest object which is come to the server side
$email = $_POST["e"];
$password = $_POST["p"];
$rememberme = $_POST["r"];

// echo ($email);
// echo ($password);
// echo ($rememberme);

//vadlidating email
if (empty($email)) {
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
} else {
    //checking whether the user is already exists
    $rs = Database::search("SELECT * FROM `users` WHERE `email` = '" . $email . "' AND `password` = '" . $password . "'");
    $n = $rs->num_rows;

    // echo($n);

    if ($n == 1) {

        echo("success");
        $data = $rs->fetch_assoc();
        $_SESSION["u"] =$data;

        if ($rememberme == "true"){
            setcookie("email",$email,time()+(60*60*24*365));
            setcookie("password",$password,time()+(60*60*24*365));
            
        }else{
            setcookie("email","",-1);
            setcookie("password","",-1);
        }
        

        
    } else {
      echo ("Invalid email or password");
    }

}




?>