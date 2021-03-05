<?php

require("validacion.php");

$name = $_POST['name'];
$email = $_POST['email'];
$user= $_POST['user'];
$password= $_POST['password'];
$id_rol=$_POST['id_rol'];

$usuario = new Usuario();

$usuario->insertar_usuario($name,$email,$user,$password,$id_rol);
