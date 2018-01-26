
    <html>
    <head>

        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style type="text/css">
            #tableId:{
                border: solid;
            }
        </style>
</head>
    <body>
    <h1 style="font-size: 60px;" align="center">ADAPTIVE WEB</h1>

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





<h1 style="text-align: left;color: blue;margin-left:100px;margin-top: 250px">Description of Event Logs </h1>
<table class="table table-striped table-hover" style="max-width: 1280px;margin-left: 100px">
<tr>
<th>Chart type</th>
<th>Findings</th>
</tr>

<tr>
<td> Pie chart and Column chart</td>
<td>
 <p>Column chart shows the total number of events done by each user on any page of stackoverflow.com from creation of the account till today. This is important to know as it can tell which user is more active on the website. This chart is drawn between event count on y axis and users on x axis.<br>

                Pie Chart tells us the distribution of individidual events done by the user.It informs the distribution of events like mouse click, mouse over, mouseup and all events captured in the first assignment. <br>

                The interaction between these two charts show which event is most used and by which user<br>

                Simply hover over the column chart to get distribution of events of 'hovered' user on the pie chart. If you hover over any slice of pie chart the event count of that particular 'hovered' event will be displayed on the bar chart for each user. If you click on any slice of pie chart, the selected portion comes out for easy viewing. 
                <b>Interactions covered: mouse hover and mouse click</b>
                <br>
                steps to find results: HOvering over the pie chart gives the results of all users who made that event on the column chart and hovering over the column chart shows the distribution of events of that particular users on the pie chart.
                </p>
</tr>

<tr>
<td> Favourite websites(Column chart)</td>
<td>
<p>
    This tab shows the top 5 maximum visited stackoverflow pages by the user. It is important as we can know what type of pages/topics is he usually searching for. Also when we click on any of the link the column chart that appears besides it compares the users activity with the total activity of all the users on that particular link.<br>
    Interactions covered: mouse clicks on hyperlinks and column chart<br>
    steps to find results: Look at the column chart and for every event listed down on the x-axis see the corresponding value on the y-axis which show what number of events were done by the user/all users on that particular website.

    <br> <b>Since the data was limited there may be case that total count and user count is equal.</b>
</p>
</td>
</tr>
<tr>


<tr>
<td>Event History (Line Chart)</td>
<td>
Here we have tried to capture user's last 7 days or 30 days activity for a particular event. A user can select either 7days/30days from the radio buttons and an event for which he wishes to see his and other users activity for that number of days. This analysis is important as it tells us which event has the user performed for the last week or a month. User's activity cn be tracked here.
<br>

Interactions covered: radio button click and drop-down selection<br>
steps to find results:  Go to the particular date(x-Axis). Hover over the point which displays the user and the number of clicks for the particular event.
</td>
</tr>

<tr>
<td><h3> BONUS:User login and event history<h3></td>
<td>
On the user's profile page I have highlighted the days the user was active and number of events he has made on a particular day. This analysis is important as it shows the user daily logging patterns and the numbers of events he do on a particular day on the site.
<br>
Interaction covered: mouse hovering
<br>
steps to find results: the darker the color of the graph the more are the number of events on that day.
</td>
</tr>



</table>
</body>
<div>
   
</div>

<br><br>

    </body></html>