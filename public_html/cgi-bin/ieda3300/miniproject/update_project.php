<html>
<head>
<title> Update project </title>
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

$conn = mysqli_connect($DB_SERVER, $USER_NAME ,$USER_PASSWORD, $DB_NAME);

if (!$conn) {
	echo "Could not connect: ";
	echo mysqli_connect_error();
}



echo '<form method=POST action="http://khchandm.student.ust.hk/cgi-bin/ieda3300/miniproject/update_employee.php">';

$query1 = "select Pnumber,Pname from project";
$result = mysqli_query($conn, $query1);

while ($row = mysqli_fetch_row($result)){
	printf('<input type=radio name=Pnumber value= %d > %d ',$row[0], $row[0]);
	echo $row[1];
	echo '<br>';
}

echo "\n <hr>";

printf ("<p><input name=submit type=submit>");
?>
</body>
</html> 
