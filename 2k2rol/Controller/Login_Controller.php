<?php 

/*
Autor: Javier Quintas Bergantiño
Alias: 2k2rol
Fecha: 17/11/2018
Función: Este fichero es el encargado de controlar la pagina de Login de nuestro sistema
*/

    include '../Functions/Authentication.php';
    include '../View/LOGIN_View.php';
    include '../Model/Usuarios_model.php';
    include '../View/MESSAGE_View.php'; 

    session_start();

    if(IsAuthenticated()){
        header('Location: ../index.php');
    }

    if(!$_POST){
        new Login();
    }else{
        $usuario = new Usuarios_Model($_POST['login'],$_POST['password'],'','','','','','','','');

        $respuesta = $usuario->login();

        if($respuesta == 'true'){
            $_SESSION['login'] = $_POST['login'];
            header('Location:../index.php');
        }
        else{
            new Message($respuesta, '../index.php');
        }
    }
?>