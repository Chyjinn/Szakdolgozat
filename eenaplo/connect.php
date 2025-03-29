<?php 
$host = "localhost";
$user = "root";
$pwd = "";
$database = "e-e-naplo";
$db = mysqli_connect($host,$user,$pwd,$database);
if(!$db)
{
	errorAlert("Nem sikerült csatlakozni az adatbázishoz.<br>Hiba kódja: ".mysqli_connect_errno()."<br>");
	exit; //exit;-> leállítja a feldolgozást, return;-> nem kerül értelmezésre ami utána van de megy tovább, die;-> exit;
}
//UTF8: fájl, meta tag, adatbázisban utf8, adatbázisból utf8ként kérni le adatokat
mysqli_query($db,"set names utf8");
mysqli_query($db,"set character set utf8");



?>