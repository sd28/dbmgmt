<?php

@$a= array("DELHI","MUMBAI","BANGALORE","CHENNAI","KOLKATA","BHUBHANESHWAR","PATNA","AHMEDABAD","GOA","SRINAGAR","DEHRADUN","HYDERABAD","MYSORE","JAIPUR","CHANDIGARH","LUCKNOW","BHOPAL","FARIDABAD","RANCHI","PUNE","TRIPURA","DARJEELING","THIRUVANATHAPURAM","MIZORAM","UDAIPUR","JAISALMER","GANDHINAGAR");

if(isset($_POST['b1']))
{
mysql_connect("localhost","root","");
mysql_select_db("project")or die("error");

	
	@$name=$_POST['t3'];
@$password=$_POST['t4']; 
@$mobile=$_POST['t5'];
@$city=$_POST['s1'];
@$dob=$_POST['d1'];
@$profession=$_POST['s2'];
		$q="insert into `user`(`id`,`name`,`password`,`mobile`,`city`,`date_of_birth`,`profession`) VALUES (NULL,'$name','$password','$mobile','$city','$dob','$profession')";
mysql_query($q);
if(mysql_affected_rows() >0)
		echo "Registration SuccessFUl!!!";
	else
		echo "Registration Unsuccesful";

	}


?>

<body bgcolor="black" text="#FFFFFF">
<marquee direction="right"  height="5%" width="100%" >REGISTER YOURSELF NOW !! </marquee>
<br>
<h1><center><font size=48> REGISTER  </font></h1>
<br>
<br>

<form id="form1" name="form1" method="post" action="">
  <table align="center" width="47%" height="357" border="0">
    <tr>
      <td width="45%">NAME</td>
      <td width="47%"><label for="t3"></label>
      <input type="text" name="t3" id="t3" REQUIRED /></td>
    </tr>
    <tr>
      <td>PASSWORD</td>
      <td><label for="t4"></label>
      <input type="password" name="t4" id="t4" pattern="[@][a-z]{5}" /></td>
    </tr>
    <tr>
      <td>MOBILE NO.</td>
      <td><label for="t5"></label>
      <input type="text" name="t5" id="t5" pattern="[987][0-9]{9}" /></td>
    </tr>
    <tr>
      <td>CITY
        </td>
      <td><label for="s1"></label>
        <select name="s1" id="s1">
        <?php
 for($i=0;$i<count($a);$i++)
echo "<option>  $a[$i] </option>";
echo "</select>";

	
    ?>
     </select></td>
    </tr>
    <tr>
      <td>DATE OF BIRTH </td>
      <td><input type="date" name="d1"></td>
    </tr>
    <tr>
      <td height="58">PROFESSION</td>
      <td><label for="s2"></label>
        <select name="s2">
          <option value="eng">ENGINEER</option>
          <option value="ca">CA</option>
          <option value="acc">ACCOUNTS ANALYST</option>
          <option value="bnk">BANKER</option>
          <option value="doc">DOCTOR</option>
          <option value="arch">ARCHITECHT</option>
          <option value="law">LAWYER</option>
          <option value="jud">JUDGE</option>
          <option value="ath">ATHLETE</option>
          <option value="mus">MUSICIAN</option>
          <option value="dan">DANCER</option>
          <option value="arch">ARCHAEOLOGIST</option>
          <option value="res">RESEARCHER</option>
          <option value="phys">PSYCHOLOGIST</option>
          <option value="lec">LECTURER</option>
          <option value="tch">TEACHER</option>
          <option value="buiss">BUSINESSMAN</option>
          <option value="pol">POLICE</option>
          <option value="arm">ARMY</option>
          <option value="pil">PILOT</option>
          <option value="air">AIRHOSTESS</option>
      </select></td>
    </tr>
    <tr>
      <td colspan="2"><center><input type="submit" name="b1" id="b1" value="REGISTER" /></center></td>
      <td width="8%">&nbsp;</td>
    </tr>
  </table>
</form>

</body>
</html>