<?php

class Table_model {
  var $columns=array();
  var $table;
  var $where=null;
  function __construct() {
    $this->db=Conectar::conexion();
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
/*
    $this->db->group_start();
    foreach ($this->columns as $key => $value) {
      $this->db->group_start();
        $this->db->like($value,$col_search[$key]);
        $this->db->or_where($value.' is NULL');
      $this->db->group_end();
    }
    $this->db->group_end();

    foreach ($array_search as $keyS => $valueS) {
      $this->db->group_start();
      foreach ($this->columns as $key => $value) {
        if($key==0){
          $this->db->like($value,$valueS);
        }else{
          $this->db->or_like($value,$valueS);
        }
      }
      $this->db->group_end();
    }
    */

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




    /*

    if($this->where!=null){
      $sql.=" where $this->where";
    }

    $array_search=explode(' ',$search);

    $this->db->group_start();
    foreach ($this->columns as $key => $value) {
        $this->db->like($value,$col_search[$key]);
    }
    $this->db->group_end();

    foreach ($array_search as $keyS => $valueS) {
      $this->db->group_start();
      foreach ($this->columns as $key => $value) {
        if($key==0){
          $this->db->like($value,$valueS);
        }else{
          $this->db->or_like($value,$valueS);
        }
      }
      $this->db->group_end();
    }
*/
/*
    $query = $this->db->get($this->table);

    return $query->num_rows();
    */
  }

}
?>
