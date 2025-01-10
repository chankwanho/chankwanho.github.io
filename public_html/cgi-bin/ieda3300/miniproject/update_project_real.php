<html>
<head>
<title> Update Project </title>
</head>
<body bgcolor=#DDDDDD>
<p>

<?php

$DB_SERVER = "iez085.ieda.ust.hk";
$USER_NAME = "khchandm";
$USER_PASSWORD =20768309;
$DB_NAME =khchandm_db;

/*echo $DB_SERVER;
echo $USER_NAME;
echo $USER_PASSWORD;
echo $DB_NAME;*/

/*--echo "Start \n";
echo "<hr>";*/
$Pnumber = $_POST['Pnumber'];
//$Pname = $_POST['Pname'];
//$Plocation = $_POST['Plocation'];
//$Dnumber = $_POST['Dnumber'];
$SSN = $_POST['SSN'];
$hours = $_POST['hours']; //-1 for delete handle by html
$conn = mysqli_connect($DB_SERVER, $USER_NAME ,$USER_PASSWORD, $DB_NAME);

if (!$conn) {
	echo "Could not connect: ";
	echo mysqli_connect_error();
}
$SSN = (string)$SSN;
if ($Pnumber == '') echo 'error ';
if($_POST["modify"]){
	//if ($hours == -1){
	//echo "test-1";
		
	//}else{
	$query1 = "update works_on set Hours = $hours where employee_SSN = $SSN and project_number = $Pnumber";
	$result = mysqli_query($conn, $query1) or die("error!!");
	/*$query = "delete from works_on where employee_SSN = $SSN and project_number = $Pnumber";
	$result = mysqli_query($conn, $query) or die("error!");
	$query1 = "insert into works_on values('$SSN', $Pnumber, $hours)";
	$result1 = mysqli_query($conn, $query1) or die("error!!");*/
	echo 'modify Done';
}
if($_POST["delete"]){
	$query = "delete from works_on where employee_SSN = '$SSN' and project_number = $Pnumber";
	$result = mysqli_query($conn, $query) or die("error!");
	echo 'delete Done';
}
if($_POST["insert"]){
	$query = "insert into works_on values('$SSN', $Pnumber, $hours)";
	$result = mysqli_query($conn, $query) or die("error!");
	echo 'insert Done';
}
?>
</body>
</html> 
