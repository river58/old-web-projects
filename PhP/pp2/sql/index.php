<!DOCTYPE html>
<html>
<head>
	<title>Calorie Counter</title>
	
	<style>
	h1 {
		text-align: center;
	}
	#frmAddFood {
		width: 500px;
		margin: 0 auto;
	}
	label {
		display: block;
		width: 50%;
		float: left;
	}
	
	input {
		display: block;
		margin-left: 50%;
	}
	
	input[type="submit"] {
		display: inline;
		margin: 0;
	}
	
	#msg {
		text-align: center;
	}
	
	.row {
		width: 100%;
		min-height: 22px;
		border: 1px solid #000000;
		border-width: 0 0 1px 0;
	}
	.row:first-of-type {
		font-weight: bold;
	}
	.row span {
		display: inline-block;
		float: left;
		width: 25%;
	}
	</style>
</head>
<body>

<h1>Calorie Counting</h1>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbName = "CalorieCounter";
	
$msg = "";

$msg.="Enter a food and the corresponding calories.<br/>\n";
//Create connection
$conn = mysqli_connect($servername, $username, $password, $dbName);
// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

$fud = "";
$doot = "";
$cla = "";
if (isset($_POST["btnEdit"])){
	echo "EDITING LINE!<br>";
	$statement = "DELETE FROM Entries WHERE EntryDate = \"".$_POST["EntryDate"]."\"";
	$cla = $_POST["Calories"];
	$time = strtotime($_POST["EntryDate"]);
	$doot = date('Y-m-d\TH:i:s', $time);
	$fud = $_POST["Food"];
	if ($conn->query($statement) === TRUE) {
		
	} else {
		echo "Error: " . $statement . "<br>" . $conn->error . "<br>";
	}
}
?>

<form name="frmAddFood" method="post" action="index.php" id="frmAddFood">
<label>Date</label>
<input type="datetime-local" name="txtDate" <?php
	if ($doot != ""){
		echo "value=\"".$doot."\"";
	}
?> id="txtDate"/>

<label>Food</label>
<input type="text" name="txtFood" id="txtFood" <?php
	if ($fud != ""){
		echo "value=\"".$fud."\"";
	}
?> maxlength="25" required/>

<label>Calories</label>
<input type="number" name="txtCal" <?php
	if ($cla != ""){
		echo "value=\"".$cla."\"";
	}
?> id="txtCal" required/>

<input type="submit" name="btnSubmit" value="Save" style="margin: 0 auto;"/>
</form>

<?php

/*** Display data ***/


//Adding
$eeeert = "";         
if (isset($_POST["txtCal"]) && isset($_POST["txtFood"])){
	$cal = $_POST["txtCal"];
	$food = $_POST["txtFood"];
	if($cal != "" && $food != ""){
		if(isset($_POST["txtDate"]) && $_POST["txtDate"] != "") {
			$dat = $_POST["txtDate"];
			$statement = "INSERT INTO Entries (EntryDate, Food, Calories) VALUES (\"".$dat."\", \"".$food."\", \"".$cal."\");";
		} else {
			$statement = "INSERT INTO Entries (Food, Calories) VALUES (\"".$food."\", \"".$cal."\");";
		}
		if ($conn->query($statement) === TRUE) {
			$eeeert = "New record created successfully";
		} else {
			echo "Error: " . $statement . "<br>" . $conn->error."<br>";
		}
	}
	
}
if (isset($_POST["btnDelete"])){
	$statement = "DELETE FROM Entries WHERE EntryDate = \"".$_POST["EntryDate"]."\"";
	if ($conn->query($statement) === TRUE) {
		$eeeert = "Successfully Deleted Line!";
	} else {
		echo "Error: " . $statement . "<br>" . $conn->error."<br>";
	}
}

//Create SQL select statement
$sql = "SELECT * FROM Entries";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
	$counter = 1;
	//output header
	$msg.="<div class=\"row\"><span>Date</span><span>Food</span><span>Calories</span></div>\n";
	// output data of each row
	while($row = mysqli_fetch_assoc($result)) {
		$msg.="<div class=\"row\">\n";
		$msg.="<form name=\"frmRow".$counter."\" method=\"post\" action=\"index.php\">\n";
		$msg.="<span>".$row["EntryDate"]."</span><span>".$row["Food"]."</span><span>".$row["Calories"]."</span>\n";
		$msg.="<span>\n";
		$msg.="<input type=\"submit\" name=\"btnEdit\" value=\"Edit\"/>\n";
		$msg.="<input type=\"submit\" name=\"btnDelete\" value=\"Delete\"/>\n";
		$msg.="<input type=\"hidden\" name=\"EntryDate\" value=\"".$row["EntryDate"]."\"/>\n";
		$msg.="<input type=\"hidden\" name=\"Food\" value=\"".$row["Food"]."\"/>\n";
		$msg.="<input type=\"hidden\" name=\"Calories\" value=\"".$row["Calories"]."\"/>\n";
		$msg.="</span>\n</form>\n</div>\n";
		$counter++;
	}
} else {
	$msg.="<div class=\"row\">0 results</div>\n";
}

echo $msg;
echo $eeeert;

?>
</body>
</html>