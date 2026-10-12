<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/assets/style.css">
	<title>Localisations</title>
</head>
<body>
<div class="contenant">
	<div class="menu">
		<ul class="menu">
			<li class="menu"><a href="index.php">Clients</a></li>
			<li class="menu"><a href="velo.php">V&eacute;los</a></li>
			<li class="menu"><a href="location.php">Locations</a></li>
			<li class="menu"><a href="responsable.php">Responsables</a></li>
			<li class="menu"><a href="ville.php">Villes</a></li>
			<li class="menu"><a class="active" href="localisation.php">Localisations</a></li>
			<li class="menu"><a href="type_velo.php">Types de v&eacute;los</a></li>
			<li class="menu"><a href="rapport.php">Rapport</a></li>
		</ul>
		<ul class="menu_s">
			<li class="menu_s"><a href="ajouter_localisation.php">Ajouter une localisation</a></li>
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
		
		$requete = "SELECT id_localisation, nom_loc, description, id_ville FROM Localisation";
		$result = mysqli_query($con,$requete);
		
		echo "<table class=\"list\">";
		echo "<th>Responsable de la localisation</th><th>Nom</th><th>Description</th><th>Ville</th><th></th>";
		while($row = mysqli_fetch_array($result)){
			echo "<tr class=\"list\">";
			echo "<td class=\"list\" width=\"10%\" ><a href=update_localisation.php?id_localisation=".$row['id_localisation'].">".$row['id_localisation']."</a></td>";
			echo "<td class=\"list\" width=\"20%\">".$row['nom_loc']."</td>";
			echo "<td class=\"list\" width=\"25%\">".$row['description']."</td>";
			echo "<td class=\"list\" width=\"10%\">".$row['id_ville']."</td>";
			echo "<td class=\"list\" width=\"5%\"><a href=supprimer_localisation.php?id_localisation=".$row['id_localisation'].">
				<img src=\"trash.png\" alt=\"del\" height=\"30\"></a></td></tr>";
			echo "</tr>";
		}
		echo "</table>";
		
		mysqli_close($con);
	?>
</body>
</html>	