<?php
	function isAdmin()
	{
		if (isLoggedIn())
		{
	global $db;
	$sql='SELECT admin FROM `felhasznalok` WHERE id = '.$_SESSION['fid'];
	$sdb=$db->query($sql);
	$adatok = $sdb->fetch_assoc();
		//echo $adat['admin'];
		if($adatok['admin'] > 0){
		return true;
		}
		else
		{
		return false;
		}
		}
		return false;
	}
	
	
	function isLoggedIn()
	{
		if(isset($_SESSION['fnev']) && isset($_SESSION['fid'])) return true;
		return false;
	}
	
	function alert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
	}
	
	function successAlert($msg){
		echo '<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong><div class="spinner-border text-success"></div> Siker: </strong>'.$msg.'
  </div>';
	}
	
	function errorAlert($msg){
		echo '<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong><div class="spinner-border text-danger"></div> Hiba: </strong> '.$msg.'
  </div>';
	}
	
	function warningAlert($msg){
		echo '<div class="alert alert-warning alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong><div class="spinner-border text-warning"></div> Figyelmeztetés: </strong> '.$msg.'
  </div>';
	}

function hasRights()
{
	if(isset($_SESSION['kiv_id']) && isset($_SESSION['jog']))
	{
	global $db;
	$sql='SELECT * FROM `epitkezes_jogok` WHERE epit_id = '.$_SESSION['kiv_id'].' AND felh_id = '.$_SESSION['fid'].' AND jog_id = '.$_SESSION['jog'];
	$sdb=$db->query($sql);
	if ($sdb->num_rows>0)
	{
		return true;
	}
	else
	{
		unset($_SESSION['kiv_id']);
		unset($_SESSION['jog']);
		return false;
	}
	}
		return false;
		}
?>