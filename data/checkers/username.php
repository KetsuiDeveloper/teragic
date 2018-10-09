<?php
$username = $_GET["user"];
//solo letras, no simbolos raros
if(ctype_alpha($username)){
    echo "true";
} else{
    echo "false";
}
?>