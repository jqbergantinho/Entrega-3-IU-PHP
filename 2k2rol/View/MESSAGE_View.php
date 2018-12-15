<?php 
/*
Autor: Javier Quintas Bergantiño
Alias: 2k2rol
Fecha: 17/11/2018
Funcion: Fichero que se utiliza para mostrar mensajes de error proporcionados por el propio sistema.
*/
    class MESSAGE{
        private $string;
        private $volver;

        function __construct($string, $volver){
            $this->string = $string;
            $this->volver = $volver;
            $this->render();
        }

        function render(){
            include '../Locale/Strings_' .$_SESSION['idioma']. '.php';
            include '../View/Header.php';
            ?>
		<br>
		<br>
		<br>
		<p>
		<H3>
<?php		
		echo $strings[$this->string];
?>
		</H3>
		</p>
		<br>
		<br>
        <br>
<?php
        echo '<a href=\'' . $this->volver . "'>" . $strings['Volver'] . " </a>";
        }
    }

?>