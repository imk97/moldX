
<?php

session_start();
session_destroy();
session_start();

//$_SESSION["sys_root"] = __DIR__;
//$_SESSION["sys_url"]="/utmassetx/";
$_SESSION["sys_url"]="";
$_SESSION["sys_mainpage"]=$_SESSION["sys_url"]."main_screen.php?f=0101000000000000000000000000000000000002";
// $_SESSION["sys_mainpage"] = "main_screen.php?f=0101000000000000000000000000000000000002";

// ALL SERVERS
$_SESSION['fileDir']["sys_mainpage"]=$_SESSION['fileDir']["sys_url"]."/main_screen.php?f=0101000000000000000000000000000000000002";

$_SESSION['db']["host"] = 'localhost';
$_SESSION['db']["user"] = 'ajau';
$_SESSION['db']["password"] = 'mousehitam';
$_SESSION['db']["dbname"] = 'utmasset1';

header( "Location: ".$_SESSION['fileDir']["sys_mainpage"]);
exit();
?>