<?php
/* 
Autor: Javier Quintas Bergantiño
Alias: 2k2rol
Fecha: 17/11/2018
Funcion: Este fichero es el controlador de todas las acciones relacionadas con la información sobre loterías. En el se manejan las acciones a realizar
    para mostrar la tabla SHOWALL, la tabla SHOWCURRENT, el formulario de EDIT, etc.
*/
    include "../Functions/Authentication.php";
    include '../View/Loteriaiu_SHOWALL_View.php';
    include '../View/Loteriaiu_ADD_View.php';
    include '../View/Loteriaiu_SHOWCURRENT_View.php';
    include '../View/Loteriaiu_EDIT_View.php';
    include '../View/Loteriaiu_DELETE_View.php';
    include '../View/Loteriaiu_SEARCH_View.php';
    include '../Model/Loteriaiu_model.php';
    include '../View/MESSAGE_View.php';
    include '../Model/Access_DB.php';

    session_start();

    if(!IsAuthenticated()){
        header('Location:../index.php');
    }

    if(!isset($_GET['action'])){
        $action = '';
    }
    else{
        $action = $_GET['action'];
    }

    switch($action){
        case 'search':
            if(!$_POST){
                new Search();
            }
            else{
                $loteria = new Loteria($_POST['email'], 
                                       $_POST['nombre'],
                                       $_POST['apellidos'], 
                                       $_POST['resguardo'], 
                                       $_POST['participacion'], 
                                       $_POST['ingresado'], 
                                       $_POST['premioPersonal'], 
                                       $_POST['pagado']);
                                       
                $resultado = $loteria->search();
                
                if($_GET['results']){

                    new Search($resultado);
                }
            
            }

        break;

        case 'view':
            if(!isset($_GET['email'])){
                new Message($respuesta, '../index.php');
            }else{
                $loteria = new Loteria($_GET['email']);
                $loteria = $loteria->findByEmail();
                new showCurrent($loteria);
            }

        break;

        case 'delete':
            if(!isset($_GET['email'])){
                new Message($respuesta, '../index.php');
            }
            else{
                $loteria = new Loteria($_GET['email']);
                $loteria = $loteria->findByEmail();

                if(isset($_GET['delete'])){

                    $respuesta = $loteria->delete();
                    new Message($respuesta, '../index.php');
                }
                else{
                    new deleteLot($loteria);
                }
            }

            break;

        case 'edit':
            if(!isset($_GET['email'])){
                new Message($respuesta, '../index.php');
            }
            else{
                $loteria = new Loteria($_GET['email']);
                $loteria = $loteria->findByEmail();

                if(!$_POST){
                    $loteria = new Loteria($_GET['email']);
                    $loteria = $loteria->findByEmail();
                    
                    new editLot($loteria);
                    
                }
                else{
                    $loteria = new Loteria($_GET['email'],
                                $_POST['nombre'],
                                $_POST['apellidos'],
                                $_FILES['resguardo'],
                                $_POST['participacion'],
                                $_POST['ingresado'],
                                $_POST['premio'],
                                $_POST['pagado']);

                    $respuesta = $loteria->update();

                    if($respuesta == 'Editado'){
                        new Message($respuesta, '../index.php');
                    }
                    else{
                        new Message($respuesta, '../index.php');
                    }
                }
            }

        break;

        case 'add':
            if(!$_POST){
                new addLot();
            }
            else{
                $loteria = new Loteria($_POST['email'],
                                        $_POST['nombre'],
                                        $_POST['apellidos'],
                                        $_FILES['resguardo'],
                                        $_POST['participacion'],
                                        $_POST['ingresado'],
                                        $_POST['premio'],
                                        $_POST['pagado']);
                
                $respuesta = $loteria->checkIsValidForInsert();

                if($respuesta == 'true'){
                    $respuesta = $loteria->insert();

                    if($respuesta == 'Insertado'){
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

        break;

        default: 

            $loteria = new Loteria();
            $participaciones = $loteria->findAll();

            new ShowAll($participaciones);

        break;
    }
?>