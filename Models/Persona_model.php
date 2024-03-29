<?php

class Persona_model
{
    private $db;
    private $Personas;
    private $table = 'Persona';

    public function __construct()
    {
        $this->db = Conectar::getConexion();
        $this->Personas = array();
    }

    public function get_Persona($id)
    {
        $consulta = $this->db->query("SELECT * FROM $this->table WHERE Id_Persona= '$id' ;");
        //recoremos y regresamos el resultado
        while ($filas = $consulta->fetch_assoc()) {
            $this->Personas[] = $filas;
        }
        if (count($this->Personas > 0)) {
            return $this->Personas[0];
        } else {
            return array();
        }
    }

    public function get_Persona_curp($curp, $idpersona)
    {
        $sql = " SELECT * FROM $this->table WHERE CURP= '$curp' ";
        if ($idpersona != null) {
            $sql .= " AND Id_Persona !=" . $idpersona;
        }
        $consulta = $this->db->query($sql);
        //recoremos y regresamos el resultado
        while ($filas = $consulta->fetch_assoc()) {
            $this->Personas[] = $filas;
        }
        if (count($this->Personas > 0)) {
            return $this->Personas[0];
        } else {
            return false;
        }
    }

    public function insertar($input)
    {
        try {
            $datos = ['rfc', 'curp', 'nombre', 'nombre2', 'ape_pat', 'ape_mat', 'fecha_nac', 'sexo', 'civil'];
            $bddatos = ['RFC', 'CURP', 'Primer_Nombre', 'Segundo_Nombre', 'Apellido_Paterno', 'Apellido_Materno', 'Fecha_Nacimiento', 'Sexo', 'Estado_Civil'];
            $valores = ' ( ';
            $data = ' ( ';
            $keys = array_keys($input);
            //en cada elemento de nombre que son los elementos que espero del post lo busco en el POST
            foreach ($datos as $key => $value) {
                $encontrado = array_search($value, $keys);
                //de encontrarlo lo tomo y lo ingreso a la consulta sql
                if ($encontrado >= 0 && $encontrado !== false) {
                    //debe estar en el mismo orden los nombres y bdnombres, los bdnombres son el nombre de las columnas
                    $valores .= $bddatos[$key] . ', ';

                    $valor = $input[$datos[$key]];
                    if(in_array($value,array('rfc', 'curp')))
                        $valor = strtoupper($valor);

                    $data .= '\'' . htmlentities($valor) . '\' , ';
                }
            }
            //elimino la ulima ,
            $valores = substr($valores, 0, -2);
            $valores .= ' )';
            //elimino la ulima ,
            $data = substr($data, 0, -2);
            $data .= ' )';

            $sql = "INSERT INTO $this->table $valores values $data;";
            $this->db->query($sql);
            return (int) $this->db->insert_id ;
        } catch (Exception $e) {
            return 0;
        }

    }

    public function modificar($input)
    {
        try {
            $datos = ['rfc', 'curp', 'nombre', 'nombre2', 'ape_pat', 'ape_mat', 'fecha_nac', 'sexo', 'civil'];
            $bddatos = ['RFC', 'CURP', 'Primer_Nombre', 'Segundo_Nombre', 'Apellido_Paterno', 'Apellido_Materno', 'Fecha_Nacimiento', 'Sexo', 'Estado_Civil'];
            $valores = ' ';
            $keys = array_keys($input);
            foreach ($datos as $key => $value) {
                //en cada elemento de nombre que son los elementos que espero del post lo busco en el POST
                $encontrado = array_search($value, $keys);
                //de encontrarlo lo tomo y lo ingreso a la consulta sql
                if ($encontrado >= 0 && $encontrado !== false) {
                    //debe estar en el mismo orden los nombres y bdnombres, los bdnombres son el nombre de las columnas
                    $valor = $input[$datos[$key]];
                    if(in_array($value,array('rfc', 'curp')))
                        $valor = strtoupper($valor);
                    $valores .= $bddatos[$key] . '= \'' . htmlentities($valor ) . '\', ';

                }
            }
            //elimino la ultima ,
            $valores = substr($valores, 0, -2);

            $sql = "Update $this->table set $valores where Id_Persona='" . htmlentities($input['id_persona']) . "';";
            //regresa 1 ó 0
            return (int)$this->db->query($sql);

        } catch (Exception $e) {
            return 0;
        }
    }

    public function Eliminar($id)
    {
        $sql = "delete from $this->table where Id_Persona='" . $id . "';";
        return (int) $this->db->query($sql);
    }

    public function Inactivar($id)
    {
        $sql = "Update $this->table set Estado=0 where Id_Persona='" . $id . "';";
        return (int) $this->db->query($sql);
    }

    public function Activar($id)
    {
        $sql = "Update $this->table set Estado=1 where Id_Persona='" . $id . "';";
        return (int) $this->db->query($sql);
    }

}

?>

