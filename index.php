<?php

// Motrar todos los errores de PHP
ini_set('error_reporting', 0);
require_once("Models/Conectar.php");

if(strpos(strtolower($_SERVER["REQUEST_URI"]),'/index.php') !== false ){
  $url=str_replace('/index.php/','',strtolower($_SERVER["REQUEST_URI"]));
  $url=str_replace('/index.php','',$url);
  $url = explode('/', $url);
}else{
  $url=strtolower($_SERVER["REQUEST_URI"]);
  $url = explode('/', $url);
  if(count($url)>1){
    array_shift($url);
  }else{
    $url=array();
  }
}

if(count($url)>1){
  $controller=ucwords($url[0]).'_Controller';
  if(isset($url[1])){
    $metodo=(ucwords($url[1]));
  }else{
    $metodo='Index';
  }
}else{
  $controller='Inicio_Controller';
  $metodo='Index';
}

require_once("./Controller/$controller.php");

$controllerObj = new $controller();
$controllerObj->$metodo();

 ?>
