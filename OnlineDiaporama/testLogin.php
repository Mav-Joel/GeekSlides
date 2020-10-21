<!DOCTYPE html>

<?php
$login = NULL;
if (isset($_POST['login'])) {
	$login = $_POST['login'];
}	

$password = NULL;
if (isset($_POST['password'])) {
	$password = $_POST['password'];
}	

include_once("dbConfig.php");
$mysqli = new mysqli(DB_HOST, DB_LOGIN, DB_PWD, DB_NAME);	
$mysqli->set_charset("utf8");

$salt = "dK2mqlOs4dUibu8qHsmiOm6AqZs5DdkGN4KvghM3dqkfN5Dhqdm7hSFG8Kgv9qmOOH5fsuG4Nvf98wGfD7YTdi03mLvXxzT29t7u"; // Define salt (length=100 for 64 chars hash)
$password = hash("sha256", $password . $salt);

$login = $mysqli->real_escape_string($login);
$password = $mysqli->real_escape_string($password);

// Query : insert

// Data from client$content = NULL;
	if (isset($_POST['inscrire'])) {
		$inscrire  = $_POST['inscrire'];
			
		// Open DB
		$query = "SELECT * FROM Pass WHERE nUtil='$login' AND mUtil='$password';";
		$result = $mysqli->query($query);
		$numRows = $result->num_rows;
		
		if ($numRows > 1){
			echo "Identifiants déjà utilisés";
		
			$delai=1; 
			$url='pageInscription.php';
			header("Refresh: $delai;url=$url");
		
		}else{

			$query = "INSERT INTO `Pass` (`id`, `nUtil`,`mUtil`) VALUES (NULL, '$login', '$password');";
			$success = $mysqli->query($query);

			// Query success

			if ($success) {
			
				$lastInsertedId = $mysqli->insert_id;
				echo "<section><h1>Utilisateur crée</h1></section>";
			
				$delai=1; 
				$url='index.html';
				header("Refresh: $delai;url=$url");
			
			}
		
	
		}

		// Query : select
		
		// Close DB
		$mysqli->close();
		$result->close();

		
	}	

if (isset($_POST['connexion'])) {
	$connexion  = $_POST['connexion'];	
		
		// Query : select
	// Query : select all users
	
	$query = "SELECT * FROM Pass WHERE nUtil='$login' AND mUtil='$password';";
	$result = $mysqli->query($query);
	$numRows = $result->num_rows;

	if ($numRows == 1){
		
		header("Location: sum.html");
	
	}else{
		
		echo "<section><h1>Nom d'utilisateur ou Mot de passe incorrect</h1></section>";
		header("Location: index.html");
	
	}
	// Display contacts
		

		// Close result
	$result->close();
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
			
		</section>
		<!-- Wrapper -->
		<div class='wrapper'>

		</div>
	</body>
</html>



