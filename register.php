<html>
<body>

<?php
$host="localhost"; // Host name 
$username="root"; // Mysq
$password=""; // Mysql password 
$db_name="adaptive_web1"; // Database name 
$tbl_name="user"; // Table name 

mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");


$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

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

$sql="SELECT username from `user` where username='$username' ";

$result=mysql_query($sql);
$count=mysql_num_rows($result);

if($count==1)
{
	echo "<script type='text/javascript'>
	alert('User already registered');
	 window.location.href='signup.php'</script>";
}
else{
$sql="INSERT INTO `user`(`username`,`email`,`password`,`name`) VALUES ('$username','$email','$password','$name')";
$result=mysql_query($sql);

	echo "<script type='text/javascript'>
	alert('User successfully registered');
	 window.location.href='index.php'</script>";
}

?>

</body></html>