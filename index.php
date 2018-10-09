<?php session_start(); ?>
<?php //phpinfo(); exit();?>
<?php include("data/db/db.php"); ?>
<?php
  if(isset($_SESSION["id"]) AND $_SESSION["id"] != null){
    include("./layout.php");
  } else{
    include("./login.php");
  }
?>
