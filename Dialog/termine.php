<?php
session_start();
$_SESSION["mail"] = $_GET["mail"]; 
echo $_SESSION["mail"] ;
?>

