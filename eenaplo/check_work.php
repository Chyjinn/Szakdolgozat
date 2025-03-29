<?php
	if(hasRights())
	{
	global $db;
	$sql="SELECT m.id, datum, hofok, idojaras, letszam, elhelyezkedes, leiras, f.nev FROM munkak m INNER JOIN felhasznalok f ON f.id=m.felh_id WHERE m.id = '".$_REQUEST['w_id']."'";
	$sordb=$db->query($sql);
	$adatok = $sordb->fetch_assoc();
	echo '<div class="container"> 
<h1>Munkavégzés részletei</h1>	
 <table class="table table-dark table-hover table-bordered">
	<tbody>
	<tr><td>ID:</td><td>'.$adatok['id'].'</td></tr>
	<tr><td>Dátum</td><td>'.$adatok['datum'].'</td></tr>
	<tr><td>Hőfok</td><td>'.$adatok['hofok'].'</td></tr>
	<tr><td>Időjárás</td><td>'.$adatok['idojaras'].'</td></tr>
	<tr><td>Létszám</td><td>'.$adatok['letszam'].'</td></tr>
	<tr><td>Elhelyezkedés</td><td>'.$adatok['elhelyezkedes'].'</td></tr>
	<tr><td>Leírás</td><td>'.$adatok['leiras'].'</td></tr>
	<tr><td>Felvette</td><td>'.$adatok['nev'].'</td></tr>
	</tbody></table>
	<a href="index.php?p=all_work" class="btn btn-outline-primary" role="button">Vissza</a>';
	echo '<h1>Mellékletek</h1>
	<table class="table table-dark table-hover table-bordered">
	<tbody>';
	$sql = 'SELECT * FROM `mellekletek` WHERE mihez_id LIKE '.$_REQUEST['w_id'];
	$sdb=$db->query($sql);
	while($adat = $sdb->fetch_assoc())
	{
			echo '<tr><td><img class="img-fluid mx-auto d-block" src="'.$adat['fajlnev'].'"></td></tr>';
	}
	echo '</tbody>
</table>
</div>';
	}
?>



