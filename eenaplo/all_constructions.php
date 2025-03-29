<table>
<?php 
if (isAdmin())
{

	$sql="SELECT id, megn, telepules, cim, iranyitoszam, hatarido FROM epitkezesek";
	$sordb=$db->query($sql);
	echo '<h1>Építkezések listája</h1>';
	echo '<div class="container">            
	<table class="table table-dark table-hover table-bordered">
	<thead>
      <tr>
        <th>Megnevezés</th><th>Irányítószám</th><th>Település</th><th>Cím</th><th>Átadási határidő</th>
      </tr>
    </thead>
	<tbody>';
	while($adat = $sordb->fetch_assoc())
	{
		echo '<tr><td>'.$adat['megn'].'</td><td>'.$adat['iranyitoszam'].'</td><td>'.$adat['telepules'].'</td><td>'.$adat['cim'].'</td><td>'.$adat['hatarido'].'</td><td><a class="btn btn-outline-primary" href="index.php?p=edit_constructions&constr_id='.$adat['id'].'">Módosítás</a></td></tr>';
	}
	echo '</table>
<a class="btn btn-outline-primary" href="index.php?p=add_construction">Építkezés hozzáadása</a>
</div>';
}
	?>

