<?php
/*
Autor: Javier Quintas Bergantiño
Alias: 2k2rol
Fecha: 17/11/2018
Funcion: Fichero que presenta una vista del formulario de EDIT que permite la edición de la información de una tupla de lotería concreta.
*/
    class editLot{

        var $loteria;

        function __construct($loteria = null){
            $this->loteria = $loteria;

            $this->render();
        }

        function render(){
            include '../View/Header.php';
?>

        <form method='POST' action="../Controller/Loteriaiu_Controller.php?action=edit&email=<?=$this->loteria->getEmail()?>" enctype="multipart/form-data">
        
        <label><span class="req">*</span><?= $strings['Email'] ?></label>
        <input type="email" id="email" name="email" disabled value="<?=$this->loteria->getEmail()?>" maxlength="50" size=40 onblur="comprobarEmail(this.id, this.size)">
        <label><span class="req">*</span><?= $strings['Nombre'] ?></label>
        <input type="text" id="nombre" name="nombre" value="<?=$this->loteria->getNombre()?>" maxlength="50" size=40 onblur="comprobarAlfabetico(this.id, this.size)">
        <label><span class="req">*</span><?= $strings['Apellidos'] ?></label>
        <input type="text" id="apellidos" name="apellidos" value="<?=$this->loteria->getApellidos()?>" maxlength="50" size=40 onblur="comprobarAlfabetico(this.id, this.size)">
        <label><span class="req">*</span><?= $strings['Resguardo']?></label>
        <input type="file" id="resguardo" name="resguardo" value="<?=$this->loteria->getResguardo()?>" maxlength="50" size=40>
        <label><span class="req">*</span><?= $strings['Cantidad de participación']?></label>
        <input type="number" name="participacion" id="participacion" value="<?=$this->loteria->getParticipacion()?>" maxlength="3" size=40 onblur="comprobarEntero(this.id, 0, 999)">
        <label><span class="req">*</span><?= $strings['Ingresado']?></label>
        <select name="ingresado" id="ingresado" required>
            <?php if($this->loteria->getIngresado() == $strings['SI']){
                ?>
                <option value="SI" selected><?= $strings['SI']?></option>
                <option value="NO"><?= $strings['NO']?></option>
        </select>
        <?php
            }else{
?>
            <option value="SI"><?= $strings['SI'] ?></option>
            <option value="NO" selected><?= $strings['NO']?></option>
        </select>
        
<?php
            }
?>
        <label><span class="req">*</span><?= $strings['Premio'] ?></label>
		<input type="number" id="premioAdd" name="premio"  value="<?=$this->loteria->getPremioPersonal()?>" maxlength="6" 
				 onblur="comprobarEntero(this.id,0,999999)">

        <label><span class="req">*</span><?= $strings['Pagado'] ?>:</label>
		<select id="pagadoAdd" name="pagado" required>
                
<?php            if($this->loteria->getPagado() == $strings['SI']){
    ?>
                    <option value="SI" selected><?= $strings['SI']?></option>
					<option value="NO"><?= $strings['NO'] ?></option>
                    </select>
<?php
                }else{
?>
                    <option value="SI"><?= $strings['SI'] ?></option>
					<option value="NO" selected><?= $strings['NO'] ?></option>
					
				</select>
<?php
                }
?>
        <br>
        <a href='../index.php' class="registro"><i class="material-icons">arrow_back_ios</i></a>
        <button  id="buttonGuardar" onclick="return addLot()"><i class="material-icons" o>check_circle</i></button>
        </form>

<?php
    include '../View/Footer.php';



        }
    }
        ?>