<?php
/*
Autor: Javier Quintas Bergantiño
Alias: 2k2rol
Fecha: 17/11/2018
Funcion: Este fichero sirve para conectarse a la base de datos tal y como sugiere el nombre.
*/
function ConnectDB()
{
    $mysqli = new mysqli("localhost", 'IU2018', 'pass2018' , 'IU2018');
    	
	if ($mysqli->connect_errno) {
		include './MESSAGE_View.php';
		new MESSAGE("Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error, './index.php');
		return false;
	}
	else{
		return $mysqli;
	}
}

?>