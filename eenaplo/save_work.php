<?php
	if(hasRights())
	{
	global $db;
	$_REQUEST['id'];
	$sql="SELECT * FROM `munkak` WHERE id = '".$_REQUEST['w_id']."'";
	$sordb=$db->query($sql);
	}
?>

