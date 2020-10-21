<!DOCTYPE html>

<?php

	// Open DB
	include_once("dbConfig.php");
	$mysqli = new mysqli(DB_HOST, DB_LOGIN, DB_PWD, DB_NAME);
	$mysqli->set_charset("utf8");
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
		<title>Présentations</title>
		
	</head>


	<!-- Body -->
	<body>
		<section>
			<h1>Liste notes </h1>
				<input type="button" value="Revenir à l'index" onClick="javascript:document.location.href='sum.html'" />
				
				<input type="button" value="Créer une note" onClick="javascript:document.location.href='pageCreation.php'" />
				<ul>
					<?php

						// Query : select
						$query = "SELECT * FROM slides;";
						$result = $mysqli->query($query);

						// Query result 
				
						while ($row = $result->fetch_assoc()) {
						
							echo "\t<li><a href='pageSupp.php?id=" . $row['nomPresentation'] . "'>Supprimer la présentation : ".$row['nomPresentation']."</a></li>"."\t<li><a href='pagePresentation.php?id=" . $row['nomPresentation'] . "&amp;num=0'>\tAccéder à la diapo : ".$row['nomPresentation']."</a>"."</li>\n";
							echo $row['contenu'];
							echo "<li><a href='pageModification.php?id=". $row['id']."&amp;mv=up'>Move down the slide</a></li>";
							echo "<li><a href='pageModification.php?id=". $row['id']."&amp;mv=down'>Move up the slide</a></li>";
							echo "\n";
					
						}
						$result->close();
					?>
				</ul>

		</section>
		<!-- Wrapper -->
		<div class='wrapper'>

		</div>
	</body>
</html>
