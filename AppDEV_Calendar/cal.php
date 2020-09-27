<html>
<?php //include ( "header.php" );?>
<head> 

<title>JavaScript calendar</title>


<script> 
function displayCalendar(){
 
 var htmlContent ="";
 var FebNumberOfDays ="";
 var counter = 1;
 
 var dateNow = new Date();
 var month = dateNow.getMonth();

 var nextMonth = month+1; //+1; //Used to match up the current month with the correct start date.
 var prevMonth = month -1;
 var day = dateNow.getDate();
 var year = dateNow.getFullYear();
 
 //Determing if February (28,or 29)  
 if (month == 1){
    if ( (year%100!=0) && (year%4==0) || (year%400==0)){
      FebNumberOfDays = 29;
    }else{
      FebNumberOfDays = 28;
    }
 }
 
 // names of months and week days.
 var monthNames = ["January","February","March","April","May","June","July","August","September","October","November", "December"];
 var dayNames = ["Sunday","Monday","Tuesday","Wednesday","Thrusday","Friday", "Saturday"];
 var dayPerMonth = ["31", ""+FebNumberOfDays+"","31","30","31","30","31","31","30","31","30","31"]
 
 // days in previous month and next one , and day of week.
 var nextDate = new Date(nextMonth +' 1 ,'+year);
 var weekdays= nextDate.getDay();
 var weekdays2 = weekdays
 var numOfDays = dayPerMonth[month];
     
 // this leave a white space for days of pervious month.
 while (weekdays>0){
    htmlContent += "<td class='monthPre'></td>";
 
 // used in next loop.
     weekdays--;
 }
 
 // loop to build the calander body.
 while (counter <= numOfDays){
 
     // When to start new line.
    if (weekdays2 > 6){
        weekdays2 = 0;
        htmlContent += "</tr><tr>";
    }
 
    // if counter is current day.
    // highlight current day using the CSS defined in header.
    if (counter == day){
        htmlContent +="<td class='dayNow'  onMouseOver='this.style.background=\"#FF0000\"; this.style.color=\"#FFFFFF\"' "+
        "onMouseOut='this.style.background=\"#FFFFFF\"; this.style.color=\"#00FF00\"'><button onclick='getevents("+counter+")'>"+counter+"</button></td>";
    }else{
        htmlContent +="<td class='monthNow' onMouseOver='this.style.background=\"#FF0000\"'"+
        " onMouseOut='this.style.background=\"#FFFFFF\"'><button onclick='getevents("+counter+")'>"+counter+"</button></td>";    
    }
    
    weekdays2++;
    counter++;
 }
 
 // building the calendar html body.
 var calendarBody = "<form  method='get'><table class='calendar'> <tr class='monthNow'><th colspan='7'>"
 +monthNames[month]+" "+ year +"</th></tr>";
 calendarBody +="<tr class='dayNames'>  <td>Sun</td>  <td>Mon</td> <td>Tues</td>"+
 "<td>Wed</td> <td>Thurs</td> <td>Fri</td> <td>Sat</td> </tr>";
 calendarBody += "<tr><fieldset>";
 calendarBody += htmlContent;
 calendarBody += "<fieldset></tr></table></form>";
 calendarBody +="<div class='result'><ul><li><a id='book1' href='#home'>book1</img> </a></li></ul></div>";
 // set the content of div .

 document.getElementById("calendar").innerHTML=calendarBody;

 
}

function getevents(counter)
{
	
	var _user,_day,_url;
	if (counter<10){
		counter='0'+counter;
	}
	_day=counter;
	d= new Date();
	var _month=d.getMonth();
	
	var _year=d.getFullYear();
	
	_url="events.php?date="+_day+"-"+_month+"-"+_year;
	
	var xhttp;
	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange=function(){
		if(this.readyState==4 && this.status==200){
			
		   	document.getElementById("book1").innerHTML=this.responseText;
		}
	};
	xhttp.open("GET",_url,true);
	xhttp.send();
}

function add(){
	
	_url="addevent.php?";
	var xhttp;
	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange=function(){
		if(this.readyState==4 && this.status==200){
		   	document.getElementById("add").innerHTML=this.responseText;
		}
	};
	xhttp.open("GET",_url,true);
	xhttp.send();
}

function delet(){
	
	
}

</script> 
</head> 
 
<body onload="displayCalendar()"> 

<div id="calendar"></div>
 
		    
                  
                 
           
</body> 
<style> 
.monthPre{
 color: gray;
 text-align: center;
}
.monthNow{
 color: blue;
 text-align: center;
}
.dayNow{
 border: 2px solid pink;
 color: #FF0000;
 text-align: center;
}
.calendar td{
 htmlContent: 2px;
 width: 40px;
}

.monthNow th{
 background-color: #000000;
 color: #FFFFFF;
 text-align: center;
}
.dayNames{
 background: #0FF000;
 color: #FFFFFF;
 text-align: center;
}

.result{
	position:inherit;
	margin-left:480px;
	margin-top:-180px;
	padding:0px;
	height:1000px;
	width:800px;
	
}
.result a{
    display: block;
    color: #000;
    padding: 100px 100px;
    text-decoration: none	
	background-color:pink;
}

.result img {
	width:250px;
	height:auto;	
}

.result a:hover{
	background-color:#e6e6e6;
	color:black;
	margin:0px;
	width:500px;
 }
</style> 
