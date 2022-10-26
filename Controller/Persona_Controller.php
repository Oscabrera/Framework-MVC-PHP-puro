<?php
//Llamada al modelo

class Persona_Controller
{

    public function __construct()
    {
    }

    function Nuevapersona()
    {
        require_once("Views/inicio.php");
        require_once("Views/persona/datos_persona.php");
        require_once("Views/footer.php");
        require_once("Views/js.php");
        require_once("Views/validate.php");
        require_once("Views/persona/validaciones/validar_datos_personales.php");
        require_once("Views/findoc.php");
    }

    function Modificarpersona()
    {
        if (count($_POST) > 0) {
            require_once("Models/Persona_model.php");
            require_once("Models/Contacto_model.php");
            $persona = new Persona_model();
            $contacto = new Contacto_model();
            $datos_persona = $persona->get_Persona($_POST['id']);
            $datosContacto = $contacto->get_Contacto($_POST['id']);
        } else {
            header("Location: http://" . $_SERVER['HTTP_HOST']);
        }

        require_once("Views/inicio.php");
        require_once("Views/persona/datos_persona_editar.php");
        require_once("Views/footer.php");
        require_once("Views/js.php");
        require_once("Views/validate.php");
        require_once("Views/persona/validaciones/validar_datos_personales_editar.php");
        require_once("Views/persona/datos_personalesjs.php");
        require_once("Views/findoc.php");

    }

    function index()
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

    function Inactivos()
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
        } else if ($_POST['btnActivar'] == '1') {
            if ($persona->Activar($_POST['id'])) {
                require_once("Views/Respuesta_Ok.php");
            } else {
                require_once("Views/Respuesta_Error.php");
            }
        }

        $cue = 'Persona';
        $cond = ' Estado = 0';

        require_once("Views/inicio.php");
        require_once("Views/persona/Tabla_personas_inc.php");
        require_once("Views/footer.php");
        require_once("Views/js.php");
        require_once("Views/tabla/datatable.php");
        require_once("Views/findoc.php");


    }

}

?>
