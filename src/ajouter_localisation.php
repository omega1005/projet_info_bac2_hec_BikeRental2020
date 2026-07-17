<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="./style.css">
<head>
	<title>Ajouter une localisation</title>
</head>
<body>
<div class="contenant">
	<div class="menu">
		<ul class="menu">
			<li class="menu"><a class="active" href="ajouter_localisation.php">Ajouter une localisation</a></li>
		</ul> 		
		<ul class="menu_s">
			<li class="menu_s"><a href="localisation.php">Voir l'ensemble des localisations</a></li>
		</ul>  									
	</div>
	<div>
	<h2 align ="center"> Nouvelle localisation</h2> 

	<form name="localisation_insert" action="ajouter_localisation.php" " method="post">
	<table align="center" border=0>
	
	<tr><td align=right>Responsable</td><td><select name="id_localisation">
	<?php
			$db_user = "s160180";
			$db= "mschyns_s160180";
			$db_pass = "mrhxz46474";
			$con= mysqli_connect("php2.hec.ulg.ac.be",$db_user,$db_pass,$db);
		
			if (mysqli_connect_errno()){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}	
		
			$result_option = mysqli_query($con, "SELECT id_responsable FROM Responsable");
			while($row = mysqli_fetch_array($result_option)){
				if ($row['id_responsable '] == $id_localisation){
					echo "<option value=\"".$row['id_responsable']."\" selected>".$row['id_responsable']."</option>";
				}else{
					echo "<option value=\"".$row['id_responsable']."\">".$row['id_responsable']."</option>";
				}
			}
			mysqli_close($con);
	?>
	<tr><td align=right>Nom</td><td><input type="text" name="nom_loc"></td></tr>
	<tr><td align=right>Description</td><td><input type="text" name="description"></td></tr> 
	<tr><td align=right>Ville</td><td><select name="id_ville">
	<?php
			$db_user = "s160180";
			$db= "mschyns_s160180";
			$db_pass = "mrhxz46474";
			$con= mysqli_connect("php2.hec.ulg.ac.be",$db_user,$db_pass,$db);
		
			if (mysqli_connect_errno()){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}	
		
			$result_option = mysqli_query($con, "SELECT id_ville FROM Ville");
			while($row = mysqli_fetch_array($result_option)){
				if ($row['id_ville '] == $id_ville){
					echo "<option value=\"".$row['id_ville']."\" selected>".$row['id_ville']."</option>";
				}else{
					echo "<option value=\"".$row['id_ville']."\">".$row['id_ville']."</option>";
				}
			}
			mysqli_close($con);
	?>	
	</select></td></tr>
	<tr><td align=right><input type="submit" name="sub_btn" value="Ajouter"></td><td><input type="reset" name="res_btn" value="R&eacute;initialiser"></td></tr>
	</form>

	<?php
		if (isset($_POST['id_localisation'])){
		$id_localisation= $_POST["id_localisation"];		
		$nom_loc= $_POST["nom_loc"];
		$description= $_POST["description"];
		$id_ville= $_POST["id_ville"];;
	
		if($_POST["id_localisation"] == ''|| $_POST["nom_loc"] == ''|| $_POST["description"] == ''){
			echo "<center class=\"alert\">R&eacute;f&eacute;rence de la localisation, nom ou description ne peuvent pas &ecirc;tre vides.</center>";
		}else{
			$db_user = "s160180";
			$db= "mschyns_s160180";
			$db_pass = "mrhxz46474";
			$con= mysqli_connect("php2.hec.ulg.ac.be",$db_user,$db_pass,$db);
		
			if (mysqli_connect_errno()){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			if (mysqli_query($con,"INSERT INTO Localisation (id_localisation, nom_loc, description, id_ville) VALUES ('$id_localisation', '$nom_loc','$description','$id_ville')")){
				echo "<center>Localisation rajout&eacute; dans la base de donn&eacute;es</center> <br>"; 		
			}else{
				echo '<center>'.mysqli_error($con).'</center> <br>';
			}
			
			
			mysqli_close($con);
		}
	}
	
	?>
	</div>	
</div>
</body>
</html>