<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="/assets/style.css">
<head>
	<title>Villes</title>
</head>
<body>
<div class="contenant">
	<div class="menu">
		<ul class="menu">
			<li class="menu"><a href="index.php">Clients</a></li>
			<li class="menu"><a href="velo.php">V&eacute;los</a></li>
			<li class="menu"><a href="location.php">Locations</a></li>
			<li class="menu"><a href="responsable.php">Responsables</a></li>
			<li class="menu"><a class="active" href="ville.php">Villes</a></li>
			<li class="menu"><a href="localisation.php">Localisations</a></li>
			<li class="menu"><a href="type_velo.php">Types de v&eacute;los</a></li>
			<li class="menu"><a href="rapport.php">Rapport</a></li>
		</ul>
		<ul class="menu_s">
			<li class="menu_s"><a href="ajouter_ville.php">Ajouter une ville</a></li>
		</ul> 	
	</div>
	<br><br>
	<div>  	
	<?php
		require_once __DIR__ . '/../private/secrets.php';
		$con= mysqli_connect("php2.hec.ulg.ac.be",$db_user,$db_pass,$db);

		if(mysqli_connect_errno()){
		echo "Failed to connect to MySQL: ".mysqli_connect_error();
		}
		
		$requete = "SELECT id_ville, code_postal, nom_ville FROM Ville";
		$result = mysqli_query($con,$requete);
		
		echo "<table class=\"list\">";
		echo "<th>R&eacute;f&eacute;rence de la ville</th><th>Code postal</th><th>Nom de la ville</th><th></th>";
		while($row = mysqli_fetch_array($result)){
			echo "<tr class=\"list\">";
			echo "<td class=\"list\" width=\"10%\" ><a href=update_ville.php?id_ville=".$row['id_ville'].">".$row['id_ville']."</a></td>";
			echo "<td class=\"list\" width=\"15%\">".$row['code_postal']."</td>";
			echo "<td class=\"list\" width=\"20%\">".$row['nom_ville']."</td>";
			echo "<td class=\"list\" width=\"5%\"><a href=supprimer_ville.php?id_ville=".$row['id_ville'].">
				<img src=\"trash.png\" alt=\"del\" height=\"30\"></a></td></tr>";
			echo "</tr>";
		}
		echo "</table>";
		
		mysqli_close($con);
	?>
</body>
</html>	