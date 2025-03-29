<?php
	if(isAdmin())
	{
	global $db;
	$sql='DELETE FROM `regisztracios_kodok` WHERE id = '.$_REQUEST['code_id'];
	$sordb=$db->query($sql);
	if ($sordb != false)
	{
		successAlert('Regisztrációs kód sikeresen törölve.');
		header("Refresh: 4; url=index.php?p=registration_codes");
	}
	else warningAlert('Sikertelen törlés.');
	}
?>

