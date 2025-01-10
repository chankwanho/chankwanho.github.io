<html>
<head>
<title> IEDA 3300, CGI program for template form </title>
</head>
<body bgcolor=#DDDDDD>
<p>

<?php
  // Start of the CGI program.
  // For each input sent by the form, create one php variable to store its input value.
 $a = $_POST["a"];
 $b = $_POST["b"];
 $c = $_POST["c"];
 
 // Add the php statements to process the input data below.
 echo "Dear app-user, thank you for typing: $myinput_1";
 echo "<br> \n";
 $longest = max($a, $b, $c);
 $lhs_sum = 0;
 if ($a != $longest)
	 $lhs_sum += $a * $a;
 if ($b != $longest)
	 $lhs_sum += $b * $b;
 if ($c != $longest)
	 $lhs_sum += $c * $c;
 if ($lhs_sum == $longest * $longest)
	echo ("The triangle with three sides respectively equal to $a, $b, $c is a right-angle triangle.");
 else	 
	echo ("The triangle with three sides respectively equal to $a, $b, $c is not a right-angle triangle.");

 // End of the CGI program.
?>

</body>
</html>