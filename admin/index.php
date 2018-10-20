<?php

require_once 'core/core.php';

if( isset($_SESSION['nama']) ){
  header('Location:single.php');
}

if ( isset($_POST['submit']) ){
  $user = $_POST['user'];
  $pass = $_POST['pass'];

  if( !empty(trim($user)) && !empty(trim($pass)) ){
    if( login($user, $pass)){
      $_SESSION['nama'] = $user;
      header('Location:single.php');
    }else{echo 'data salah';}
  }else{echo 'Wajib di isi semua';}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Administrator</title>
	<style>
		*{
			margin: 0; padding: 0;
			font-family: sans-serif;
		}
		body{
			background-color: white;
		}
		h2, h3, h4{
			font-weight: normal;
		}
		#login{
			width: 40%;
			margin: 10% auto;
			box-sizing: border-box;
			background-color: white; box-shadow: 0px 2px 5px 1px #BDBDBD;
		}
		#login h3{
			padding: 20px; color: white;
			text-align: center; background-color: #000000;
		}
		#login h4{
			padding: 20px; color: grey;
			text-align: center;
		}
		#login form{
			padding:30px 50px;
			border-top: 1px solid #E0E0E0;
		}
		#login input{
			padding: 10px; border: 1px solid #2196F3;
			width: 100%; box-sizing: border-box;
			margin-top: 10px; border-radius: 3px;
		}
		#login input[type="submit"]{
			background-color: #2196F3; color: white;
		}
		#login input[type="submit"]:hover{
			background-color: #0074B9;
		}
	</style>
</head>
<body>
	<div id="login">
		<h3>Login admin</h3>
		<form action="" method="post">
			<input type="text" name="user" placeholder="username">
			<input type="password" name="pass" placeholder="password">
			<input type="submit" name="submit" value="Login">
		</form>
		<h4>&copy; abqory 2016</h4>
	</div>
</body>
</html>
