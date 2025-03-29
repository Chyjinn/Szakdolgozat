<div class="container">
  <img class="img-fluid mx-auto d-block" src="misc/eenaplo.png">
  <h1 class="text-center">Regisztráció</h1>
  <form method="post" action="index.php?p=register">
  <input type="hidden" name="m" value="be"/>
    <div class="form-group">
      <label for="nev">Felhasználónév:</label>
      <input type="text" class="form-control" id="nev" placeholder="Felhasználónév" name="nev">
    </div>
    <div class="form-group">
      <label for="jelszo">Jelszó:</label>
      <input type="password" class="form-control" id="jelszo" placeholder="Jelszó" name="jelszo">
    </div>
	<div class="form-group">
      <label for="email">E-mail:</label>
      <input type="email" class="form-control" id="email" placeholder="E-mail cím" name="email">
    </div>

<?php

if(isset($_REQUEST['code']))
{
	echo '  <div class="form-group">
      <label for="regcode">Regisztrációs kód:</label>
      <input type="text" class="form-control" id="regcode" placeholder="Regisztrációs kód" name="regcode" equired="required" value="'.$_REQUEST['code'].'">
    </div>';
	//echo '<input type="text" name="regcode" placeholder="Regisztrációs kód" required="required" value="'.$_REQUEST['code'].'"/><br>';
}
else
{
	echo ' <div class="form-group">
      <label for="regcode">Regisztrációs kód:</label>
      <input type="text" class="form-control" id="regcode" placeholder="Regisztrációs kód" name="regcode" equired="required">
    </div>';
	//echo '<input type="text" name="regcode" placeholder="Regisztrációs kód" required="required"/><br>';
}
if(isset($_REQUEST['nev']))
{
	global $db;
	$sql='SELECT * FROM `regisztracios_kodok` WHERE kod LIKE "'.$_REQUEST['regcode'].'"';
	$sdb=$db->query($sql);
	$adatok = $sdb->fetch_assoc();
	$regcode_id = $adatok['id'];
	if ($sdb->num_rows == 1)//regcode ellenőrzés
	{
	$sql="SELECT nev FROM felhasznalok WHERE nev = '".$_REQUEST['nev']."'";
	$sdb=$db->query($sql);
	if ($sdb->num_rows == 0) //Ha nincs ilyen felh. név
	{
		$sql="SELECT email FROM felhasznalok WHERE email LIKE '".$_REQUEST['email']."'";
		$sdb=$db->query($sql);
		if ($sdb->num_rows == 0) //Ha nincs ilyen email
		{
		$sql='DELETE FROM `regisztracios_kodok` WHERE id = "'.$regcode_id.'";';
		$db->query($sql);
		$sql='INSERT INTO felhasznalok (nev, email, jelszo, admin) VALUES ("'.$_REQUEST['nev'].'", "'.$_REQUEST['email'].'", "'.hash("md5",$_REQUEST['jelszo']).'", 0)';
		$db->query($sql);
		successAlert('Sikeres regisztráció!');
		header("Refresh: 2; url=index.php");
		//header("Refresh: 0; url=index.php");
		}
		else errorAlert('Már használatban van az e-mail cím!');
		header("Refresh: 2; url=index.php?p=register");
		}
		else errorAlert('Már létezik ilyen felhasználónév!');
		header("Refresh: 0; url=index.php?p=register");
	}
	else errorAlert('Hibás regisztrációs kód!');
	header("Refresh: 0; url=index.php?p=register");
}
?>
<button type="submit" class="btn btn-primary" name="btn_ok" value="OK">Regisztráció</button>
<a href="index.php?" class="btn btn-outline-primary" role="button">Bejelentkezés</a>
</form>
</div>
