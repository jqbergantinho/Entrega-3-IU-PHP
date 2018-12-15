<?php
/*
Autor: Javier Quintas Bergantiño
Alias: 2k2rol
Fecha: 17/11/2018
Funcion: Fichero que presenta una vista del formulario ADD que sirve para añadir nuevas loterías a nuestra base de datos.
*/
    class addLot{
        function __construct(){
            $this->render();
        }

        function render(){
            include '../View/Header.php';
        
    
?>

<div class = "formularioADD">
    <form method='POST' action='../Controller/Loteriaiu_Controller.php?action=add' enctype="multipart/form-data">

        <label><span class="req">*</span><?= $strings['Email'] ?></label>
        <input type="email" id="email" name="email" value="" maxlength="50" size=40 onblur="comprobarEmail(this.id, this.size)">
        <label><span class="req">*</span><?= $strings['Nombre'] ?></label>
        <input type="text" id="nombre" name="nombre" value="" maxlength="25" size=40 onblur="comprobarAlfabetico(this.id, this.size)">

        <label><span class = "req">*</span><?= $strings['Apellidos'] ?></label>
        <input type="text" id="apellidos" name="apellidos" value="" maxlength="50" size=40 onblur="comprobarAlfabetico(this.id, this.size)">

        <label><span class ="req">*</span><?= $strings['Cantidad de participación'] ?></label>
        <input type="number", id="participacion" name="participacion" value="" maxlength="3" onblur="comprobarEntero(this.id, 0, 999)">

        <label><span class="req">*</span><?= $strings['Resguardo'] ?></label>
        <input type="file" id="resguardo" name="resguardo" value="" maxlength="50" size=40>

        <label><span class = "req">*</span><?= $strings['Ingresado'] ?></label>
        <select name="ingresado" id="ingresado" required>
            <option value="SI"><?= $strings['SI'] ?></option>
            <option value="NO" selected><?= $strings['NO'] ?></option>
        </select>

        <label></label><span class ="req">*</span><?= $strings['Premio'] ?></label>
        <br>
        <input type="number" id="premio" name="premio" value="" maxlength="6" onblur="comprobarEntero(this.id, 0, 999999)">

        <label><span class="req">*</span><?= $strings['Pagado'] ?></label>
        <select name="pagado" id="pagado">
            <option value="SI"><?= $strings['SI'] ?></option>
            <option value="NO" selected><?= $strings['NO'] ?></option>
        </select>

    <br>
    <a href='../index.php'><i class="material-icons">arrow_back_ios</i></a>
    <button  id="buttonGuardar" onclick="return addLot()"><i class="material-icons" o>check_circle</i></button>
    </form>
</div>

<?php

    include '../View/Footer.php';
        }
    }
?>