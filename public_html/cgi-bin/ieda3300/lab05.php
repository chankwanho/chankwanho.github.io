<html>
<head>
<title> IEDA 3300, PHP file creating table </title>
</head>
<body bgcolor=#DDDDDD>
<p>

<?php

$DB_SERVER = $_POST["DB_server"];
$USER_NAME = $_POST["username"];
$USER_PASSWORD =$_POST["password"];
$DB_NAME =$_POST["DB_name"];

/*echo $DB_SERVER;
echo $USER_NAME;
echo $USER_PASSWORD;
echo $DB_NAME;*/


echo "Start \n";
echo "<hr>";

$conn = mysqli_connect($DB_SERVER, $USER_NAME ,$USER_PASSWORD, $DB_NAME);

if (!$conn) {
	echo "Could not connect: ";
	echo mysqli_connect_error();
}
$query1 = "CREATE TABLE vegetables (Name varchar(20), Price int)";
$result = mysqli_query($conn, $query1);

$query2 = "insert into vegetables values ('potato', 20)";
$result = mysqli_query($conn, $query2);

$result = mysqli_query($conn, "select * from vegetable");
while ($row = mysqli_fetch_row($result)) {
    printf("%d %d <br>\n", $row[0], $row[1]);
}
echo "\n <hr>";
?>
</body>
</html> 
