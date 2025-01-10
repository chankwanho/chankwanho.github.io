<html>
<head>
<title> IEDA 3302: Cookies for Session Tracking </title>
</head>
<body bgcolor=#DDDDDD>
<p>
<!-- The lines above are the standard html header -->

<?php
$cgi_session = $_POST['f_session'];

// unser cookie?
unset($_COOKIE[$cgi_session]);

// not working, set the cookie's expiration date to one hour ago
setcookie($cgi_session, null , time() - 1);

echo "Cookie is unset."

/*if (isset($_COOKIE[$cgi_session])) { 
 echo "Cookie is set. It's value is: "; 
 echo $_COOKIE["IEDA3302"];
}*/
// echo "You set a cookie called IEDA3302 with value: $_COOKIE["IEDA3302"]";


?>

<!-- The lines below are a standard html footer -->
<p>
<hr>
<p>
</body>
</html>
