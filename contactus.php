<?php
if(isset($_POST['button']))
{ $exec=1;
	mysql_connect("localhost","root","");
mysql_select_db("project")or die("error");
$email_id=$_POST['em'];
$message=$_POST['tx'];
$query="insert into `feedback` values(NULL,'$em','$tx')";
mysql_query($query);
}
?>
	






<html>
<head>
<style>
#lleft{
	position:relative;
	float:left;
	height:100%;
	background-color:#003300;
}
#rright{
	border:2px solid black;
	border-radius: 10px;
	position:relative;	
	width:47.4%;
	height:500px;
	margin-top:0px;
	margin-left:700px;
	background-color:#000099;
	display:block;
}
h3{
	color:red;
}
h1{
	color:green;
}
h1:hover{
	color:#00ff00;
}
h4{
	color:red;
}
</style>
</head>
<body>
<div id="lleft">
<script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script><div style='overflow:hidden;height:440px;width:700px;'><div id='gmap_canvas' style='height:440px;width:700px;'></div><div><small><a href="http://embedgooglemaps.com">									embed google maps							</a></small></div><div><small><a href="https://termsofusegenerator.net">terms of use generator</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><script type='text/javascript'>function init_map(){var myOptions = {zoom:10,center:new google.maps.LatLng(28.5374198,77.25972739999997),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(28.5374198,77.25972739999997)});infowindow = new google.maps.InfoWindow({content:'<strong>Office</strong><br>D-63 Kalkaji New Delhi India<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
<!--
<iframe src=" https://www.google.co.in/maps/@28.5453221,77.25598,16z"/>	
-->
<h3>Address:Kalkaji</h3>
</div>
<div id="rright">
<h1>Give us some feedback!</h1>
<form method="post">
<input type="text" name="em" required placeholder="Email"/><br><br><br>

<textarea name="tx" rows=10 cols=30>
Enter Text Here...
</textarea>
<br>
<input type="submit" value="SubmitFeedback" name="button"/>
	
	<?php
	   if(isset($exec))
	   { echo "<h4>";
		   if(mysql_affected_rows()>0)
		   {
			   echo "FeedBack Recorded!";
		   }
		   else
			   echo "Feedback not recorded error occured";
		  echo "</h4>";
	   }
	   ?>
	
</form>
</div>	


