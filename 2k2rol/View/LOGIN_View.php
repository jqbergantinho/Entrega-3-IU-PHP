<?php
/*
Autor: Javier Quintas Bergantiño
Alias: 2k2rol
Fecha: 17/11/2018
Funcion: Fichero que presenta una vista del formulario de login mediante el cual los usuarios del sistema pueden identificarse.
*/
    class Login{


        function __construct(){
            $this->render();
        }

        function render(){

            include '../View/Header.php';
?>
    <div class="formularioAñadir">
        <form method="POST" action='../Controller/Login_Controller.php'>
            
                <label><span class = "req">*</span><?= $strings['Usuario'] ?></label>
                <input type="text" id="usuario" name="login" maxlength=25 size=25 onblur="comprobarTexto(this.id, this.size)">

                <label><span class="req">*</span><?= $strings['Contraseña'] ?></label>
                <input type="password" id="password" name="password" maxlength="20" size=25 onblur="comprobarTexto(this.id, this.size)">

            <br>
            <a href='../Controller/Register_Controller.php'><i class="material-icons">add</i></a>
            <button  id="buttonGuardar" onclick="return registrar()"><i class="material-icons" o>check_circle</i></button>
        </form>

    </div>

<?php
        include '../View/Footer.php';
        }


    }
?>