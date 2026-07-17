<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="./style.css">
<head>
	<title>Ajouter un responsable</title>
</head>
<body>
<div class="contenant">
	<div class="menu">
		<ul class="menu">
			<li class="menu"><a class="active" href="ajouter_responsable.php">Ajouter responsable</a></li>
		</ul> 		
		<ul class="menu_s">
			<li class="menu_s"><a href="responsable.php">Voir l'ensemble des responsables</a></li>
		</ul>  									
	</div>
	<div>
	<h2 align ="center"> Nouveau Responsable</h2> 

	<form name="responsable_insert" action="ajouter_responsable.php" " method="post">
	<table align="center" border=0>
	
	<tr><td align=right>R&eacute;f&eacute;rence du responsable</td><td><input type="text" name="id_responsable" placeholder="NOM du responsable-XXXX"></td></tr>
	<tr><td align=right>Nom </td><td><input type="text" name="nom"></td></tr>
	<tr><td align=right>Pr&eacute;nom </td><td><input type="text" name="prenom"></td></tr> 
	<tr><td align=right>Email </td><td><input type="text" name="email"></td></tr>
	<tr><td align=right>Telephone</td><td><input type="text" name="telephone"></td></tr>
	<tr><td align=right>Date de naissance </td><td><input type="date" name="date_naissance"></td></tr>
	
	<tr><td align=right><input type="submit" name="sub_btn" value="Ajouter"></td><td><input type="reset" name="res_btn" value="R&eacute;initialiser"></td></tr>
	</form>

	<?php
		if (isset($_POST['id_responsable'])){	
		$id_responsable= $_POST["id_responsable"];
		$nom= $_POST["nom"];
		$prenom= $_POST["prenom"];
		$email= $_POST["email"];
		$telephone= $_POST["telephone"];
		$date_naissance= $_POST["date_naissance"];;
		
		if($_POST["id_responsable"] == ''|| $_POST["nom"] == ''|| $_POST["prenom"] == ''|| $_POST["email"] == '' || $_POST["telephone"] == '' || $_POST["date_naissance"] == ''){
			echo "<center class=\"alert\">R&eacute;f&eacute;rence du responsable, nom, prenom, date de naissance, t&eacute;l&eacute;phone ou email ne peuvent pas &ecirc;tre vides.</center>";
		}else{
			$db_user = "s160180";
			$db= "mschyns_s160180";
			$db_pass = "mrhxz46474";
			$con= mysqli_connect("php2.hec.ulg.ac.be",$db_user,$db_pass,$db);
		
			if (mysqli_connect_errno()){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			if (mysqli_query($con,"INSERT INTO Responsable (id_responsable, nom, prenom, email, telephone, date_naissance) VALUES ('$id_responsable', '$nom', '$prenom','$email', '$telephone','$date_naissance')")){
				echo "<center>Responsable rajout&eacute; dans la base de donn&eacute;es</center> <br>"; 		
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