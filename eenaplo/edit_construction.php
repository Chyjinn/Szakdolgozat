<?php
	if(hasRights())
	{
	global $db;
	$sql="SELECT * FROM `epitkezesek` WHERE id = '".$_REQUEST['constr_id']."'";
	$sordb=$db->query($sql);
	$adatok = $sordb->fetch_assoc();
	echo '<div class="container"> 
	<form method="post" action="index.php?p=update_construction&constr_id='.$_REQUEST['constr_id'].'">
<h1>Építkezés adatainak módosítása</h1>	
 <table class="table table-dark table-hover table-bordered">
	<tbody>
	<tr><td>Megnevezés</td><td><input class="form-control" type="text" name="megn" value="'.$adatok['megn'].'"></td></tr>
	<tr><td>Irányítószám</td><td><input class="form-control" type="text" name="ir" value="'.$adatok['iranyitoszam'].'"></td></tr>
	<tr><td>Város</td><td><input class="form-control" type="text" name="telepules" value="'.$adatok['telepules'].'"></td></tr>
	<tr><td>Cím</td><td><input class="form-control" type="text" name="cim" value="'.$adatok['cim'].'"></td></tr>
	<tr><td>Átadási határidő</td><td><input class="form-control" type="date" name="hatarido" value="'.$adatok['hatarido'].'"></td></tr>
	</tbody></table>
	<input type="submit" class="btn btn-primary" value="Mentés">
	
	<a class="btn btn-outline-danger" href="index.php?p=del_construction&constr_id='.$_REQUEST['constr_id'].'">Törlés</a>
</form>';
	}
	?>

