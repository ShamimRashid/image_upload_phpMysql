<?php 
$host='localhost';
$username='root';
$password='';
$database='demo';

$connect=mysqli_connect($host,$username,$password,$database);

if (count($_FILES) > 0) {
    if (is_uploaded_file($_FILES['userImage']['tmp_name'])) {
       
        $imgData = addslashes(file_get_contents($_FILES['userImage']['tmp_name']));
        $imageProperties = getimageSize($_FILES['userImage']['tmp_name']);
        
        $sql = "INSERT INTO output_images(imageType ,imageData)
	VALUES('{$imageProperties['mime']}', '{$imgData}')";
        $current_id = mysqli_query($connect, $sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($conn));
        if (isset($current_id)) {
            header("Location: listImages.php");
        }
    }
}
?>
<HTML>
<HEAD>
<TITLE>Upload Image to MySQL BLOB</TITLE>
<link href="imageStyles.css" rel="stylesheet" type="text/css" />
</HEAD>
<BODY>
    <form name="frmImage" enctype="multipart/form-data" action="add.php"
        method="POST" class="frmImageUpload">
        <label>Upload Image File:</label>
        <br />
<input name="userImage" type="file" class="inputFile" />
<input type="submit" value="Submit" class="btnSubmit" />
    </form>
    </div>
</BODY>
</HTML>

 
<?php 	

/*
CREATE SQL

CREATE TABLE output_images(
ImageId tinyint(3) AUTO-INCREMENT,
ImageType varchar(25),
ImageData longblob,

PRIMARY KEY(ImageId)
);

*/
 ?>