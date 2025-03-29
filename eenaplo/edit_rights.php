<?php
	if(isAdmin())
	{
	global $db;
	$ej_id = $_REQUEST['ej_id'];
	$sql="SELECT * FROM `munkak` WHERE id = '".$_REQUEST['w_id']."'";
	$sordb=$db->query($sql);
	$adatok = $sordb->fetch_assoc();
	echo '<form method="post" target="edit_work.php">
	Munkavégzés módosítása<br>
	<input type="hidden" name="id" value="'.$adatok['id'].'">;
	Dátum <input type="date" name="datum" value="'.$adatok['datum'].'"><br>
	Hőfok <input type="text" name="hofok" value="'.$adatok['hofok'].'"><br>
	Időjárás <input type="text" name="idojaras" value="'.$adatok['idojaras'].'"><br>
	Létszám <input type="text" name="letszam" value="'.$adatok['letszam'].'"><br>
	Elhelyezkedés <input type="text" name="elhelyezkedes" value="'.$adatok['elhelyezkedes'].'"><br>
	Munka leírása <input type="text" name="leiras" value="'.$adatok['leiras'].'"><br>
	Megjegyzés <input type="text" name="megjegyzes" value="'.$adatok['megjegyzes'].'"><br>
	<input type="submit">
	</form>
	';
	}
?>

