<?php
	if(isAdmin())
	{
$epit=$_REQUEST['construction'];
$jog=$_REQUEST['rights'];
$sql='INSERT INTO `epitkezes_jogok` (`id`, `epit_id`, `felh_id`, `jog_id`) VALUES (NULL, "'.$epit.'", "'.$_REQUEST['u_id'].'", "'.$jog.'");';
$db->query($sql);
successAlert('Jogosultság hozzáadva!');
header('Refresh: 3; url=index.php?p=user_rights&u_id='.$_REQUEST['u_id']);
	}
?>