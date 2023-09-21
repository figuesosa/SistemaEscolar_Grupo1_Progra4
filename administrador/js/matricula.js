var tabla;
function init(){

	listar();
}
  

function activar(idalu){

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

		  $.post("../ajax/matricula.php?opc=activar", {idalu : idalu}, function(e){
		//	alert(e);
			tabla.ajax.reload();
		});	

		}
	  })

	
}
function anular(idalu){

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

		  $.post("../ajax/matricula.php?opc=anular", {idalu : idalu}, function(e){
		//	alert(e);
			tabla.ajax.reload();
		});	

		}
	  })
	
}
function mostrar(idalu){
	$("#exampleModal").modal('hide');
$.post("../ajax/matricula.php?opc=mostrar",{idalu : idalu}, function(data, status)
	{
		data = JSON.parse(data);		
		
		$("#idalumno").val(data.idalumno);
        $("#nombre").val(data.nombre);
        $("#fecha_nac").val(data.fecha_nac);
        $("#edad").val(data.edad);
        $("#sexo").val(data.sexo);
        $("#grado").val(data.grado);
        $("#jornada").val(data.estado);
        $("#encargado").val(data.encargado);
        $("#parentesco").val(data.parentesco);
        $("#idencargado").val(data.idencargado);
		$("#direccion").val(data.direccion);
        $("#telefono").val(data.telefono);
        $("#correo").val(data.correo);
		$("#idalu").val(data.idalu); 
 	})
}
function limpiar(){

        $("#idalumno").val("");
        $("#nombre").val("");
        $("#fecha_nac").val("");
        $("#edad").val("");
        $("#sexo").val("");
        $("#grado").val("");
        $("#jornada").val("");
        $("#encargado").val("");
        $("#parentesco").val("");
        $("#idencargado").val("");
		$("#direccion").val("");
        $("#telefono").val("");
        $("#correo").val("");
		$("#idalu").val("");


}
function guardarRegistro(){
	
	
	//e.preventDefault(); //No se activará la acción predeterminada del evento	
	var formData = new FormData($("#formulario")[0]);
	$.ajax({
		url: "../ajax/matricula.php?opc=guardaryeditar",
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
					url: '../ajax/matricula.php?opc=listar',
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

function mostrarPerfil(idalu) {
	$.post("../ajax/matricula.php?opc=mostrar", { idalu: idalu }, function (data, status) {
	  data = JSON.parse(data);
  
	  $("#modal-idalumno").text(data.idalumno);
	  $("#modal-nombre").text(data.nombre);
	  $("#modal-fecha_nac").text(data.fecha_nac);
	  $("#modal-edad").text(data.edad);
	  $("#modal-sexo").text(data.sexo);
	  $("#modal-grado").text(data.grado);
	  $("#modal-jornada").text(data.jornada);
      $("#modal-encargado").text(data.encargado);
	  $("#modal-parentesco").text(data.parentesco);
	  $("#modal-idencargado").text(data.idencargado);
	  $("#modal-direccion").text(data.direccion);
	  $("#modal-telefono").text(data.telefono);
      $("#modal-correo").text(data.correo);
  
	  $("#perfilModal").modal("show");
	});
  }
  



init();


  