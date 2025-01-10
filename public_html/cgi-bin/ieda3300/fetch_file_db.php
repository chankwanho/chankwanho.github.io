<?php
include("config.php");

$con = mysqli_connect("iez085.ieda.ust.hk", "khchandm", 20768309, khchandm_db);
if ($con) {
echo "Displaying your media files in the Database: <br />";
} else {
die( "Failed To Connect to server <br />". mysqli_connect_error() );
}

$fetch_query = "SELECT * FROM mymedia";
$dataFromDb = mysqli_query($con, $fetch_query);

while ($row = mysqli_fetch_assoc($dataFromDb)) {
 if ( $row['media'] != null) {
  $img_src = $row['media'];
  echo '<img height=250px width=250px src=data:image;base64,'.$row['media'].' />';
  echo "<br /> \n";
  $filename = $row['filename'];
  echo "$filename <br />";
 }
}

?>