<?php
global $db;
if(isAdmin())
	{
	$kod = substr(md5(microtime()),rand(0,26),10);
	
	$sql='SELECT * FROM `regisztracios_kodok` WHERE kod = '.$kod.';';
	$sdb=$db->query($sql);
	if ($sdb == false)
	{
		//Nincs még ilyen kód
		$sql='INSERT INTO `regisztracios_kodok` (kod) VALUES ("'.$kod.'");';
		$sdb=$db->query($sql);
		if ($sdb == true) echo 'true';
		//print_r($db);
		//header("Refresh: 4; url=index.php?p=registration_codes");
		//successAlert('Regisztrációs kód sikeresen hozzáadva.');
	}
	else
	{
		//ha van akkor újra próba
		include "new_regcode.php";
	}
	
	}
?>