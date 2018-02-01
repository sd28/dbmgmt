<?php
session_start();

if(isset($_SESSION['uname']))
{
	



?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div id="top">
<marquee> Hello Admin: <?php echo $_SESSION['uname'];?></marquee>

</div>
<div id="left">
<center>
<table border="2">
<tr><th>
<a href="index.php?i=6&id=1">SHOW</a>
</th></tr>
<tr><th><a href="index.php?i=6&id=2">LOGOUT</a></th></tr>
<tr><th><a href="index.php?i=6&id=3">View Feedback</a></th></tr>
</table>
</center>
</div>
<div id="right">
<?php
  if(isset($_GET['id']))
  {
	  switch($_GET['id'])
	  {
		  case "1": include("show.php");break;
		  case "2": include("logout.php");break;
		  case "3": include("feedback.php");break;
	  }
  }
  ?>

</div>

<?php

}
else
{
	echo "Error.. Please Login First";
	header("refresh:2;index.php?i=2");
}
?>

</body>


