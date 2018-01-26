
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
        <script type="text/javascript">

            var myChart1,myChart,map1={},obj2=[]   ;
            var countObj;
            var obj;
            var category=[];
            var eventCat=[];
$(document).ready(function () {
                barchartLinkCount = Highcharts.chart('LinkCount', {
                    chart: {
                        type: 'column'
                    },
                    title:{
                        text:"Column Chart comparing events logged on a particular site by user vs all users"
                    },
                    plotOptions: {
                        column: {
                            colorByPoint: true
                        },
                        
                        series:{
                            cursor:'pointer',
                            point:{
                                events:{
                                    /*mouseOver: function(){
                                        obj2=[];
                                        var map1={};
                                        for(i=0;i<obj.length;i++){

                                            //  alert(item.username);
                                            if(obj[i].username==this.name){
                                                if(map1[obj[i].eventName]==""||map1[obj[i].eventName]===NaN||map1[obj[i].eventName]==null)
                                                {
                                                    map1[obj[i].eventName]=1;
                                                }
                                                else{
                                                    map1[obj[i].eventName]=map1[obj[i].eventName]+1;
                                                }
                                            }
                                        }
                                        for(var key in map1){
                                            // alert('key is :' + key + ' and value is : '+ map[key])
                                            obj2.push([key,map1[key]]);
                                        }
                                        piechart.setTitle({text:"distribution of events made by user "+this.name})
                                        piechart.series[0].setData(obj2);
                                        console.log(this.y+" "+this.name);

                                    }*/
                                }
                            }
                        }
                    },
                    xAxis: {
                        categories: eventCat
                    },
                    yAxis: {
                        title: {
                            text: 'number of events logged on the site'
                        }
                    },
                    colors: ['#7cb5ec', '#434348','#a6c96a'],
                    series: [{},{}]
                });
            });

            $(document).ready(function () {
                barchart = Highcharts.chart('container', {
                    chart: {
                        type: 'column'
                    },

                    plotOptions: {
                        column: {
                            colorByPoint: true
                        },
                        series:{
                            cursor:'pointer',
                            point:{
                                events:{
                                    mouseOver: function(){
                                        obj2=[];
                                        var map1={};
                                        for(i=0;i<obj.length;i++){

                                            //  alert(item.username);
                                            if(obj[i].username==this.name){
                                                if(map1[obj[i].eventName]==""||map1[obj[i].eventName]===NaN||map1[obj[i].eventName]==null)
                                                {
                                                    map1[obj[i].eventName]=1;
                                                }
                                                else{
                                                    map1[obj[i].eventName]=map1[obj[i].eventName]+1;
                                                }
                                            }
                                        }
                                        for(var key in map1){
                                            // alert('key is :' + key + ' and value is : '+ map[key])
                                            obj2.push([key,map1[key]]);
                                        }
                                        piechart.setTitle({text:"distribution of events made by user "+this.name})
                                        piechart.series[0].setData(obj2);
                                        console.log(this.y+" "+this.name);

                                    }




                                }
                            }
                        }
                    },
                    xAxis: {
                        categories: category
                    },
                    yAxis: {
                        title: {
                            text: 'events logged'
                        }
                    },
                    colors: ['#7cb5ec', '#434348','#a6c96a'],
                    series: [{
                        name: 'user',
                        data: [123,123,13]
                    }]
                });
            });

            $(function () {
                piechart = Highcharts.chart('piec', {
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false,
                        type: 'pie'
                    },

                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.y}</b>'
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: true,
                                format: '<b>{point.name}</b>: {point.y}',
                                style: {
                                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                }
                            }
                        },
                        series:{
                            cursor:'pointer',
                            point:{
                                events:{
                                    mouseOver: function(){
                                        var map={};
                                        var obj1=[];
                                        console.log(this.name+" "+this.y);
                                        for(var i=0;i<obj.length;i++){
                                            if(this.name==obj[i].eventName){
                                                if(map[obj[i]+" "+obj[i].username]==""||map[this.name+" "+obj[i].username]===NaN||map[this.name+" "+obj[i].username]==null)
                                                {
                                                    if(this.name)
                                                        map[this.name+" "+obj[i].username]=1;
                                                }
                                                else
                                                    map[this.name+" "+obj[i].username]=map[this.name+" "+obj[i].username]+1;
                                            }
                                        }
                                        for(var key in map){
                                            obj1.push([key,map[key]]);
                                            category.push(key);
                                        }
                                        // alert(obj1);
                                        barchart.setTitle({text:"number of logs for event:  "+this.name});
                                        barchart.series[0].setData(obj1);

                                    },
                                    mouseOut:function(){

                                        var map = {};
                                        var obj1=[];
                                        //    alert(map[obj[0].username]);

                                        for(i=0;i<obj.length;i++){
                                            //  alert(item.username);

                                            if(map[obj[i].username]==""||map[obj[i].username]===NaN||map[obj[i].username]==null)
                                            {
                                                map[obj[i].username]=1;
                                            }
                                            else{
                                                map[obj[i].username]=map[obj[i].username]+1;
                                            }
                                        }
                                        for(var key in map){
                                            obj1.push([key,map[key]]);
                                            category.push(key);
                                        }
                                        //  alert(obj1);
                                        barchart.series[0].setData(obj1);
                                        barchart.setTitle({text:"total number of events logged by each user "});
                                    }
                                }
                            }
                        }
                    },
                    series: [{
                        name: 'events',
                        colorByPoint: true,
                        data: []
                    }]
                });
            });


            $(document).ready(function () {
                linechart = Highcharts.chart('time_chart', {
                    chart: {
                        type:'line',
                        zoomType: 'x'
                    },
                    title: {
                        text: 'Event clicked by a user over a span of time'
                    },
                    subtitle: {
                        text: document.ontouchstart === undefined ?
                            'Click and drag in the plot area to zoom in' : 'Pinch the chart to zoom in'
                    },
                    xAxis: {
                        type: 'datetime',
                        title: {
                            text: 'Date'
                        }//,
                        //min: null,
                        //max: null
                    },
                    yAxis: {
                        title: {
                            text: 'Number of Clicks'
                        }
                    },
                    legend: {
                        enabled: false
                    },

                    series: [{},{},{}]
                });
            });



            $(document).ready(function(){

                $.ajax({

                    type: "GET",
                    url: "datavisualize.php",
                    success: function(response) {
                        obj=JSON.parse(response);

                        totalCount();}}
                );
            });


            function totalCount(){
                var arr={};
                var map = {};
                var obj1=[];
                //    alert(map[obj[0].username]);

                for(i=0;i<obj.length;i++){
                    //  alert(item.username);

                    if(map[obj[i].username]==""||map[obj[i].username]===NaN||map[obj[i].username]==null)
                    {
                        map[obj[i].username]=1;
                    }
                    else{
                        map[obj[i].username]=map[obj[i].username]+1;
                    }
                }
                for(var key in map){
                    obj1.push([key,map[key]]);
                    category.push(key);
                }

                for(i=0;i<obj.length;i++){

                    //  alert(item.username);
                    if(obj[i].username=='aaa'){
                        if(map1[obj[i].eventName]==""||map1[obj[i].eventName]===NaN||map1[obj[i].eventName]==null)
                        {
                            map1[obj[i].eventName]=1;
                        }
                        else{
                            map1[obj[i].eventName]=map1[obj[i].eventName]+1;
                        }
                    }
                }
                for(var key in map1){
                    // alert('key is :' + key + ' and value is : '+ map[key])
                    obj2.push([key,map1[key]]);
                }
                piechart.series[0].setData(obj2);
                //     alert(obj1);
                barchart.setTitle({text:"Total events by all users"});
                barchart.series[0].setData(obj1);
                //   addValuesToUserDropDown(obj1);
            }

            /*function addValuesToUserDropDown(val){
             var obj1=val;


         }*/

            $(document).ready(function(){


                $.ajax({
                    type:'POST',
                    url:"dropdown.php",
                    success:function(response){
                        var select1 = document.getElementById("eventDropDown");
                        $(select1).empty();
                        var res=JSON.parse(response);
                        for(var i = 0; i < res.length; i++) {
                            var option = document.createElement("option");
                            option.text = res[i].eventname;
                            select1.add(option);
                        }

                    }
                });

            });

            function showGraph()
            {
                var chart1=document.getElementById("container");
                var chart2=document.getElementById("piec");
                chart1.style.display="none";
                chart2.style.display="none";
                var chart3=document.getElementById("time_chart");
                chart3.style.display='block';

                while(linechart.series.length > 0)
                    linechart.series[0].remove(true);
                var days=$('input[name="days"]:checked').val()  ;
                var d=new Date();
                var endDate=d.getFullYear()+"-"+(d.getMonth()+1)+"-"+d.getDate();
                d.setDate(d.getDate()-days);
                var startDate=d.getFullYear()+"-"+(d.getMonth()+1)+"-"+d.getDate();
                console.log(startDate+"    "+endDate);
                var eventselected=document.getElementById('eventDropDown').value;
                console.log(eventselected);
                $.ajax({
                    type:'POST',
                    data:{
                        'startDate':startDate,
                        'endDate':endDate,
                        'eventname':eventselected
                    },
                    url:"showGraph.php",
                    success:function(response){
                        
                        var obj=JSON.parse(response);
                        var users={},date={};
                        for(var i=0;i<obj.length;i++){
                            if(users[obj[i].username]==""||users[obj[i].username]===NaN||users[obj[i].username]==null)
                            {
                                users[obj[i].username]=0;
                            }

                        }var count=0;var uname;
                        for(var key in users){
                            uname=key;
                            arr=[];
                            date={};
                            for(var i=0;i<obj.length;i++){
                                if(key==obj[i].username){
                                    if(date[obj[i].date] == null || date[obj[i].date] == "" || date[obj[i].date] == "NaN"){
                                        date[obj[i].date]=1;
                                    }
                                    else
                                        date[obj[i].date]=date[obj[i].date]+1;

                                }
                            }

                            for(var key in date){
                                var date1 = new Date(key);
                                var d = date1.getDate()+1;
                                var m = date1.getMonth();
                                var y = date1.getYear() + 1900;
                                var utc = Date.UTC(y,m,d);
                                arr.push([utc,date[key]]);
                            }
                            linechart.addSeries({
                                name:uname,
                                data:arr
                            })
                            //linechart.series[count++].setData(arr);
                        }
                        console.log(response);
                    }
                });
            }
            $(document).ready(function(){
                showplots1();
            })
            function showplots1(){              
                var chart1=document.getElementById("container");
                var chart2=document.getElementById("piec");
                var chart3=document.getElementById("time_chart");
                var div1=document.getElementById("eventhistory");
                var div2=document.getElementById("linksRelatedGraph");
                var text=document.getElementById("text1");
                var text1=document.getElementById("text1");
                var text2=document.getElementById("text2");
                text1.style.display='block';
                text2.style.display='block';
                chart1.style.display='block';
                chart2.style.display='block';
                chart3.style.display='none';
                div1.style.display='none';
                div2.style.display='none';
            }
              function showplots2(){
                var chart1=document.getElementById("container");
                var chart2=document.getElementById("piec");
                var chart3=document.getElementById("time_chart");
                var div1=document.getElementById("eventhistory");
                var div2=document.getElementById("linksRelatedGraph");
                var text1=document.getElementById("text1");
                var text2=document.getElementById("text2");
                text1.style.display='none';
                text2.style.display='none';
                chart1.style.display='none';
                chart2.style.display='none';
                chart3.style.display='none';
                div1.style.display='none';
                div2.style.display='block';
            }
            function showplots3(){
                var chart1=document.getElementById("container");
                var chart2=document.getElementById("piec");
                var chart3=document.getElementById("time_chart");
                var div1=document.getElementById("eventhistory");
                var div2=document.getElementById("linksRelatedGraph");
                var text1=document.getElementById("text1");
                var text2=document.getElementById("text2");
                text1.style.display='none';
                text2.style.display='none';
                chart1.style.display='none';
                chart2.style.display='none';
                chart3.style.display='block';
                div1.style.display='block';
                div2.style.display='none';
            }
            
            $(document).ready(function(){

                 $.ajax({
                    type:'GET',
                    url:"TopLinks.php",
                    success:function(response){
                    var resp=JSON.parse(response);
                    var ul = document.getElementById("linklist");
                    for(var i=0; i< resp.length; i++){
                      var a = document.createElement("a");
                      var li = document.createElement("li");
                      var h=resp[i].links;
                      a.textContent = resp[i].links;
                    
                      a.onclick=(function(e){
                                return function(){
                             tagsOnLink(e);
                         };
                            })(h);
                      li.appendChild(a);
                      ul.appendChild(li);
                }}
                });
             });

                      /*  console.log(response);

                        var ul=document.getElementById("linklist");
                        $(document).ready(function() {
       

                        var table = $('<table></table>').attr({class:"table table-striped table-hover"});

                      //  table.setAttribute("class",'table table-striped table-hover')
                       
                        for(var i=0;i<resp.length;i++){         
                            var a=document.createElement("a");
                            var h=resp[i].links;
                            //var a =$('<a>',{href:'#',text:h});
                           // a.onclick=tagsOnLink;
                            a.text=h;
                          //  a.setAttribute('onclick','tagsOnLink('+h+')');
                            a.onclick=(function(e){
                                return function(){
                             tagsOnLink(e);
                         };
                            })(h);
                           // a.textContent=resp[i].links;
                          // /  a.setAttribute('href',resp[i].links);               
                            var row = $('<tr></tr>').append(a);                        
                            table.append(row);

                        }
                        $('#links').append(table);

                    }
                });

    /*             $("#links").click(function(){
                    var text=$(this).text();
                    console.log($.trim(text));
                 });
             });*/
            function tagsOnLink(linkText){
                console.log(linkText);
                $.ajax({
                    type:'GET',
                    url:"tagsFromLinks.php",
                    data:{'link':linkText.substring(9)},
                    success:function(response){
                        console.log(response);
                        var resp=JSON.parse(response);
                        console.log(response);
                        var objArr=[];
                         var objArr1=[];
                        for(var i=0;i<resp.length;i++){
                            objArr.push([resp[i].eventname,Number(resp[i].eventcount),Number(resp[i].eventnameTotal)]);
                            objArr1.push([resp[i].eventnameTotal,Number(resp[i].eventcountTotal)]);
                        }
                        console.log(objArr);
                        for(var i=0;i<objArr.length;i++)
                         {   
                            eventCat[i]=objArr[i][0];
                            //eventCat[i]=objArr[i][0];

                         }
                        barchartLinkCount.series[0].setData(objArr);
                        barchartLinkCount.series[0].update({name:resp[resp.length-1].username});
                        barchartLinkCount.series[1].setData(objArr1);
                        barchartLinkCount.series[1].update({name:"All Users"});

                    }
                });

                $.ajax({
                    type:'GET',
                    url:"tagsFromLinksTotaldata.php",
                    data:{'link':linkText.substring(9)},
                    success:function(response){
                        var resp1=JSON.parse(response);
                        console.log(response);
                        var objArr1=[];
                        for(var i=0;i<resp1.length;i++){
                            objArr1.push([resp1[i].eventname,Number(resp1[i].eventcount)]);
                        }
                        console.log(objArr1);
                        //barchartLinkCount.series[1].setData(objArr1);
                    }
                });

            }
        </script>
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
<nav class="navbar navbar-default">
  <div class="container-fluid">
  <h3>Click on a button to view graph

    <div class="btn-group" data-toggle="buttons" style="padding-left: 100px;">
  
  <button onclick="showplots1()" style="margin-left: 60px" class="btn btn-primary">Event Graphs</button>
  <!-- <label class="btn btn-primary" style="margin-left: 100px">
    <input type="radio" name="options" id="option2" autocomplete="off"> Favourite website
  </label> -->
  <button onclick="showplots2()" style="margin-left: 60px" class="btn btn-primary">Favourite website</button>

 <!--  <label class="btn btn-primary" style="margin-left: 100px">
    <input type="radio" name="options" id="option3" autocomplete="off" >  Radio 3
     </label> -->
     <button onclick="showplots3()" style="margin-left: 60px" class="btn btn-primary">Event History</button>
  </h3>
</div>
  </div>
</nav>
    <div class="container-fluid">

        <div class="row">

            <div class="col-sm-2" style="background-color: silver;min-height: 720px" id="eventhistory" style="display: none">

                <fieldset >
                    <legend>Select duration </legend>
                    <div class="radio"><h4>
                        <label><input type="radio" name="days" id="radio-1" value= "7" checked="checked">Last 7 days</label></h4>
                    </div>
                    <div class="radio"><h4>
                        <label><input type="radio" name="days" id="radio-2" value= "30" checked="checked">Last 30 days</label></h4>
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Select the event Name</label>
                        <select class="form-control" id="eventDropDown" >
                            <option>select</option>
                        </select>
                    </div>
                </fieldset>
                <br><br>
                <input type="button" style="margin-left: 60px" class="btn btn-primary" id="showGraph" value="View Graph" onclick="showGraph()">
                <br><br>
                <!-- <label>Click Button to diplay all event related graphs</label>
                <button onclick="showplots()" style="margin-left: 60px" class="btn btn-primary">Event Graphs</button>
 -->
            </div>

            <div class="row" id="linksRelatedGraph" >
            <table id='linksCombineTables' style="border: solid;margin-right: 50px;margin-left: 50px">
            <tr>
            <td style="border: solid;width: 30%">
             <h3>Click on the below five top visited links by user to view the events logged on that page by user and also by all other users.</h3>
                <div class="col-sm-4" id="links" >
                    <ol id="linklist" style="text-align: justify;"></ol>
                </div>
                </td>
                <td style="border: solid;min-width: 720px">
                
                <div class="col-sm-9"  >
                   <div id="LinkCount" style="width:1100px; height:540px;margin-top: 10px"></div>
                </div>
                </td>      
                </tr>          
                </table>
            </div>
          <!--   <div class="row">
                <div class="col-sm-10"></div>
            </div> -->
            <div class="col-sm-10" >
            <table  style="border: solid;margin-right: 50px;margin-left: 50px">
            <tr><td style="border: solid;min-width: 50%">
            <h2 id="text1"style="text-align: center;">Column chart showing total number of events logged by each user till today</h2>
                <div id="container" style="width:0%; height: 440px; float: left;margin-top: 100px"></div>
                </td><td style="border: solid;min-width: 1020px;text-align: center;">
                <h2 id="text2">Pie chart showing distribution of individual events made by each user over course of time</h2>
                <div id="piec" style="width:100%; height:440px;float: right;margin-top: 50px"></div>
                </td></tr>
                
            </table>
                <div id="time_chart" style="width:80%; height:440px;display: none;margin-top: 10px;margin-left: 20px"></div>
            </div>
        </div>

    </div>

    </div>
    </html>
