<table>
<?php 
if(isAdmin())
{
	$sql="SELECT id, kod FROM `regisztracios_kodok`;";
	$sdb=$db->query($sql);
	echo '<div class="container">            
	<table class="table table-dark table-hover table-bordered">
	<thead>
      <tr>
        <th>Kód</th><th>URL</th><th>Link másolása</th><th>Törlés</th>
      </tr>
    </thead>
	<tbody>';
	while($adat = $sdb->fetch_assoc())
	{
			echo '<tr><td>'.$adat['kod'].'</td><td><input class="form-control" type="text" value="http://localhost/cziczka/index.php?p=register&code='.$adat['kod'].'" id="kod'.$adat['id'].'"></td><td><button class="btn btn-primary" onclick="copyURL('.$adat['id'].')">Másolás</button></td><td><a class="btn btn-outline-danger" href="index.php?p=delcode&code_id='.$adat['id'].'">Törlés</a></td></tr>';
	}
	echo '</tbody></table><a class="btn btn-outline-primary" href="index.php?p=new_regcode">Új kód generálása</a>';
}
	  ?>
	</div>

	<script>
	function copyURL(id) {
  /* Get the text field */
  var copyText = document.getElementById("kod" + id);

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /*For mobile devices*/

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  alert("Kód vágólapra másolva!");
}
	</script>
