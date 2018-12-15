<?php
/*
Autor: Javier Quintas Bergantiño
Alias: 2k2rol
Fecha: 17/11/2018
Funcion: Fichero que presenta una vista de la tabla de DELETE que sirve para borrar tuplas de loterías de nuestra base de datos.
*/
    class deleteLot{
        var $participacion;

        function __construct($participacion){
            $this->participacion = $participacion;
            $this->render();
        }

        function render(){

            include '../View/Header.php';
?>

            <br>
            <table>
				<tr>
					<th></th>
					<th><?= $strings['Datos a eliminar']?></th>
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
            <a href="../index.php" style="margin-left: 10%; margin-right: 3%;"><i class="material-icons">cancel_presentation</i></a>
			<!-- Este botón confirmaría el borrado de los datos mostrados. !-->
            <a href="../Controller/Loteriaiu_Controller.php?action=delete&email=<?=$this->participacion->getEmail()?>&delete=borrar"><i class="material-icons">delete</i></a>
<?php
            include '../View/Footer.php';



        }

    }
?>