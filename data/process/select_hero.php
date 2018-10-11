<?php
session_start();
include('../db/db.php');
$hero_id = $_GET["h"];
$query = "SELECT `hero` FROM `users` WHERE `id` = '".$_SESSION["id"]."'";
foreach ($conn->query($query) as $user_data) {
    $checkHero = "SELECT * FROM `heros` WHERE available = 1 AND id = '".$hero_id."'";
    foreach ($conn->query($checkHero) as $hero_available) {
        if($user_data["hero"] == "0"){
            $update = "UPDATE `users` SET `hero` = '".$hero_id."' WHERE `id` = '".$_SESSION["id"]."'";
            $conn->query($update);
            $_SESSION["hero"] = $hero_id;
            echo "true";
        }
    }
}
?>