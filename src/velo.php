<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="./style.css">
<head>
	<title>V&eacute;los</title>
</head>
<body>
<div class="contenant">
	<div class="menu">
		<ul class="menu">
			<li class="menu"><a href="index.php">Clients</a></li>
			<li class="menu"><a class="active" href="velo.php">V&eacute;los</a></li>
			<li class="menu"><a href="location.php">Locations</a></li>
			<li class="menu"><a href="responsable.php">Responsables</a></li>
			<li class="menu"><a href="ville.php">Villes</a></li>
			<li class="menu"><a href="localisation.php">Localisations</a></li>
			<li class="menu"><a href="type_velo.php">Types de v&eacute;los</a></li>
			<li class="menu"><a href="rapport.php">Rapport</a></li>
		</ul>
		<ul class="menu_s">
			<li class="menu_s"><a href="ajouter_velo.php">Ajouter un v&eacute;lo</a></li>
		</ul> 	
	</div>
	<br><br>
	<div>  	
	<?php
		$db_user = "s160180";
		$db= "mschyns_s160180";
		$db_pass = "mrhxz46474";
		$con= mysqli_connect("php2.hec.ulg.ac.be",$db_user,$db_pass,$db);

		if(mysqli_connect_errno()){
		echo "Failed to connect to MySQL: ".mysqli_connect_error();
		}
		
		$requete = "SELECT id_velo, date_achat, prix_velo, description, prix_location, id_type_velo, id_localisation FROM Velo";
		$result = mysqli_query($con,$requete);
		
		echo "<table class=\"list\">";
		echo "<th>R&eacute;f&eacute;rence</th><th>Date d'achat</th><th>Prix du velo (en euro)</th><th>Description</th><th>Prix location par jour (en euro)</th><th>Type de v&eacute;lo</th><th>Localisation</th><th></th>";
		while($row = mysqli_fetch_array($result)){
			echo "<tr class=\"list\">";
			echo "<td class=\"list\" width=\"10%\" ><a href=update_velo.php?id_velo=".$row['id_velo'].">".$row['id_velo']."</a></td>";
			echo "<td class=\"list\" width=\"10%\">".$row['date_achat']."</td>";
			echo "<td class=\"list\" width=\"10%\">".$row['prix_velo']."</td>";
			echo "<td class=\"list\" width=\"15%\">".$row['description']."</td>";
			echo "<td class=\"list\" width=\"10%\">".$row['prix_location']."</td>";
			echo "<td class=\"list\" width=\"10%\">".$row['id_type_velo']."</td>";
			echo "<td class=\"list\" width=\"10%\">".$row['id_localisation']."</td>";
			echo "<td class=\"list\" width=\"5%\"><a href=supprimer_velo.php?id_velo=".$row['id_velo'].">
				<img src=\"trash.png\" alt=\"del\" height=\"30\"></a></td></tr>";
			echo "</tr>";
		}
		echo "</table>";
		
		mysqli_close($con);
	?>
</body>
</html>	