<?php 
require_once 'core/init.php';
require_once 'view/header.php';

$beranda = tampilkan_beranda();
$daftar_paket = daftar_paket();
 ?>
 

<div id="isi">

	<div id="main">
<?php while($row = mysqli_fetch_assoc($beranda)): ?>
			<div class="post">
				<h2><?= $row['judul']?></h2> 
				<img src="<?=$row['foto']?>" alt="">
				<b>waktu post : <?= $row['waktu']?></b>
				<p><?= $row['isi']?></p>
			</div>
<?php endwhile; ?>
	</div>

	<div class="sidebar">
		<h3>Jumlah Pengunjung</h3>
		<div class="hit">
			<?php
	      $fp = fopen("hits.txt", "r");
	      $count = fread($fp, 1024);
	      fclose($fp);
	      $count = $count + 1;
	      echo $count;
	      $fp = fopen("hits.txt", "w");
	      fwrite($fp, $count);
	      fclose($fp);
	    ?>
	  </div>
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