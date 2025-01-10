<?php
$cgi_name = $_POST['f_name'];
$cgi_pin = $_POST['f_pin'];
$f_session = $cgi_name . $cgi_pin ;

setcookie($f_session, $f_session, time() + 1200);
?>
<!DOCTYPE html>
<html>
<head>
<title>IEDA 3302: Session tracking using cookies</title>
</head>
<body>
I have set a cookie called <?php echo $f_session; ?> on your computer. 

To delete this cookie, click on the following button.
<form method=POST action="http://khchandm.student.ust.hk/cgi-bin/ieda3302/hw1/cookies_2.php">
	<input type=hidden name=f_session value=<?php echo $f_session; ?> >
    <input type=submit value="Delete this cookie!">
</form>
</body>
</html>
