<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="/assets/style.css">
<head>
	<title>Location</title>
</head>
<body>
<div class="contenant">
	<div class="menu">
		<ul class="menu">
			<li class="menu"><a href="index.php">Clients</a></li>
			<li class="menu"><a href="velo.php">V&eacute;los</a></li>
			<li class="menu"><a class="active" href="location.php">Locations</a></li>
			<li class="menu"><a href="responsable.php">Responsables</a></li>
			<li class="menu"><a href="ville.php">Villes</a></li>
			<li class="menu"><a href="localisation.php">Localisations</a></li>
			<li class="menu"><a href="type_velo.php">Types de v&eacute;los</a></li>
			<li class="menu"><a href="rapport.php">Rapport</a></li>
		</ul>
		<ul class="menu_s">
			<li class="menu_s"><a href="ajouter_location.php">Ajouter une location</a></li>
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
		
		$requete = "SELECT id_location, date_location, duree_location, prix_location, id_client, id_velo, id_responsable FROM Location";
		$result = mysqli_query($con,$requete);
		
		echo "<table class=\"list\">";
		echo "<th>R&eacute;f&eacute;rence de la location</th><th>Date de la location</th><th>Dur&eacute;e de la location en jour</th><th>Prix total de la location</th><th>R&eacute;f&eacute;rence du client</th><th>R&eacute;f&eacute;rence du v&eacute;lo</th><th>R&eacute;f&eacute;rence du responsable</th><th></th>";
		while($row = mysqli_fetch_array($result)){
			echo "<tr class=\"list\">";
			echo "<td class=\"list\" width=\"10%\" ><a href=update_location.php?id_location=".$row['id_location'].">".$row['id_location']."</a></td>";
			echo "<td class=\"list\" width=\"10%\">".$row['date_location']."</td>";
			echo "<td class=\"list\" width=\"15%\">".$row['duree_location']."</td>";
			echo "<td class=\"list\" width=\"10%\">".$row['prix_location']."</td>";
			echo "<td class=\"list\" width=\"15%\">".$row['id_client']."</td>";
			echo "<td class=\"list\" width=\"15%\">".$row['id_velo']."</td>";
			echo "<td class=\"list\" width=\"15%\">".$row['id_responsable']."</td>";
			echo "<td class=\"list\" width=\"5%\"><a href=supprimer_location.php?id_location=".$row['id_location'].">
				<img src=\"trash.png\" alt=\"del\" height=\"30\"></a></td></tr>";
			echo "</tr>";
		}
		echo "</table>";
		
		mysqli_close($con);
	?>
</body>
</html>	