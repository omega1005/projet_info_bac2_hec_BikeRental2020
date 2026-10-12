<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="/assets/style.css">
<head>
	<title>Ajouter une location</title>
</head>
<body>
<div class="contenant">
	<div class="menu">
		<ul class="menu">
			<li class="menu"><a class="active" href="ajouter_location.php">Ajouter location</a></li>
		</ul>
		<ul class="menu_s">
			<li class="menu_s"><a href="location.php">Voir l'ensemble des locations</a></li>
		</ul>
	</div>
	<div>
	<h2 align ="center"> Nouvelle location</h2> 

	<form name="location_insert" action="ajouter_location.php" " method="post">
	<table align="center" border=0>

	<tr><td align=right>R&eacute;f&eacute;rence de la location</td><td><input type="text" name="id_location" placeholder="BE-XXXX"></td></tr>
	<tr><td align=right>Date de location</td><td><input type="date" name="date_location"></td></tr>
	<tr><td align=right>Dur&eacute;e de la location</td><td><input type="text" name="duree_location" placeholder="en JOUR"></td></tr> 
	<tr><td align=right>Prix de la location</td><td><input type="text" name="prix_location" placeholder="en EURO"></td></tr>
	<tr><td align=right>Client</td><td><select name="id_client">
	<?php
		require_once __DIR__ . '/../private/secrets.php';
		$con= mysqli_connect("php2.hec.ulg.ac.be",$db_user,$db_pass,$db);

		if (mysqli_connect_errno()){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

		$result_option = mysqli_query($con, "SELECT id_client FROM Client");
		while($row = mysqli_fetch_array($result_option)){
			if ($row['id_client'] == $id_client){
				echo "<option value=\"".$row['id_client']."\" selected>".$row['id_client']."</option>";
			}else{
				echo "<option value=\"".$row['id_client']."\">".$row['id_client']."</option>";
			}
		}
		mysqli_close($con);
	?>
	<tr><td align=right>R&eacute;f&eacute;rence du v&eacute;lo</td><td><select name="id_velo">
	<?php
		require_once __DIR__ . '/../private/secrets.php';
		$con= mysqli_connect("php2.hec.ulg.ac.be",$db_user,$db_pass,$db);
		
		if (mysqli_connect_errno()){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}	

		$result_option = mysqli_query($con, "SELECT DISTINCT id_velo, id_localisation FROM Velo ORDER BY id_velo");
		while($row = mysqli_fetch_array($result_option)){
			echo "<option value=\"".$row['id_velo']."\">".$row['id_velo']." (".$row['id_localisation'].")</option>";
		}
		mysqli_close($con);
	?>
	<tr><td align=right>Responsable</td><td><select name="id_responsable">
	<?php
		require_once __DIR__ . '/../private/secrets.php';
		$con= mysqli_connect("php2.hec.ulg.ac.be",$db_user,$db_pass,$db);
		
		if (mysqli_connect_errno()){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}	
		
		$result_option = mysqli_query($con, "SELECT id_responsable FROM Responsable");
		while($row = mysqli_fetch_array($result_option)){
			if ($row['id_responsable'] == $id_responsable){
				echo "<option value=\"".$row['id_responsable']."\" selected>".$row['id_responsable']."</option>";
			}else{
				echo "<option value=\"".$row['id_responsable']."\">".$row['id_responsable']."</option>";
			}
		}
		mysqli_close($con);
	?>

	</select></td></tr>
	<tr><td align=right><input type="submit" name="sub_btn" value="Ajouter"></td><td><input type="reset" name="res_btn" value="R&eacute;initialiser"></td></tr>
	</form>

	<?php
		if (isset($_POST['id_velo'])){	
		$id_location= $_POST["id_location"];
		$date_location= $_POST["date_location"];
		$duree_location= $_POST["duree_location"];
		$prix_location = $_POST["prix_location"];
		$id_client= $_POST["id_client"];
		$id_velo= $_POST["id_velo"];
		$id_responsable= $_POST["id_responsable"];
			
		if($_POST["id_location"] == ''|| $_POST["date_location"] == ''|| $_POST["duree_location"] == '' || $_POST["prix_location"] == ''){
			echo "<center class=\"alert\">R&eacute;f&eacute;rence, date de location, dur&eacute;e de location ou prix de la location ne peuvent pas &ecirc;tre vides.</center>";
		}else{
			require_once __DIR__ . '/../private/secrets.php';
			$con= mysqli_connect("php2.hec.ulg.ac.be",$db_user,$db_pass,$db);

			if (mysqli_connect_errno()){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			if (mysqli_query($con,"INSERT INTO Location (id_location, date_location, duree_location, prix_location, id_client, id_velo, id_responsable) VALUES ('$id_location', '$date_location', '$duree_location','$prix_location', '$id_client', '$id_velo', '$id_responsable')")){
				echo "<center>Location rajout&eacute; dans la base de donn&eacute;es</center> <br>";
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
