<?php 
	if(hasRights())
	{
	echo '<table>
	<form method="post" action="edit_work.php">';
	$sql="SELECT megn, telepules, cim FROM epitkezesek WHERE id ='".$_SESSION['kiv_id']."'";
	$sordb=$db->query($sql);
	$adatok = $sordb->fetch_assoc();
	echo '<h1>'.$adatok['megn'].' ('.$adatok['telepules'].', '.$adatok['cim'].')</h1>';
	echo '<div class="container">            
	<table class="table table-dark table-hover table-bordered">
	<thead>
      <tr>
        <th>Dátum</th><th>Elhelyezkedés</th><th>Munka leírása</th>
      </tr>
    </thead>
	<tbody>';
	$sql='SELECT id, datum, elhelyezkedes, leiras FROM munkak WHERE epit_id = '.$_SESSION['kiv_id'].' AND felh_id = '.$_SESSION['fid'];
	$sdb=$db->query($sql);
	while($adat = $sdb->fetch_assoc())
	{
			echo '<tr><td>'.$adat['datum'].'</td><td>'.$adat['elhelyezkedes'].'</td><td>'.$adat['leiras'].'</td><td><a class="btn btn-primary" href="index.php?p=edit_work&w_id='.$adat['id'].'">Szerkesztés</a></td></tr>';
	}
	  
	echo '</form>
	</table>
	<a href="index.php?p=add_work" class="btn btn-outline-primary" role="button">Új munkavégzés felvétele</a>';
	}
	?>