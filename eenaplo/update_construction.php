<?php
	global $db;
	if(hasRights())
	{
	$sql='UPDATE epitkezesek SET megn="'.$_REQUEST['megn'].'", iranyitoszam="'.$_REQUEST['ir'].'", telepules="'.$_REQUEST['telepules'].'", cim="'.$_REQUEST['cim'].'", hatarido="'.$_REQUEST['hatarido'].'" WHERE id = "'.$_REQUEST['constr_id'].'";';
	$db->query($sql);
	successAlert("Építkezés sikeresen módosítva.");
	header("Refresh: 2; url=index.php?p=constructions");
	}
?>

