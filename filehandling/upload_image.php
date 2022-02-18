<!DOCTYPE html>
<html>

<head>
	<title>1 Uploading Files</title>
	<style>
		body {
			padding: 20px;
			background: #f5a283;
			font-family: verdana;
		}

		h1 {
			text-align: center;
		}
	</style>
</head>

<body>
	<h1>File Upload Testing</h1>
	<ul>
		<li>Create a form for uploading images to a folder on localhost.</li>
		<li>Send form data to current page.</li>
		<li>Make sure that the image being uploaded passes the following criteria:</li>
		<li>
			<ol>
				<li>File must be an image.</li>
				<li>File must not already exist in directory.</li>
				<li>File must be under 1MB.</li>
				<li>File must be either .jpg, .jpeg or .png to be uploaded.</li>
			</ol>
		</li>
		<li>For each of the successful tests, a green paragraph must be displayed explaining it passed for a reason.</li>
		<li>For each of unsuccessful test, a red paragraph must be displayed explaining the reason for it's failure.</li>
		<li>If all tests pass then show the image on the page otherwise print UPLOAD FAILED in a heading.</li>
	</ul>
	<?php

	if (isset($_POST["submit"])) {

		// Check for any errors during upload 

		if ($_FILES['fileToUpload']['error'] === 0) {
			echo " no error in selection";
			$target_dir = "images/";
			$target_file_dir = $target_dir . basename($_FILES["fileToUpload"]["name"]);

			// echo $target_file_dir;
			$upload_passed = false;


			// Check if the File which is being Uploaded is an Image 
			$isImage = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			//echo " isImage " . var_dump($isImage);

			if ($isImage !== false) {
				echo "This file is  an Image " . $isImage["mime"];
			} else {
			}
			//  Check to see if the File Exists 

			if (file_exists($target_file_dir)) {
				echo " the File you are uploading exists ";
				$upload_passed = false;
			} else {
				$upload_passed == true;
				echo " the file does not exist in the Directory";
			}

			// Check to see the file Size

			if ($_FILES["fileToUpload"]["size"] > 8000000) {
				echo " your file is too large ";
				$upload_passed = false;
			} else {
				$upload_passed == true;
			}
			// Allow Certain Formats 
			$imageFileType = pathinfo($target_file_dir, PATHINFO_EXTENSION);
			if ($imageFileType === "jpeg" || $imageFileType === "png" || $imageFileType === "jpg") {
				echo " The File Extension is Right Extension ";
				$upload_passed == true;
			} else {
				echo " the File Extension " . $imageFileType . " is not allowed";
				$upload_passed == false;
			}

			if ($upload_passed == false) {
				if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file_dir)) {
					echo " Successs";
				} else {
					echo " Failuire";
				}
			}
		} else {
			echo " error in selection ";
		}
	}

	?>


	<form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
		<h2>Select an Image </h2>

		<input type="file" name="fileToUpload" id="fileToUpload">
		<input type="submit" value="Upload Image" name="submit">

	</form>

</body>

</html>