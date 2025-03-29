<?php
	if(hasRights())
	{
global $db;
$sql='INSERT INTO munkak (epit_id, felh_id, datum, elhelyezkedes, leiras, letszam, hofok, idojaras) 
	VALUES("'.$_SESSION['kiv_id'].'", "'.$_SESSION['fid'].'", "'.$_REQUEST['datum'].'", "'.$_REQUEST['elhelyezkedes'].'", "'.$_REQUEST['leiras'].'", "'.$_REQUEST['letszam'].'", "'.$_REQUEST['hofok'].'", "'.$_REQUEST['idojaras'].'");';
	$db->query($sql);
	successAlert("Munka felvéve.");
	header("Refresh: 2; url=index.php?p=work");
	}
?>