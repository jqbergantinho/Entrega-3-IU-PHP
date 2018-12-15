<?php
/*
Autor: Javier Quintas Bergantiño
Alias: 2k2rol
Fecha: 17/11/2018
Funcion: Fichero que presenta una vista de un formulario de Registro que permite la incorporación de nuevos usuarios a nuestro sistema.
*/

    class Register{
        function __construct(){
            $this->render();
        }

        function render(){
            include '../View/Header.php';
?>
            <div class="formularioAñadir">
                <form method='POST' action='../Controller/Register_Controller.php' enctype="multipart/form-data">
                <fieldset>
				<label for="login"><span class="req">*</span><?= $strings['Usuario'] ?></label>
						<input type="text" id="login" name="login" size="30" maxlength="25" onblur="comprobarTexto(this.id,this.size)" required>
						<label for="password"><span class="req">*</span><?= $strings['Contraseña'] ?></label>
						<input type="password" id="password" name="password" size="30" maxlength="20" required="required" onblur="comprobarTexto(this.id,this.size)">
						<label for="dni"><span class="req">*</span><?= $strings['DNI'] ?></label>
						<input type="text" id="dni" name="dni" maxlength=9 size="30" onblur="comprobarDni(this.id,this.size)" required>
						<label for="nombre"><span class="req">*</span><?= $strings['Nombre'] ?></label>
						<input type="text" id="nombre" name="nombre" size="30" maxlength="25" required="required" value="" onblur="comprobarAlfabetico(this.id,this.size)">
						<label for="apellidos"><span class="req">*</span> <?= $strings['Apellidos'] ?></label>
						<input type="text" id="apellidos" name="apellidos" size="30" maxlength="50" required="required" value="" onblur="comprobarAlfabetico(this.id,this.size)">
						<label for="telefono"><span class="req">*</span><?= $strings['Teléfono'] ?></label>
						<input type="text" id="telefono" name="telefono" size="30" maxlength=25 onblur="comprobarTelf(this.id)" required>
						<label for="email"><span class="req">*</span><?= $strings['Email'] ?></label>
						<input type="email" id="email" name="email" size="30" maxlength="50" required="required" value="" onblur="comprobarEmail(this.id,this.size)">
						<label for="fechnac"><span class="req">*</span><?= $strings['Fecha de nacimiento'] ?></label>
						<input type="date" id="fechnac" name="fechaNac" size="30" required="required" value="">
						<label for="fotoPersonal"><span class="req">*</span><?= $strings['Foto']?></label>
						<input type="file" id="fotoPersonal" name="fotoPersonal" size="30" required onblur="validarArchivo(this.id)">
						<label for="sexo"><span class="req">*</span><?= $strings['Sexo'] ?></label>
						<input list="sexo" name="sexo" required="required" value="">
						<datalist id="sexo">
	  						<option value="Hombre">
	  						<option value="Mujer">
						</datalist>
						<br>
					</fieldset> 
					<a href='../index.php' style="margin-left: 5%;"><i class="material-icons">arrow_back_ios</i></a>
					
					<button  id="buttonGuardar" onclick="return registrar()"><i class="material-icons" o>check_circle</i></button>
                </form>
            </div>
<?php
        include '../View/Footer.php';
        }
    }
?>