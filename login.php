<?php

session_start();
//session_unset();
session_destroy();
session_start();

//$_SESSION["sys_root"] = __DIR__;
//$_SESSION["sys_url"]="/utmassetx/";
$_SESSION["sys_url"]="";
$_SESSION["sys_mainpage"]=$_SESSION["sys_url"]."main_screen.php?f=0101000000000000000000000000000000000002";
// $_SESSION["sys_mainpage"] = "main_screen.php?f=0101000000000000000000000000000000000002";

$_SESSION["host"] = 'localhost';
$_SESSION["user"] = 'ajau';
$_SESSION["password"] = 'mousehitam';
$_SESSION["dbname"] = 'utmasset1';
//var_dump($_SESSION); exit();
//$conn = mysqli_connect($_SESSION["host"], $_SESSION["user"], $_SESSION["password"], $_SESSION["dbname"]);

//echo $_SESSION["sys_root"]."<br>";
echo $_SESSION["sys_url"]."<br>";
echo $_SESSION["sys_mainpage"]."<br>";

header( "Location: ".$_SESSION["sys_mainpage"]);
exit();
?>