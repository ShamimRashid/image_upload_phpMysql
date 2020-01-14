<?php
    $host='localhost';
$username='root';
$password='';
$database='demo';

$connect=mysqli_connect($host,$username,$password,$database);
    if(isset($_GET['image_id'])) {
        $sql = "SELECT imageType,imageData FROM output_images WHERE imageId=" . $_GET['image_id'];
		$result = mysqli_query($connect, $sql) or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" . mysqli_error($connect));
		$row = mysqli_fetch_array($result);
		header("Content-type: " . $row["imageType"]);
		echo $row["imageData"];
	}
	mysqli_close($connect);
?>