<html>
<head>
<title> IEDA 3300, CGI program for template form </title>
</head>
<body bgcolor=#DDDDDD>
<p>

<?php
  // Start of the CGI program.
  // For each input sent by the form, create one php variable to store its input value.
 $course1 = $_POST["course1"];
 $course2 = $_POST["course2"];
 $course3 = $_POST["course3"];

 // Add the php statements to process the input data below.
 echo "Dear app-user, thank you for typing: $myinput_1";
 echo "<br> \n";
 
 $ieda_elective_course_list =array("ieda3180", "ieda3330", "ieda4331", "ieda4500", "ieda4510", "ieda4520");
 $user_course_list = (array)null;
 if (in_array($course1, $ieda_elective_course_list))
	array_push($user_course_list, $course1);
 if (in_array($course2, $ieda_elective_course_list))
	array_push($user_course_list, $course2);
 if (in_array($course3, $ieda_elective_course_list))
	array_push($user_course_list, $course3);
 $remain_course_list = array_diff($ieda_elective_course_list, $user_course_list);
 sort ($remain_course_list);
 $i = 0;
 while ($i <= count($remain_course_list)-1){
	 echo "$remain_course_list[$i] is not yet taken.<br>\n" ;
	 $i++;
 }
	 
 // End of the CGI program.
?>

</body>
</html>