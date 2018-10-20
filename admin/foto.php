<?php 

if ( isset($_POST['submit'])) {
	$_FILES['foto'];

	print_r($_FILES);

	$nama = $_FILES['foto']['name'];
	$asal = $_FILES['foto']['tmp_name'];

	move_uploaded_file($asal, 'img/'.$nama);

	$foto = 'img/'.$nama;
}
 ?>

 <form action="" method="post" enctype="multipart/form-data">
 	<input type="file" name="foto">
 	<input type="submit" name="submit">
 </form>