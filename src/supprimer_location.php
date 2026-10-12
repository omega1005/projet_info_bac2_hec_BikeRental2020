<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/assets/style.css">
	<title>Supprimer location</title>
</head>
<body>
<div class="contenant">	
	<div class="menu">
		<ul class="menu">
			<li class="menu"><a href="index.php">Client</a></li>
			<li class="menu"><a href="velo.php">V&eacute;los</a></li>
			<li class="menu"><a class="active" href="location.php">Locations</a></li>
			<li class="menu"><a href="responsable.php">Responsables</a></li>
			<li class="menu"><a href="ville.php">Villes</a></li>
			<li class="menu"><a href="localisation.php">Localisations</a></li>
			<li class="menu"><a href="type_velo.php">Types de v&eacute;los</a></li>
			<li class="menu"><a href="rapport.php">Rapport</a></li>
		</ul> 
			
		<ul class="menu_s">
			<li class="menu_s"><a href="location.php">Retourne aux locations</a></li> 
		</ul>  			
		
	</div>
	<div>
	<h2 align ="center">Supprimer location</h2>

	<?php
	if (isset($_GET['id_location'])){
		require_once __DIR__ . '/../private/secrets.php';
		$con= mysqli_connect("php2.hec.ulg.ac.be",$db_user,$db_pass,$db);
		
		if (mysqli_connect_errno()){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		
		$id_location = $_GET["id_location"];		
				
		if (!mysqli_query($con,"DELETE FROM Location WHERE id_location = '".$id_location."'")){
			die('Erreur: ' . mysqli_error($con));
		}else{
			if (mysqli_affected_rows($con) == 0){
				echo '<center class=\"alert\">Ce location '.$id_location.' est inexistant.</center>';	
			}else{
				echo "<center>Ce location ".$id_location." est supprim&eacute; de la base de donn&eacute;es</center>";
			}
		}
		
		mysqli_close($con);
	}else{
		header('Location: location.php');
		exit();
	}
	?>
	</div>
</div>
</body>
</html>
</html>