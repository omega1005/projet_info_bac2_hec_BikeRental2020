<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="/assets/style.css">
<head>
	<title>Modifier responsable</title>
</head>
<body>
<div class="contenant">	
	<div class="menu">
		<ul class="menu">
			<li class="menu"><a href="index.php">Clients</a></li>
			<li class="menu"><a href="velo.php">V&eacute;los</a></li>
			<li class="menu"><a href="location.php">Locations</a></li>
			<li class="menu"><a class="active" href="responsable.php">Responsables</a></li>
			<li class="menu"><a href="ville.php">Villes</a></li>
			<li class="menu"><a href="localisation.php">Localisations</a></li>
			<li class="menu"><a href="type_velo.php">Types de v&eacute;los</a></li>
			<li class="menu"><a href="rapport.php">Rapport</a></li>
		</ul> 
		<ul class="menu_s">
			<li class="menu_s"><a href="responsable.php">Retour aux responsables</a></li>
		</ul>  			
	</div>
	
	<div>
	<h2 align="center"> Modifier responsable</h2>
	
	<?php
	if (isset($_GET['id_responsable'])){
		
		require_once __DIR__ . '/../private/secrets.php';
		$con= mysqli_connect("php2.hec.ulg.ac.be",$db_user,$db_pass,$db);
			
		if (mysqli_connect_errno()){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		
		$id_responsable = $_GET["id_responsable"];		
		$requete = "SELECT * FROM Responsable WHERE id_responsable = '" . $id_responsable . "'";
		$result = mysqli_query($con, $requete);
		$nbLigne = mysqli_num_rows($result); 
		
		if($nbLigne == 0){
			die("<center class=\"alert\">Ce responsable '.$id_responsable.' est inexistant.</center>");
		}else{   
			$row = mysqli_fetch_array($result);
			$nom=$row['nom'];
			$prenom=$row['prenom'];
			$email=$row['email'];
			$telephone=$row['telephone'];
			$date_naissance=$row['date_naissance'];
		}
		
		if (isset($_POST["save_btn"])){
			$nom=$_POST["nom"];
			$prenom=$_POST["prenom"];
			$email=$_POST["email"];
			$telephone=$_POST["telephone"];
			$date_naissance=$_POST["date_naissance"];
			
			if($_POST["nom"] == ''|| $_POST["prenom"] == ''|| $_POST["email"] == ''|| $_POST["telephone"] == ''|| $_POST["date_naissance"] == ''){
				echo "<center>Nom, pr&eacute;nom, email, t&eacute;l&eacute;phone ou date de naissance ne peuvent pas &ecirc;tre vides.</center>";
			}else{
				if (!mysqli_query($con,"UPDATE Responsable SET nom='".$nom."',prenom='".$prenom."',
				email='".$email."',telephone='".$telephone."',date_naissance='".$date_naissance."' WHERE id_responsable = '".$id_responsable."'")){
					die('Erreur: ' . mysqli_error($con)); 
				}
				echo "<center>Ce responsable ".$id_responsable." est modifi&eacute; dans la base de donn&eacute;es</center>";
			}			
		}
		
		echo "<form name=\"responsable_update\" action=\"update_responsable.php?id_responsable=$id_responsable\" method=\"post\">";
		echo "<table align=\"center\">";
		echo "<tr><td align=right>R&eacute;f&eacute;rence du responsable: </td><td>".$id_responsable."<input type=\"hidden\" name=\"id_responsable\" value=\"".$id_responsable."\"></td></tr>"; 
		echo "<tr><td align=right>Nom: </td><td><input type=\"text\" name=\"nom\" value=\"".$nom."\"></td></tr>"; 
		echo "<tr><td align=right>Pr&eacute;nom: </td><td><input type=\"text\" name=\"prenom\" value=\"".$prenom."\"></td></tr>";
		echo "<tr><td align=right>Email: </td><td><input type=\"text\" name=\"email\" value=\"".$email."\"></td></tr>";
		echo "<tr><td align=right>T&eacute;l&eacute;phone: </td><td><input type=\"text\" name=\"telephone\" value=\"".$telephone."\"></td></tr>";
		echo "<tr><td align=right>Date de naissance: </td><td><input type=\"text\" name=\"date_naissance\" value=\"".$date_naissance."\"></td></tr>";
		echo "</td></tr>";			
		echo "<tr><td align=right><input type=\"submit\" name=\"save_btn\" value=\"Modifier\"></td><td><input type=\"reset\" name=\"res_btn\" value=\"R&eacute;initialiser\"></td></tr>";
		echo "</table>";
		echo "</form>";						
		
		echo "<br>";
		echo "<br>";
		
		$result_responsable = mysqli_query($con, "SELECT id_location FROM Location WHERE id_responsable = '" . $id_responsable . "'");
		echo "<table class=\"list\" align=\"center\">";
		echo "<th>R&eacute;f&eacute;rence location</th>";
		while($row_responsable = mysqli_fetch_array($result_responsable)){
			echo "<tr class=\"list\">";
			echo "<td class=\"list\" width=\"100%\">".$row_responsable['id_location']."</a> </td>";
			echo "</tr>";
		}
		echo "</table>";
		
		mysqli_close($con);
	
	}else{
		header('Location: responsable.php');
		exit();
	}
	?>
	</div>	
	</div>
</body>
</html>