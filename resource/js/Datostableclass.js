$(document).ready(function () {

    function zero(n) {
        return (n > 9 ? '' : '0') + n;
    }
    var date = new Date();
    var time = zero(date.getDate()) + "/" + zero(date.getMonth() + 1) + "/" + date.getFullYear() + " " + zero(date.getHours()) + ":" + zero(date.getMinutes()) + ":" + zero(date.getSeconds());
    var mns = '( ' + time + ' )';


    $(".tabladatos").DataTable({
        "pagingType": "full_numbers",
        dom: 'Bfrtip',
        "language": {
                "sProcessing": "Procesando..."
                , "sLengthMenu": "Mostrar _MENU_ registros"
                , "sZeroRecords": "No se encontraron resultados"
                , "sEmptyTable": "Ningún dato disponible en esta tabla"
                , "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros"
                , "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros"
                , "sInfoFiltered": "(filtrado de un total de _MAX_ registros)"
                , "sInfoPostFix": ""
                , "sSearch": ""
                , "sUrl": ""
                , "sInfoThousands": ","
                , "sLoadingRecords": "Cargando..."
                , "oPaginate": {
                    "sFirst": "Primero"
                    , "sLast": "Último"
                    , "sNext": "Siguiente"
                    , "sPrevious": "Anterior"
                }
                , "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente"
                    , "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            },
        "dom": '<"top"l><"top"Bf>tr<"bottom"ip>'

    });


    $(".top").addClass("d-flex justify-content-between");
    $(".dataTables_length").addClass("d-flex align-items-center");
});
