<html>
<head>	
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<h1 style="font-size: 60px;" align="center">ADAPTIVE WEB</h1>

<p style="font-size: 36px;color: red">Hello <?php echo $_COOKIE['cookieUserName'] ?></p>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      
    </div>
    <ul class="nav navbar-nav">
    <li><a href="UserPage.php"><input class="btn btn-primary" style=" font-size: 20px;color: white;font-weight: bold;" type="button" value="User Profile"></a>
</li>
      <li style="padding-left: 300px" class="active">
      <form class="form-group" action="userEventLogs.php"><input type="submit" value="Event Logs" class="btn btn-primary" style="font-size: 20px;font-weight: bold;margin-top:15px "></form></li>

      <li style="padding-left: 50px"><a href="https://stackoverflow.com/questions/tagged/java?sort=frequent&pageSize=15" target="_blank" ><input class="btn btn-primary" style=" font-size: 20px;color: white;font-weight: bold;" type="button" value="StackOverflow"></a></li>

      <li style="padding-left: 50px">
      <a href="visualize.php" ><input class="btn btn-primary" style=" font-size: 20px;color: white;font-weight: bold;" type="button" value="Visualize"></a>
		</li>    
    <li style ="padding-left: 50px">
                    <a href="findings.php"><input type="button" class="btn btn-primary" style="font-size: 20px;color: white;font-weight: bold" value="findings"></a>
                </li>
   		 <li style="padding-left: 50px">
    		<form action="signout.php" >
			<input type="submit" value="Sign Out" class="btn btn-primary" style="font-size: 20px;font-weight: bold;margin-top: 15px"></div>
		 </form>

    </li></ul>
  </div>
</nav>

<h2 align="center"></h2>
<div style="min-width: 900px; margin-top: 100px;margin-left: 60px">
<h2>StackOverflow Logs for User <?php echo $_COOKIE['cookieUserName'] ?></h2>
<table class="table table-striped table-hover" align="center" style="font-size: 24px ;text-align: center;border: 1px solid">
<tbody>
<tr style="border: 1px solid" >
<th style="text-align: center;border: 1px solid"><strong >Event Type</strong></th>
<th style="text-align: center;border: 1px solid"><strong >Target</strong></th>
<th style="text-align: center;border: 1px solid"><strong >HTML Content</strong></th>
<th style="text-align: center;border: 1px solid"><strong >URL</strong></th>
<th style="text-align: center;border: 1px solid"><strong >Timestamp</strong></th>

</tr>
</tbody>

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
$user=$_COOKIE['cookieUserName'];

mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

$sql="SELECT eventType,eventName,html,url, timestamp  FROM userevents WHERE username='$user' order by timestamp desc limit 20";
$result=mysql_query($sql);

while($row=mysql_fetch_array($result)){

		echo "<tr style='border: 1px solid'><td style='border: 1px solid'>".$row[0]."</td><td style='border: 1px solid'>".$row[1]."</td><td style='border: 1px solid'>".$row[2]."</td><td style='border: 1px solid'>".$row[3]."</td><td style='border: 1px solid'>".$row[4]."</td></tr>";
	}
	}?>


</table></div></body>

</html>