
<?php

session_start();
session_destroy();
session_start();

// LOCAL SERVER
$_SESSION['fileDir']["sys_url"]="/assetx/";

// ALL SERVERS
$_SESSION['fileDir']["sys_mainpage"]=$_SESSION['fileDir']["sys_url"]."/main_screen.php?f=0101000000000000000000000000000000000002";

$_SESSION['db']["host"] = 'localhost';
$_SESSION['db']["user"] = 'root';
$_SESSION['db']["password"] = '';
$_SESSION['db']["dbname"] = 'utmasset1';

// 1. Tell the browser explicitly NOT to store or cache this redirect
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Pragma: no-cache');
header('Expires: Thu, 01 Jan 1970 00:00:00 GMT');

header("Location: ".$_SESSION['fileDir']["sys_mainpage"], true, 301);
exit();
?>