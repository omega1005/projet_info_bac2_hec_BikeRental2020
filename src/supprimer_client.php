<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="./style.css">
<head>
	<title>Supprimer Client</title>
</head>
<body>
<div class="contenant">	
	<div class="menu">
		<ul class="menu">
			<li class="menu"><a class="active" href="index.php">Clients</a></li>
			<li class="menu"><a href="velo.php">V&eacute;los</a></li>
			<li class="menu"><a href="location.php">Locations</a></li>
			<li class="menu"><a href="responsable.php">Responsables</a></li>
			<li class="menu"><a href="ville.php">Villes</a></li>
			<li class="menu"><a href="localisation.php">Localisations</a></li>
			<li class="menu"><a href="type_velo.php">Types de v&eacute;los</a></li>
			<li class="menu"><a href="rapport.php">Rapport</a></li>
		</ul> 
			
		<ul class="menu_s">
			<li class="menu_s"><a href="index.php">Retourne aux clients</a></li> 
		</ul>  			
		
	</div>
	<div>
	<h2 align ="center">Supprimer Client</h2>

	<?php
	if (isset($_GET['id_client'])){
		$db_user = "s160180";
		$db= "mschyns_s160180";
		$db_pass = "mrhxz46474";
		$con= mysqli_connect("php2.hec.ulg.ac.be",$db_user,$db_pass,$db);
		
		if (mysqli_connect_errno()){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		
		$id_client = $_GET["id_client"];		
				
		if (!mysqli_query($con,"DELETE FROM Client WHERE id_client = '".$id_client."'")){
			die('Erreur: ' . mysqli_error($con));
		}else{
			if (mysqli_affected_rows($con) == 0){
				echo '<center class=\"alert\">Ce client '.$id_client.' est inexistant.</center>';	
			}else{
				echo "<center>Ce client ".$id_client." est supprim&eacute; de la base de donn&eacute;es</center>";
			}
		}
		
		mysqli_close($con);
	}else{
		header('Location: index.php');
		exit();
	}
	?>
	</div>
</div>
</body>
</html>
</html>