<?php

class Conectar{
    public static function getConexion(){
        try{
            $conexion = new mysqli("172.18.0.2", "root", "root", "examen");
            if ($conexion->connect_errno) 
                die('Connect Error: ' . $conexion->connect_errno);
        }catch(Exception $e){
            if ($conexion->connect_errno) 
                die('Connect Error: ' . $conexion->connect_errno);
        } 
        return $conexion;
    }  
}
?>
