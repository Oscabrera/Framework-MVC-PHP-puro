$(document).ready(function () {

/*

  btdexport = $( "<button >" )
    .attr( "id", "export-data" )
    .addClass( 'btn btn-success')
    .html( 'Exportar ' || "" );
    $($("#tabladatos")).parents()[1].append(btdexport[0]);

    $("#export-data").clic(function(){

    table.ajax.params();

    });
    */


  var csrf_token = $('#csrf_token').val();
  var csrf_hash = $('#csrf_hash').val();
  var cue = $('#cue').val();
  var cond = $('#cond').val();
  var url_tabla=ruta+"/datos/datatable";
  var date = new Date();
  var time = zero(date.getDate()) + "/" + zero(date.getMonth() + 1) + "/" + date.getFullYear() + " " + zero(date.getHours()) + ":" + zero(date.getMinutes()) + ":" + zero(date.getSeconds());
  var mns = '( ' + time + ' )';table

  if($("#cue").val().length>0){
    array_data_ajax={
    "processing": true,
      "serverSide": true,
      "deferRender": false,
      "ajax":{
       "url": url_tabla,
       "dataType": "json",
       "type": "POST",
       "data":{
         csrf_token : csrf_hash,
         cue: cue,
         cond: cond
         }
      }
    };
    columns_array = jsonConcat(columns_array,array_data_ajax);
  }
    var array_datatable= {
        "pagingType": "full_numbers",
        "scrollX": true,
        dom: 'frtip',
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
            "dom": '<"top"l><"top"f>tr<"bottom"ip>'

    };

    if(typeof columns_array !== "undefined"){
      array_datatable = jsonConcat(array_datatable,columns_array);
    }

    console.log(array_datatable);


    table = $("#tabladatos").DataTable(array_datatable);


    $(".top").addClass("d-flex justify-content-between");
    $(".dataTables_length").addClass("d-flex align-items-center");

    $(".search").on("keyup", function(){
     $(".search").each(function(index, element){
       if(index<($(".search").length)/2){
         var colum = $(element).data('col');
         var value = $(element).val();

         table.columns(colum).search(value)
       }

     });
     table.draw();
   });


   $($("input[type='search']").parents()[0]).hide()

});

function zero(n) {
    return (n > 9 ? '' : '0') + n;
}

function jsonConcat(o1, o2) {
 for (var key in o2) {
  o1[key] = o2[key];
 }
 return o1;
}
