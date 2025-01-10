<html>
<head>
<title> IEDA 3302: Hidden Form Field for Session Tracking </title>
</head>
<body bgcolor=#DDDDDD>
<p>
<!-- The lines above are the standard html header -->

<?php

  // First get the input variables and their values
$cgi_name = $_POST['f_name'];
$cgi_pin = $_POST['f_pin'];

  // Do something with the inputs submitted by the user (here, print them back to the client).
        //echo "Hello, $cgi_name . I will remember you in the next page!";
$f_session = $cgi_name . $cgi_pin ;
?>

<form method=POST action="http://khchandm.student.ust.hk/cgi-bin/ieda3302/hw1/hidden_field_3.php">

    What is your favourite course ? <input name=f_like type=text size=25>

    <input type=hidden name=f_session value=<?php echo $f_session; ?> >
	
    <input type=submit value="Click me!">
</form>


<!-- The lines below are a standard html footer -->
<p>
<hr>
<p>
</body>
</html>
