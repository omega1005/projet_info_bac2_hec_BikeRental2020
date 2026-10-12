<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/assets/style.css">
	<title>Modifier localisation</title>
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
			<li class="menu_s"><a href="localisation.php">Retour aux localisations</a></li>
		</ul>  			
	</div>
	
	<div>
	<h2 align="center"> Modifier localisation</h2>
	
	<?php
	if (isset($_GET['id_localisation'])){
		require_once __DIR__ . '/../private/secrets.php';
		$con= mysqli_connect("php2.hec.ulg.ac.be",$db_user,$db_pass,$db);
		
		if (mysqli_connect_errno()){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		
		$id_localisation = $_GET["id_localisation"];		
		$requete = "SELECT * FROM Localisation WHERE id_localisation = '" . $id_localisation . "'";
		$result = mysqli_query($con, $requete);
		$nbLigne = mysqli_num_rows($result); 
		
		if($nbLigne == 0){
			die("<center class=\"alert\">Cette localisation '.$id_localisation.' est inexistant.</center>");
		}else{   
			$row = mysqli_fetch_array($result);
			$nom_loc=$row['nom_loc'];
			$description=$row['description'];
			$id_ville=$row['id_ville'];	
		}
		
		if (isset($_POST["save_btn"])){
			$nom_loc=$_POST["nom_loc"];
			$description=$_POST["description"];
			$id_ville=$_POST["id_ville"];
			
			if($_POST["nom_loc"] == ''|| $_POST["description"] == ''){
				echo "<center>Nom ou description ne peuvent pas &ecirc;tre vides.</center>";
			}else{
				if (!mysqli_query($con,"UPDATE Localisation SET nom_loc='".$nom_loc."',description='".$description."',
				id_ville='".$id_ville."' WHERE id_localisation = '".$id_localisation."'")){
					die('Erreur: ' . mysqli_error($con)); 
				}
				echo "<center>La localisation ".$id_localisation." est modifi&eacute; dans la base de donn&eacute;es</center>";
			}			
		}
		
		echo "<form name=\"localisation_update\" action=\"update_localisation.php?id_localisation=$id_localisation\" method=\"post\">";
		echo "<table align=\"center\">";
		echo "<tr><td align=right>R&eacute;f&eacute;rence du localisation: </td><td>".$id_localisation."<input type=\"hidden\" name=\"id_localisation\" value=\"".$id_localisation."\"></td></tr>"; 
		echo "<tr><td align=right>Nom: </td><td><input type=\"text\" name=\"nom_loc\" value=\"".$nom_loc."\"></td></tr>"; 
		echo "<tr><td align=right>Description: </td><td><input type=\"text\" name=\"description\" value=\"".$description."\"></td></tr>";
		echo "<tr><td align=right>Ville: </td><td><select name=\"id_ville\" value=\"".$id_ville."\">";
			$result_option = mysqli_query($con, "SELECT id_ville FROM Ville");
			while($row = mysqli_fetch_array($result_option)){
				if ($row['id_ville'] == $id_ville){
					echo "<option value=\"".$row['id_ville']."\" selected>".$row['id_ville']."</option>";
				}else{
					echo "<option value=\"".$row['id_ville']."\">".$row['id_ville']."</option>";
				}
			}		
		echo "</select>";
		echo "</td></tr>";			
		echo "<tr><td align=right><input type=\"submit\" name=\"save_btn\" value=\"Modifier\"></td><td><input type=\"reset\" name=\"res_btn\" value=\"R&eacute;initialiser\"></td></tr>";
		echo "</table>";
		echo "</form>";						
		
		echo "<br>";
		echo "<br>";
		
		$result_localisation = mysqli_query($con, "SELECT id_velo, date_achat, prix_velo FROM Velo WHERE id_localisation= '" . $id_localisation. "'");
		echo "<table class=\"list\" align=\"center\">";
		echo "<th>R&eacute;f&eacute;rence v&eacute;lo pour la localisation</th><th>Date d'achat</th><th>Prix du v&eacute;lo</th>";
		while($row_localisation = mysqli_fetch_array($result_localisation)){
			echo "<tr class=\"list\">";
			echo "<td class=\"list\" width=\"20%\">".$row_localisation['id_velo']."</td>";
			echo "<td class=\"list\" width=\"20%\">".$row_localisation['date_achat']."</td>";
			echo "<td class=\"list\" width=\"15%\">".$row_localisation['prix_velo']."</td>";
			echo "</tr>";
		}
		echo "</table>";
		
		mysqli_close($con);
	
	}else{
		header('Location: localisation.php');
		exit();
	}
	?>
	</div>	
	</div>
</body>
</html>