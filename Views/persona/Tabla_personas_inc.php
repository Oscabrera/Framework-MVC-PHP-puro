<div id="msj" class="col-12">

</div>
<section class="mt-3 pt-2 col-12">
    <div class="row sombra mt-3 pt-2 text-cente">
        <div class=" col-12 mt-2 " id="">
            <h2 class="col-12 " class='text-justify'><label><span> Personas registradas</span></label></h2></div>

        <a href="/persona/nuevapersona">
            <button class="btn btn-success" id="" data-toggle="tooltip" title="Registrar Producto"><i
                        class="fas fa-plus"></i> Registrar Producto
            </button>
        </a>
        <a href="/">
            <button class="btn btn-info" id="" data-toggle="tooltip" title="Productos Activos"><i
                        class="fas fa-arrow-up"></i> Productos activos
            </button>
        </a>

        <div class=" col-12" id="">
            <table class=" table-hover table-condensed table-striped" id="tabladatos" align="left">
                <thead>
                <tr>
                    <td>CURP</td>
                    <td>Primer Nombre</td>
                    <td>Segundo Nombre</td>
                    <td>Apellido Paterno</td>
                    <td>Apellido Materno</td>
                    <td>Estado</td>
                    <td class='tex-center'><span><i class="fa fa-pencil-alt fa-lg " aria-hidden="true"></i> Editar </span></td>
                    <td class='tex-center'><span><i class="fa fa-times fa-lg " aria-hidden="true"></i> Eliminar </span></td>
                    <td class='tex-center'><span><i class="fa fa-check fa-lg " aria-hidden="true"></i> Activar </span></td>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>

    </div>

</section>

<script>
    columns_array = {
        "columns": [
            {"data": "CURP", "name": "CURP"},
            {"data": "Primer_Nombre", "name": "Primer_Nombre"},
            {"data": "Segundo_Nombre", "name": "Segundo_Nombre"},
            {"data": "Apellido_Paterno", "name": "Apellido_Paterno"},
            {"data": "Apellido_Materno", "name": "Apellido_Materno"},
            {
                "data": "Estado", "name": "Estado",
                "className": 'text-center',
                "render": function (data, type, row, meta) {
                    var style = '';
                    var text = '';
                    if (data == 1) {
                        style = 'success';
                        text = 'Activo';
                    } else {
                        style = 'danger';
                        text = 'Inactivo';
                    }
                    return '<span class=" ml-1 badge estado_lb badge-' + style + '">' + text + '</span>'
                }
            },
            {
                "data": "Id_Persona", "name": "Id_Persona",
                "className": 'text-center',
                "render": function (data, type, row, meta) {
                    return '  <form action="/persona/modificarpersona" method="post">'
                        + '<input type="hidden" name="id" id="id" value="' + data + '">'
                        + '<input type="hidden" name="action" id="action" value="1">'
                        + '<button  class="submit btn btn-primary" id="editar" data-toggle="tooltip" title="Editar">'
                        + '<span><i class="fa fa-pencil-alt  "aria-hidden="true"></i></span>'
                        + '</button>'
                        + '</form>';
                }
            },

            {
                "data": "Id_Persona", "name": "Id_Persona",
                "className": 'text-center',
                "render": function (data, type, row, meta) {
                    return '<form action="" method="post">'
                        + '<input type="hidden" name="id" id="id" value="' + data + '">'
                        + '<button  class="submit btn btn-danger" id="btnEliminar" name="btnEliminar" value="1" data-toggle="tooltip" title="Eliminar">'
                        + '<span><i class="fa fa-times  "aria-hidden="true"></i></span>'
                        + '</button>'
                        + '</form>';
                }
            },

            {
                "data": "Id_Persona", "name": "Id_Persona",
                "className": 'text-center',
                "render": function (data, type, row, meta) {
                    return '<form action="" method="post">'
                        + '<input type="hidden" name="id" id="id" value="' + data + '">'
                        + '<button  class="submit btn btn-success" id="btnActivar" name="btnActivar" value="1" data-toggle="tooltip" title="Activar">'
                        + '<span><i class="fa fa-check  "aria-hidden="true"></i></span>'
                        + '</button>'
                        + '</form>';
                }
            },

        ]
    };

</script>
