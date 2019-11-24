<!DOCTYPE HTML>
<html>
<head>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "blood_donations";
//Create connection
$conn = mysqli_connect($servername, $username, $password, $dbName);
// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
} else {echo "hi";}
if (isset($_POST["aid"])){$aid=$_POST["aid"];}
if (isset($_POST["eid"])){$eid=$_POST["eid"];}
if (isset($_POST["fnam"])){$fnam=$_POST["fnam"];}
if (isset($_POST["lnam"])){$lnam=$_POST["lnam"];}
if (isset($_POST["blood"])){$blood=$_POST["blood"];}
if (isset($_POST["pnum"])){$pnum=$_POST["pnum"];}
if (isset($_POST["addr"])){$addr=$_POST["addr"];}
if (isset($_POST["zip"])){$zip=$_POST["zip"];}
if (isset($_POST["city"])){$city=$_POST["city"];}
if (isset($_POST["dtim"])){$dtim=$_POST["dtim"];}
if (isset($_POST["oldtim"])){$oldtim=$_POST["oldtim"];}

if (isset($fnam, $lnam, $blood, $addr, $zip, $city, $dtim)){
if (isset($_POST["aid"])){
		
} else if (isset($_POST["eid"])){
	echo "pee";
}
}
?>
</body>
</html>