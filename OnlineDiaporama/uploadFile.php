<!DOCTYPE html>
<?php

	// Upload file from client
		// Check file exists
		if (!isset($_FILES["file"]["name"])) {
			echo "ERROR : File does not exist<br>";
			// header("Location: errorPage.php");
		}

		// Extract clientFilename and extension
		$clientFilename = $_FILES["file"]["name"];
		$extension = strtolower(end(explode(".", $_FILES["file"]["name"])));

		// Check extension allowed
		$allowedExtensions = array("txt", "jpg", "png", "pdf", "doc", "docx", "xls", "xlsx", "ppt", "pptx", "ods", "tex");
		if (!in_array($extension, $allowedExtensions)) {
			echo "ERROR : Extension $extension not allowed<br>";
			// header("Location: errorPage.php");
		}

		// Check file size less than 2Mo
		if ($_FILES["file"]["size"] >= 2 * 1024 * 1024) {
			echo "ERROR : Size too large (" . $_FILES["file"]["size"] / 1024 / 1024 . " Mo)<br>";
			// header("Location: errorPage.php");
		}

		// Check no errors
		if ($_FILES["file"]["error"] != 0) {
			echo "ERROR : " . $_FILES["file"]["error"] . "<br>";
			// header("Location: errorPage.php");
		}

		// Generate random filename (until free filename found)
		do {
			$randomFilename = generateRandomFilename();
		} while (file_exists("up/{$randomFilename}.{$extension}"));

		// Save uploaded file to disk
		move_uploaded_file($_FILES["file"]["tmp_name"], "/up/{$randomFilename}.{$extension}");
		echo "OK : File created in 'up/{$randomFilename}.{$extension}'<br>";


		$delai=1; 
		$url='main.php';
		header("Refresh: $delai;url=$url");
	


////////////////////////////////////////////////////////////////////////////////
// FUNCTIONS

// Generate random filename
function generateRandomFilename($length = 20) {
	$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$randomFilename = '';
	for ($i = 0; $i < $length; $i++) {
		$randomFilename .= $characters[rand(0, strlen($characters) - 1)];
	}
	return $randomFilename;
}
?>