<?php

if(isset($_POST['button']))
{
	mysql_connect("localhost","root","");
mysql_select_db("project")or die("error");
$name=$_POST['nm'];
$npass=$_POST['npass'];
$query="insert into `admin` values ('$name','$npass')";
mysql_query($query);
	if(mysql_affected_rows() >0)
		echo "Registration SuccessFUl!!!";
	else
		echo "Registration Unsuccesful";
}

?>
<center>
<form method="post" style="background-color:#9999ff; border:2px solid black;border:radius:5px;width:300px;margin:0 auto">
Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="nm"/><br>
Password:<input type="password" name="npass" pattern=".{6,}" title="Six or more characters(Max 10)"/><br>
<input type="submit" name="button" value="submit"/>
<center>
</form>