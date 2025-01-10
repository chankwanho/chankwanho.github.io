
<?php
include("config.php");

$con = mysqli_connect("iez085.ieda.ust.hk", "khchandm", 20768309, khchandm_db);
if ($con) {
//echo "Displaying your media files in the Database: <br />";
} else {
die( "Failed To Connect to server <br />". mysqli_connect_error() );
}

$fetch_query = "SELECT * FROM mymediaurl";
$data = mysqli_query($con, $fetch_query);

while ($row = mysqli_fetch_assoc($data)) {
 /*if ( $row['media'] != null) {
  $img_src = $row['media'];
  echo '<img height=250px width=250px src=data:image;base64,'.$row['media'].' />';
  echo "<br /> \n";
  $filename = $row['filename'];
  echo "$filename <br />";
 }*/
 //echo $row[0];
 //echo('Location: '.$row[0]);
 if ( $row['mediaURL'] != null) {
  $img_src = $row['mediaURL'];
 echo '<img src='.$row['mediaURL'].'>';
 $filename = $row['name'];
 echo "$filename";
}
}
//echo ('success');
?>
