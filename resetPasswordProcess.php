<?php

require "connection.php";

$email = $_POST["e"];
$new_pw = $_POST["np"];
$retype_pw = $_POST["rnp"];
$v_code = $_POST["vc"];

// echo $email;
// echo $new_pw;
// echo $retype_pw;
// echo $v_code;

if (empty($email)){
    echo ("please enter your email address first");
}else if (empty($new_pw)){
    echo ("please enter your new password first");
}else if (strlen($new_pw) < 5 || strlen($new_pw) > 20){
    echo ("password must be at least 8 characters");
}else if (empty($retype_pw)){    
    echo ("please retype your new password first");
}else if ($new_pw != $retype_pw){
    echo ("passwords are not matching");
}else if (empty($v_code)){
    echo ("please enter your verification");
}else{

$rs =Database::search("SELECT * FROM `users` WHERE `email` = '".$email."' AND `verification_code` = '".$v_code."'");

$n = $rs->num_rows;

if ($n == 1){
    Database::iud("UPDATE `users` SET `password` = '".$new_pw."'  WHERE `email` = '".$email."' AND `verification_code` = '".$v_code."'");
    echo ("success");

}else{
    echo ("invalid verification code");
}

}

?>