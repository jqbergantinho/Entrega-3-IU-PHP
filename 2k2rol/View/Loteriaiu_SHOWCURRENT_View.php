<?php
/*
Autor: Javier Quintas Bergantiño
Alias: 2k2rol
Fecha: 17/11/2018
Funcion: Fichero que muestra una tabla SHOWCURRENT en la que se mostrará la información relativa a una tupla concreta seleccionada por el usuario.
*/
    class showCurrent{
        var $participacion;

        function __construct($participacion){
            $this->participacion = $participacion;
            $this->render();
        }

        function render(){
            include '../View/Header.php';
            

?>
            <br>
            <br>
            <table>
                <tr>
                    <th></th>
                    <th><?= $strings['Datos a mostrar'] ?></th>
                </tr>
                    <tbody>
                        <tr>
                            <th scope="row"><?=$strings['Email']?></th>
                            <td><?= $this->participacion->getEmail() ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?=$strings['Nombre']?></th>
                            <td><?= $this->participacion->getNombre() ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?=$strings['Apellidos']?></th>
                            <td><?= $this->participacion->getApellidos() ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?=$strings['Resguardo']?></th>
                            <td><?= $this->participacion->getResguardo() ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?=$strings['Cantidad de participación']?></th>
                            <td><?= $this->participacion->getParticipacion() ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?=$strings['Ingresado']?></th>
                            <td><?= $this->participacion->getIngresado() ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?=$strings['Premio']?></th>
                            <td><?= $this->participacion->getPremioPersonal() ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?=$strings['Pagado']?></th>
                            <td><?= $this->participacion->getPagado() ?></td>
                        </tr>
                    </tbody>
            </table>
<?php
/*}
}*/
?>
            <br>
            <a href="../index.php" style='margin-left: 15%; margin-bottom: 20px; margin-top: 20px;'><i class="material-icons">arrow_back_ios</i></button></a>
            <br>
<?php

    include '../View/Footer.php';

        }


    }

?>