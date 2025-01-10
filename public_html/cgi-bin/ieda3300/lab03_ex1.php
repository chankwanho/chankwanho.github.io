<html>
<head>
<title> IEDA 3300, CGI program for template form </title>
</head>
<body bgcolor=#DDDDDD>
<p>

<?php
  // Start of the CGI program.
  // For each input sent by the form, create one php variable to store its input value.
 $n = $_POST["n"];
 //$n = 4;

 // Add the php statements to process the input data below.
 echo "Dear app-user, thank you for typing: $n";
 echo "<br> \n";

 if ($n != (int)$n) {
	 echo "Please give me a positive integer. <br> \n";
 }
 elseif ($n <= 0){
	 echo "Please give me a positive integer. <br> \n";
 }
 else{
	 $factorial = 1;
	 for($i = $n; $i >= 1; $i--){
		 $factorial *= $i;
	 }
	 echo "The value of the factorial of $n is $factorial <br> \n";
 }
 // End of the CGI program.
?>

</body>
</html>