<?php

class Conexion
{
    public function conectar()
    {
        $conexion = new PDO("mysql:host=localhost;dbname=prueba_ave;charset=utf8", 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return $conexion;
    }
}
