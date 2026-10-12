<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="/assets/style.css">
<head>
	<title>Modifier ville</title>
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
			<li class="menu_s"><a href="ville.php">Retour aux villes</a></li>
		</ul>  			
	</div>
	
	<div>
	<h2 align="center"> Modifier ville</h2>
	
	<?php
	if (isset($_GET['id_ville'])){
		
		require_once __DIR__ . '/../private/secrets.php';
		$con= mysqli_connect("php2.hec.ulg.ac.be",$db_user,$db_pass,$db);
			
		if (mysqli_connect_errno()){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		
		$id_ville = $_GET["id_ville"];		
		$requete = "SELECT * FROM Ville WHERE id_ville = '" . $id_ville . "'";
		$result = mysqli_query($con, $requete);
		$nbLigne = mysqli_num_rows($result); 
		
		if($nbLigne == 0){
			die("<center class=\"alert\">Cette ville '.$id_ville.' est inexistant.</center>");
		}else{   
			$row = mysqli_fetch_array($result);
			$code_postal=$row['code_postal'];
			$nom_ville=$row['nom_ville'];
		}
		
		if (isset($_POST["save_btn"])){
			$code_postal=$_POST["code_postal"];
			$nom_ville=$_POST["nom_ville"];
			
			if($_POST["code_postal"] == ''|| $_POST["nom_ville"] == ''){
				echo "<center>Code postal ou nom de la ville ne peuvent pas &ecirc;tre vides.</center>";
			}else{
				if (!mysqli_query($con,"UPDATE Ville SET code_postal='".$code_postal."',nom_ville='".$nom_ville."' WHERE id_ville = '".$id_ville."'")){
					die('Erreur: ' . mysqli_error($con)); 
				}
				echo "<center>Cette ville ".$id_ville." est modifi&eacute; dans la base de donn&eacute;es</center>";
			}			
		}
		
		echo "<form name=\"ville_update\" action=\"update_ville.php?id_ville=$id_ville\" method=\"post\">";
		echo "<table align=\"center\">";
		echo "<tr><td align=right>R&eacute;f&eacute;rence de la ville: </td><td>".$id_ville."<input type=\"hidden\" name=\"id_ville\" value=\"".$id_ville."\"></td></tr>"; 
		echo "<tr><td align=right>Code Postal: </td><td><input type=\"text\" name=\"code_postal\" value=\"".$code_postal."\"></td></tr>"; 
		echo "<tr><td align=right>Nom de la ville: </td><td><input type=\"text\" name=\"nom_ville\" value=\"".$nom_ville."\"></td></tr>";
		echo "</td></tr>";			
		echo "<tr><td align=right><input type=\"submit\" name=\"save_btn\" value=\"Modifier\"></td><td><input type=\"reset\" name=\"res_btn\" value=\"R&eacute;initialiser\"></td></tr>";
		echo "</table>";
		echo "</form>";						
		
		echo "<br>";
		echo "<br>";
		
		$result_ville = mysqli_query($con, "SELECT id_client FROM Client WHERE id_ville = '" . $id_ville . "'");
		echo "<table class=\"list\" align=\"center\">";
		echo "<th>R&eacute;f&eacute;rences des Clients de cette ville</th>";
		while($row_ville = mysqli_fetch_array($result_ville)){
			echo "<tr class=\"list\">";
			echo "<td class=\"list\" width=\"100%\">".$row_ville['id_client']."</a> </td>";
			echo "</tr>";
		}
		echo "</table>";
		
		mysqli_close($con);
	
	}else{
		header('Location: ville.php');
		exit();
	}
	?>
	</div>	
	</div>
</body>
</html>