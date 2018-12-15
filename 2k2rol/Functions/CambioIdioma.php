<?php
/*
Autor: Javier Quintas Bergantiño
Alias: 2k2rol
Fecha: 17/11/2018
Funcion: Este fichero maneja el cambio de idioma del sistema. 
*/
    session_start();
    $idioma = $_GET['idioma'];
    $_SESSION['idioma'] = $idioma;
    header('Location:'. $_SERVER["HTTP_REFERER"]);
?>