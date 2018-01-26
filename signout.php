<?php
// Put this code in first line of web page.

session_start();
$_SESSION['loggedin'] = false;
session_destroy();

setcookie($_COOKIE[$_COOKIE['cookieUserName']], "", time() - 3600);
setcookie($_COOKIE['cookieUserName'], "", time() - 3600);

header("Location: index.php"); 


?>
