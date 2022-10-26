<?php

class Inicio_Controller
{
    public function __construct()
    {
    }

    public function Index()
    {
        require_once("Models/Persona_model.php");
        require_once("Models/Contacto_model.php");
        $persona = new Persona_model();
        $contacto = new Contacto_model();
        if ($_POST['btnEliminar'] == '1') {
            if ($contacto->Eliminar($_POST['id'])) {
                if ($persona->Eliminar($_POST['id'])) {
                    require_once("Views/Respuesta_Ok.php");
                } else {
                    require_once("Views/Respuesta_Error.php");
                }
            } else {
                require_once("Views/Respuesta_Error.php");
            }
        } else if ($_POST['btnInactivar'] == '1') {
            if ($persona->Inactivar($_POST['id'])) {
                require_once("Views/Respuesta_Ok.php");
            } else {
                require_once("Views/Respuesta_Error.php");
            }
        }


        $cue = 'Persona';
        $cond = ' Estado = 1';


        require_once("Views/inicio.php");
        require_once("Views/persona/Tabla_personas.php");
        require_once("Views/footer.php");
        require_once("Views/js.php");
        require_once("Views/tabla/datatable.php");
        require_once("Views/findoc.php");


    }

}


?>
