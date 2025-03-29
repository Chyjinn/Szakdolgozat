<?php
	if(isAdmin())
	{
	global $db;
	$sql='DELETE FROM `epitkezes_jogok` WHERE epit_id = "'.$_REQUEST['constr_id'].'"';
	$sordb=$db->query($sql);
	$sql='DELETE FROM `epitkezesek` WHERE id = "'.$_REQUEST['constr_id'].'";';
	$sordb=$db->query($sql);
	if ($sordb != false)
	{
		successAlert('Építkezés törölve.');
		header('Refresh: 4; url=index.php?p=constructions');
	}
	else warningAlert('Sikertelen törlés.');
	}
?>