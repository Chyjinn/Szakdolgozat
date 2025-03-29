<?php
if(isset($_FILES['fileToUpload']))
{
global $db;
$target_dir = "mellekletek/";
$ext = pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION);
$target_file = $target_dir . "upload-" . $_SESSION['fid'] . "-" . date("Y-m-d-H-i-s") . "." . $ext;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if (file_exists($target_file)) {
    warningAlert("A fájl már létezik.");
    $uploadOk = 0;
}
elseif(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
		warningAlert("A fájl nem egy kép.");
        $uploadOk = 0;
    }
}
	if($uploadOk === 1)
	{
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		
		$sql='INSERT INTO `mellekletek` (`id`, `mihez_id`, `fajlnev`) VALUES (NULL, "'.$_REQUEST['w_id'].'", "'.$target_file.'");';
		$db->query($sql);
		successAlert("Fájl feltöltése sikeres.");
		header('Refresh: 3; url=index.php?p=edit_work&w_id='.$_REQUEST['w_id']);
    }
	else {
        warningAlert("Hiba történt a fájl feltöltése közben.");
    }
	}
	
}


echo '<div class="container">
<form action="index.php?p=upload_image&w_id='.$_REQUEST['w_id'].'" method="post" enctype="multipart/form-data">
    <h1>Válassza ki a képet:</h1>
    <input type="file" name="fileToUpload" id="fileToUpload"><br>
    <input class="btn btn-info" type="submit" value="Feltöltés" name="submit">
</form>
</div>';
?>