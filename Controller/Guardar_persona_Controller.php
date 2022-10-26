<?php
class Guardar_persona_Controller{

  public function __construct(){}

  function Nueva_persona(){
    require_once("Models/Persona_model.php");
    $persona=new Persona_model();
    $obligatorios=['rfc','curp','nombre','ape_pat','fecha_nac','sexo','civil'];
    $errores = 0;
    foreach ($obligatorios as $v){
        if(!isset($_POST[$v]) || $_POST[$v] == null){
            $errores++;
        }
    }
    $resultado = 0;
    if($errores == 0)
        $resultado=  $persona->insertar($_POST);
    if($resultado > 0){
        require_once("Models/Contacto_model.php");
        $contacto=new Contacto_model();
        $contacto->insertar($_POST,$resultado);
    }

    //ingresamos la nueva persona y regresamos 1 o 0
    echo json_decode($resultado);
  }

  function Editar_persona(){
    require_once("Models/Persona_model.php");
    $persona=new Persona_model();
      $obligatorios=['rfc','curp','nombre','ape_pat','fecha_nac','sexo','civil'];
      $errores = 0;
      foreach ($obligatorios as $v){
          if(!isset($_POST[$v]) || $_POST[$v] == null){
              $errores++;
          }
      }
      $resultado = 0;
      if($errores == 0)
          $resultado = $persona->modificar($_POST);

      require_once("Models/Contacto_model.php");
      $contacto=new Contacto_model();
      $contacto->modificar($_POST,$_POST['id_persona']);

    echo json_decode($resultado);
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
