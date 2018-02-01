<?php
session_start();
if(isset($_SESSION['uname']))
{
	header("location:index.php?i=6");
}
else
	if(isset($_SESSION['uuname']))
	{
		header("location:index.php?i=7");
	}
?>
<?php
if(isset($_POST['button']))
{
	
	mysql_connect("localhost","root","");
mysql_select_db("project")or die("error");
if($_POST['ch']=="Admin")
	$query="select * from `admin`";
else
	if($_POST['ch']=="User")
	 $query="select * from `user`";
 
	$res=mysql_query($query);
	while($row=mysql_fetch_array($res))
	{
		//print_r($row);
		$names[]=$row['name'];
		$passed[]=$row['password'];
	
	}
	$count=count(@$names);
	//print_r($names);
	//print_r($passed);
	for($i=0;$i<$count;$i++)
	{
		if($names[$i]==$_POST['unam'] && $passed[$i]==$_POST['upas'])
		{	if($_POST['ch']=="Admin")
			{$_SESSION['uname']=$_POST['unam'];
			$_SESSION['upass']=$_POST['upas'];
			echo "Login Success";
			header("refresh:1;index.php?i=6");
			}
			else
			{
				$_SESSION['uuname']=$_POST['unam'];
			$_SESSION['uupass']=$_POST['upas'];
			echo "Login Success";
			header("refresh:1;index.php?i=7");
			}
			
			
			break;
		}
	
}
if($i>=$count)
{
	echo " Invalid login try again";
}

}
?>
<center>
<br><br><br>
<form method="post" style="width:300px;margin:0 auto ;background-color:orange;border-radius:10px; border:2px solid black">
<input type="text" name="unam" placeholder="EnterUserName"/><br><br>
<input type="password" name="upas" placeholder="Enter Password"/><br><br>
UserType:<select name="ch">
<option>Admin</option>
<option>User</option>
</select><br>
<input type="submit" name="button" value="LOGIN"/>
</form>
</center>