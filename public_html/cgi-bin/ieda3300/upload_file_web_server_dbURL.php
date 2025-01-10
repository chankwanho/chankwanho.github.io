
<?php
$target_dir = "media/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  echo "\n <br> Trying to call move_uploaded_file with " . $_FILES["fileToUpload"]["tmp_name"] . " and " . $target_file . "<br>";
  $con = mysqli_connect("iez085.ieda.ust.hk", "khchandm", "20768309", "khchandm_db");
  // Insert record
  $file_name = basename($_FILES["fileToUpload"]["name"]); // Change this to store a name for the file
  $URL = 'http://khchandm.student.ust.hk/cgi-bin/ieda3300/media/' . $target_file;
  $query = "INSERT INTO mymediaurl VALUES('" .$file_name . "','" . $URL . "')";
  mysqli_query($con,$query);
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
?>
