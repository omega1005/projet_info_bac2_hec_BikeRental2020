<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="./style.css">
<head>
	<title>Ajouter une ville</title>
</head>
<body>
<div class="contenant">
	<div class="menu">
		<ul class="menu">
			<li class="menu"><a class="active" href="ajouter_ville.php">Ajouter une ville</a></li>
		</ul> 		
		<ul class="menu_s">
			<li class="menu_s"><a href="ville.php">Voir l'ensemble des villes</a></li>
		</ul>  									
	</div>
	<div>
	<h2 align ="center"> Nouvelle ville</h2> 

	<form name="ville_insert" action="ajouter_ville.php" " method="post">
	<table align="center" border=0>
	
	<tr><td align=right>R&eacute;f&eacute;rence de la ville</td><td><input type="text" name="id_ville" placeholder="Nom de la ville-code postal"></td></tr>
	<tr><td align=right>Code Postal</td><td><input type="text" name="code_postal"></td></tr>
	<tr><td align=right>Nom de la ville</td><td><input type="text" name="nom_ville"></td></tr> 

	<tr><td align=right><input type="submit" name="sub_btn" value="Ajouter"></td><td><input type="reset" name="res_btn" value="R&eacute;initialiser"></td></tr>
	</form>

	<?php
		if (isset($_POST['id_ville'])){	
		$id_ville= $_POST["id_ville"];
		$code_postal= $_POST["code_postal"];
		$nom_ville= $_POST["nom_ville"];;
	
		if($_POST["id_ville"] == ''|| $_POST["code_postal"] == ''|| $_POST["nom_ville"] == ''){
			echo "<center class=\"alert\">R&eacute;f&eacute;rence de la ville, code postal ou le nom de la ville ne peuvent pas &ecirc;tre vides.</center>";
		}else{
			$db_user = "s160180";
			$db= "mschyns_s160180";
			$db_pass = "mrhxz46474";
			$con= mysqli_connect("php2.hec.ulg.ac.be",$db_user,$db_pass,$db);
		
			if (mysqli_connect_errno()){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			if (mysqli_query($con,"INSERT INTO Ville (id_ville, code_postal, nom_ville) VALUES ('$id_ville', '$code_postal','$nom_ville')")){
				echo "<center>Ville rajout&eacute; dans la base de donn&eacute;es</center> <br>"; 		
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