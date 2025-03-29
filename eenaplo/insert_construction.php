<?php
	if(isAdmin())
	{
global $db;
$sql='INSERT INTO epitkezesek (megn, telepules, iranyitoszam, cim, hatarido) 
	VALUES ("'.$_REQUEST['megn'].'", "'.$_REQUEST['telepules'].'", "'.$_REQUEST['ir'].'", "'.$_REQUEST['cim'].'", "'.$_REQUEST['hatarido'].'");';
	$db->query($sql);
	successAlert("Építkezés hozzáadva.");
	header("Refresh: 3; url=index.php?p=constructions");
	}
?>