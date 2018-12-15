<?php

/*
Autor: Javier Quintas Bergantiño
Alias: 2k2rol
Fecha: 17/11/2018
Función: Este fichero es el que se encarga de controlar el formulario de registro de usuarios de nuestro sistema.
*/
    include '../Functions/Authentication.php';
    include '../View/REGISTRO_View.php';
    include '../Model/Usuarios_model.php';
    include '../View/MESSAGE_View.php';

    session_start();

    if(IsAuthenticated()){
        header('Location: ../index.php');
    }

    if(!$_POST){
        new Register();
    }else{
        $usuario = new Usuarios_Model($_POST['login'], $_POST['password'], $_POST['dni'], $_POST['nombre'], $_POST['apellidos'], $_POST['telefono'], $_POST['email'], 
                    $_POST['fechaNac'], $_FILES['fotoPersonal'], $_POST['sexo']);
        
        $respuesta = $usuario->checkIsValidForRegister();

        if($respuesta == 'true'){
            $respuesta = $usuario->register();

            if($respuesta == 'Registrado'){
                new Message($respuesta, '../index.php');
            }
            else{
                new Message($respuesta, '../index.php');
            }
        }
        else{
            new Message($respuesta, '../index.php');
        }
    }
?>