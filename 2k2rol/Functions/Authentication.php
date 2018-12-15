<?php
/* 
Autor: Javier Quintas Bergantiño
Alias: 2k2rol
Fecha: 17/11/2018
Funcion: En este fichero se comprueba si el usuario tiene la sesión iniciada.
*/
    function IsAuthenticated(){
        if(!isset($_SESSION['login'])){
            return false;
        }
        else{
            return true;
        }
    }
?>
