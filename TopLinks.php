<?php
session_start();

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){ 

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
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

$user=$_COOKIE['cookieUserName'];

$sql="select url, count(*) from userevents where username='$user' group by url order by count(*) desc limit 5";

$result=mysql_query($sql);
$resultTable=array();
$return_arr = array();
while($row=mysql_fetch_array($result)){

		$resultTable['links']=$row[0];	
		$resultTable['linkcount']=$row[1];
		array_push($return_arr,$resultTable);
}
		echo json_encode($return_arr);
}
?>
