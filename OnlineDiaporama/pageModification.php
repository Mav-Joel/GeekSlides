<!DOCTYPE html>
<?php


$id = NULL;
if (isset($_GET['id'])) {
	$id = $_GET['id'];
}

$mv = NULL; #Variable déclarant si le mouvement est haut ou bas
if (isset($_GET['mv'])) {
	$mv = $_GET['mv'];
}

	// Data from client$content = NULL;
		// Open DB
		include_once("dbConfig.php");
		$mysqli = new mysqli(DB_HOST, DB_LOGIN, DB_PWD, DB_NAME);	
		$mysqli->set_charset("utf8");
		

		// Close DB

		// Query : insert
		if ($mv == "up"){
		
			$query = "UPDATE slides SET id=$id+2 WHERE id=$id;";
			$success = $mysqli->query($query);
			// Query success

			if ($success) {
				$lastInsertedId = $mysqli->insert_id;
			}

		// Close DB
		}else if ($mv == "down"){
		
			$query = "UPDATE slides SET id=$id-2 WHERE id=$id;";
			$success = $mysqli->query($query);
		
				// Query success
			if ($success) {
				$lastInsertedId = $mysqli->insert_id;
			}

			
			// Close DB
			$mysqli->close();
		}

// Redirection
$delai=0.5; 
$url='main.php';
header("Refresh: $delai;url=$url");

?>

<html>
	<!-- Head -->
	<head>
		<!-- CSS files -->
		<link rel='stylesheet' type='text/css' href='./css/web.css' media='screen' />
		<!-- <link rel='stylesheet' type='text/css' href='./css/00_reset.css' media='screen' /> -->
		<link rel='stylesheet' type='text/css' href='./css/01_mobile.css' media='screen' />
		<link rel='stylesheet' type='text/css' href='./css/02_fonts.css' media='screen' />

		<!-- JS files -->
		<script type='text/javascript' src='./js/jquery-2.0.3.min.js'></script>
		<script type='text/javascript' src='./js/web.js'></script>
		<script type='text/javascript' src='./js/joel.js'></script>

		<!-- UTF8 encoding -->
		<meta charset='UTF-8'>

		<!-- Prevent from zooming -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0,  shrink-to-fit=no">

		<!-- Icon -->
		<link rel='icon' type='image/png' href='./images/favicon.png' />

		<!-- Title -->
		<title>Page 2</title>
		
	</head>



	<!-- Body -->
	<body>
		<section>
			<h1>Page de modification</h1>
	
		</section>
		<!-- Wrapper -->
		<div class='wrapper'>

		</div>
	</body>
</html>
