var tabla;
function init(){

	listar();
}
  

function activar(iduser){

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

		  $.post("../ajax/administrativos.php?opc=activar", {iduser : iduser}, function(e){
		//	alert(e);
			tabla.ajax.reload();
		});	

		}
	  })

	
}
function anular(iduser){

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

		  $.post("../ajax/administrativos.php?opc=anular", {iduser : iduser}, function(e){
		//	alert(e);
			tabla.ajax.reload();
		});	

		}
	  })
	
}
function mostrar(iduser){
	$("#exampleModal").modal('hide');
$.post("../ajax/administrativos.php?opc=mostrar",{iduser : iduser}, function(data, status)
	{
		data = JSON.parse(data);		
		
		$("#nombre").val(data.nombre);
        $("#dni").val(data.dni);
        $("#fecha_nac").val(data.fecha_nac);
        $("#edad").val(data.edad);
        $("#genero").val(data.genero);
        $("#cargo").val(data.cargo);
        $("#ocupacion").val(data.estado);
        $("#nivel_estudios").val(data.nivel_estudios);
        $("#telefono").val(data.telefono);
        $("#direccion").val(data.direccion);
		$("#email").val(data.email);
        $("#observaciones").val(data.observaciones);
		$("#iduser").val(data.iduser); 
 	})
}
function limpiar(){

        $("#nombre").val("");
        $("#dni").val("");
        $("#fecha_nac").val("");
        $("#edad").val("");
        $("#genero").val("");
        $("#cargo").val("");
        $("#ocupacion").val("");
        $("#nivel_estudios").val("");
        $("#telefono").val("");
        $("#direccion").val("");
		$("#email").val("");
        $("#observaciones").val("");
		$("#iduser").val("");


}
function guardarRegistro(){
	
	
	//e.preventDefault(); //No se activará la acción predeterminada del evento	
	var formData = new FormData($("#formulario")[0]);
	$.ajax({
		url: "../ajax/administrativos.php?opc=guardaryeditar",
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
					url: '../ajax/administrativos.php?opc=listar',
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

function mostrarPerfil(iduser) {
	$.post("../ajax/administrativos.php?opc=mostrar", { iduser: iduser }, function (data, status) {
	  data = JSON.parse(data);
  
	  $("#modal-nombre").text(data.nombre);
	  $("#modal-dni").text(data.dni);
	  $("#modal-fecha_nac").text(data.fecha_nac);
	  $("#modal-edad").text(data.edad);
	  $("#modal-genero").text(data.genero);
	  $("#modal-cargo").text(data.cargo);
	  $("#modal-ocupacion").text(data.ocupacion);
	  $("#modal-nivel_estudios").text(data.nivel_estudios);
	  $("#modal-telefono").text(data.telefono);
	  $("#modal-direccion").text(data.direccion);
	  $("#modal-email").text(data.email);
	  $("#modal-observaciones").text(data.observaciones);
  
	  $("#perfilModal").modal("show");
	});
  }
  



init();


  