<?php
/*
Autor: Javier Quintas Bergantiño
Alias: 2k2rol
Fecha: 17/11/2018
Funcion: Fichero que presenta una vista de un formulario de SEARCH que permite la búsqueda por cualquier campo que queramos y que muestra una tabla con los resultados que satisfagan nuestra petición.
*/
    class Search{
        var $participaciones;

        function __construct($participaciones = null){
            $this->participaciones = $participaciones;
            $this->render();
        }

        function render(){
            include '../View/Header.php';
?>
            <form method='POST' action="../Controller/Loteriaiu_Controller.php?action=search&results=yes">
                <fieldset>
                <input type="text" name="email" placeholder="<?=$strings['Email']?>" size="30" value="" >
                <br>
                <input type="text" name="nombre" size="30" value="" placeholder="<?=$strings['Nombre']?>">
                <br>
                <input type="text" name="apellidos" placeholder="<?=$strings['Apellidos']?>" size="30" value="">
                <br>
                <input type="text" name="resguardo" placeholder="<?=$strings['Resguardo']?>" size="30" value="">
                <br>
                <input type="number" name="participacion" placeholder="<?=$strings['Participación']?>" size="30" value="" >
                <br>
                <input type="text" name="ingresado" placeholder="<?=$strings['Ingresado']?>" size="30" value="">
                <br>
                <input list="number" placeholder="<?=$strings['Premio']?>" size="30" value="" name="premioPersonal" >
                <br>
                <input type="text" name="pagado" placeholder="<?=$strings['Pagado']?>" size="30" value="">
                <br>
                <a href='../index.php' class="registro" style="margin-right: 2%;"><i class="material-icons">arrow_back_ios</i></a>
			    <button id="buscar"><i class="material-icons">search</i></button>
                </fieldset>
            </form>

            <?php
            if(isset($this->participaciones)){
            ?>
                 <table>
                    <thead id="header-tabla">
                        <th scope="col"><?= $strings['Email'] ?></th>
                        <th scope="col"><?= $strings['Nombre'] ?></th>
                        <th scope="col"><?= $strings['Apellidos'] ?></th>
                        <th scope="col"><?= $strings['Resguardo'] ?></th>
                        <th scope="col"><?= $strings['Cantidad de participación'] ?></th>
                        <th scope="col"><?= $strings['Ingresado'] ?></th>
                        <th scope="col"><?= $strings['Premio'] ?></th>
                        <th scope="col"><?= $strings['Pagado'] ?></th>
                        <th scope="col"><?= $strings['Editar'] ?></th>
                        <th scope="col"><?= $strings['Ver'] ?></th>
                        <th scope="col"><?= $strings['Borrar'] ?></th>
                    </thead>
                    <tbody>
                        <?php 
                            foreach($this->participaciones as $participacion){
                                ?>
                                <tr>
                                <td><?= $participacion->getEmail() ?></td>
                                <td><?= $participacion->getNombre() ?></td>
                                <td><?= $participacion->getApellidos() ?></td>
                                <td><?= $participacion->getResguardo() ?></td>
                                <td><?= $participacion->getParticipacion() ?></td>
                                <td><?= $strings[$participacion->getIngresado()] ?></td>
                                <td><?= $participacion->getPremioPersonal() ?></td>
                                <td><?= $strings[$participacion->getPagado()] ?></td>
                                <!-- Este botón permite la edición de los datos de un usuario, redirigiéndolo al formulario de Editar. !-->
                                <td><a href="../Controller/Loteriaiu_Controller.php?action=edit&email=<?=$participacion->getEmail()?>"><button id="editar"><i class="material-icons">edit</i></button></a></td>
                                <!-- Este botón permite el visionado de los datos de un usuario, redirigiéndolo a la tabla de Mostrar. !-->
                                <td><a href="../Controller/Loteriaiu_Controller.php?action=view&email=<?=$participacion->getEmail()?>"><button id="ver"><i class="material-icons">remove_red_eye</i></button></a></td>
                                <!-- Este botón permite el borrado de los datos de un usuario, redirigiéndolo a la tabla de Borrar. !-->
                                <td><a href="../Controller/Loteriaiu_Controller.php?action=delete&email=<?=$participacion->getEmail()?>"><button id="borrarTupla"><i class="material-icons">delete</i></button></a></td>
                                </tr>
                    
<?php
                        }
                        ?>
                    </tbody>    
                    </table>
                    <?php
        }
                                        include '../View/Footer.php';
    }
}
?>