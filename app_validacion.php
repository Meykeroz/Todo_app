<?php

    require("validacion.php");

    $usuario=$_POST['user'];
    $password=$_POST['password'];


    $validacion = new Usuario();
    $validacion->validacion($usuario,$password);

