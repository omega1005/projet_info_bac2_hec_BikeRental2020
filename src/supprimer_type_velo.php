<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="/assets/style.css">
<head>
	<title>Supprimer type de v&eacute;lo</title>
</head>
<body>
<div class="contenant">	
	<div class="menu">
		<ul class="menu">
			<li class="menu"><a href="index.php">Client</a></li>
			<li class="menu"><a href="velo.php">V&eacute;los</a></li>
			<li class="menu"><a href="location.php">Locations</a></li>
			<li class="menu"><a href="responsable.php">Responsables</a></li>
			<li class="menu"><a href="ville.php">Villes</a></li>
			<li class="menu"><a href="localisation.php">Localisations</a></li>
			<li class="menu"><a class="active" href="type_velo.php">Types de v&eacute;los</a></li>
			<li class="menu"><a href="rapport.php">Rapport</a></li>
		</ul> 
			
		<ul class="menu_s">
			<li class="menu_s"><a href="type_velo.php">Retourne aux types v&eacute;los</a></li> 
		</ul>  			
		
	</div>
	<div>
	<h2 align ="center">Supprimer type_velo</h2>

	<?php
	if (isset($_GET['id_type_velo'])){
		require_once __DIR__ . '/../private/secrets.php';
		$con= mysqli_connect("php2.hec.ulg.ac.be",$db_user,$db_pass,$db);
		
		if (mysqli_connect_errno()){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		
		$id_type_velo = $_GET["id_type_velo"];		
				
		if (!mysqli_query($con,"DELETE FROM Type_velo WHERE id_type_velo = '".$id_type_velo."'")){
			die('Erreur: ' . mysqli_error($con));
		}else{
			if (mysqli_affected_rows($con) == 0){
				echo '<center class=\"alert\">Ce type_velo '.$id_type_velo.' est inexistant.</center>';	
			}else{
				echo "<center>Ce type de velo ".$id_type_velo." est supprim&eacute; de la base de donn&eacute;es</center>";
			}
		}
		
		mysqli_close($con);
	}else{
		header('type_velo: type_velo.php');
		exit();
	}
	?>
	</div>
</div>
</body>
</html>
</html>