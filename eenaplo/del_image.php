<?php
	if(hasRights())
	{
	global $db;
	$sql='SELECT * FROM `mellekletek` WHERE id = '.$_REQUEST['image'];
	$sdb=$db->query($sql);
	$adatok = $sdb->fetch_assoc();
	$fajlnev = $adatok['fajlnev'];
	
	$sql='DELETE FROM `mellekletek` WHERE id = '.$_REQUEST['image'];;
	$sordb=$db->query($sql);
	if ($sordb != false)
	{
		unlink($fajlnev);
		successAlert('Melléklet sikeresen törölve.');
		header('Refresh: 4; url=index.php?p=edit_work&w_id='.$_REQUEST['w_id']);
	}
	else warningAlert('Sikertelen törlés.');
	}
?>