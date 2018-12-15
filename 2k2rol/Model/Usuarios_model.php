<?php 

/*
Autor: Javier Quintas Bergantiño
Alias: 2k2rol
Fecha: 17/11/2018
Funcion: Fichero que define la clase Usuarios con los atributos que deseamos guardar respecto a las usuarios del sistema (administradores de loterías).
*/
    class Usuarios_model{
        var $login;
        var $password;
        var $dni;
        var $nombre;
        var $apellidos;
        var $telefono;
        var $email;
        var $fechaNac;
        var $fotoPersonal;
        var $sexo;
        var $mysqli;

        function __construct($login=null, $password=null, $dni=null, $nombre=null,
            $apellidos=null, $telefono=null, $email=null, $fechaNac=null, 
            $fotoPersonal=null, $sexo=null){

            $this->login = $login;
            $this->password = $password;
            $this->dni = $dni;
            $this->nombre = $nombre;
            $this->apellidos = $apellidos;
            $this->telefono = $telefono;
            $this->email = $email;
            $this->fechaNac = $fechaNac;
            $this->fotoPersonal = $fotoPersonal;
            $this->sexo = $sexo;

            include_once '../Model/Access_DB.php';
            $this->mysqli = ConnectDB();
        }

        function login(){
            $sql = "SELECT *
                    FROM USUARIOS
                    WHERE (
                        (login = '$this->login')
                    )";

            if(!isset($this->login)){
                return 'Login vacío';
            }
            $resultado = $this->mysqli->query($sql);

            if($resultado->num_rows == 0){
                return 'Login innexistente'; 
            }
            else{

                $tupla = $resultado->fetch_array();

                if($tupla['password'] == $this->password){
                    return true;
                }
                else{
                    return 'Contraseña incorrecta';
                }
            }
        }

        function checkIsValidForRegister(){

            if(!isset($this->login) || !isset($this->email) || !isset($this->dni)){
                return 'Algunos datos están vacíos';
            }

            $sql = "SELECT *
                    FROM USUARIOS
                    WHERE login = '$this->login' OR dni = '$this->dni' OR email = '$this->email'";
            
            $resultado = $this->mysqli->query($sql);

            if($resultado->num_rows == 1){
                return 'Login, Email o DNI ya existentes.';
            }
            else{
                return 'true';
            }
        }

        function register(){
            $fech = date('Y-m-d',strtotime(str_replace('/','-',$this->fechaNac)));
            $picture = $this->picture();

            $sql = "INSERT INTO USUARIOS VALUES('$this->login', '$this->password', '$this->dni', '$this->nombre', '$this->apellidos', '$this->telefono', '$this->email',
                    '$this->fechaNac', '$picture', '$this->sexo')";

            if(!$this->mysqli->query($sql)){
                return 'Error de inserción';
            }
            else{
                return 'Registrado';
            }
        }

        function picture(){
            $picture = '../Files/'. $this->email .'/Pictures/'. $this->fotoPersonal['name'];
            $directorio = '../Files/'. $this->email .'/Pictures/';
            
            if(!file_exists($directorio)){
                mkdir($directorio,0777,true);
            }
       
           move_uploaded_file($this->fotoPersonal['tmp_name'], $picture);
            return $picture;
        }

    }

?>