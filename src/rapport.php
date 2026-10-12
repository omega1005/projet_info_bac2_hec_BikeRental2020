<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/assets/style.css">
	<title>Rapport</title>
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
			<li class="menu"><a href="localisation.php">Localisations</a></li>
			<li class="menu"><a href="type_velo.php">Types de v&eacute;los</a></li>
			<li class="menu"><a class="active" href="rapport.php">Rapport</a></li>
		</ul> 
			
		<ul class="menu_s">
			<li class="menu_s"><a href="rapport3.php">Chiffre d'affaire</a></li>
			<li class="menu_s"><a href="rapport2.php">V&eacute;lo/Locations</a></li>
			<li class="menu_s"><a href="rapport1.php">Clients/Locations</a></li>
			<li class="menu_s"><a class="active" href="rapport.php">Responsable/Locations</a></li>
		</ul>  			
	</div>	
	<div>
	<br><br>
	<?php
		require_once __DIR__ . '/../private/secrets.php';
		$con= mysqli_connect("php2.hec.ulg.ac.be",$db_user,$db_pass,$db);
		
		if (mysqli_connect_errno()){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		
		$requete = "SELECT nom, prenom, Responsable.id_responsable as 'id_responsable', count(Location.id_location) as 'id_location', sum(Location.prix_location) as 'prix_location' FROM Responsable, Location WHERE Responsable.id_responsable=Location.id_responsable GROUP BY Responsable.id_responsable";
		$result = mysqli_query($con,$requete);
		
		echo "<table width=\"200\" class=\"list\">";
		echo "<th>R&eacute;f&eacute;rence responsable</th><th>Nom</th><th>Pr&eacute;nom</th><th>Nombre de location</th><th>Recette du responsable</th>";
		while($row = mysqli_fetch_array($result)){
		echo "<tr class=\"list\">";
		echo "<td class=\"list\" >".$row['id_responsable']." </td>";
		echo "<td class=\"list\" >".$row['nom']."</td>";
		echo "<td class=\"list\" >".$row['prenom']."</td>";
		echo "<td class=\"list\" >".$row['id_location']."</td>";
		echo "<td class=\"list\" >".$row['prix_location']."</td>";
		echo "</tr>";
	}	
	echo "</table>";
	mysqli_close($con);
		
	?>
	</div>	
</div>
</body>
</html>