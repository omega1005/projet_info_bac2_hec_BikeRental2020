<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="/assets/style.css">
<head>
	<title>Modifier velo</title>
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
			<li class="menu_s"><a href="velo.php">Retour aux velos</a></li>
		</ul>  			
	</div>
	
	<div>
	<h2 align="center"> Modifier velo</h2>
	
	<?php
	if (isset($_GET['id_velo'])){
		
		require_once __DIR__ . '/../private/secrets.php';
		$con= mysqli_connect("php2.hec.ulg.ac.be",$db_user,$db_pass,$db);
			
		if (mysqli_connect_errno()){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		
		$id_velo = $_GET["id_velo"];		
		$requete = "SELECT * FROM Velo WHERE id_velo = '" . $id_velo . "'";
		$result = mysqli_query($con, $requete);
		$nbLigne = mysqli_num_rows($result); 
		
		if($nbLigne == 0){
			die("<center class=\"alert\">Ce velo '.$id_velo.' est inexistant.</center>");
		}else{   
			$row = mysqli_fetch_array($result);
			$date_achat=$row['date_achat'];
			$prix_velo=$row['prix_velo'];
			$description=$row['description'];
			$prix_location=$row['prix_location'];
			$id_type_velo=$row['id_type_velo'];
			$id_localisation=$row['id_localisation'];	
		}
		
		if (isset($_POST["save_btn"])){
			$date_achat=$_POST["date_achat"];
			$prix_velo=$_POST["prix_velo"];
			$description=$_POST["description"];
			$prix_location=$_POST["prix_location"];
			$id_type_velo=$_POST["id_type_velo"];
			$id_localisation=$_POST["id_localisation"];
			
			if($_POST["date_achat"] == ''|| $_POST["prix_velo"] == ''|| $_POST["description"] == ''|| $_POST["prix_location"] == ''){
				echo "<center>Date achat, prix v&eacute;lo, description ou prix de la location ne peuvent pas &ecirc;tre vides.</center>";
			}else{
				if (!mysqli_query($con,"UPDATE Velo SET date_achat='".$date_achat."',prix_velo='".$prix_velo."',
				description='".$description."',prix_location='".$prix_location."',id_type_velo='".$id_type_velo."', id_localisation='".$id_localisation."' WHERE id_velo = '".$id_velo."'")){
					die('Erreur: ' . mysqli_error($con)); 
				}
				echo "<center>Ce v&eacute;lo ".$id_velo." est modifi&eacute; dans la base de donn&eacute;es</center>";
			}			
		}
		
		echo "<form name=\"velo_update\" action=\"update_velo.php?id_velo=$id_velo\" method=\"post\">";
		echo "<table align=\"center\">";
		echo "<tr><td align=right>R&eacute;f&eacute;rence du velo: </td><td>".$id_velo."<input type=\"hidden\" name=\"id_velo\" value=\"".$id_velo."\"></td></tr>"; 
		echo "<tr><td align=right>Date achat: </td><td><input type=\"text\" name=\"date_achat\" value=\"".$date_achat."\"></td></tr>"; 
		echo "<tr><td align=right>Prix du v&eacute;lo: </td><td><input type=\"text\" name=\"prix_velo\" value=\"".$prix_velo."\"></td></tr>";
		echo "<tr><td align=right>Description: </td><td><input type=\"text\" name=\"description\" value=\"".$description."\"></td></tr>";
		echo "<tr><td align=right>Prix de la location par jour: </td><td><input type=\"text\" name=\"prix_location\" value=\"".$prix_location."\"></td></tr>";
		echo "<tr><td align=right>R&eacute;f&eacute;rence du type de v&eacute;lo: </td><td><select name=\"id_type_velo\" value=\"".$id_type_velo."\">";
			$result_option = mysqli_query($con, "SELECT id_type_velo FROM Type_velo");
			while($row = mysqli_fetch_array($result_option)){
				if ($row['id_type_velo'] == $id_type_velo){
					echo "<option value=\"".$row['id_type_velo']."\" selected>".$row['id_type_velo']."</option>";
				}else{
					echo "<option value=\"".$row['id_type_velo']."\">".$row['id_type_velo']."</option>";
				}
			}		
		echo "</select>";
		echo "<tr><td align=right>R&eacute;f&eacute;rence de la localisation: </td><td><select name=\"id_localisation\" value=\"".$id_localisation."\">";
			$result_option = mysqli_query($con, "SELECT id_localisation FROM Localisation");
			while($row = mysqli_fetch_array($result_option)){
				if ($row['id_localisation'] == $id_localisation){
					echo "<option value=\"".$row['id_localisation']."\" selected>".$row['id_localisation']."</option>";
				}else{
					echo "<option value=\"".$row['id_localisation']."\">".$row['id_localisation']."</option>";
				}
			}
		echo "</select>";	
		echo "</td></tr>";			
		echo "<tr><td align=right><input type=\"submit\" name=\"save_btn\" value=\"Modifier\"></td><td><input type=\"reset\" name=\"res_btn\" value=\"R&eacute;initialiser\"></td></tr>";
		echo "</table>";
		echo "</form>";						
		
		echo "<br>";
		echo "<br>";
		
		$result_velo = mysqli_query($con, "SELECT * FROM Location WHERE id_velo = '" . $id_velo . "'");
		echo "<table class=\"list\" align=\"center\">";
		echo "<th>R&eacute;f&eacute;rence de la location</th><th>Date de la location</th><th>Dur&eacute;e de la location</th><th>R&eacute;f&eacute;rence du client</th>";
		while($row_velo= mysqli_fetch_array($result_velo)){
			echo "<tr class=\"list\">";
			echo "<td class=\"list\" width=\"15%\">".$row_velo['id_location']."</a> </td>";
			echo "<td class=\"list\" width=\"10%\">".$row_velo['date_location']."</td>";
			echo "<td class=\"list\" width=\"10%\">".$row_velo['duree_location']."</td>";
			echo "<td class=\"list\" width=\"10%\">".$row_velo['id_client']."</td>";
			echo "</tr>";
		}
		echo "</table>";
		
		mysqli_close($con);
	
	}else{
		header('Location: velo.php');
		exit();
	}
	?>
	</div>	
	</div>
</body>
</html>