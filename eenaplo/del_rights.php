<?php
	if(isAdmin())
	{
	global $db;
	$sql='DELETE FROM `epitkezes_jogok` WHERE id = '.$_REQUEST['ej_id'];
	$sordb=$db->query($sql);
	if ($sordb != false)
	{
		successAlert('Jogosultság sikeresen törölve.');
		header("Refresh: 4; url=index.php?p=user_rights&u_id=".$_REQUEST['u_id']);
	}
	else warningAlert('Sikertelen törlés');
	}
?>

