var tabla;
function init(){

	listar();

    $.post("../ajax/pago.php?opc=clientenombre", function(r){
        $("#nombrecliente").html(r);
        $("#nombrecliente").selectpicker('refresh');
    });
}
  

function activar(idpa){

	Swal.fire({
		title: 'Esta seguro de activar el registro?',
		text: "No se podra revertir el estado",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Sí, activar!'
	  }).then((result) => {
		if (result.isConfirmed) {
		  Swal.fire(
			'Activado!',
			'El registro fue activado',
			'success'
		  )

		  $.post("../ajax/pago.php?opc=activar", {idpa : idpa}, function(e){
		//	alert(e);
			tabla.ajax.reload();
		});	

		}
	  })

	
}
function anular(idpa){

	Swal.fire({
		title: 'Esta seguro de anular el registro?',
		text: "No se podra revertir el estado",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Sí, anular!'
	  }).then((result) => {
		if (result.isConfirmed) {
		  Swal.fire(
			'Anulado!',
			'El registro fue anulado',
			'success'
		  )

		  $.post("../ajax/pago.php?opc=anular", {idpa : idpa}, function(e){
		//	alert(e);
			tabla.ajax.reload();
		});	

		}
	  })
	
}
function mostrar(idpa){
	$("#exampleModal").modal('hide');
$.post("../ajax/pago.php?opc=mostrar",{idpa : idpa}, function(data, status)
	{
		data = JSON.parse(data);		
		
		$("#nombrecliente").val(data.nombrecliente);
        $("#FechaEmision").val(data.FechaEmision);
        $("#descripcion").val(data.descripcion);
        $("#cantidadapagar").val(data.cantidadapagar);
        $("#numerodealumnos").val(data.numerodealumnos);
        $("#tipopago").val(data.tipopago);
        $("#cantidadrecibido").val(data.estado);
        $("#cambio").val(data.cambio);
        $("#Descuento").val(data.Descuento);
        $("#SubTotal").val(data.SubTotal);
		$("#Total").val(data.Total);
		$("#idpa").val(data.idpa); 
 	})
}
function limpiar(){

        $("#nombrecliente").val("");
        $("#FechaEmision").val("");
        $("#descripcion").val("");
        $("#cantidadapagar").val("");
        $("#numerodealumnos").val("");
        $("#tipopago").val("");
        $("#cantidadrecibido").val("");
        $("#cambio").val("");
        $("#Descuento").val("");
        $("#SubTotal").val("");
		$("#Total").val("");
		$("#idpa").val("");


}
function guardarRegistro(){
	
	
	//e.preventDefault(); //No se activará la acción predeterminada del evento	
	var formData = new FormData($("#formulario")[0]);
	$.ajax({
		url: "../ajax/pago.php?opc=guardaryeditar",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,

	    success: function(datos)
	    {                    
	         alert(datos);	          	          
	          tabla.ajax.reload();
	    }

	});

	limpiar();
	listar();
	$("#exampleModal").modal('hide');
}

/*tbllistado*/
function listar(){

	tabla=$('#tbllistado').dataTable(
    {
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: 'Bfrtip',//Definimos los elementos del control de tabla
	    buttons: [		          
		       'copyHtml5','excelHtml5','csvHtml5','pdf'
		        ],
		"ajax":
				{
					url: '../ajax/pago.php?opc=listar',
					type : "get",
					dataType : "json",						
					error: function(e){
						console.log(e.responseText);	
					}
				},
		"bDestroy": true,
        "paging": false,
		
	    "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
	}).DataTable();
	

}

function mostrarPerfil(idpa) {
	$.post("../ajax/pago.php?opc=mostrar", { idpa: idpa }, function (data, status) {
	  data = JSON.parse(data);
  
	  $("#modal-nombrecliente").text(data.nombrecliente);
	  $("#modal-FechaEmision").text(data.FechaEmision);
	  $("#modal-descripcion").text(data.descripcion);
	  $("#modal-cantidadapagar").text(data.cantidadapagar);
	  $("#modal-numerodealumnos").text(data.numerodealumnos);
	  $("#modal-tipopago").text(data.tipopago);
	  $("#modal-cantidadrecibido").text(data.cantidadrecibido);
	  $("#modal-cambio").text(data.cambio);
	  $("#modal-Descuento").text(data.Descuento);
	  $("#modal-SubTotal").text(data.SubTotal);
	  $("#modal-Total").text(data.Total);
  
	  $("#perfilModal").modal("show");
	});
  }
  



init();


  