<?php
session_start();
if(isset($_SESSION['uname']) && isset($_GET['idd']) && isset($_GET['rid']))
{
	$showid=$_GET['idd'];
	$ret="location:index.php?i=6&id=1&idd=$showid";
}
else
	if((isset($_SESSION['uuname']) && isset($_GET['rid'])))
		$ret="location:index.php?i=7&id=2";
else
{
	echo"invalid session ";
  header("refresh:1;index.php?i=2");
}
    $rid=$_GET['rid'];
	mysql_connect("localhost","root","");
mysql_select_db("project")or die("error");
$query="delete from `user` where `id`=$rid";
mysql_query($query);
if(mysql_affected_rows()>0)
{
	echo "<h1>Deleted!</h1>";
	header("$ret");
}
else
{
	echo "Deletion Unsuccesful";
	header("$ret");
}


?>