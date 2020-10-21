<!DOCTYPE html>

<?php



$content = NULL;
if (isset($_POST['content'])) {
	$content = $_POST['content'];
}	

$nomPresentation = NULL;
if (isset($_POST['nomPresentation'])) {
	$nomPresentation = $_POST['nomPresentation'];
}	

$id = NULL;
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$nomPresentation=$id;
}

// Data from client$content = NULL;
	if (isset($_POST['Bouton1'])) {
		$Bouton1  = $_POST['Bouton1'];
			
		// Open DB
		include_once("dbConfig.php");
		$mysqli = new mysqli(DB_HOST, DB_LOGIN, DB_PWD, DB_NAME);	
		$mysqli->set_charset("utf8");
		
		$content = $mysqli->real_escape_string($content);
		$nomPresentation = $mysqli->real_escape_string($nomPresentation);
		
		// Query : insert
		
		$query = "INSERT INTO `slides` (`id`, `nomPresentation`,`contenu`) VALUES (NULL, '$nomPresentation', '$content');";
		$success = $mysqli->query($query);

		// Query success
		if ($success) {
			
			$lastInsertedId = $mysqli->insert_id;
			echo "<section><h1>The slide was indeed created</h1></section>";
		}

		// Query : select
		
		// Close DB
		$mysqli->close();
		$delai=1; 
		$url='main.php';
		header("Refresh: $delai;url=$url");

	}	

if (isset($_POST['Bouton2'])) {
	$Bouton2  = $_POST['Bouton2'];	
	if ($content != NULL) {
		echo "<section><h1> Le nom de votre Diapositive est : ".$nomPresentation."</h1></section>";
		echo "<section><h2> Son contenu est : ".$content."</h2></section>";
	} else {
		echo "<section><h2>Rien n'a été reçu,capout</h2></section>";
	}
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

		<!-- UTF8 encoding -->
		<meta charset='UTF-8'>

		<!-- Prevent from zooming -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0,  shrink-to-fit=no">

		<!-- Icon -->
		<link rel='icon' type='image/png' href='./images/favicon.png' />

		<!-- Title -->
		<title>Page Serveur</title>
		
	</head>

	<!-- Body -->
	<body>
		<section>
			<a href="javascript:hicontent.go(-1)">Retour à la conception</a>
			<input type="button" value="Retourner à l'index" onClick="javascript:document.location.href='main.php'" />
		
		</section>
		<!-- Wrapper -->
		<div class='wrapper'>

		</div>
	</body>
</html>



