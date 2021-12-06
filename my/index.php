
<?php 
session_start(); 

if($_SESSION['User'] == null || $_SESSION['User'] == ""){
	header("Location: ../login.php");
	die();
}else if($_SESSION['User'] != null || $_SESSION['User'] != ""){
	header("Location: ");
}

?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cuenta</title>
</head>
<body>
<h1>Bienvenido a tu cuenta</h1>
<?php 
echo "Tu user es:" . $_SESSION['User'];
?>

<h3>Si quieres cerrar seccion has clic <a href="closeseecion.php">aca</a></h3>
</body>
</html>