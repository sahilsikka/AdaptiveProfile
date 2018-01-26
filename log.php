<?php
header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: GET, POST');

header("Access-Control-Allow-Headers: X-Requested-With");
header('content-type: application/xml; charset=utf-8');


$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$host=$url["host"]; // Host name 
$username= $url["user"]; // Mysq
$password=$url["pass"];; // Mysql password 
$db_name=substr($url["path"], 1); // Database name 
$tbl_name="user"; // Table name 


/*$host="localhost"; // Host name 
$username="root"; // Mysq
$password=""; // Mysql password 
$db_name="adaptive_web1"; // Database name 
$tbl_name="user"; // Table name 
*/
$conn=mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

if(!$conn){
	die("connection failed".mysql_connect_error());
}
$eventName=$_POST['target'];
$user=$_POST['userName'];
$eventType=$_POST['eventType'];
$url=$_POST['url'];
$html=$_POST['html'];
$sql1="INSERT INTO `userevents`(`UserName`,`eventName`,`eventType`,`url`,`html`) VALUES ('$user','$eventName', '$eventType','$url','$html')";

$res=mysql_query($sql1);
/**/
echo "abdgadad";

?>