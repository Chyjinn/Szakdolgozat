<?php 
	$sql='SELECT e.id, e.megn, e.telepules, e.iranyitoszam, e.cim, e.hatarido, j.megnevezes FROM epitkezesek e INNER JOIN epitkezes_jogok ej ON e.id=ej.epit_id INNER JOIN jogosultsagok j ON ej.jog_id = j.id WHERE ej.felh_id = '.$_SESSION['fid'];
	$sdb=$db->query($sql);
	echo '<h1>Építkezések, amihez jogosultsága van</h1>';
	echo '<div class="container">            
	<table class="table table-dark table-hover table-bordered">
	<thead>
      <tr>
        <th>Megnevezés</th><th>Irányítószám</th><th>Település</th><th>Cím</th><th>Határidő</th><th>Jogosultság</th>
      </tr>
    </thead>
	<tbody>';
	while($adat = $sdb->fetch_assoc())
	{
			echo '<tr><td>'.$adat['megn'].'</td><td>'.$adat['iranyitoszam'].'</td><td>'.$adat['telepules'].'</td><td>'.$adat['cim'].'</td><td>'.$adat['hatarido'].'</td><td>'.$adat['megnevezes'].'</td></tr>';
	}
	  ?>
	  </tbody>
	</table>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	