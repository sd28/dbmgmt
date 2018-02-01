<?php
session_start();
if(isset($_SESSION['uname']) && isset($_GET['idd']) && isset($_GET['rid']))
{$showid=$_GET['idd'];
	$ret="refresh:2;index.php?i=6&id=1&idd=$showid";
}
else
	 if(isset($_SESSION['uuname']) && isset($_GET['rid']))
	 {
		 $ret="refresh:2;index.php?i=7&id=1";
	 }
else
{echo"invalid session ";
  header("refresh:1;index.php?i=2");
}

	
	$arr=array("Noida","Delhi","Gurgaon","Haryana");
    $rid=$_GET['rid'];
 mysql_connect("localhost","root","");
mysql_select_db("project")or die("error");
$query="select * from `user` where `id`=$rid";
$res=mysql_query($query);	

while($row=mysql_fetch_array($res))
{
	//print_r($row);
	$name=$row['name'];
	$mobs=$row['mobile'];
	$citys=$row['city'];
	$dobs=$row['dob'];
	$profs=$row['profession'];
	$passes=$row['password'];
}
?>
<center>
<form method="post" style="border:2px solid black; border-radius:5px; background-color:#9999ff; width:300px;margin:0 auto">
Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="nm" value="<?php echo $name;?>"/><br>
City:<select name="ct"><br>
<?php
for($i=0;$i<count($arr);$i++)
{	if($arr[$i]==$citys)
echo "<option selected>  $arr[$i] </option>";
else
	echo "<option> $arr[$i] </option>";

}
echo "</select>";
?><br>
Mobile:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="mob" pattern=".{6,}" title="Six or more characters(Max 10)" value="<?php echo $mobs;?>"/><br>
Date Of Birth<input type="date" name="dob" value="<?php echo $dobs;?>"/><br>
Profession&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="prof" value="<?php echo $profs;?>"/><br>
Password:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="npass" pattern=".{6,}" title="Six or more characters(Max 20)" value="<?php echo $passes;?>"/><br>
<input type="submit" name="button" value="submit"/>

</form>
</center>
<?php

if(isset($_POST['button']))
{
	mysql_connect("localhost","root","");
mysql_select_db("project")or die("error");
$name=$_POST['nm'];
$city=$_POST['ct'];
$mobile=$_POST['mob'];
$dob=$_POST['dob'];
$prof=$_POST['prof'];
$pass=$_POST['npass'];
//echo $name."<br>".$dob;
$query="update `user` set `name`='$name',`city`='$city',`mobile`='$mobile',`dob`='$dob',`profession`='$prof',`password`='$pass' where `id`='$rid'";
	mysql_query($query);
	if(mysql_affected_rows() >0)
	{echo "Updation SuccessFUl!!!";
		header($ret);
	}
	else
	{echo "Updation Unsuccesful";
		header($ret);
	}
}
?>

