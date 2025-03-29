<?php
	global $db;
	if(isAdmin())
	{
	echo '<form method="post" action="index.php?p=insert_rights&u_id='.$_REQUEST['u_id'].'">';
	echo '<input type="hidden" name="u_id" value="'.$_REQUEST['u_id'].'">';
	echo '<select name="construction" class="custom-select">
    <option selected>Építkezés választása</option>';
	$sql="SELECT id, megn, telepules, cim FROM `epitkezesek`";
	$sordb=$db->query($sql);
	while ($adat = $sordb->fetch_assoc())
	{
		echo '<option value="'.$adat['id'].'">'.$adat['megn'].' ('.$adat['telepules'].', '.$adat['cim'].')</option>';
	}
  echo '</select>';
  echo '<br>';
	//$_REQUEST['u_id'];
	echo '<select name="rights" class="custom-select">
    <option selected>Jogosultság választása</option>';
	$sql="SELECT id, megnevezes FROM `jogosultsagok`";
	$sordb=$db->query($sql);
	while ($adat = $sordb->fetch_assoc())
	{
		echo '<option value="'.$adat['id'].'">'.$adat['megnevezes'].'</option>';
	}
  echo '</select><br>
<input class="btn btn-primary" type="submit" value="Hozzáadás">
</form>
';
	
	}
?>
