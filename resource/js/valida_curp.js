$("#curp").keyup(function (){
  validarInput($(this));
});


function validarInput(input) {
	var curp = input.val().toUpperCase();
  $(".curp-error").remove();
  error = $( "<label >" )
    .attr( "id", "curp-error" )
    .addClass( 'error curp-error')
    .html( 'CURP no valido' || "" );

  if (curpValida(curp)) {
    $(input).closest('.validar').removeClass('was-error');
    sexo = curp.substring(10,11);
    $("#sexo").val((sexo=='M') ? 1 : 2);
    anyo = parseInt(curp.substring(4,6))+1900;
    if( anyo < 1950 ) anyo += 100;
    mes = curp.substring(6,8);
    dia = curp.substring(8,10);
    $("label[for=fnacimiento]").addClass('active');
    $("#fnacimiento").val(dia+'/'+mes+'/'+anyo);
    $("#fecha_nac").val(anyo+'-'+mes+'-'+dia);

    return true;
  } else {
    $(input).closest('.validar').addClass('was-error');
    $(input).parents()[1].append(error[0]);
    return false;
  }
}

function curpValida(curp) {
	var re = /^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0\d|1[0-2])(?:[0-2]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/,
    	validado = curp.match(re);

    if (!validado)  //Coincide con el formato general?
    	return false;

    //Validar que coincida el dígito verificador
    function digitoVerificador(curp17) {
        //Fuente https://consultas.curp.gob.mx/CurpSP/
        var diccionario  = "0123456789ABCDEFGHIJKLMNÑOPQRSTUVWXYZ",
            lngSuma      = 0.0,
            lngDigito    = 0.0;
        for(var i=0; i<17; i++)
            lngSuma= lngSuma + diccionario.indexOf(curp17.charAt(i)) * (18 - i);
        lngDigito = 10 - lngSuma % 10;
        if(lngDigito == 10)
            return 0;
        return lngDigito;
    }
    if (validado[2] != digitoVerificador(validado[1]))
    	return false;

	return true; //Validado
}
