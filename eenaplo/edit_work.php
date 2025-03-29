<?php
	if(hasRights())
	{
	global $db;
	$sql="SELECT * FROM `munkak` WHERE id = '".$_REQUEST['w_id']."'";
	$sordb=$db->query($sql);
	$adatok = $sordb->fetch_assoc();
	echo '<div class="container"> 
	<form method="post" action="index.php?p=update_work">
<h1>Munkavégzés módosítása</h1>	
 <table class="table table-dark table-hover table-bordered">
	<tbody>
	<tr><td>Dátum</td><td><input class="form-control" type="date" name="datum" value="'.$adatok['datum'].'"></td></tr>
	<tr><td>Hőfok</td><td><input class="form-control" type="text" name="hofok" value="'.$adatok['hofok'].'"></td></tr>
	<tr><td>Időjárás</td><td><input class="form-control" type="text" name="idojaras" value="'.$adatok['idojaras'].'"></td></tr>
	<tr><td>Létszám</td><td><input class="form-control" type="text" name="letszam" value="'.$adatok['letszam'].'"></td></tr>
	<tr><td>Elhelyezkedés</td><td><input class="form-control" type="text" name="elhelyezkedes" value="'.$adatok['elhelyezkedes'].'"></td></tr>
	<tr><td>Leírás</td><td><input class="form-control" type="text" name="leiras" value="'.$adatok['leiras'].'"></td></tr>
	</tbody></table>
	<input type="submit" class="btn btn-primary" value="Mentés">
	<a class="btn btn-outline-primary" href="index.php?p=del_work&w_id='.$_REQUEST['w_id'].'">Törlés</a>
	<a class="btn btn-outline-primary" href="index.php?p=upload_image&w_id='.$_REQUEST['w_id'].'">Mellékletek feltöltése</a>
	</form>';
	echo '<h1>Mellékletek</h1>
	<table class="table table-dark table-hover table-bordered">
	<tbody>';
		$sql = 'SELECT * FROM `mellekletek` WHERE mihez_id LIKE '.$_REQUEST['w_id'];
	$sdb=$db->query($sql);
	while($adat = $sdb->fetch_assoc())
	{
			echo '<tr><td><img class="img-responsive" src="'.$adat['fajlnev'].'"><a class="btn btn-outline-danger" href="index.php?p=delete_image&w_id='.$_REQUEST['w_id'].'&image='.$adat['id'].'">Törlés</a></td></tr><br>';
	}
	echo '</div>';
	}
?>