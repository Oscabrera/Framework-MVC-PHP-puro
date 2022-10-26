<?php
ini_set('error_reporting', E_ALL);

class Datos_Controller{
  public function __construct(){
  }

  function Mensaje_respuesta(){
    if($_POST['resultado']>0){
      require_once("Views/Respuesta_Ok.php");
    }else{
      require_once("Views/Respuesta_Error.php");
    }
  }

  public function datatable(){

    require_once("Models/Table_model.php");
    $table= new Table_model();

    $table->set_table($_POST['cue']);
    if($_POST['cond']!=''){
      $table->set_where($_POST['cond']);
    }


    foreach ($_POST['columns'] as $key => $value) {
      $columns[]= $value['name'];
    }

    $table->set_columns($columns);
    $i=0;

    $limit = $_POST['length'];
    $start = $_POST['start'];
    $order = $columns[$_POST['order'][0]['column']];
    $dir = $_POST['order'][0]['dir'];
    $search = $_POST['search']['value'];

    $colum_search=array();

    foreach ($columns as $key => $value) {
      $colum_search[]= $_POST['columns'][$key]['search']['value'];
    }

    // DATA
    $totalData = $table->allposts_count();
    if($limit==-1){
      $limit=$totalData;
    }


    $posts =  $table->posts_search($limit,$start,$search,$order,$dir,$colum_search);
    $totalFiltered = $table->posts_search_count($search,$colum_search);

    $json_data = array(
                "draw"            => intval($_POST['draw']),
                "recordsTotal"    => intval($totalData),
                "recordsFiltered" => intval($totalFiltered),
                "data"            => $posts
                );

    echo json_encode($json_data);

  }

}
