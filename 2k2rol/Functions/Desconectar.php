<?php
/*
Autor: Javier Quintas Bergantiño
Alias: 2k2rol
Fecha: 17/11/2018
Funcion: Este fichero se encarga de que un usuario se desconecte del sistema.
*/
    session_start();
    session_destroy();
    header('Location:../index.php');
?>