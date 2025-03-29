<?php 
ob_start();
session_start();
//error_reporting(E_ALL^E_NOTICE);
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Elektronikus Építési Napló</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="misc/eenaplo.ico">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body class="bg-dark text-white">
	<?php 
	require_once "connect.php";
	include "functions.php";
	include "main.php";
	/*echo '<br> SESSION: ';
	print_r($_SESSION);
	echo '<br> GET: ';
	print_r($_GET);
	echo '<br> POST: ';
	print_r($_POST);
	echo '<br> REQUEST: ';
	print_r($_REQUEST);*/
	?>
</body>
</html>
<?php
ob_end_flush();
?>