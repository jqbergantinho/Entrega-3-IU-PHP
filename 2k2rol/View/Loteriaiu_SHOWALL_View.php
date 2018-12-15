<?php
/*
Autor: Javier Quintas Bergantiño
Alias: 2k2rol
Fecha: 17/11/2018
Funcion: Fichero que muestra una vista de una tabla en la que se enseñan todas las tuplas de loterías que hay en nuestra base de datos.
*/
    class ShowAll{
        var $participaciones;

        function __construct($participaciones){
            $this->participaciones = $participaciones;

            $this->render();
        }

        function render(){
            include '../View/Header.php';
?>
<br>
<br>

            <!-- Este botón permite la realización de una nueva búsqueda, redirigiendo al usuario al formulario Buscar. !-->
            <a href="../Controller/Loteriaiu_Controller.php?action=search" style="padding-left:4.5%; margin-bottom:20px;"><button id="buscar"><i class="material-icons">search</i></button></a>
			<!-- Este botón permite añadir un nuevo usuario, redirigiendo al usuario al formulario de Añadir. !-->
            <a href="../Controller/Loteriaiu_Controller.php?action=add"><button id="añadir"><i class="material-icons">add</i></button></a>
            <br>
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
                    <?php if(count($this->participaciones) == 0){
                        echo $strings['No hay participaciones'];
                    }
                    else{
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
                    }
?>
                </tbody>

<?php
        }
    }
?>