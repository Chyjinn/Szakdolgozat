<?php
	if(hasRights())
	{
	$sql="SELECT megn, telepules, cim FROM epitkezesek WHERE id ='".$_SESSION['kiv_id']."'";
	$sordb=$db->query($sql);
	$adatok = $sordb->fetch_assoc();
	echo '<h1>'.$adatok['megn'].' ('.$adatok['telepules'].', '.$adatok['cim'].')</h1>';
	echo '<div class="container">            
 <table class="table table-dark table-hover table-bordered">
 <thead>
      <tr>
        <th>Felvevő</th><th>Dátum</th><th>Elhelyezkedés</th><th>Munka leírás</th>
      </tr>
    </thead>
	<tbody>';
	$sql='SELECT munkak.id, nev, felh_id, datum, elhelyezkedes, leiras FROM munkak INNER JOIN `felhasznalok` ON `felhasznalok`.`id`=`munkak`.`felh_id` WHERE epit_id = '.$_SESSION['kiv_id'];
	$sdb=$db->query($sql);
	while($adat = $sdb->fetch_assoc())
	{
			echo '<tr><td>'.$adat['nev'].'</td><td>'.$adat['datum'].'</td><td>'.$adat['elhelyezkedes'].'</td><td>'.$adat['leiras'].'</td><td><a class="btn btn-primary" href="index.php?p=check_work&w_id='.$adat['id'].'">Részletek</a></td></tr>';
	}
	echo '</tbody>
		</table>
		</div>';
	}
	  ?>


	
