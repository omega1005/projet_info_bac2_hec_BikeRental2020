<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="./style.css">
<head>
	<title>Ajouter un type de v&eacute;lo</title>
</head>
<body>
<div class="contenant">
	<div class="menu">
		<ul class="menu">
			<li class="menu"><a class="active" href="ajouter_type_velo.php">Ajouter un type de v&eacute;lo</a></li>
		</ul> 		
		<ul class="menu_s">
			<li class="menu_s"><a href="type_velo.php">Voir l'ensemble des types de v&eacute;los</a></li>
		</ul>  									
	</div>
	<div>
	<h2 align ="center"> Nouveau type de v&eacute;lo</h2> 

	<form name="type_velo_insert" action="ajouter_type_velo.php" " method="post">
	<table align="center" border=0>

	<tr><td align=right>R&eacute;f&eacute;rence du type de v&eacute;lo</td><td><input type="text" name="id_type_velo"></td></tr>
	<tr><td align=right>Type de v&eacute;lo</td><td><input type="text" name="type" placeholder="TYP-XXX"></td></tr> 

	<tr><td align=right><input type="submit" name="sub_btn" value="Ajouter"></td><td><input type="reset" name="res_btn" value="R&eacute;initialiser"></td></tr>
	</form>

	<?php
		if (isset($_POST['id_type_velo'])){	
		$id_type_velo= $_POST["id_type_velo"];
		$type= $_POST["type"];;
	
		if($_POST["id_type_velo"] == ''|| $_POST["type"] == ''){
			echo "<center class=\"alert\">R&eacute;f&eacute;rence du type de v&eacute;lo ou type de v&eacute;lo ne peuvent pas &ecirc;tre vides.</center>";
		}else{
			$db_user = "s160180";
			$db= "mschyns_s160180";
			$db_pass = "mrhxz46474";
			$con= mysqli_connect("php2.hec.ulg.ac.be",$db_user,$db_pass,$db);
		
			if (mysqli_connect_errno()){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			if (mysqli_query($con,"INSERT INTO Type_velo (id_type_velo, type) VALUES ('$id_type_velo', '$type')")){
				echo "<center>Type de v&eacute;lo rajout&eacute; dans la base de donn&eacute;es</center> <br>"; 		
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