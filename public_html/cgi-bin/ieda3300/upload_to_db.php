 <?php
include("config.php");

$con = mysqli_connect("iez085.ieda.ust.hk", "khchandm", 20768309, khchandm_db);
if ($con) {
echo "Connected to server successfully <br />";
} else {
die( "Failed To Connect to server <br />". mysqli_connect_error() );
}

//$file = $_POST['fileToUpload'];
//if (getimagesize($_FILES["file"]["name"]) == false) {

// print_r( $_FILES);

/*
if (getimagesize($_FILES["file"]["tmp_name"]) == false) {
  echo "<br />Please Select An Image.";
} else {
*/
	  //declare variables
	  $image = $_FILES['file']['tmp_name'];
	  $name = $_FILES['file']['name'];
	  echo "image is: $image and name is $name <br>";
	  $image = base64_encode(file_get_contents(addslashes($image)));
      echo $image; //}
   
   $sqlInsertimageintodb = "INSERT INTO mymedia VALUES ('" . $name . "', '" . $image . "')";
	  if (mysqli_query($con, $sqlInsertimageintodb)) {
	     echo "<br />Image uploaded successfully.";
	  } else {
	         echo "<br />Image Failed to upload.<br />";
	  }



?>