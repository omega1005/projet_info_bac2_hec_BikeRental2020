<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="/assets/style.css">
<head>
	<title>Modifier location</title>
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
			<li class="menu_s"><a href="location.php">Retour aux locations</a></li>
		</ul>  			
	</div>
	
	<div>
	<h2 align="center"> Modifier location</h2>
	
	<?php
	if (isset($_GET['id_location'])){
		
		require_once __DIR__ . '/../private/secrets.php';
		$con= mysqli_connect("php2.hec.ulg.ac.be",$db_user,$db_pass,$db);
			
		if (mysqli_connect_errno()){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		
		$id_location = $_GET["id_location"];		
		$requete = "SELECT * FROM Location WHERE id_location = '" . $id_location . "'";
		$result = mysqli_query($con, $requete);
		$nbLigne = mysqli_num_rows($result); 
		
		if($nbLigne == 0){
			die("<center class=\"alert\">Cette location '.$id_location.' est inexistant.</center>");
		}else{   
			$row = mysqli_fetch_array($result);
			$date_location=$row['date_location'];
			$duree_location=$row['duree_location'];
			$prix_location=$row['prix_location'];
			$id_client=$row['id_client'];
			$id_velo=$row['id_velo'];
			$id_responsable=$row['id_responsable'];
		}
		
		if (isset($_POST["save_btn"])){
			$date_location=$_POST["date_location"];
			$duree_location=$_POST["duree_location"];
			$prix_location=$_POST["prix_location"];
			$id_client=$_POST["id_client"];
			$id_velo=$_POST["id_velo"];
			$id_responsable=$_POST["id_responsable"];
			
			if($_POST["date_location"] == ''|| $_POST["duree_location"] == ''|| $_POST["prix_location"] == ''){
				echo "<center>Date de la location, dur&eacute;e de la location ou prix de la location par jour ne peuvent pas &ecirc;tre vides.</center>";
			}else{
				if (!mysqli_query($con,"UPDATE Location SET date_location='".$date_location."',duree_location='".$duree_location."',
				prix_location='".$prix_location."',id_client='".$id_client."',id_velo='".$id_velo."',id_responsable='".$id_responsable."' WHERE id_location = '".$id_location."'")){
					die('Erreur: ' . mysqli_error($con)); 
				}
				echo "<center>La location ".$id_location." est modifi&eacute;e dans la base de donn&eacute;es</center>";
			}			
		}
		
		echo "<form name=\"location_update\" action=\"update_location.php?id_location=$id_location\" method=\"post\">";
		echo "<table align=\"center\">";
		echo "<tr><td align=right>R&eacute;f&eacute;rence de la location: </td><td>".$id_location."<input type=\"hidden\" name=\"id_location\" value=\"".$id_location."\"></td></tr>"; 
		echo "<tr><td align=right>Date de la location: </td><td><input type=\"text\" name=\"date_location\" value=\"".$date_location."\"></td></tr>"; 
		echo "<tr><td align=right>Dur&eacute;e de la location: </td><td><input type=\"text\" name=\"duree_location\" value=\"".$duree_location."\"></td></tr>";
		echo "<tr><td align=right>Prix de la location par jour: </td><td><input type=\"text\" name=\"prix_location\" value=\"".$prix_location."\"></td></tr>";
		echo "<tr><td align=right>R&eacute;f&eacute;rence du client: </td><td><select name=\"id_client\" value=\"".$id_client."\">";		
			$result_option = mysqli_query($con, "SELECT id_client FROM Client");
			while($row = mysqli_fetch_array($result_option)){
				if ($row['id_client'] == $id_client){
					echo "<option value=\"".$row['id_client']."\" selected>".$row['id_client']."</option>";
				}else{
					echo "<option value=\"".$row['id_client']."\">".$row['id_client']."</option>";
				}
			}		
		echo "</select>";
		echo "<tr><td align=right>R&eacute;f&eacute;rence du v&eacute;lo: </td><td><select name=\"id_velo\" value=\"".$id_velo."\">";
			$result_option = mysqli_query($con, "SELECT DISTINCT id_velo, id_localisation FROM Velo ORDER BY id_velo");
			while($row = mysqli_fetch_array($result_option)){
					echo "<option value=\"".$row['id_velo']."\">".$row['id_velo']." (".$row['id_localisation'].")</option>";
			}	
		echo "</select>";
		echo "<tr><td align=right>R&eacute;f&eacute;rence du responsable: </td><td><select name=\"id_responsable\" value=\"".$id_responsable."\">";
			$result_option = mysqli_query($con, "SELECT id_responsable FROM Responsable");
			while($row = mysqli_fetch_array($result_option)){
				if ($row['id_responsable'] == $id_responsable){
					echo "<option value=\"".$row['id_responsable']."\" selected>".$row['id_responsable']."</option>";
				}else{
					echo "<option value=\"".$row['id_responsable']."\">".$row['id_responsable']."</option>";
				}
			}	
		echo "</select>";
		echo "</td></tr>";			
		echo "<tr><td align=right><input type=\"submit\" name=\"save_btn\" value=\"Modifier\"></td><td><input type=\"reset\" name=\"res_btn\" value=\"R&eacute;initialiser\"></td></tr>";
		echo "</table>";
		echo "</form>";						
		
		echo "<br>";
		echo "<br>";
		
		$result_location = mysqli_query($con, "SELECT * FROM Location WHERE id_location = '" . $id_location . "'");
		echo "<table class=\"list\" align=\"center\">";
		echo "<th>R&eacute;f&eacute;rence du client</th><th>Date de la location</th><th>Dur&eacute;e de la location</th><th>Prix location par jour</th><th>R&eacute;f&eacute;rence du v&eacute;lo</th><th>R&eacute;f&eacute;rence du responsable</th>";
		while($row_location = mysqli_fetch_array($result_location)){
			echo "<tr class=\"list\">";
			echo "<td class=\"list\" width=\"15%\">".$row_location['id_client']."</a> </td>";
			echo "<td class=\"list\" width=\"10%\">".$row_location['date_location']."</td>";
			echo "<td class=\"list\" width=\"10%\">".$row_location['duree_location']."</td>";
			echo "<td class=\"list\" width=\"10%\">".$row_location['prix_location']."</td>";
			echo "<td class=\"list\" width=\"15%\">".$row_location['id_velo']."</td>";
			echo "<td class=\"list\" width=\"15%\">".$row_location['id_responsable']."</td>";
			echo "</tr>";
		}
		echo "</table>";
		
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