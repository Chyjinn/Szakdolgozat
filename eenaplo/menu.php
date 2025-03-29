<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
	  <a class="navbar-brand" href="#">
    <img src="misc/eenaplo.ico" width="30" height="30" alt="">
		</a>
	  <li class="nav-item">
        <a class="nav-link" href="index.php?p=my_constructions">Építkezéseim</a>
      </li>
	  <?php
	  if(hasRights())
	  {
	  switch($_SESSION['jog'])
	  {
		  case "1":
		  echo '<li class="nav-item">
        <a class="nav-link" href="index.php?p=work">Munkavégzések kezelése</a>
      </li>';	
		  break;
		  case "2":
		  echo '<li class="nav-item">
        <a class="nav-link" href="index.php?p=all_work">Munkavégzések listája</a>
      </li>';	
		  break;
		  case "4":
		  echo '<li class="nav-item">
        <a class="nav-link" href="index.php?p=work">Munkavégzések kezelése</a>
      </li>';	
		  echo '<li class="nav-item">
        <a class="nav-link" href="index.php?p=all_work">Munkavégzések listája</a>
      </li>';	
	  break;
	  }
	  }
	  ?>

	  <li class="nav-item">
        <a class="nav-link" href="index.php?p=logout">Kijelentkezés</a>
      </li>
    </ul>
  </div>  

<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
    <span class="navbar-toggler-icon"></span>
  </button>
	<div class="collapse navbar-collapse flex-grow-0" id="navbarSupportedContent">
	<?php
	if(isAdmin())
		{
			?>
			<ul class="navbar-nav text-right">
	  <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Admin
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="index.php?p=users">Felhasználók</a>
		<a class="dropdown-item" href="index.php?p=constructions">Építkezések</a>
		<a class="dropdown-item" href="index.php?p=registration_codes">Regisztrációs kódok</a>
      </div>
    </li>
	</ul>
	<?php
			
			
		}
		
	?>
	<ul class="navbar-nav text-right">

	
	
		<li class="nav-item dropdown">
		<?php if (isset($_SESSION['kiv_id'])) {
		$sql='SELECT e.megn, e.telepules, e.cim FROM epitkezes_jogok ej 
		INNER JOIN epitkezesek e ON ej.epit_id=e.id 
		INNER JOIN felhasznalok f ON ej.felh_id=f.id
		INNER JOIN jogosultsagok j ON ej.jog_id=j.id
		WHERE f.id = '.$_SESSION['fid'].' AND ej.epit_id = '.$_SESSION['kiv_id'].' LIMIT 1';
		$sdb=$db->query($sql);
		while($adat = $sdb->fetch_assoc())
		{
			echo '<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
			Kiválasztott építkezés: '.$adat['megn'].' ('.$adat['telepules'].', '.$adat['cim'].')</a>';
		}
		}
			else
		{
	  $sql="SELECT e.id, e.megn, e.cim, ej.jog_id AS 'jogszint' FROM epitkezes_jogok ej 
		INNER JOIN epitkezesek e ON ej.epit_id=e.id 
		INNER JOIN felhasznalok f ON ej.felh_id=f.id
		INNER JOIN jogosultsagok j ON ej.jog_id=j.id
		WHERE f.id = ".$_SESSION['fid'].' LIMIT 1';
		$sdb=$db->query($sql);
		$rows = $sdb->num_rows;
		if ($rows == 0) {
			echo '<a class="nav-link" href="index.php">Nincs kiválasztható építkezés</a>';
		}
		while($adat = $sdb->fetch_assoc())
		{
			echo '<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
			Kiválasztott építkezés: '.$adat['megn'].', '.$adat['cim'].'</a>';
			$_SESSION['kiv_id'] = $adat['id'];
			$_SESSION['jog'] = $adat['jogszint'];
			header("Refresh: 0; url=index.php");
			}
		}
		?>
      <div class="dropdown-menu">
	  <?php 
	  $sql="SELECT e.id, e.megn, e.telepules, e.cim, ej.jog_id AS 'jogszint' FROM epitkezes_jogok ej 
		INNER JOIN epitkezesek e ON ej.epit_id=e.id 
		INNER JOIN felhasznalok f ON ej.felh_id=f.id
		INNER JOIN jogosultsagok j ON ej.jog_id=j.id
		WHERE f.id = ".$_SESSION['fid'];
		$sdb=$db->query($sql);
		while($adat = $sdb->fetch_assoc())
		{
			if ($adat['id'] != $_SESSION['kiv_id'])
			{
			echo '<a class="dropdown-item" href="index.php?p=change&kiv='.$adat['id'].'&jog='.$adat['jogszint'].'">'.$adat['megn'].' ('.$adat['telepules'].', '.$adat['cim'].')</a>';
			}
		}
	 
	  ?>
        
      </div>
	  
    </li>
        </ul>
    </div>
	</nav>