<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="/assets/style.css">
<head>
	<title>Clients</title>
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
			<li class="menu_s"><a href="ajouter_client.php">Ajouter un client</a></li>
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
		
		$requete = "SELECT id_client, nom, prenom, email, telephone, date_naissance, id_ville FROM Client";
		$result = mysqli_query($con,$requete);
		
		echo "<table class=\"list\">";
		echo "<th>R&eacute;f&eacute;rence du client</th><th>Nom</th><th>Pr&eacute;nom</th><th>Email</th><th>T&eacute;l&eacute;phone</th><th>Date de naissance</th><th>Ville</th><th></th>";
	
		while($row = mysqli_fetch_array($result)){
			echo "<tr class=\"list\">";
			echo "<td class=\"list\" width=\"10%\" ><a href=update_client.php?id_client=".$row['id_client'].">".$row['id_client']."</a></td>";
			echo "<td class=\"list\" width=\"15%\">".$row['nom']."</td>";
			echo "<td class=\"list\" width=\"15%\">".$row['prenom']."</td>";
			echo "<td class=\"list\" width=\"25%\">".$row['email']."</td>";
			echo "<td class=\"list\" width=\"15%\">".$row['telephone']."</td>";
			echo "<td class=\"list\" width=\"15%\">".$row['date_naissance']."</td>";
			echo "<td class=\"list\" width=\"10%\">".$row['id_ville']."</td>";
			echo "<td class=\"list\" width=\"5%\"><a href=supprimer_client.php?id_client=".$row['id_client'].">
				<img src=\"trash.png\" alt=\"del\" height=\"30\"></a></td></tr>";
			echo "</tr>";
		}
		echo "</table>";
		
		mysqli_close($con);
	?>
</body>
</html>	