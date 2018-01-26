<html>
<head>	
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    
      google.charts.load("current", {packages:["calendar"]});
      google.charts.setOnLoadCallback(drawChart);

   function drawChart() {
       var dataTable = new google.visualization.DataTable();
       dataTable.addColumn({ type: 'date', id: 'Date' });
       dataTable.addColumn({ type: 'number', id: 'events' });


       $.ajax({
          type:"GET",
          url:"fetchUserHistory.php",
          success:function(response){
              console.log(response);
              var obj=JSON.parse(response);
              for(var i=0;i<obj.length;i++){
                  var dt=new Date(obj[i].date);

                  dataTable.addRows([
                     [ new Date(Number(dt.getFullYear()),Number(dt.getMonth()), Number(dt.getDate()+1)),Number(obj[i].countactivity)]
                     //[new Date(2017, 3, 13), 37223032 ]
                  ]);
                         var chart = new google.visualization.Calendar(document.getElementById('calendar_basic'));

                  var options = {
                  title: "User login and event history",
                  height: 450,
                   };

                chart.draw(dataTable, options);
                  
             }
          }
       });

      
   }


  </script>
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
<!-- <form class="form-group" action="userEventLogs.php">
<div class="form-group"  style="width: 400px; margin-left:400px;margin-top: 10px" align="center">

<input type="submit" value="Event Logs" class="btn btn-primary" style="font-size: 20px"></div>
</form> -->
<h2 align="center"></h2>
<div style="width: 700px; margin-top: 90px;margin-left: 60px;float:left;">
<h3>Welcome <?php echo $_COOKIE['cookieUserName'] ?>, Your Last 5 logins were:</h3>
<table class="table table-striped table-hover" align="center" style="font-size: 24px ;min-width: 700px; text-align: center;">
<tbody>
<tr>
<th style="text-align: center;"><strong >UserName</strong></th>
<th style="text-align: center;"><strong >TimeStamp</strong></th>
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

$sql="SELECT username, timestamp  FROM userloginhistory WHERE username='$user' order by timestamp desc limit 5";
$result=mysql_query($sql);

while($row=mysql_fetch_array($result)){

		echo"<tr><td>".$row[0]."</td><td>".$row[1]."</td></tr>";
	}
	?>


</table></div>


<?php 
}

else{
	header('Location:index.php');
}


?>

<div style="background-color: #f2f2f2;float: right;margin-top: 100px;margin-bottom: 100px;margin-right: 20px">


<div id="calendar_basic" style="width: 1000px; height: 350px;margin-left: 00px;padding-top: 100px;padding-left: 50px"></div>

</div>

<h1 style="text-align: left;color: blue;margin-left:100px;margin-top: 250px">Description of Event Logs </h1>
<table class="table table-striped table-hover" style="max-width: 1280px;margin-left: 100px">
<tr>
<th>action</th>
<th>reason</th>
</tr>

<tr>
<td> Down Vote</td>
<td>
I decided to log this event because from this we can know what answer did the user didn't like or felt they were wrong.
</td>
</tr>

<tr>
<td> Up Vote</td>
<td>
I decided to log this event because from this we can know what answers user liked and felt they were correct.
</td>
</tr>


<tr>
<td> Question heyperlink</td>
<td>
From this event we can know what questions the user particularly visits on stackoverflow page. We can gather the information on which topics the user is particularly interested in.
</td>
</tr>

<tr>
<td> BookMark</td>
<td>
From this event we can know what question the user is likely to return to and is really interested in.
</td>
</tr>

<tr>
<td>Post tag</td>
<td>
This event is important because it tells us which tags the user clicked. This shows us which topics or tags the user is interested in.
</td>
</tr>

<tr>
<td>Scroll</td>
<td>
Generally a user scrolls a page when he is too involved in the discussion. This event would let us know if the user is reading every answer or question being posted on a page or is in need of some fine answer.
</td>
</tr>

<tr>
<td> Improve this question</td>
<td>
This event is triggered when user clicks on improve this question link. This event is important as we know what questions the user also has some problems in and edits the questions.</tr>

</table>
</body>

</html>

