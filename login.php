<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="frameworks/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<title>Hola</title>
</head>
<body>
	<div class="container">
		<form method="POST" style="display: block; margin: 7px;">


	<label>Usuario</label>
	<input type="text" name="User"style="display: block;">
	<label>Password</label>
	<input type="password" name="password"style="display: block;">
	<button name = "button" class="btn btn-success">
		click aca.
	</button>
</form>
	</div>

</body>
</html>

<?php
require "DataBase/conex_dataBase.php";

if(isset($_POST['button'])){
	if( strlen($_POST['User'])> 1  && strlen($_POST['password'])> 1){
		$User = $_POST['User']; 
		$Password = $_POST['password']; 
		$PasswordIncriptada = sha1($Password);

		$ConsultaRepetidosPasswordAndUser = "SELECT * FROM usuarios WHERE usuario = '$User' AND password = '$PasswordIncriptada'"; 
		$ConexRepetidosPasswordAndUser = mysqli_query($Conex, $ConsultaRepetidosPasswordAndUser); 
		$BucarRepetidosPasswordAndUser = mysqli_num_rows($ConexRepetidosPasswordAndUser); 

		if($BucarRepetidosPasswordAndUser == 1){

			session_start();
			$_SESSION['User'] = $User;
			?>
				<h1>Te logeaste correctamente</h1>
				<META HTTP-EQUIV="REFRESH" CONTENT="1.5;URL=my/">
			<?php
		}else{
			echo "Las credenciales son incorrectas";
		}
	}else if(strlen($_POST['User']) < 1  && strlen($_POST['password']) <  1){
		//echo "Tienes que rellenar todos los campos";
		?>
		<h3 style="background-color:red ;">Tienes que rellenar todos los campos</h3>
		<?php
	}
}

?>