<?php 
require_once 'core/init.php';
require_once 'view/header.php';

$berita = tampilkan_berita();
$daftar_paket = daftar_paket();
 ?>

<div id="isi">

	<div id="main">
<?php while($row = mysqli_fetch_assoc($berita)){ ?>
			<div class="post">
				<h2><?= $row['judul']?></h2> <b>waktu post : <?= $row['waktu']?></b>
				<img src="<?=$row['foto']?>" alt="">
				<p><?= $row['isi']?></p>
			</div>
<?php } ?>
	</div>

	<div class="sidebar">
		<h3>kalender</h3>
			<div class="kal"><?= date('D, d M Y') ?></div>
			<input type="date" name="startdate" min="2013-01-01" max="2050-01-01" onplay="onplay">
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