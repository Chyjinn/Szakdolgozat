<table>
<?php
	if(isAdmin())
	{
	global $db;
	
	$sql='SELECT nev, email, admin FROM felhasznalok WHERE id = '.$_REQUEST['u_id'].';';
	$sdb=$db->query($sql);
	$adatok = $sdb->fetch_assoc();
	$felhasznalonev = $adatok['nev'];
	$email = $adatok['email'];
	$checked = '';
	if ($adatok['admin'] == 1) $checked = 'checked';
	echo '<div class="container">';
	echo '<h1>'.$felhasznalonev.' ('.$email.') jogosultságai</h1>';
	echo ' 
	<form method="post" action="index.php?p=update_admin&u_id='.$_REQUEST['u_id'].'">
	Adminisztrátor: <input type="checkbox" id="admin" name="admin" '.$checked.'>
	<input type="submit" class="btn btn-primary" value="Mentés">
	</form>
	<table class="table table-dark table-hover table-bordered">
	<thead>
      <tr>
        <th>Megnevezés</th><th>Város</th><th>Cím</th><th>Jogosultság</th>
      </tr>
    </thead>
	<tbody>';
	
	$sql='SELECT ej.id, e.megn, e.cim, e.telepules, j.megnevezes FROM epitkezes_jogok ej INNER JOIN epitkezesek e ON ej.epit_id=e.id INNER JOIN felhasznalok f ON f.id=ej.felh_id INNER JOIN jogosultsagok j ON j.id=ej.jog_id WHERE f.id = '.$_REQUEST['u_id'].';';
	$sdb=$db->query($sql);
	while($adat = $sdb->fetch_assoc())
		{
			echo '<tr><td>'.$adat['megn'].'</td><td>'.$adat['telepules'].'</td><td>'.$adat['cim'].'</td><td>'.$adat['megnevezes'].'</td><td><a class="btn btn-outline-danger" href="index.php?p=del_rights&ej_id='.$adat['id'].'&u_id='.$_REQUEST['u_id'].'">Törlés</a></td></tr>';
		}
	
	echo '</table>
	<a class="btn btn-outline-primary" href="index.php?p=add_rights&u_id='.$_REQUEST['u_id'].'">Jogosultság hozzáadása</a>
	</div>';
	}
			?>

