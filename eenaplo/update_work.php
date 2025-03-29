<?php
	global $db;
	if(hasRights())
	{
	$sql='UPDATE munkak SET datum="'.$_REQUEST['datum'].'", elhelyezkedes="'.$_REQUEST['elhelyezkedes'].'", leiras="'.$_REQUEST['leiras'].'", letszam="'.$_REQUEST['letszam'].'", hofok="'.$_REQUEST['hofok'].'", idojaras="'.$_REQUEST['idojaras'].'"  WHERE id = "'.$_REQUEST['id'].'";';
	$db->query($sql);
	alert("Munka sikeresen módosítva.");
	header("Refresh: 0; url=index.php?p=work");
	}
?>

