<?php
require_once 'core/core.php';
require_once 'view/header.php';

if( !isset($_SESSION['nama']) ){
  header('Location:index.php');
}

$error = '';


?>
  <div id="side">
    <div class="title-atas"> &copy; abqory 2016 </div>
    <a href="single.php?page=beranda"><li>Beranda</li></a>
    <a href="single.php?page=berita"><li>Berita</li></a>
    <a href="single.php?page=latar"><li>Latar Belakang</li></a>
    <a href="single.php?page=profil"><li>profil</li></a>
    <a href="single.php?page=jurusan"><li>Jurusan</li></a>
    <a href="logout.php"><li>logout</li></a>
  </div>

<div class="konten">
  <?php
  //Cara Memilih Table Data
  $page  = isset($_GET['page']) ? $_GET['page'] : "";

  if ($page=="beranda") {$table = 'beranda'; $title = 'Beranda';}
  elseif ($page=="berita") {$table = 'berita'; $title = 'Berita';}
  elseif ($page=="jurusan") {$table = 'jurusan'; $title = 'Jurusan';}
  elseif ($page=="latar") {$table = 'latar'; $title = 'Latar';}
  elseif ($page=="profil") {$table = 'profilku'; $title = 'profil';}
  else {$table = 'beranda'; $title = 'Beranda';}

  //Cara menambah Data
  if ( isset($_POST['submit']) ) {
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $tag = $_POST['tag'];

    if ( !empty(trim($judul)) && !empty(trim($isi)) && !empty(trim($tag)) ){
      if ( add($judul, $isi, $tag) ){
    echo "<meta http-equiv='refresh' content='0; URL=single.php?page=$table'>";
      }else {'Gagal menambah data';}
    }else {$error = 'Tidak boleh ada yang kosong';}
  }
  //END Cara menambah Data

  $show = show($table);
  //END Cara Memilih Table Data
   ?>


    <div class="title">
      <div class="wrapper">
       <?= $title ?> 
     </div>
    </div>

  <div id="main">
    <!-- Jika tombol edit di klik maka form dibawah ini akan muncul -->
      <?php

      $edit = isset($_GET['edit']) ? $_GET['edit'] : "";
      $id = isset($_GET['id']) ? $_GET['id'] : "";

      if ($edit==$table) {
        //Cara menampilkan data yang akan diedit
        if( isset($id) ){
          $edit = show_edit($table, $_GET['id']);
          while( $data = mysqli_fetch_assoc($edit) ){
            $judul_awal = $data['judul'];
            $isi_awal = $data['isi'];
            $tag_awal = $data['tag'];
          }
        }
        //END Cara menampilkan data yang akan diedit

        //Cara mengedit data
        if( isset($_POST['edit']) ){
            $judul = $_POST['judul'];
            $isi = $_POST['isi'];
            $tag = $_POST['tag'];

            //upload foto
            $_FILES['foto'];

            $nama = $_FILES['foto']['name'];
            $asal = $_FILES['foto']['tmp_name'];

            move_uploaded_file($asal, '../img/'.$nama);

            $foto = 'img/'.$nama;
            $fototitik = '../img/'.$nama;

            if( !empty(trim($judul)) && !empty(trim($isi)) && !empty(trim($tag))  ){
              if( edit($judul, $isi, $foto, $fototitik, $tag, $id) ){
          echo "<meta http-equiv='refresh' content='0; URL=single.php?page=$table'>";
              }else {$error = 'Mengalami masalah saat mengedit data';}

            }else{$error = 'Mohon untuk diisi semua';}
        }
        //END Cara mengedit data
         ?>

  <div class="edit">
        <form action="" method="post" enctype="multipart/form-data">
          <label for="judul"> Judul </label><br>
          <input type="text" name="judul" value="<?=$judul_awal?>"><br><br>

          <label for="isi"> Isi</label><br>
          <textarea name="isi" rows="8" cols="40"><?=$isi_awal?>
          </textarea><br><br>

          <label for="foto">Foto</label><br>
          <input type="file" name="foto" value="Browse"><br>

          <label for="tag">Tag</label><br>
          <input type="text" name="tag" value="<?=$table?>"><br><br>
          <div id="error"><?=$error?></div>

          <input type="submit" name="edit" value="Edit">
        </form>
  </div>
      <?php
        }
        ?>

  <!-- Jika "Tambah Data" di klik maka form ini akan muncul -->
    <div id="update">
      <a href="single.php?page=<?=$table?>&update=<?=$table?>">Tambah Data</a>
    </div>

    <?php
    $update = isset($_GET['update']) ? $_GET['update'] : "";
    if ($update==$table) { ?>
    <div class="edit">
      <form action="" method="post">
        <label for="judul"> Judul </label><br>
        <input type="text" name="judul"><br><br>

        <label for="isi"> Isi</label><br>
        <textarea name="isi" rows="8" cols="40"></textarea><br><br>

        <label for="foto">Foto</label><br>
        <input type="file" name="foto" value="Browse"><br>

        <label for="tag">Tag</label><br>
        <input type="text" name="tag" value="<?=$table?>"><br><br>
        <div id="error"><?=$error?></div>

        <input type="submit" name="submit" value="Add">
      </form>
    </div>
    <?php } ?>
  <!-- END Jika "Tambah Data" di klik maka form ini akan muncul -->

  <!-- Data Yang ditampilkan -->
  <?php while( $q = mysqli_fetch_assoc($show) ): ?>
  <div class="edit">
    <div class="post">
      <h2> <?= $q['judul'] ?> </h2>
      <img src="<?=$q['fototitik']?>" alt="">
      <p> <?= $q['isi'] ?> </p>
      <b> <?= $q['waktu'] ?> </b> <b> Tag : <?= $q['tag'] ?> </b>

      <a href="single.php?page=<?=$page?>&edit=<?=$table?>&id=<?=$q['id']?>">
        Edit
      </a>

      <a href="single.php?page=<?=$page?>&delete=<?=$table?>&id=<?=$q['id']?>">
        Delete
      </a>
  </div>
      

      <?php
      //Cara menghapus data
      $delete = isset($_GET['delete']) ? $_GET['delete'] : "";
      if ( $delete==$table ) {
        $id = $_GET['id'];
        if( delete($id) ){
          echo "<meta http-equiv='refresh' content='0; URL=single.php?page=$table'>";
        } else {echo 'gagal menghapus data';}
      }
      //END Cara menghapus data
       ?>

    </div>
  <?php endwhile; ?>
  <!-- END Data Yang ditampilkan -->

  </div>

</div>
