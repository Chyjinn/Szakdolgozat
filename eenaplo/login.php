<?php
require_once("connect.php");
if(isset($_POST['nev']))
{
	$sql="SELECT id, nev, jelszo FROM felhasznalok WHERE nev LIKE '".$_POST['nev']."'";
	$sordb=$db->query($sql);
	$adatok = $sordb->fetch_assoc();
	if($adatok['nev'] === $_POST['nev'])
	{
			if($adatok['jelszo'] == hash("md5",$_POST['jelszo']))
			{
				$_SESSION['fnev'] = $adatok['nev'];
				$_SESSION['fid'] = $adatok['id'];			
				header("location:index.php");
			}
			else errorAlert("Hibás jelszó.");
	}
	else errorAlert("Nem létezik ilyen felhasználó.");
}
?>
<div class="container">
  <img class="img-fluid mx-auto d-block" src="misc/eenaplo.png">
  <h1 class="text-center">Bejelentkezés</h1>
  <form method="post" action="index.php">
    <div class="form-group">
      <label for="nev">Felhasználónév:</label>
      <input type="text" class="form-control" id="nev" placeholder="Felhasználónév" name="nev">
    </div>
    <div class="form-group">
      <label for="jelszo">Jelszó:</label>
      <input type="password" class="form-control" id="jelszo" placeholder="Jelszó" name="jelszo">
    </div>
    <button type="submit" class="btn btn-primary" name="btn_ok" value="OK">Bejelentkezés</button>
	<a href="index.php?p=register" class="btn btn-outline-primary" role="button">Regisztráció</a>
  </form>
</div>




