<?php 
require_once 'core/init.php';
require_once 'view/header.php';

$latar = latar();
$daftar_paket = daftar_paket();
 ?>

<div id="isi">

	<div id="main">
<?php while($row = mysqli_fetch_assoc($latar)){ ?>
			<div class="post">
				<h2><?= $row['judul']?></h2> <b>waktu post : <?= $row['waktu']?></b>
				<p><?= $row['isi']?></p>
			</div>
<?php } ?>
	</div>

	<div class="sidebar">
		<h3>Dukung kami</h3>
		<form action="">
			<input type="email" name="email" placeholder="e-mail">
			<input type="submit" name="submit" value="Kirim">
		</form>
		<h3>Daftar Jurusan</h3>

<?php while($row = mysqli_fetch_assoc($daftar_paket)){ ?>
			<a href="jurusan.php?id=<?= $row['id']?>">
				<div class="daftar_paket">
					<?= $row['judul']?>
				</div>
			</a>
<?php } ?>

	</div>

</div>

 <?php 
require_once 'view/footer.php';
 ?>