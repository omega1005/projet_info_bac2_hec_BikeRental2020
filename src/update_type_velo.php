<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/assets/style.css">
	<title>Type de v&eacute;lo</title>
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
			<li class="menu"><a class="active" href="type_velo.php">Types de v&eacute;los</a></li>
			<li class="menu"><a href="rapport.php">Rapport</a></li>
		</ul> 
		<ul class="menu_s">
			<li class="menu_s"><a href="type_velo.php">Retour aux types de v&eacute;los</a></li>
		</ul>  			
	</div>
	
	<div>
	<h2 align="center"> Type de v&eacute;lo</h2>
	
	<?php
	if (isset($_GET['id_type_velo'])){
		require_once __DIR__ . '/../private/secrets.php';
		$con= mysqli_connect("php2.hec.ulg.ac.be",$db_user,$db_pass,$db);
			
		if (mysqli_connect_errno()){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		
		$id_type_velo = $_GET["id_type_velo"];		
		$requete = "SELECT * FROM Type_velo WHERE id_type_velo = '" . $id_type_velo . "'";
		$result = mysqli_query($con, $requete);
		$nbLigne = mysqli_num_rows($result); 
		
		if($nbLigne == 0){
			die("<center class=\"alert\">Ce type de velo '.$id_type_velo.' est inexistant.</center>");
		}else{   
			$row = mysqli_fetch_array($result);
			$type=$row['type'];	
		}
		
		if (isset($_POST["save_btn"])){
			$type=$_POST["type"];
			
			if($_POST["type"] == ''){
				echo "<center>Type de v&eacute;lo ne peut pas &ecirc;tre vide.</center>";
			}else{
				if (!mysqli_query($con,"UPDATE Type_velo SET type='".$type."' WHERE id_type_velo = '".$id_type_velo."'")){
					die('Erreur: ' . mysqli_error($con)); 
				}
				echo "<center>Ce type de v&eacute;lo ".$id_type_velo." est modifi&eacute; dans la base de donn&eacute;es</center>";
			}			
		}
		
		echo "<form name=\"type_velo_update\" action=\"update_type_velo.php?id_type_velo=$id_type_velo\" method=\"post\">";
		echo "<table align=\"center\">";
		echo "<tr><td align=right>R&eacute;f&eacute;rence du type_velo: </td><td>".$id_type_velo."<input type=\"hidden\" name=\"id_type_velo\" value=\"".$id_type_velo."\"></td></tr>"; 
		echo "<tr><td align=right>Type de v&eacute;lo: </td><td>".$type."<input type=\"hidden\" name=\"type\" value=\"".$type."\"></td></tr>"; 
		echo "</td></tr>";
		echo "</table>";
		echo "</form>";						
		
		echo "<br>";
		echo "<br>";
		
		$result_type_velo = mysqli_query($con, "SELECT id_velo FROM Velo WHERE id_type_velo = '" . $id_type_velo . "'");
		echo "<table class=\"list\" align=\"center\">";
		echo "<th>R&eacute;f&eacute;rence v&eacute;los</th>";
		while($row_type_velo = mysqli_fetch_array($result_type_velo)){
			echo "<tr class=\"list\">";
			echo "<td class=\"list\" width=\"15%\">".$row_type_velo['id_velo']."</a> </td>";
			echo "</tr>";
		}
		echo "</table>";
		
		mysqli_close($con);
	
	}else{
		header('Location: type_velo.php');
		exit();
	}
	?>
	</div>	
	</div>
</body>
</html>