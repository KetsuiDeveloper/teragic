<?php
include("../db/db.php");
$username = $_GET["user"];
$email = $_GET["email"];
$user_available = false;
$email_available = false;
//solo letras, no simbolos raros
if(ctype_alpha($username)){
    //check user
    $query = "SELECT * FROM `users` WHERE username = '".$username."'";
    foreach ($conn->query($query) as $row) {
        $user_available = true;
        //echo "user no";
    }
    //check email
    $query_email = "SELECT * FROM `users` WHERE email = '".$email."'";
    foreach ($conn->query($query_email) as $row_email) {
        $email_available = true;
        //echo "email no";
    }
    //end check


    if($user_available && $email_available){
        echo "false";
    } else if(!$user_available && !$email_available){
        echo "true";
    } else{
        echo "false";
    }
} else{
    echo "false";
}
?>