<?php
include("../db/db.php");
date_default_timezone_set('Europe/Madrid');
if($_POST["password"] != $_POST["reppassword"]){
  //redirection and error msg
}
$username = $_POST["username"];
if(!ctype_alpha($username)){
  //redirection and error msg
}
//default icon for new users
$defaultImg = 1;
$date = date("d/n/o - G:i");
$initial_money = 2000;
$defaultHero = 0;
//user
//username, email, gender, password
$user = array();
$user["username"] = $_POST["username"];
$user["email"] = $_POST["email"];
$user["hero"] = $defaultHero;
$user["isEmailVerified"] = "0";
$user["gender"] = $_POST["gender"];
$user["password"] = $_POST["password"];
$user["icon"] = $defaultImg;
$user["user_xp"] = "0";
$user["user_hp"] = "100";
$user["user_mana"] = "100";
$user["id_guild"] = "0";
$user["register_date"] = $date;
$user["game_money"] = $initial_money;
$user["account_state"] = "1";
$user["account_role"] = 1;

if(true){
  if($_POST['password'] == $_POST['reppassword']){
    //cifrar clave
    $hash_passw = password_hash($_POST['password'], PASSWORD_DEFAULT, ['cost' => 15]);
    $user["password"] = $hash_passw;
    //insertar datos
    
    $insertUser = $conn->prepare("INSERT INTO `users`(`username`, `email`, `hero`, `isEmailVerified`, `gender`, `password`, `icon`, `user_xp`, `user_hp`, `user_mana`, `id_guild`, `register_date`, `game_money`, `account_state`, `account_role`) 
    VALUES (:username, :email, :hero, :isEmailVerified, :gender, :password, :icon, :user_xp, :user_hp, :user_mana, :id_guild, :register_date, :game_money, :account_state, :account_role)");
    $insertUser->bindParam(':username', $user["username"]);
    $insertUser->bindParam(':email', $user["email"]);
    $insertUser->bindParam(':hero', $user["hero"]);
    $insertUser->bindParam(':isEmailVerified', $user["isEmailVerified"]);
    $insertUser->bindParam(':gender', $user["gender"]);
    $insertUser->bindParam(':password', $user["password"]);
    $insertUser->bindParam(':icon', $user["icon"]);
    $insertUser->bindParam(':user_xp', $user["user_xp"]);
    $insertUser->bindParam(':user_hp', $user["user_hp"]);
    $insertUser->bindParam(':user_mana', $user["user_mana"]);
    $insertUser->bindParam(':id_guild', $user["id_guild"]);
    $insertUser->bindParam(':register_date', $user["register_date"]);
    $insertUser->bindParam(':game_money', $user["game_money"]);
    $insertUser->bindParam(':account_state', $user["account_state"]);
    $insertUser->bindParam(':account_role', $user["account_role"]);

    $insertUser->execute();
    echo "true";
  } else{
    echo "false";
  }
}


 ?>
