<html>
<head>
<title> Correcting sentence </title>
</head>
<body bgcolor=#DDDDDD>
<p>
<!-- The lines above are the standard html header -->

<?php

	$f_line = $_POST['f_line'];
    
	$dict['teh']='the';
	$dict['Teh']='The';
	$dict['acn']='can';
	$dict['abotu']='about';
	$dict['actuayl']='actually';
	
	//$correct_line = substr($f_line,0);
	foreach($dict as $wrong => $correct)
		//$correct_line = str_replace($wrong, $correct, $corret_line);
		$f_line = str_replace($wrong, $correct, $f_line);

	//echo "The inputs you submitted were: <br>\n";
	//echo "$f_line <p>";
	echo "The corrected sentence is: <br>\n";
	//echo "$correct_line <p>";
	echo "$f_line <p>";
?>


<!-- The lines below are a standard html footer -->
<p>
<hr>
<p>
</body>
</html>