<?php
class Guardar_persona_Controller{

  public function __construct(){}

  function Nueva_persona(){
    require_once("Models/Persona_model.php");
    $persona=new Persona_model();
    //ingresamos la nueva persona y regresamos 1 o 0
    echo json_decode($persona->insertar());
  }

  function Editar_persona(){
    require_once("Models/Persona_model.php");
    $persona=new Persona_model();
    //ingresamos la nueva persona y regresamos 1 o 0
    echo json_decode($persona->modificar());
  }

  function validar_curp(){
    $respuesta=1;
    $curp = $_POST['curp'];
    $id_persona = $_POST['id_persona'];
    $id_persona = (isset($id_persona) ? $id_persona : 0);
    require_once("Models/Persona_model.php");
    $persona=new Persona_model();
    //buscamos el si el curp esta asociado a otra persona
    if($persona->get_Persona_curp($curp,$id_persona)==false){
      $respuesta=0;
    }
    echo json_decode($respuesta);
 }



}
