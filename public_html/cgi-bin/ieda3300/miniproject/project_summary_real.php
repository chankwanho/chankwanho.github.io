<html>
<head>
<title> Project summary </title>
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
echo "<hr>";
$Pnumber = $_POST['Pnumber'];
$Pname = $_POST['Pname'];
$Plocation = $_POST['Plocation'];
$Dnumber = $_POST['Dnumber'];
$conn = mysqli_connect($DB_SERVER, $USER_NAME ,$USER_PASSWORD, $DB_NAME);
*/
$all = FALSE;
$all = $_POST['all'];
$Pnumber = array();
$conn = mysqli_connect($DB_SERVER, $USER_NAME ,$USER_PASSWORD, $DB_NAME);
if (!$conn) {
	echo "Could not connect: ";
	echo mysqli_connect_error();
}
if (!$all){
	for ($i = 0; $i < count($_POST['Pnumber']); $i++) { $Pnumber[$i] = $_POST['Pnumber'][$i];}
	$Pnumber = array_unique($Pnumber);
}else{
	$query0 = "select Pnumber from project"; //get first two
	$result0 = mysqli_query($conn, $query0) or die("error"); //note: all are single row result below
	$i = 0;
	while ($row0 = mysqli_fetch_row($result0)) { //first loop
		$Pnumber[$i] = $row0[0];
		$i = $i + 1;
	}
}
//echo $Pnumber[0];



/*$query = "select Pname, Pnumber, Dnum from project where Pnumber = $Pnumber[0]"; //get first two
$result = mysqli_query($conn, $query) or die("error!"); //note: all are single row result below
	while ($row = mysqli_fetch_row($result)) { //first loop
		printf("Project Name: $row[0] <br>\n");
		printf("Number: $row[1] <br>\n");
	}
	*/
//$query = "insert into project values('$Pname', $Pnumber, '$Plocation' ,$Dnumber)";
for ($i = 0; $i < count ($Pnumber); $i++) { 
	$query = "select Pname, Pnumber, Dnum from project where Pnumber = $Pnumber[$i]"; //get first two
	$result = mysqli_query($conn, $query) or die("error1"); //note: all are single row result below
	while ($row = mysqli_fetch_row($result)) { //first loop
		printf("Project Name: $row[0] <br>\n");
		printf("Number: $row[1] <br>\n");
		$query1 = "select Dname, maneger_SSN from department where Dnumber = $row[2]"; //get dept name
		$result1 = mysqli_query($conn, $query1) or die("error2");
		while ($row1 = mysqli_fetch_row($result1)) { 
			printf("Controlling Dept name: $row1[0] <br>\n");
			$query2 = "select Fname, Minit, Lname from employee where SSN = $row1[1]"; //get manager name
			$result2 = mysqli_query($conn, $query2)or die("error3") ;
			while ($row2 = mysqli_fetch_row($result2))
				printf("Name of Manager of controlling Dept: $row2[0] <br>\n");
		}	
	}
	$query3 = "select count(employee_SSN), sum(Hours) from works_on where project_number = $Pnumber[$i] group by project_number"; //get number and hours
	$result3 = mysqli_query($conn, $query3) or die("error4");
	while ($row3 = mysqli_fetch_row($result3)){ 
		printf("total number of employees working on the project: $row3[0] <br>\n");
		printf("total number of hours spent by all employees working on the project: $row3[1] <br>\n");
	}
	$sum = 0; //total cost 
	$query4 = "select employee_SSN, sum(Hours) from works_on where project_number = $Pnumber[$i] group by employee_SSN order by employee_SSN"; 
	$result4 = mysqli_query($conn, $query4) or die("error5");  //row4 will be this project employee name list and hours list
	while ($row4 = mysqli_fetch_row($result4)){ //row4[0] is this project employee row4[1] is the working hours on this project
		//$query5 = "select SSN,salary form employee where SSN = $row4[0] order by SSN"; 
		$row4[0] = (string)$row4[0];
		$query5 = "select SSN,salary from employee where SSN = '$row4[0]'";
		//echo $row4[0];
		$result5 = mysqli_query($conn, $query5) or die("error6");  //row5[1] is the salary of this employee
		while ($row5 = mysqli_fetch_row($result5)){
			$query6 = "select employee_SSN, sum(Hours) from works_on where employee_SSN = $row4[0] group by employee_SSN order by employee_SSN"; 
			$result6 = mysqli_query($conn, $query6) or die("error7");  
			while ($row6 = mysqli_fetch_row($result6)){ // row6[1] is the total working hours of this employee
			$sum += $row5[1] / $row6[1] * $row4[1];
			}
		}
	}
	printf("total personnel cost of the project: $sum  <br>\n");
}
echo 'Done';
?>
</body>
</html> 
