<!DOCTYPE html>
<!-- Trouver id -->
<?php

	// Open DB
	include_once("dbConfig.php");
	$mysqli = new mysqli(DB_HOST, DB_LOGIN, DB_PWD, DB_NAME);
	$mysqli->set_charset("utf8");

// Data from client : id
	$num = NULL; #Numéro de la slide
	if (isset($_GET['num'])) {
		$num = $_GET['num'];
	}

	$id = NULL;
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
	}
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
		<title>Présentation</title>
		
	</head>

	<!-- Body -->
	<body>
		<section>
			<h1>Page_Présentation</h1>

			<input type="button" value="Retourner à l'index" onClick="javascript:document.location.href='main.php'" />
		
			<?php

				$h=1;

				// Query : select
				$query = "SELECT * FROM slides WHERE nomPresentation='$id' LIMIT $num,$h;";
				$result = $mysqli->query($query);

				// Query result
				while ($row = $result->fetch_assoc()) {
					echo $row['contenu'];

				}

				$result->close();

				echo "\t<section><li><a	 href='pagePresentation.php?id=$id"."&amp;num=" . $num=$num+1 . "'>Next</a></li>"; #Page suivante
			
				echo "<li><a href='javascript:hicontent.go(-1)'>Previous</a></li>"; # Page précédente
			
				echo "\t<li><a	 href='pagePresentation.php?id=$id"."&amp;num=" . $num=0 . "'>Retour au début</a></li>"; #Première page
				
				echo "\t<li><a href='pageCreation.php?id=" . $id . "'>Ajouter une diapo</a></li></section>"; 
				
				
			?>
				<h1>Upload file</h1>
			<section>
				<form action='uploadFile.php' method='post' enctype='multipart/form-data'>
					<input type='file' id='file' name='file' />
					<input type='submit' value='OK' />
				</form>
			</section>
			
		</section>
		<!-- Wrapper -->
		<div class='wrapper'>

		</div>
	</body>
</html>


<?php

	// Close DB
	$mysqli->close();
?>
