<?php
	if(isset($_FILES['image'])){
		// Creates the Variables needed to upload the file
		$UploadName = $_FILES['image']['name'];
		$UploadName = mt_rand(100000, 999999).$UploadName;
		$UploadTmp = $_FILES['image']['tmp_name'];
		$UploadType = $_FILES['image']['type'];
		$FileSize = $_FILES['image']['size'];
		
		// Removes Unwanted Spaces and characters from the files names of the files being uploaded
		$UploadName = preg_replace("#[^a-z0-9.]#i", "", $UploadName);
		// Upload File Size Limit 
		if(($FileSize > 125000)){
			
			die("Error - File too Big");
			
		}
		// Checks a File has been Selected and Uploads them into a Directory on your Server
		if(!$UploadTmp){
			die("No File Selected, Please Upload Again");
		}else{
			move_uploaded_file($UploadTmp, "user_photos/$UploadName");
		}
	}
?>
