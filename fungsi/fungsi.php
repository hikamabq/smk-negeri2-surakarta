<?php

function tampilkan_beranda(){
	global $link;
	$query = "SELECT * FROM beranda";
	$result = mysqli_query($link,$query) or die('gagal menampilkan data');
	return $result;
}

function tampilkan_berita(){
	global $link;
	$query = "SELECT * FROM berita";
	$result = mysqli_query($link,$query) or die('gagal menampilkan data');
	return $result;
}

function latar(){
	global $link;
	$query = "SELECT * FROM latar";
	$result = mysqli_query($link,$query) or die('gagal menampilkan data');
	return $result;
}
function profil(){
	global $link;
	$query = "SELECT * FROM profilku";
	$result = mysqli_query($link,$query) or die('gagal menampilkan data');
	return $result;
}

function daftar_paket(){
	global $link;
	$query = "SELECT * FROM jurusan";
	$result = mysqli_query($link,$query) or die('gagal tampil');
	return $result;
}

function paket($id){
	global $link;
	$query = "SELECT * FROM jurusan WHERE id = $id";
	$result = mysqli_query($link,$query) or die('gagal tampil');
	return $result;
}

?>
