<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="./style.css">
<head>
	<title>Ajouter un v&eacute;lo</title>
</head>
<body>
<div class="contenant">
	<div class="menu">
		<ul class="menu">
			<li class="menu"><a class="active" href="ajouter_velo.php">Ajouter v&eacute;lo</a></li>
		</ul> 		
		<ul class="menu_s">
			<li class="menu_s"><a href="velo.php">Voir l'ensemble des v&eacute;los</a></li>
		</ul>  									
	</div>
	<div>
	<h2 align ="center"> Nouveau V&eacute;lo</h2> 

	<form name="velo_insert" action="ajouter_velo.php" " method="post">
	<table align="center" border=0>

	<tr><td align=right>R&eacute;f&eacute;rence du v&eacute;lo</td><td><input type="text" name="id_velo" placeholder="VELO-XXX-Prix loc/J"></td></tr>
	<tr><td align=right>Date d'achat</td><td><input type="date" name="date_achat"></td></tr> 
	<tr><td align=right>Prix du v&eacute;lo</td><td><input type="text" name="prix_velo" placeholder="en EURO"></td></tr>
	<tr><td align=right>Description</td><td><input type="text" name="description"></td></tr>
	<tr><td align=right>Prix de la location par jour</td><td><input type="text" name="prix_location" placeholder="en EURO"></td></tr> 
	<tr><td align=right>Type de v&eacute;lo</td><td><select name="id_type_velo">
	<?php
			$db_user = "s160180";
			$db= "mschyns_s160180";
			$db_pass = "mrhxz46474";
			$con= mysqli_connect("php2.hec.ulg.ac.be",$db_user,$db_pass,$db);
		
			if (mysqli_connect_errno()){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}	
		
			$result_option = mysqli_query($con, "SELECT id_type_velo FROM Type_velo");
			while($row = mysqli_fetch_array($result_option)){
				if ($row['id_type_velo'] == $id_type_velo){
					echo "<option value=\"".$row['id_type_velo']."\" selected>".$row['id_type_velo']."</option>";
				}else{
					echo "<option value=\"".$row['id_type_velo']."\">".$row['id_type_velo']."</option>";
				}
			}
			mysqli_close($con);
	?>
	<tr><td align=right>Localisation du v&eacute;lo</td><td><select name="id_localisation">
	<?php
			$db_user = "s160180";
			$db= "mschyns_s160180";
			$db_pass = "mrhxz46474";
			$con= mysqli_connect("php2.hec.ulg.ac.be",$db_user,$db_pass,$db);
		
			if (mysqli_connect_errno()){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}	
		
			$result_option = mysqli_query($con, "SELECT id_localisation FROM Localisation");
			while($row = mysqli_fetch_array($result_option)){
				if ($row['id_localisation'] == $id_localisation){
					echo "<option value=\"".$row['id_localisation']."\" selected>".$row['id_localisation']."</option>";
				}else{
					echo "<option value=\"".$row['id_localisation']."\">".$row['id_localisation']."</option>";
				}
			}
			mysqli_close($con);
	?>
		
	</select></td></tr>
	<tr><td align=right><input type="submit" name="sub_btn" value="Ajouter"></td><td><input type="reset" name="res_btn" value="R&eacute;initialiser"></td></tr>
	</form>

	<?php
		if (isset($_POST['id_velo'])){	
		$id_velo= $_POST["id_velo"];
		$date_achat= $_POST["date_achat"];
		$prix_velo= $_POST["prix_velo"];
		$description= $_POST["description"];
		$prix_location = $_POST["prix_location"];
		$id_type_velo= $_POST["id_type_velo"];
		$id_localisation= $_POST["id_localisation"];;
	
		if($_POST["id_velo"] == ''|| $_POST["date_achat"] == ''|| $_POST["prix_velo"] == '' || $_POST["description"] == '' || $_POST["prix_location"] == ''){
			echo "<center class=\"alert\">R&eacute;f&eacute;rence , date d'achat, prix du v&eacute;lo, description ou prix de la location par jour ne peuvent pas &ecirc;tre vides.</center>";
		}else{
			$db_user = "s160180";
			$db= "mschyns_s160180";
			$db_pass = "mrhxz46474";
			$con= mysqli_connect("php2.hec.ulg.ac.be",$db_user,$db_pass,$db);
		
			if (mysqli_connect_errno()){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			if (mysqli_query($con,"INSERT INTO Velo (id_velo, date_achat, prix_velo, description, prix_location, id_type_velo, id_localisation) VALUES ('$id_velo', '$date_achat','$prix_velo', '$description','$prix_location', '$id_type_velo', '$id_localisation')")){
				echo "<center>V&eacute;lo rajout&eacute; dans la base de donn&eacute;es</center> <br>"; 		
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