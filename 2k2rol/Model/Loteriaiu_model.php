<?php
/*
Autor: Javier Quintas Bergantiño
Alias: 2k2rol
Fecha: 17/11/2018
Funcion: Fichero que define la clase lotería con los atributos que deseamos guardar respecto a las loterías.
*/
    class Loteria{

        var $email;
        var $nombre;
        var $apellidos;
        var $resguardo;
        var $participacion;
        var $ingresado;
        var $premioPersonal;
        var $pagado;
        var $mysqli;


        function __construct($email = null,
                            $nombre = null,
                            $apellidos = null,
                            $resguardo = null,
                            $participacion = null,
                            $ingresado = null,
                            $premioPersonal = null,
                            $pagado = null){
        
            $this->email = $email;
            $this->nombre = $nombre;
            $this->apellidos = $apellidos;
            $this->resguardo = $resguardo;
            $this->participacion = $participacion;
            $this->ingresado = $ingresado;
            $this->premioPersonal = $premioPersonal;
            $this->pagado = $pagado;                
                                
            include_once '../Model/Access_DB.php';
	        $this->mysqli = ConnectDB();

        }

        function getEmail(){
            return $this->email;
        }
        function getNombre(){
            return $this->nombre;
        }

        function getParticipacion(){
            return $this->participacion;
        }
        function getResguardo(){
            return $this->resguardo;
        }

        function getIngresado(){
            return $this->ingresado;
        }

        function getPremioPersonal(){
            return $this->premioPersonal;
        }

        function getApellidos(){
            return $this->apellidos;
        }

        function getPagado(){
            return $this->pagado;
        }

        function findByEmail(){
            $sql = "SELECT * 
                    FROM LOTERIAIU
                    WHERE `lot.email` = '$this->email'";

            $resultado = $this->mysqli->query($sql);
            if($resultado->num_rows == 0){
                return 'Email incorrecto';
            }
            else{
                $tupla = $resultado->fetch_array();
                $this->nombre = $tupla['lot.nombre'];
                $this->apellidos = $tupla['lot.apellidos'];
                $this->resguardo = $tupla['lot.resguardo'];
                $this->participacion = $tupla['lot.participacion'];
                $this->ingresado = $tupla['lot.ingresado'];
                $this->premioPersonal = $tupla['lot.premiopersonal'];
                $this->pagado = $tupla['lot.pagado'];
                return $this;
            }
        }

        function findAll(){
            $sql = "SELECT *
                    FROM LOTERIAIU";
            
            $resultado = $this->mysqli->query($sql);

            $participaciones_db = $resultado->fetch_All(MYSQLI_ASSOC);
            $participaciones = array();

            foreach($participaciones_db as $participacionLot){
                array_push($participaciones, new Loteria($participacionLot['lot.email'],
                                                        $participacionLot['lot.nombre'],
                                                        $participacionLot['lot.apellidos'],
                                                        $participacionLot['lot.resguardo'],
                                                        $participacionLot['lot.participacion'],
                                                        $participacionLot['lot.ingresado'],
                                                        $participacionLot['lot.premiopersonal'],
                                                        $participacionLot['lot.pagado']));
            }

            
            return $participaciones;
        }

        function checkIsValidForInsert(){
            $sql = "SELECT *

                    FROM LOTERIAIU
                    WHERE `lot.email` = '$this->email'";
                   
            $resultado = $this->mysqli->query($sql);
            
            if($resultado->num_rows == 1){
                return "Ya existe una participación con ese email";
            }else{
                return 'true';
            }
        }

        function insert(){
            
            $resguardo = $this->dirResguardo();

            $sql = "INSERT INTO LOTERIAIU VALUES('$this->email', '$this->nombre', '$this->apellidos', 
                                                '$this->participacion', '$resguardo', '$this->ingresado',
                                                '$this->premioPersonal', '$this->pagado')";

            if(!$this->mysqli->query($sql)){
                return "Error insertando";
            }
            else{
                return "Insertado";
            }
        }

        function update(){
            if(isset($this->resguardo['name'])){
                $this->borrarDirectorio('../Files/'. $this->email .'/Resguardo/');
                $resguardo = $this->dirResguardo();
            }
            else{
                $resguardo = $this->resguardo;
            }

            $sql = "UPDATE LOTERIAIU
                    SET `lot.nombre` = '$this->nombre',
                    `lot.apellidos` = '$this->apellidos',
                    `lot.participacion` = '$this->participacion',
                    `lot.resguardo` = '$resguardo',
                    `lot.ingresado` = '$this->ingresado',
                    `lot.premiopersonal` = '$this->premioPersonal',
                    `lot.pagado` = '$this->pagado'
                    WHERE `lot.email` = '$this->email'";

            if(!$this->mysqli->query($sql)){
                return "Error editando";
            }
            else{
                return "Editado";
            }
        }

        function delete(){

            $dirResguardo = '../Files/'. $this->email .'/Resguardo/';

            $sql = "DELETE FROM LOTERIAIU
                    WHERE `lot.email` = '$this->email'";

            if(!$this->mysqli->query($sql)){
                return "Error eliminando";
            }
            else{
                $this->borrarDirectorio($dirResguardo);
                return "Eliminado";
            }
        }

        function search(){
            $sql = "SELECT * FROM LOTERIAIU
                    WHERE `lot.email` LIKE '%$this->email%' AND `lot.nombre` LIKE '%$this->nombre%' AND `lot.apellidos` LIKE '%$this->apellidos%'
                    AND `lot.participacion` LIKE '%$this->participacion%' AND `lot.resguardo` LIKE '%$this->resguardo%' AND `lot.ingresado` LIKE '%$this->ingresado%' AND
                    `lot.premiopersonal` LIKE '%$this->premioPersonal%' AND `lot.pagado` LIKE '%$this->pagado%'";
            
            $resultado = $this->mysqli->query($sql);

            $participaciones_db = $resultado->fetch_All(MYSQLI_ASSOC);
            $participaciones = array();

            foreach($participaciones_db as $participacionLot){
    
            array_push($participaciones, new Loteria($participacionLot['lot.email']
                    ,$participacionLot['lot.nombre'],$participacionLot['lot.apellidos']
                    ,$participacionLot['lot.resguardo'],$participacionLot['lot.participacion']
                    ,$participacionLot['lot.ingresado']
                    ,$participacionLot['lot.premiopersonal'],$participacionLot['lot.pagado']));
                
            }

            return $participaciones;
        }

        function dirResguardo(){
            $resguardo = "../Files/". $this->email ."/Resguardo/". $this->resguardo['name'].".pdf";
            $dirResguardo = "../Files/". $this->email ."/Resguardo/";

            if(!file_exists($dirResguardo)){
                mkdir($dirResguardo, 0777, true);
            }

            move_uploaded_file($this->resguardo['tmp_name'], $resguardo);
            return $this->resguardo['name'];
        }

        function borrarDirectorio($ruta) {
            $ficheros = glob($ruta . '/*');
            foreach ($ficheros as $fichero) {
                if(is_dir($fichero)){
                    borrarDirectorio($fichero);
                }
                else{
                    unlink($fichero);
                }
            }
            rmdir($ruta);
            return;
       }
        
    }

?>