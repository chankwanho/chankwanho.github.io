<html>
<head>
<title> Correcting sentence </title>
</head>
<body bgcolor=#DDDDDD>
<p>
<!-- The lines above are the standard html header -->

<?php

	$vector1 = $_POST['f_line1'];
    $vector2 = $_POST['f_line2'];
	//$f_line1 = '1 0 0';
	//$f_line2 = '0 1 0';

	//preg_match_all('!\d+!', $f_line1, $vector1);
	//preg_match_all('!\d+!', $f_line2, $vector2);
	//explode($f_line1, $vector1);
	//explode($f_line2, $vector2);
	
	$vector1= explode(' ',$vector1);
	$vector2= explode(' ',$vector2);
    $vector1[0] =(int)$vector1[0];
    $vector1[1] =(int)$vector1[1];
    $vector1[2] =(int)$vector1[2];
    $vector2[0] =(int)$vector2[0];
    $vector2[1] =(int)$vector2[1];
    $vector2[2] =(int)$vector2[2];
	
	function dot_product($a, $b){
		return ($a[0]*$b[0]+$a[1]*$b[1]+$a[2]*$b[2]);
        }
	function norm($a){
		return sqrt($a[0]**2+$a[1]**2+$a[2]**2);
	}
	function cross_product($a, $b){
	    $answer[0] = $a[1]*$b[2]-$a[2]*$b[1];
		$answer[1] = $a[2]*$b[0]-$a[0]*$b[2];
		$answer[2] = $a[0]*$b[1]-$a[1]*$b[0];
		return $answer;
	}
	/*
	$angle=rad2deg(acos(($vector1[0]*$vector2[0])+$vector1[1]*$vector2[1]+$vector1[2]*$vector2[2])
		/((sqrt($vector1[0]**2+$vector1[1]**2+$vector1[2]**2)*sqrt($vector2[0]**2+$vector2[1]**2+$vector2[2]**2))));
	*/
	$angle=rad2deg(acos(dot_product($vector1,$vector2)/
		(norm($vector1)*norm($vector2))));
	$cross = cross_product($vector1, $vector2);
	$unit_normal[0] = $cross[0]/norm($cross);
	$unit_normal[1] = $cross[1]/norm($cross);
	$unit_normal[2] = $cross[2]/norm($cross);
	echo($angle);
	echo(' degrees; ');
	echo(' unit normal: ');
	echo($unit_normal[0]);
	echo(', ');
	echo($unit_normal[1]);
	echo(', ');
	echo($unit_normal[2]);
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	//echo "The inputs you submitted were: <br>\n";
	//echo "$f_line <p>";
	//echo "The corrected sentence is: <br>\n";
	//echo "$correct_line <p>";
	//echo "$f_line <p>";
	
?>


<!-- The lines below are a standard html footer -->
<p>
<hr>
<p>
</body>
</html>