<!DOCTYPE html>
<?php

	// Data from client : id
	$id = NULL;
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
	}

	// Open DB
	include_once("dbConfig.php");
	$mysqli = new mysqli(DB_HOST, DB_LOGIN, DB_PWD, DB_NAME);
	$mysqli->set_charset("utf8");

	// Query : delete user by id
	$query = "DELETE FROM slides WHERE nomPresentation = '$id';";
	$success = $mysqli->query($query);

	// Close DB
	$mysqli->close();
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

		<!-- UTF8 encoding -->
		<meta charset='UTF-8'>

		<!-- Prevent from zooming -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0,  shrink-to-fit=no">

		<!-- Icon -->
		<link rel='icon' type='image/png' href='./images/favicon.png' />

		<!-- Title -->
		<title>Supprimer</title>
		
	</head>

	<!-- Body -->
	<body>
		<section>
			<h1>Page de Suppression</h1>
	
			<?php

			// Display success of fail message
			if ($success) {
				echo "<p>La présentation $id a été supprimée.</p>";
			} else {
				echo "<p>Impossible de supprimer la présentation $id.</p>";
			}
		
			$delai=1; 
			$url='main.php';
			header("Refresh: $delai;url=$url");
		
		
			?>
		</section>
		<!-- Wrapper -->
		<div class='wrapper'>

		</div>
	</body>
</html>

