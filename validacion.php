<?php

require("conexion.php");

session_start();

class Usuario extends Conexion {

    public function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();

    }
    public function validacion($usuario,$password){

        $this->usuario = $usuario;
        $this->Password = $password;

        $sql = "SELECT * FROM users WHERE USER='$this->usuario' and PASSWORD='$this->Password'";
        $validacion = $this->conexion->prepare($sql);
        $validacion->execute();

        $validacion->setFetchMode(PDO::FETCH_ASSOC);

        while ($row = $validacion->fetch()) {
            $_SESSION['id_user']=$row['id'];
            $_SESSION['id_rol']=$row['id_rol'];
        }

        if($validacion->rowCount() > 0) {
           $_SESSION['session'] = $usuario;

           header("Location:main.php");
       }else{
           echo "Problemas al iniciar sesion. Usuario o contrasena incorrecta.";
           require("index.html");
       }

    }
    public function insertar_usuario($name,$email,$user,$password,$id_rol)
    {
        $this->Nombre = $name;
        $this->Email = $email;
        $this->Usuario = $user;
        $this->Password = $password;
        $this->id_rol = $id_rol;

        $sql = "INSERT INTO users(name,email,user,password,id_rol) VALUES (?,?,?,?,?)";
        $Insertar = $this->conexion->prepare($sql);

        $array = array($this->Nombre, $this->Email, $this->Usuario, $this->Password,$this->id_rol);

        $Insertar->execute($array);

        if ($Insertar->rowCount() == 1){
            echo "Usuario registrado con exito";
            require("index.html");
        }else{
            echo "Problemas al registrarse, intente de nuevo.";
            require("registrarse.html");
        }

    }

}
