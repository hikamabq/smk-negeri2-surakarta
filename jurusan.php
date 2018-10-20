<?php 
require_once 'core/init.php';
require_once 'view/header.php';


$daftar_paket = daftar_paket();

$id = $_GET['id'];

if (isset($_GET['id'])) {
	$paket = paket($id);

	while ($data = mysqli_fetch_assoc($paket)) {
		$judul_paket = $data['judul'];
		$isi_paket = $data['isi'];
	}
}
 ?>

<div id="isi">

	<div id="main">
			<div class="post">
				<h2><?= $judul_paket ?></h2>
				<p><?= $isi_paket ?></p>
			</div>
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
