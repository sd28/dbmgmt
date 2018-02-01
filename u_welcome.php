<?php
session_start();

if(isset($_SESSION['uuname']))
{
	



?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div id="top">
<marquee> Hello User: <?php echo $_SESSION['uuname'];?></marquee>

</div>
<div id="left">
<center>
<table border="2">

<tr><th><a href="index.php?i=7&id=1">SHOW</a></th></tr>
<tr><th><a href="index.php?i=7&id=2">LOGOUT</a></th></tr>
</table>
</center>
</div>
<div id="right">
<center>
<?php
  if(isset($_GET['id']))
  {
	  switch($_GET['id'])
	  {
		  case "1":       mysql_connect("localhost","root","");
						  mysql_select_db("project")or die("error");
						  $uuname=$_SESSION['uuname'];
						  $query="select * from `user` where `name`='$uuname'";
                          $res=mysql_query($query);

							while($row=mysql_fetch_array($res))
						{
							//print_r($row);
							$ids=$row['id'];
							$names=$row['name'];
							$mobs=$row['mobile'];
							$citys=$row['city'];
							$dobs=$row['dob'];
							$profs=$row['profession'];
							$passes=$row['password'];
	
						}
						echo"<table border='2'>";
						echo"<tr><th>NAME</th><th>City</th><th>Mobile</th><th>DOB</th><th>Profession</th><th>Password</th><th>Update</th><th>Delete</th></tr>";
						echo "<td>".$names."</td><td>$citys</td><td>$mobs</td><td>$dobs</td><td>$profs</td><td>$passes<td><a href='update.php?rid=$ids'>Update</a></td><td><a href ='delete.php?rid=$ids'>Delete</a>";
			echo "</tr>";
						break;
							
		  case "2": include("logout.php");break;
		  
	  }
  }
  ?>

</div>
</center>
<?php

}
else
{
	echo "Error.. Please Login First";
	header("refresh:2;index.php?i=2");
}
?>

</body>