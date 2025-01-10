<html>
<head>
<title> IEDA 3302: Hidden Form Field for Session Tracking </title>
</head>
<body bgcolor=#DDDDDD>
<p>
<!-- The lines above are the standard html header -->

<?php

  // First get the input variables and their values
$cgi_like = $_POST['f_like'];
$cgi_session = $_POST['f_session'];

  // Do something with the inputs submitted by the user (here, print them back to the client).
        //echo "Hello, $cgi_like, Your responses about IEDA 3302 was: $cgi_like.";
		echo "Hello. You are executing a session called $cgi_session. Your favourite course is $cgi_like."
?>

<!-- The lines below are a standard html footer -->
<p>
<hr>
<p>
</body>
</html>
