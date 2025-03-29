<?php
	if(hasRights())
	{
echo '<div class="container"> 
	<form method="post" action="index.php?p=insert_work">
<h1>Munkavégzés felvétele</h1>	
 <table class="table table-dark table-hover table-bordered">
	<tbody>
	<tr><td>Dátum</td><td><input class="form-control" type="date" name="datum"></td></tr>
	<tr><td>Hőfok</td><td><input class="form-control" type="text" name="hofok"></td></tr>
	<tr><td>Időjárás</td><td><input class="form-control" type="text" name="idojaras"></td></tr>
	<tr><td>Létszám</td><td><input class="form-control" type="text" name="letszam"></td></tr>
	<tr><td>Elhelyezkedés</td><td><input class="form-control" type="text" name="elhelyezkedes"></td></tr>
	<tr><td>Leírás</td><td><input class="form-control" type="text" name="leiras"></td></tr>
	</tbody></table>
	<input type="submit" class="btn btn-primary">
	</form>';
	}
	?>