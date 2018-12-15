<?php
/*
Autor: Javier Quintas Bergantiño
Alias: 2k2rol
Fecha: 17/11/2018
Funcion: Fichero por defecto del sistema.
*/
session_start();

include'./Functions/Authentication.php';

if(!IsAuthenticated()){
    header('Location:./Controller/Login_Controller.php');
}
else{
    header('Location:./Controller/Loteriaiu_Controller.php');
}

?>
