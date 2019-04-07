<?php
class Conectar{
    public static function conexion(){
        $conexion=new mysqli("localhost", "galletita", "Galleta", "examenabril");
        $conexion->query("SET NAMES 'utf8'");
        return $conexion;
    }
}
?>
