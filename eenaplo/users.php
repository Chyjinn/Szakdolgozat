<table>
<?php
	if(isAdmin())
	{
	global $db;
	$sql="SELECT id, nev, email FROM felhasznalok;";
	$sdb=$db->query($sql);
	echo '<h1>Felhasználók listája</h1>';
	echo '<div class="container">            
	<table class="table table-dark table-hover table-bordered">
	<thead>
      <tr>
        <th>ID</th><th>Felhasználónév</th><th>E-mail cím</th>
      </tr>
    </thead>
	<tbody>';
	while($adat = $sdb->fetch_assoc())
		{
			echo '<tr><td>'.$adat['id'].'</td><td>'.$adat['nev'].'</td><td>'.$adat['email'].'</td><td><a class="btn btn-outline-primary" href="index.php?p=user_rights&u_id='.$adat['id'].'">Jogosultságok</a></td></tr>';
		}
	}
			?>
			</tbody>
</table>
</div>