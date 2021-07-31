/*=============================================
EDITAR CATEGORIA
=============================================*/
$(".tablas").on("click", ".btnEditarComprobante", function(){

	var idComprobante = $(this).attr("idComprobante");
	console.log("idComprobante", idComprobante);

	var datos = new FormData();
	datos.append("idComprobante", idComprobante);

	$.ajax({
		url: "ajax/comprobantes.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){
     		
     		console.log("respuesta", respuesta);

     		$("#editarRegistro").val(respuesta["numero"]);
     		$("#idComprobante").val(respuesta["id"]);
     		
			
     	}

	})


})

/*=============================================
EDITAR PARAMETROS
=============================================*/
$(".table").on("click", ".btnEditarParametro", function(){

    var idParametro = $(this).attr("idParametro");
    var nombreParametro = $(this).attr("nombreParametro");
    var valorParametro = $(this).attr("valorParametro");
    
    $("#idParametro").val(idParametro);
    $("#nombreParametro").val(nombreParametro);


    // if (valorParametro=='SI'){

    //     // $('select option[value="SI"]').attr("selected", true);
       $("#valorParametro").val(valorParametro);

    // }
    // if (valorParametro=='NO'){

    //     $("#valorParametro").val('NO');
    //     // $('select option[value="NO"]').attr("selected", true);

    // }
    // $("#valorParametro").val(valorParametro);
            

})
