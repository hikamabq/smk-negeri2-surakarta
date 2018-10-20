<?php

//cara login
function login($user, $pass){
  global $link;

  $pass = md5($pass);

  $query = "SELECT * FROM admin WHERE user = '$user' AND pass = '$pass' ";
  $result = mysqli_query($link, $query);

  if( mysqli_num_rows($result) !=0 ){
    return true;
  } else{ return false;}
}

//menampilkan isi table
function show($table){
  global $link;

  $query = "SELECT * FROM $table ";
  $result = mysqli_query($link, $query);

  return $result;
}

//menampilkan data yang akan diedit
function show_edit($table,$id){
  global $link;

  $query = "SELECT * FROM $table WHERE id = '$id'";
  $result = mysqli_query($link, $query);

  return $result;
}

//menambah isi table
function add($judul, $isi, $tag){
  global $table;
  $query = "INSERT INTO $table(judul, isi, tag) VALUES('$judul', '$isi', '$tag') ";
  return run($query);
}

//mengedit data
function edit($judul, $isi, $foto, $fototitik, $tag, $id){
  global $table;

  $query = "UPDATE $table SET judul='$judul',isi='$isi', foto='$foto', fototitik='$fototitik', tag='$tag' WHERE id = $id";
  return run($query);
}

//mendelete isi dari table
function delete($id){
  global $table;
  $query = "DELETE FROM $table WHERE id = $id";
  return run($query);
}


//menjalankan semua query kecuali menampilkan
function run($query){
  global $link;

  if( mysqli_query($link,$query) ){
    return true;
  }else {return false;}
}
 ?>
