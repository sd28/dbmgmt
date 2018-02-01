<?php
if(isset($_SESSION['uname']))
{
mysql_connect("localhost","root","");
mysql_select_db("project")or die("error");
$query="select * from `user`";
$res=mysql_query($query);

while($row=mysql_fetch_array($res))
{
	//print_r($row);
	$ids[]=$row['id'];
	$names[]=$row['name'];
	$mobs[]=$row['mobile'];
	$citys[]=$row['city'];
	$dobs[]=$row['dob'];
	$profs[]=$row['profession'];
	$passes[]=$row['password'];
	
}

$totpages=ceil(count(@$names)/3);
?>
<html>
<center>
<div id="results">
<?php
 if(isset($_GET['idd']))
 {
	 $li=$_GET['idd'];
	 //echo $li;	
	 $end=$li*3;
	 $str=$end-2;
	 //$c=1;
	 echo"<table border='2'>";
	 echo"<tr><th>NAME</th><th>City</th><th>Mobile</th><th>DOB</th><th>Profession</th><th>Password</th><th>Update</th><th>Delete</th></tr>";
	 
	 for($i=$str-1;$i<$end;$i++)
	 { 
			if($i>=count(@$names))
			  break;
			echo "<tr>";
			$rowid=$ids[$i];
			echo "<td>".$names[$i]."</td><td>$citys[$i]</td><td>$mobs[$i]</td><td>$dobs[$i]</td><td>$profs[$i]</td><td>$passes[$i]<td><a href='update.php?idd=$li&rid=$rowid'>Update</a></td><td><a href ='delete.php?idd=$li&rid=$rowid'>Delete</a>";
			echo "</tr>";
	 }
	 echo "</table>";
	 
 }
?>
</div>
<div id="links">
<?php
 for($i=1;$i<=$totpages;$i++)
 {
	 echo "<a href='index.php?i=6&id=1&idd=$i'>".$i."</a>"."\t \t \t \t ";
 }
?>
<?php
}
else
{
	echo "Invalid Session";
	header("refresh:1;index.php?i=2");
}
?>
</div>
</center>