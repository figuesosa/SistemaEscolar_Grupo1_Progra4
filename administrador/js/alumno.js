var tabla;
function init(){

	listar();

	$.post("../ajax/alumno.php?opc=aluid", function(r){
		$("#idestudiante").html(r);
		$("#idestudiante").selectpicker('refresh');
	});

	$.post("../ajax/alumno.php?opc=alunombre", function(r){
		$("#nombre").html(r);
		$("#nombre").selectpicker('refresh');
	});

	$.post("../ajax/alumno.php?opc=alugrado", function(r){
		$("#grado").html(r);
		$("#grado").selectpicker('refresh');
	});

	$.post("../ajax/alumno.php?opc=alujornada", function(r){
		$("#jornada").html(r);
		$("#jornada").selectpicker('refresh');
	});

	$.post("../ajax/alumno.php?opc=aluseccion", function(r){
		$("#seccion").html(r);
		$("#seccion").selectpicker('refresh');
	});

	$.post("../ajax/alumno.php?opc=alumaestro", function(r){
		$("#maestro").html(r);
		$("#maestro").selectpicker('refresh');
	});

	$.post("../ajax/alumno.php?opc=matriencargado", function(r){
		$("#encargadonombre").html(r);
		$("#encargadonombre").selectpicker('refresh');
	});
}
  

function activar(id){

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

		  $.post("../ajax/alumno.php?opc=activar", {id : id}, function(e){
		//	alert(e);
			tabla.ajax.reload();
		});	

		}
	  })

	
}
function anular(id){

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

		  $.post("../ajax/alumno.php?opc=anular", {id : id}, function(e){
		//	alert(e);
			tabla.ajax.reload();
		});	

		}
	  })
	
}
function mostrar(id){
	$("#exampleModal").modal('hide');
$.post("../ajax/alumno.php?opc=mostrar",{id : id}, function(data, status)
	{
		data = JSON.parse(data);		
		
		$("#idestudiante").val(data.idestudiante);
        $("#nombre").val(data.nombre);
        $("#grado").val(data.grado);
        $("#jornada").val(data.jornada);
        $("#seccion").val(data.seccion);
        $("#maestro").val(data.maestro);
        $("#encargadonombre").val(data.estado);
		$("#id").val(data.id); 
 	})
}
function limpiar(){

        $("#idestudiante").val("");
        $("#nombre").val("");
        $("#grado").val("");
        $("#jornada").val("");
        $("#seccion").val("");
        $("#maestro").val("");
        $("#encargadonombre").val("");
		$("#id").val("");


}
function guardarRegistro(){
	
	
	//e.preventDefault(); //No se activará la acción predeterminada del evento	
	var formData = new FormData($("#formulario")[0]);
	$.ajax({
		url: "../ajax/alumno.php?opc=guardaryeditar",
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
					url: '../ajax/alumno.php?opc=listar',
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

function mostrarPerfil(id) {
	$.post("../ajax/alumno.php?opc=mostrar", { id: id }, function (data, status) {
	  data = JSON.parse(data);
  
	  $("#modal-idestudiante").text(data.idestudiante);
	  $("#modal-nombre").text(data.nombre);
	  $("#modal-grado").text(data.grado);
	  $("#modal-jornada").text(data.jornada);
	  $("#modal-seccion").text(data.seccion);
	  $("#modal-maestro").text(data.maestro);
	  $("#modal-encargadonombre").text(data.encargadonombre);
  
	  $("#perfilModal").modal("show");
	});
  }
  



init();


  