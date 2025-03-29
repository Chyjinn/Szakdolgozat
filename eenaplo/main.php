<?php
if(isset($_SESSION['fid'])) { 
include "menu.php";
if(isset($_REQUEST['p']))
{
switch($_REQUEST['p'])
{
	case "logout":
	include "logout.php";
	break;
	case "my_constructions":
	include "my_constructions.php";
	break;
	case "work":
	include "work.php";
	break;
	case "all_work":
	include "all_work.php";
	break;
	case "check_work":
	include "check_work.php";
	break;
	case "edit_work":
	include "edit_work.php";
	break;
	case "add_work":
	include "add_work.php";
	break;
	case "insert_work":
	include "insert_work.php";
	break;
	case "update_work":
	include "update_work.php";
	break;
	case "del_work":
	include "del_work.php";
	break;
	case "constructions":
	include "all_constructions.php";
	break;
	case "edit_constructions":
	include "edit_construction.php";
	break;
	case "add_construction":
	include "add_construction.php";
	break;
	case "insert_construction":
	include "insert_construction.php";
	break;
	case "del_construction":
	include "del_construction.php";
	break;
	case "update_construction":
	include "update_construction.php";
	break;
	case "users":
	include "users.php";
	break;
	case "user_rights":
	include "user_rights.php";
	break;
	case "del_rights":
	include "del_rights.php";
	break;
	case "registration_codes":
	include "registration_codes.php";
	break;
	case "new_regcode":
	include "new_regcode.php";
	break;
	case "delcode":
	include "del_regcode.php";
	break;
	case "add_rights":
	include "add_rights.php";
	break;
	case "insert_rights":
	include "insert_rights.php";
	break;
	case "upload_image":
	include "upload_image.php";
	break;
	case "delete_image":
	include "del_image.php";
	break;
	case "update_admin":
	include "update_admin.php";
	break;
	case "change":
	$_SESSION['kiv_id'] = $_REQUEST['kiv'];
	$_SESSION['jog'] = $_REQUEST['jog'];
	header("Refresh: 0; url=index.php");
	break;
}

}
}
else
{
	if (isset($_REQUEST['p']) and $_REQUEST['p'] == "register")
{
	include "register.php";
}
else
{
	include "login.php";
}
}

?>