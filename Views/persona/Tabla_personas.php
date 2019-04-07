<div id="msj" class="col-12">

</div>
<section class="mt-3 pt-2 col-12">
  <div class="row sombra mt-3 pt-2 text-cente">
  <div class=" col-12 mt-2 " id="">
      <h2 class="col-12 " align="justify"><label><span> Personas registradas</span></label></h2> </div>

      <a href="/persona/nuevapersona">
        <button class="btn btn-success" id="" data-toggle="tooltip" title="Registrar Persona"><i class="fas fa-plus"></i> Registrar Persona </button>
      </a>

      <a href="/persona/inactivos">
        <button class="btn btn-danger" id="" data-toggle="tooltip" title="Personas Inactivos"><i class="fas fa-arrow-down"></i> Personas inactivos </button>
      </a>

	<div class=" col-12" id="">
  <table class=" table-hover table-condensed table-striped" id="tabladatos" align="left">
    <thead>
      <tr>
        <td>CURP</td>
        <td>Nombre</td>
        <td>Apellido Paterno</td>
        <td>Apellido Materno</td>
        <td>Estado</td>
        <td  align='center'><span><i class="fa fa-pencil-alt fa-lg " aria-hidden="true"></i>  </span></td>
        <td  align='center'><span><i class="fa fa-times fa-lg " aria-hidden="true"></i>  </span></td>
        <td  align='center'><span><i class="fa fa-trash-alt fa-lg " aria-hidden="true"></i>  </span></td>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>
  </div>

 </div>

</section>

<script>
columns_array ={
  "columns": [
    {"data": "CURP", "name": "CURP" },
    {"data": "Nombre", "name": "Nombre" },
    {"data": "Apellido_Paterno", "name": "Apellido_Paterno" },
    {"data": "Apellido_Materno", "name": "Apellido_Materno" },
    {"data": "Estado", "name": "Estado",
    "className": 'text-center',
    "render": function (data, type, row, meta){
      var style='';
      var text='';
      if (data==1){
        style='success';
        text='Activo';
      }else{
        style='danger';
        text='Inactivo';
      }
      return '<span class=" ml-1 badge estado_lb badge-'+style+'">'+text+'</span>'
    } },
    {"data": "Id_Persona", "name": "Id_Persona",
    "className": 'text-center',
    "render": function (data, type, row, meta){
      return '  <form action="/persona/modificarpersona" method="post">'
          +'<input type="hidden" name="id" id="id" value="'+data+'">'
          +'<input type="hidden" name="action" id="action" value="1">'
          +'<button  class="submit btn btn-primary" id="editar" data-toggle="tooltip" title="Editar">'
            +'<span><i class="fa fa-pencil-alt "aria-hidden="true"></i></span>'
          +'</button>'
        +'</form>';
    } },

    {"data": "Id_Persona", "name": "Id_Persona",
    "className": 'text-center',
    "render": function (data, type, row, meta){
      return '<form action="" method="post">'
        +'<input type="hidden" name="id" id="id" value="'+data+'">'
        +'<button  class="submit btn btn-danger" id="btnEliminar" name="btnEliminar" value="1" data-toggle="tooltip" title="Eliminar">'
          +'<span><i class="fa fa-times "aria-hidden="true"></i></span>'
        +'</button>'
      +'</form>';
    } },

    {"data": "Id_Persona", "name": "Id_Persona",
    "className": 'text-center',
    "render": function (data, type, row, meta){
      return '<form action="" method="post">'
        +'<input type="hidden" name="id" id="id" value="'+data+'">'
        +'<button  class="submit btn btn-warning" id="btnInactivar" name="btnInactivar" value="1" data-toggle="tooltip" title="Inactivar">'
          +'<span><i class="fa fa-trash-alt "aria-hidden="true"></i></span>'
        +'</button>'
      +'</form>';
    } },

  ]};

</script>
