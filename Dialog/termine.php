<?php
session_start();
$_SESSION["mail"] = $_GET["mail"]; 
echo $_SESSION["mail"] ;
?>

<meta http-equiv="refresh" content="0; URL= termine2.php" />