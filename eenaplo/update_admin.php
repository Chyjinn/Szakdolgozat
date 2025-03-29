<?php
	if(isAdmin())
	{
	global $db;
	$admin = 0;
	if (isset($_REQUEST['admin']) && $_REQUEST['admin'] == "on") {
		$admin = 1;
		successAlert("Adminisztrátor sikeresen hozzáadva.");
	}
	else
	{
		warningAlert("Adminisztrátor sikeresen eltávolítva.");
	}
	$sql='UPDATE felhasznalok SET admin="'.$admin.'" WHERE id = "'.$_REQUEST['u_id'].'"';
	$db->query($sql);
	
	header("Refresh: 2; url=index.php?p=user_rights&u_id=".$_REQUEST['u_id']."");
	}
?>

