<?php
if(isAdmin())
{
echo '<div class="container"> 
	<form method="post" action="index.php?p=insert_construction">
<h1>Építkezés hozzáadása</h1>	
 <table class="table table-dark table-hover table-bordered">
	<tbody>
	<tr><td>Megnevezés</td><td><input class="form-control" type="text" name="megn"></td></tr>
	<tr><td>Irányítószám</td><td><input class="form-control" type="text" name="ir"></td></tr>
	<tr><td>Város</td><td><input class="form-control" type="text" name="telepules"></td></tr>
	<tr><td>Cím</td><td><input class="form-control" type="text" name="cim"></td></tr>
	<tr><td>Átadási határidő</td><td><input class="form-control" type="date" name="hatarido"></td></tr>
	</tbody></table>
	<input type="submit" class="btn btn-primary" value="Hozzáadás">
	</form>';
}
?>