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
			<label>Nombre</label>
	<input type="text" name="Fname" style="display: block;">
	<label>Apellido</label>
	<input type="text" name="Lname"style="display: block;">
	<label>Usuario</label>
	<input type="text" name="User"style="display: block;">
	<label>Password</label>
	<input type="password" name="password"style="display: block;">
	<button name = "button" class="btn btn-success">
		click aca.
	</button>
</form>
	</div>
	<h1>Has clic <a href="login.php">aca</a> para logearte</h1>

</body>
</html>

<?php
require "DataBase/conex_dataBase.php";

if(isset($_POST['button'])){
	if(strlen($_POST['Fname']) > 1 && strlen($_POST['Lname'])> 1 && strlen($_POST['User'])> 1  && strlen($_POST['password'])> 1){
		$name = $_POST['Fname']; 
		$apellido = $_POST['Lname']; 
		$User = $_POST['User']; 
		$Password = $_POST['password']; 
		$PasswordIncriptada = sha1($Password);
		$fechaReg = date("d/m/y");

		$ConsultaRepetidos = "SELECT * FROM usuarios WHERE usuario = '$User'"; 
		$ConexForSeeRepetidos = mysqli_query($Conex, $ConsultaRepetidos); 
		$VerRepetido = mysqli_num_rows($ConexForSeeRepetidos); 

		if($VerRepetido < 1){
						$ConsultaForInsertDatos = "INSERT INTO usuarios(nombre, apellido, usuario, password, fechaReg) VALUES ('$name', '$apellido' ,'$User',  '$PasswordIncriptada','$fechaReg' ) ";

			mysqli_query($Conex,$ConsultaForInsertDatos);
			?>
			<h3 style="background-color:green ;">TE registraste correctamente, ahora logueate haciendo clic <a href="login.php">aca</a></h3>

			<?php

		}else if($VerRepetido > 0){
				?>
			<h3 style="background-color:red ;">Ese usuario ya exite.</h3>
			<?php
		}
	


		//echo "Los campos estan llenos";
	}else if(strlen($_POST['Fname']) < 1 && strlen($_POST['Lname'])< 1 && strlen($_POST['User'])< 1  && strlen($_POST['password'])< 1){
		//echo "Tienes que rellenar todos los campos";
		?>
		<h3 style="background-color:red ;">Tienes que rellenar todos los campos</h3>
		<?php
	}
}

?>