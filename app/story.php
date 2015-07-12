<?php
include('data_con.php');
include('header.php');


if(isset($_POST['submitted']))
{

	$s_id=$_POST['s_id'];
	$contents=$_POST['contents'];

	$target_dir = "../hhf/images/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if($check !== false) {
		//	echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			echo "File is not an image.";
			$uploadOk = 0;
		}
	}
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
	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		echo ('<div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Your story has been uploaded!</strong></div>');
	} else {
		echo "Sorry, there was an error uploading your file.";
	}
}

$sql="insert into stories(`s_id`,`contents`) values($s_id,'$contents')";
$result=$conn->query($sql);
usleep(200000);
$sql="select max(st_id) from  stories ";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
$st_id=$row['max(st_id)'];

$filenm=basename($_FILES["fileToUpload"]["name"]);

$sql="insert into images(`url`,`st_id`) values('$filenm',$st_id)";
//echo $sql;
$result=$conn->query($sql);

}

?>

<center>

<div id="google_translate_element"></div><script type="text/javascript">

function googleTranslateElementInit() {

  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');

}

</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

	<br>
	<h3>Share a Story!</h3>

	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<form method="post" class="form-horizontal" action="story.php" enctype="multipart/form-data">
					<input type=hidden name=submitted value=1>
					<div class="form-group">
						<label for="select" class="control-label" name="s_id" required>Select the school:</label>
						<div class="">
							<select class="form-control" id="select" name="s_id">
								<?php

								$sql = "SELECT * FROM school";

								$result = $conn->query($sql);



								if ($result->num_rows > 0) {

									while($row = $result->fetch_assoc()) {
										echo ("<option value=".$row['s_id'].">".$row['name']."</option>");

									}

								} 
								?>
							</select>
						</div>
					</div>
					<br><br>
					<div class="form-group">
						<label for="textArea" class="control-label">Story:</label>
						<div class="">
							<textarea class="form-control" rows="4" id="textArea" name="contents" placeholder="Enter story description." required></textarea>

						</div>
					</div>
					<br>
					<div class="form-group">
						<label class=" control-label" >Upload a photo:</label>  
						<input type="file" name="fileToUpload" id="fileToUpload" class="btn btn-info">
					</div>
					<br>
					<input type="submit" name="submit" class="btn btn-success" value="Submit">
				</form>
			</div>

		</div>
	</div>
</center>