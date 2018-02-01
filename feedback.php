<?php

if(isset($_SESSION['uname']))
{
	?>
	<?php
mysql_connect("localhost","root","");
mysql_select_db("project")or die("error");
$query="select * from `feedback`";
$res=mysql_query($query);

while($row=mysql_fetch_array($res))
{
	//print_r($row);
	$names[]=$row['Email'];
	$text[]=$row['Text'];
	
}
$totpages=ceil(count(@$names)/3);
?>
<html>
<center>
<div id="results">
<?php
 if(isset($_GET['fid']))
 {
	 $li=$_GET['fid'];
	 //echo $li;	
	 $end=$li*3;
	 $str=$end-2;
	 //$c=1;
	 echo"<table border='2'>";
	 echo"<tr><th>Email</th><th>MEssage</th></tr>";
	 
	 for($i=$str-1;$i<$end;$i++)
	 { 
			if($i>=count(@$names))
			  break;
			echo "<tr>";
			echo "<td>".$names[$i]."</td><td>$text[$i]</td>";
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
	 echo "<a href='index.php?i=6&id=3&fid=$i'>".$i."</a>"."\t \t \t \t ";
 }
?>
</div>
</center>
<?php	
}
else
{
	echo "Invalid Session";
	header("refresh:2;a_welcome.php");
}
?>