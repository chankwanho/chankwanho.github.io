<html>
<head>
<title> Deactivate Project </title>
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
/*
$Pname = $_POST['Pname'];
$Plocation = $_POST['Plocation'];
$Dnumber = $_POST['Dnumber'];*/
$conn = mysqli_connect($DB_SERVER, $USER_NAME ,$USER_PASSWORD, $DB_NAME);

if (!$conn) {
	echo "Could not connect: ";
	echo mysqli_connect_error();
}
//$query = "insert into project values('$Pname', $Pnumber, '$Plocation' ,$Dnumber)";
$query = "delete from works_on where project_number = $Pnumber"; //delete work_on with that project number
$result = mysqli_query($conn, $query);

$query = "delete from project where Pnumber = $Pnumber"; //delete project with that project number
$result = mysqli_query($conn, $query);
echo 'Done';
?>
</body>
</html> 
