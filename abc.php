<?php
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
if (isset($_POST['SigninButton'])) {

$username = $_POST['username'];
$password=$_POST['password']; 

$sql="SELECT username , password FROM $tbl_name WHERE username='$username' and password='$password'";
$result=mysql_query($sql);

$count=mysql_num_rows($result);

if($count==1)
{
	$sql1="INSERT INTO `userloginhistory`(`username`) VALUES ('$username')";
 $res=mysql_query($sql1);
print ("Welcome back, friend!");
session_start();

$_SESSION['loggedin']=true;
$_SESSION['username'] = $username;

if(!isset($_COOKIE[$username]))
{
	setcookie($username,$username,time()+3600*24*365);
	setcookie('cookieUserName',$username,time()+3600*24*365);
	print("Cookie created");
}
else{
		setcookie('cookieUserName',$username,time()+3600*24*365);
		print("cookie without set   "+$_COOKIE['cookieUserName']);

	}
	
	header('Location:UserPage.php');

}
else
{	
	echo "<script type='text/javascript'>
	alert('User Not registered');
	 window.location.href='index.php'</script>";
	//header('Location:index.html');
}
}

?>

<!-- <html><body><script type="text/javascript">
var obj={};
var val='<?php echo $_COOKIE[$username]?>';

</script>
<?php  print $_COOKIE[$username] ?>

<a href="https://stackoverflow.com/questions/tagged/java?sort=frequent&pageSize=15">https://stackoverflow.com/questions/tagged/java?sort=frequent&pageSize=15</a></body></html>
 -->