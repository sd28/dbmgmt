<?php
//session_start();
if(isset($_SESSION['uname']))
echo"LOGGING OUT ADMIN:".$_SESSION['uname'];
else
	if(isset($_SESSION['uuname']))
		echo"LOGGING OUT USER:".$_SESSION['uuname'];
session_destroy();

header("refresh:2;index.php?i=2");


?>