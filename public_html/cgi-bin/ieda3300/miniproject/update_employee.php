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
$Pnumber = $_POST['Pnumber'];

$conn = mysqli_connect($DB_SERVER, $USER_NAME ,$USER_PASSWORD, $DB_NAME);

if (!$conn) {
	echo "Could not connect: ";
	echo mysqli_connect_error();
}



echo '<form method=POST action="http://khchandm.student.ust.hk/cgi-bin/ieda3300/miniproject/update_project_real.php">';

$query1 = "select employee_SSN, Hours from works_on where project_number = $Pnumber";
$result = mysqli_query($conn, $query1);

echo 'people working in the project (SSN, Name, Hours) <br>';
while ($row = mysqli_fetch_row($result)){
	$query2 = "select Fname, Lname from employee where SSN = $row[0]";
	$result2 = mysqli_query($conn, $query2);

	while ($row2 = mysqli_fetch_row($result2)){
		printf('<input type=radio name=SSN value= %d > %d ',(int)$row[0], $row[0]);
		echo $row2[0];
		echo ' ';
		echo $row2[1];
		echo ' ';
	}
	echo $row[1];
	echo '<br>';
}
/*echo 'Input the number of hours, input -1 for delete <br>';
echo '<input name=hours type=float>';
echo "<br>";
echo "<p>";*/
echo '<br>';
echo 'people not working in the project (SSN, Name)<br>';

$query3 = 'select distinct employee_SSN from works_on';
$result3 = mysqli_query($conn, $query3);

while ($row3 = mysqli_fetch_row($result3)){
	$query4 = "select employee_SSN from works_on where project_number = $Pnumber";
	$result4 = mysqli_query($conn, $query4);

	while ($row4 = mysqli_fetch_row($result4)){ //if on the project
		if ($row3[0] == $row4[0]){
			$row3[0] = false;
			//break;
		}
	}
	if ($row3[0] == false) continue;
	$query5 = "select Fname, Lname from employee where SSN = $row3[0]";
	$result5 = mysqli_query($conn, $query5);

	while ($row5 = mysqli_fetch_row($result5)){
		printf('<input type=radio name=SSN value= %d > %d ',$row3[0], $row3[0]);
		echo $row5[0];
		echo ' ';
		echo $row5[1];
		echo ' ';
	}
	echo '<br>';
}

echo '<br>Hours per week(ingore when delete):';
echo '<input name=hours type=float>';
echo '<br>';
echo "Are you sure to modify, delete or insert?";
printf('<input type=radio name=Pnumber value= %d > yes ',(int)$Pnumber);
echo "<br>";
printf ('<p><input name=modify type=submit value="modify" />');

printf ('<p><input name=delete type=submit value="delete" />');

//echo '<p>';

printf ('<p><input name=insert type=submit value="insert" />');


//echo "\n <hr>";
//echo "</form>";

?>

</body>
</html> 
