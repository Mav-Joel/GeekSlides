<!DOCTYPE html>
<?php

	
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

		<!-- UTF8 encoding -->
		<meta charset='UTF-8'>

		<!-- Prevent from zooming -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0,  shrink-to-fit=no">

		<!-- Icon -->
		<link rel='icon' type='image/png' href='./images/favicon.png' />

		<!-- Title -->
		<title>Page de conception</title>
		
	</head>



	<!-- Body -->
	<body>
		<section>

			<?php
				echo "Localisation Image :";
				$scandir = scandir("/var/www/html/templateWeb/up/");
				foreach($scandir as $fichier){
				echo "$fichier<br/>";
				}
			?>
					<section><h1>Page de creation</h1></section>
		  <!-- Body -->
					<!-- Javascript -->
			<form action='pageRecup.php' method='post'>            
					<?php
					
					echo "<input type='text' name='nomPresentation' placeholder='Nom de présentation ** En 1 mot **' value=$id />"
			
					?>
					<textarea id="content" name="content" rows="20" cols="180" placeholder="Ecrivez ici" autofocus></textarea>
					<section>
						<input type='submit' name ="Bouton1" value='Ajouter à la présentation'/>
						<input type="button" value="Retourner à l'index" onClick="javascript:document.location.href='main.php'" />
						
					</section>
			</form>
				<!-- Javascript -->
				
	
		</section>
		<!-- Wrapper -->
		<div class='wrapper'>

		</div>
	</body>
</html>
