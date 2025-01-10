<html>
<head>
<title> IEDA 3300, Basic PHP, CGI program for first form </title>
</head>
<body bgcolor=#DDDD00>
<p>

<?php
  // Each variable in PHP is identified by a ‘$’; Thus $x is the variable called x.
  // Here is how the data sent by the form is accessed in PHP:
  // Each input field in a FORM has a ‘name’; e.g. our FORM has an input: ‘f_course’
  // Suppose the FORM is submitted using  “method=POST”
  // Then the PHP statement: $course = $_POST[“f_course”];
  // will set the value of the f_course input of the form in a variable called course.

 $length = $_POST["length"];
 $width = $_POST["width"];
 if (( $length < 0) or ( $width < 0))
  {
     echo "The input is invaild! Please input positive numbers!";
  }
 else { echo "The area of the rectangle is ";
		echo $length*$width, '.'; }

?>
<p>  
<hr>
</body>
</html>