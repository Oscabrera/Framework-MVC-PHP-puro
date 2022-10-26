<?php

class Contacto_model
{
    private $db;
    private $Contacto;
    private $table = 'Contacto';

    public function __construct()
    {
        $this->db = Conectar::getConexion();
        $this->Contacto = array();
    }

    public function get_Contacto($id)
    {
        $consulta = $this->db->query("SELECT * FROM $this->table WHERE Id_Persona= '$id' ;");
        //recoremos y regresamos el resultado
        while ($filas = $consulta->fetch_assoc()) {
            $this->Contacto[] = $filas;
        }
        if (count($this->Contacto > 0)) {
            return $this->Contacto[0];
        } else {
            return array();
        }
    }

    public function insertar($input,$id_persona)
    {
        try {
            $datos = ['correo', 'tel', 'cel'];
            $bddatos = ['Correo_Personal', 'Telefono_Fijo', 'Telefono_Celular'];
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

                    $data .= '\'' . htmlentities($valor) . '\' , ';
                }
            }
            $valores .=  'Id_Persona , ';
            $valor = $id_persona;
            $data .= '\'' . htmlentities($valor) . '\' , ';

            //elimino la ulima ,
            $valores = substr($valores, 0, -2);
            $valores .= ' )';
            //elimino la ulima ,
            $data = substr($data, 0, -2);
            $data .= ' )';

            $sql = "INSERT INTO $this->table $valores values $data;";

            $this->db->query($sql);
            return (int) $this->db->insert_id;
        } catch (Exception $e) {
            return 0;
        }

    }

    public function modificar($input,$id_persona)
    {
        try {
            $datos = ['correo', 'tel', 'cel'];
            $bddatos = ['Correo_Personal', 'Telefono_Fijo', 'Telefono_Celular'];
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

            $sql = "Update $this->table set $valores where Id_Persona='" . $id_persona . "';";
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

}

?>
