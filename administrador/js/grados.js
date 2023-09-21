var tabla;
function init(){

	listar();


	$.post("../ajax/grados.php?opc=gradomaestro", function(r){
		$("#maestro").html(r);
		$("#maestro").selectpicker('refresh');
	});
}
  

function activar(idg){

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

		  $.post("../ajax/grados.php?opc=activar", {idg : idg}, function(e){
		//	alert(e);
			tabla.ajax.reload();
		});	

		}
	  })

	
}
function anular(idg){

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

		  $.post("../ajax/grados.php?opc=anular", {idg : idg}, function(e){
		//	alert(e);
			tabla.ajax.reload();
		});	

		}
	  })
	
}
function mostrar(idg){
	$("#exampleModal").modal('hide');
$.post("../ajax/grados.php?opc=mostrar",{idg : idg}, function(data, status)
	{
		data = JSON.parse(data);		
		
		$("#grado").val(data.grado);
        $("#seccion").val(data.seccion);
        $("#jornada").val(data.jornada);
        $("#maestro").val(data.maestro);
		$("#idg").val(data.idg); 
 	})
}
function limpiar(){

        $("#grado").val("");
        $("#seccion").val("");
        $("#jornada").val("");
        $("#maestro").val("");
		$("#idg").val("");


}
function guardarRegistro(){
	
	
	//e.preventDefault(); //No se activará la acción predeterminada del evento	
	var formData = new FormData($("#formulario")[0]);
	$.ajax({
		url: "../ajax/grados.php?opc=guardaryeditar",
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
					url: '../ajax/grados.php?opc=listar',
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

function mostrarPerfil(idg) {
	$.post("../ajax/grados.php?opc=mostrar", { idg: idg }, function (data, status) {
	  data = JSON.parse(data);
  
	  $("#modal-grado").text(data.grado);
	  $("#modal-seccion").text(data.seccion);
      $("#modal-jornada").text(data.jornada);
      $("#modal-maestro").text(data.maestro);
  
	  $("#perfilModal").modal("show");
	});
  }
  



init();


  