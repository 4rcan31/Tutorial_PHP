<?php 

$server = "localhost"; 
$User = "root"; 
$Password = ""; 
$BaseData = "tutorial"; 

$Conex = mysqli_connect($server, $User, $Password, $BaseData); 

if($Conex){
	//echo "La conexion fue exitosa";
}else{
	echo "La conexion fallo por alguna razon";
}