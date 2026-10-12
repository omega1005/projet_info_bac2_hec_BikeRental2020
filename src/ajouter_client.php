<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/assets/style.css">
	<title>Ajouter un client</title>
</head>
<body>
<div class="contenant">
	<div class="menu">
		<ul class="menu">
			<li class="menu"><a class="active" href="ajouter_client.php">Ajouter clients</a></li>
		</ul>
		<ul class="menu_s">
			<li class="menu_s"><a href="index.php">Voir l'ensemble des clients</a></li>
		</ul>
	</div>
	<div>
	<h2 align ="center">Nouveau Client</h2> 

	<form name="client_insert" action="ajouter_client.php" method="post">
	<table align="center" border=0>

	<tr><td align=right>R&eacute;f&eacute;rence du client</td><td><input type="text" name="id_client" placeholder="NOM du client-XXXX"></td></tr>
	<tr><td align=right>Nom </td><td><input type="text" name="nom"></td></tr>
	<tr><td align=right>Pr&eacute;nom </td><td><input type="text" name="prenom"></td></tr> 
	<tr><td align=right>Date de naissance </td><td><input type="date" name="date_naissance"></td></tr>
	<tr><td align=right>T&eacute;l&eacute;phone</td><td><input type="text" name="telephone"></td></tr>
	<tr><td align=right>Email </td><td><input type="text" name="email"></td></tr> 
	<tr><td align=right>Ville </td><td><select name="id_ville">
	
	<?php
		require_once __DIR__ . '/../private/secrets.php';
		$con= mysqli_connect("php2.hec.ulg.ac.be",$db_user,$db_pass,$db);

		if (mysqli_connect_errno()){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

		$result_option = mysqli_query($con, "SELECT id_ville FROM Ville");
		while($row = mysqli_fetch_array($result_option)){
			if ($row['id_ville'] == $id_ville){
				echo "<option value=\"".$row['id_ville']."\" selected>".$row['id_ville']."</option>";
			}else{
				echo "<option value=\"".$row['id_ville']."\">".$row['id_ville']."</option>";
			}
		}
		mysqli_close($con);
	?>

	</select></td></tr>
	<tr><td align=right><input type="submit" name="sub_btn" value="Ajouter"></td><td><input type="reset" name="res_btn" value="R&eacute;initialiser"></td></tr>
	</table>
	</form>

	<?php
		if (isset($_POST['id_client'])){
		$id_client= $_POST["id_client"];
		$nom= $_POST["nom"];
		$prenom= $_POST["prenom"];
		$date_naissance= $_POST["date_naissance"];
		$telephone = $_POST["telephone"];
		$email = $_POST["email"];
		$id_ville = $_POST["id_ville"];
	
		if($_POST["id_client"] == ''|| $_POST["nom"] == ''|| $_POST["prenom"] == ''|| $_POST["date_naissance"] == '' || $_POST["telephone"] == '' || $_POST["email"] == ''){
			echo "<center class=\"alert\">R&eacute;f&eacute;rence du client, nom, pr&eacute;nom, date de naissance, t&eacute;l&eacute;phone ou email ne peuvent pas &ecirc;tre vides.</center>";
		}else{
			require_once __DIR__ . '/../private/secrets.php';
			$con= mysqli_connect("php2.hec.ulg.ac.be",$db_user,$db_pass,$db);

			if (mysqli_connect_errno()){
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			if (mysqli_query($con,"INSERT INTO Client (id_client, nom, prenom, email, telephone, date_naissance, id_ville) VALUES ('$id_client', '$nom', '$prenom','$email', '$telephone','$date_naissance', '$id_ville')")){
				echo "<center>Client rajout&eacute; dans la base de donn&eacute;es</center> <br>"; 		
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
