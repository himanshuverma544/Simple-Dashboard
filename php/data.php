<html>
	  
<head>
</head>    

<body>

<?php

$rootDirectoryPath = str_replace('\php', '', __DIR__);

/* Information */
$name = trim($_POST["name"]);
$occupation = trim($_POST['occupation']);
$age = trim($_POST['age']);
$phone_no = trim($_POST['phone_no']);
$address = trim($_POST['address']);

/* File */
$fileName = $_FILES['image']["name"];
if(isset($_FILES['image']) && $fileName != "") {

	$uploadOk = true;
	$fileName = uniqid().$fileName;
	$tempName = $_FILES["image"]["tmp_name"];
	$folder = $rootDirectoryPath."/uploads/".$fileName;

	// Check if image file is a actual image or fake image
	if($tempName != "") { //   done this because to remove the error that "Filename cannot be empty".
	$check = getimagesize($tempName);
	 if($check === false)  { ?>
		 <div class = "msg_negative">
	  <?php  echo "File is not an image."; ?>
		 </div>
	<?php
		$uploadOk = false;
	  }
	}
	// Check file size 
	  if ($_FILES["image"]["size"] > 500000) { // 5,00,000 bytes or 0.5 MB or 500 KB ?> 
	  <div class = "msg_negative">
	   <?php echo "Sorry, your file is too large."; ?>
	  </div>
	  <?php
		$uploadOk = false;
	  }
	// Allow certain file formats
	$imageFileType = strtolower(pathinfo($fileName,PATHINFO_EXTENSION));
	  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) { ?>
	  <div class = "msg_negative">
	   <?php  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed."; ?>
	  </div>
	  <?php
		 $uploadOk = false;
	   } 
}
?>

</body>
</html>