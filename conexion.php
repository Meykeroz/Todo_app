<?php

class Conexion{
    private $conect;

    public function __construct(){
        $this->conect=new PDO("mysql:host=localhost;dbname=Todo-app", "root", "");
    }

    public function connect(){
        return $this->conect;
    }
}