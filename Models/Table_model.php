<?php

class Table_model {
  var $columns=array();
  var $table;
  var $where=null;
  function __construct() {
    $this->db=Conectar::getConexion();
  }

  function set_columns($columns){
    $this->columns=$columns;
  }

  function set_table($table){
    $this->table=$table;
  }

  function set_where($condicion){
    $this->where=$condicion;
  }

  function allposts_count(){
    $total=0;

    $sql="SELECT COUNT(*) AS Total FROM $this->table ";

    if($this->where!=null){
      $sql.=" WHERE $this->where ";
    }

      $consulta=$this->db->query($sql);
      //recoremos y regresamos el resultado
      while($filas=$consulta->fetch_assoc()){
        $total=$filas['Total'];
      }

    return $total;
  }

  function posts_search($limit,$start,$search,$col,$dir,$col_search){
    $sql = "Select * FROM $this->table ";

    if($this->where!=null){
      $sql.=" WHERE ( $this->where ) ";
    }


    $array_search=explode(' ',$search);

    $sql .= " ORDER BY $col $dir ";
    $sql .= " LIMIT $start,$limit ";


    $consulta=$this->db->query($sql);
    $data=array();
    //recoremos y regresamos el resultado
    while($filas=$consulta->fetch_assoc()){
      $data[]=$filas;
    }
    return $data;

  }

  function posts_search_count($search,$col_search){

    $total=0;

    $sql="SELECT COUNT(*) AS Total FROM $this->table ";

    if($this->where!=null){
      $sql.=" WHERE $this->where ";
    }

      $consulta=$this->db->query($sql);
      //recoremos y regresamos el resultado
      while($filas=$consulta->fetch_assoc()){
        $total=$filas['Total'];
      }

    return $total;

  }

}
?>
