<?php
	if(hasRights())
	{
	global $db;
	$sql='DELETE FROM `munkak` WHERE id = '.$_REQUEST['w_id'];;
	$sordb=$db->query($sql);
	if ($sordb != false)
	{
		successAlert('Munka sikeresen törölve.');
		header('Refresh: 4; url=index.php?p=work');
	}
	else warningAlert('Sikertelen törlés.');
	}
?>