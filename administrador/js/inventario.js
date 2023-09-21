 var tabla;
function init(){

	listar();
}

function activar(idinv){

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

		  $.post("../ajax/inventario.php?opc=activar", {idinv : idinv}, function(e){
		//	alert(e);
			tabla.ajax.reload();
		});	

		}
	  })

	
}
function anular(idinv){

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

		  $.post("../ajax/inventario.php?opc=anular", {idinv : idinv}, function(e){
		//	alert(e);
			tabla.ajax.reload();
		});	

		}
	  })
	
}
function mostrar(idinv){
	$("#exampleModal").modal('hide');
$.post("../ajax/inventario.php?opc=mostrar",{idinv : idinv}, function(data, status)
	{
		data = JSON.parse(data);		
		

		$("#idinventario").val(data.idinventario);
		$("#descripcion").val(data.descripcion);
 		$("#fecha_adq").val(data.fecha_adq);
		$("#recibido").val(data.recibido);
		$("#categoria").val(data.categoria);
		$("#estado").val(data.estado);
		$("#estatus_de_disponibilidad").val(data.estatus_de_disponibilidad);
		$("#ubicacion").val(data.ubicacion);
 		$("#responsable").val(data.responsable);
		$("#cantidad").val(data.cantidad);
		$("#comentarios").val(data.comentarios);
		$("#idinv").val(data.idinv);
        
 	})
}
function limpiar(){

        $("#idinventario").val("");
		$("#descripcion").val("");
 		$("#fecha_adq").val("");
		$("#recibido").val("");
		$("#categoria").val("");
		$("#estado").val("");
		$("#estatus_de_disponibilidad").val("");
		$("#ubicacion").val("");
 		$("#responsable").val("");
		$("#cantidad").val("");
		$("#comentarios").val("");
		$("#idinv").val("");

}
function guardarRegistro(){
	
	
	//e.preventDefault(); //No se activará la acción predeterminada del evento	
	var formData = new FormData($("#formulario")[0]);
	$.ajax({
		url: "../ajax/inventario.php?opc=guardaryeditar",
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
					url: '../ajax/inventario.php?opc=listar',
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


function mostrarPerfil(idinv) {
	$.post("../ajax/inventario.php?opc=mostrar", { idinv: idinv }, function (data, status) {
	  data = JSON.parse(data);
  
	  $("#modal-idinventario").text(data.idinventario);
	  $("#modal-descripcion").text(data.descripcion);
	  $("#modal-fecha_adq").text(data.fecha_adq);
	  $("#modal-recibido").text(data.recibido);
	  $("#modal-categoria").text(data.categoria);
	  $("#modal-estado").text(data.estado);
	  $("#modal-estatus_de_disponibilidad").text(data.estatus_de_disponibilidad);
	  $("#modal-ubicacion").text(data.ubicacion);
	  $("#modal-responsable").text(data.responsable);
	  $("#modal-cantidad").text(data.cantidad);
	  $("#modal-comentarios").text(data.comentarios);
  
	  $("#perfilModal").modal("show");
	});
  }

init();