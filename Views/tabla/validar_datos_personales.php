<script src="http://<?=$_SERVER['HTTP_HOST']?>/resource/js/valida_curp.js"></script>


<script>
nueva_persona('datos_usuario');

function nueva_persona($form) {
  $.validator.setDefaults({
    submitHandler: function () {
      send_datos_nueva_persona($form);
    },
    highlight: function (input) {
      $(input).closest('.validar').addClass('was-error');
    },
    unhighlight: function (input) {
      $(input).closest('.validar').removeClass('was-error');
    }
  });
  $('#' + $form).validate();
}

function send_datos_nueva_persona($form){
  var form = $('#'+$form);

  if(validarInput($("#curp"))){
    var curp = $('#curp').val();
    $.ajax({
      type: "POST",
      url: ruta+'/guardar_persona/validar_curp',
      data: {
        curp: curp,
        id_persona: 0
       },
      dataType: 'json',
      success: function (resp) {
        if(resp == 0){
          $.ajax({
            type: "POST",
            url: ruta+'/guardar_persona/nueva_persona',
            data: form.serialize(),
            dataType: 'json',
            success: function (rest) {
              if(rest==1){
                $('#'+$form).trigger("reset");
              }
              $.ajax({
                type: "POST",
                data: { resultado: rest },
                url: ruta+'/datos/mensaje_respuesta',
                dataType: 'html',
                success: function (rest) {
                  $("#msj").html(rest);
                }
              });
            }
          });
        }else{
              $(".curp-error").remove();
              error = $( "<label >" )
                .attr( "id", "curp-error" )
                .addClass( 'error curp-error')
                .html( 'CURP con registro duplicado.' || "" );
                $($("#curp")).closest('.validar').addClass('was-error');
                $($("#curp")).parents()[1].append(error[0]);
            }
      }
    });
  }
  }


</script>
