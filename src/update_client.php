<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/assets/style.css">
	<title>Modifier Client</title>
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
			<li class="menu_s"><a href="index.php">Retour aux clients</a></li>
		</ul>  			
	</div>
	
	<div>
	<h2 align="center"> Modifier Client</h2>
	
	<?php
	if (isset($_GET['id_client'])){
		
		require_once __DIR__ . '/../private/secrets.php';
		$con= mysqli_connect("php2.hec.ulg.ac.be",$db_user,$db_pass,$db);
			
		if (mysqli_connect_errno()){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		
		$id_client = $_GET["id_client"];		
		$requete = "SELECT * FROM Client WHERE id_client = '" . $id_client . "'";
		$result = mysqli_query($con, $requete);
		$nbLigne = mysqli_num_rows($result); 
		
		if($nbLigne == 0){
			die("<center class=\"alert\">Ce client '.$id_client.' est inexistant.</center>");
		}else{   
			$row = mysqli_fetch_array($result);
			$nom=$row['nom'];
			$prenom=$row['prenom'];
			$email=$row['email'];
			$telephone=$row['telephone'];
			$date_naissance=$row['date_naissance'];
			$id_ville=$row['id_ville'];	
		}
		
		if (isset($_POST["save_btn"])){
			$nom=$_POST["nom"];
			$prenom=$_POST["prenom"];
			$email=$_POST["email"];
			$telephone=$_POST["telephone"];
			$id_ville=$_POST["id_ville"];
			
			if($_POST["nom"] == ''|| $_POST["prenom"] == ''|| $_POST["email"] == ''){
				echo "<center>Nom, pr&eacute;nom ou email ne peuvent pas &ecirc;tre vides.</center>";
			}else{
				if (!mysqli_query($con,"UPDATE Client SET nom='".$nom."',prenom='".$prenom."',
				email='".$email."',telephone='".$telephone."',id_ville='".$id_ville."' WHERE id_client = '".$id_client."'")){
					die('Erreur: ' . mysqli_error($con)); 
				}
				echo "<center>Client ".$id_client." est modifi&eacute; dans la base de donn&eacute;es</center>";
			}			
		}
		
		echo "<form name=\"client_update\" action=\"update_client.php?id_client=$id_client\" method=\"post\">";
		echo "<table align=\"center\">";
		echo "<tr><td align=right>R&eacute;f&eacute;rence du client: </td><td>".$id_client."<input type=\"hidden\" name=\"id_client\" value=\"".$id_client."\"></td></tr>"; 
		echo "<tr><td align=right>Nom: </td><td><input type=\"text\" name=\"nom\" value=\"".$nom."\"></td></tr>"; 
		echo "<tr><td align=right>Pr&eacute;nom: </td><td><input type=\"text\" name=\"prenom\" value=\"".$prenom."\"></td></tr>";
		echo "<tr><td align=right>Email: </td><td><input type=\"text\" name=\"email\" value=\"".$email."\"></td></tr>";
		echo "<tr><td align=right>T&eacute;l&eacute;phone: </td><td><input type=\"text\" name=\"telephone\" value=\"".$telephone."\"></td></tr>";
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
		
		$result_client = mysqli_query($con, "SELECT * FROM Location WHERE id_client = '" . $id_client . "'");
		echo "<table class=\"list\" align=\"center\">";
		echo "<th>R&eacute;f&eacute;rence de la location</th><th>Date de la location</th><th>Dur&eacute;e de la location</th><th>Prix location par jour</th><th>R&eacute;f&eacute;rence du v&eacute;lo</th><th>R&eacute;f&eacute;rence du responsable</th>";
		while($row_client = mysqli_fetch_array($result_client)){
			echo "<tr class=\"list\">";
			echo "<td class=\"list\" width=\"15%\">".$row_client['id_location']."</a> </td>";
			echo "<td class=\"list\" width=\"10%\">".$row_client['date_location']."</td>";
			echo "<td class=\"list\" width=\"10%\">".$row_client['duree_location']."</td>";
			echo "<td class=\"list\" width=\"10%\">".$row_client['prix_location']."</td>";
			echo "<td class=\"list\" width=\"15%\">".$row_client['id_velo']."</td>";
			echo "<td class=\"list\" width=\"15%\">".$row_client['id_responsable']."</td>";
			echo "</tr>";
		}
		echo "</table>";
		
		mysqli_close($con);
	
	}else{
		header('Location: index.php');
		exit();
	}
	?>
	</div>	
	</div>
</body>
</html>