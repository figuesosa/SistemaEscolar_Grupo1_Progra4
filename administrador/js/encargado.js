var tabla;
function init(){

	listar();

	$.post("../ajax/encargado.php?opc=matrinombre", function(r){
		$("#nombre").html(r);
		$("#nombre").selectpicker('refresh');
	});

	$.post("../ajax/encargado.php?opc=matridni", function(r){
		$("#dni").html(r);
		$("#dni").selectpicker('refresh');
	});

	$.post("../ajax/encargado.php?opc=matriparentesco", function(r){
		$("#parentesco").html(r);
		$("#parentesco").selectpicker('refresh');
	});

	$.post("../ajax/encargado.php?opc=matrialumno", function(r){
		$("#alumno").html(r);
		$("#alumno").selectpicker('refresh');
	});

	$.post("../ajax/encargado.php?opc=matridireccion", function(r){
		$("#direccion").html(r);
		$("#direccion").selectpicker('refresh');
	});

	$.post("../ajax/encargado.php?opc=matritelefono", function(r){
		$("#telefono").html(r);
		$("#telefono").selectpicker('refresh');
	});

	$.post("../ajax/encargado.php?opc=matriemail", function(r){
		$("#email").html(r);
		$("#email").selectpicker('refresh');
	});
}
  

function activar(ide){

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

		  $.post("../ajax/encargado.php?opc=activar", {ide : ide}, function(e){
		//	alert(e);
			tabla.ajax.reload();
		});	

		}
	  })

	
}
function anular(ide){

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

		  $.post("../ajax/encargado.php?opc=anular", {ide : ide}, function(e){
		//	alert(e);
			tabla.ajax.reload();
		});	

		}
	  })
	
}
function mostrar(ide){
	$("#exampleModal").modal('hide');
$.post("../ajax/encargado.php?opc=mostrar",{ide : ide}, function(data, status)
	{
		data = JSON.parse(data);		
		
		$("#nombre").val(data.nombre);
        $("#dni").val(data.dni);
        $("#parentesco").val(data.parentesco);
        $("#alumno").val(data.alumno);
        $("#direccion").val(data.direccion);
        $("#telefono").val(data.telefono);
		$("#email").val(data.email);
		$("#ide").val(data.ide); 
 	})
}
function limpiar(){

        $("#nombre").val("");
        $("#dni").val("");
        $("#parentesco").val("");
        $("#alumno").val("");
        $("#direccion").val("");
        $("#telefono").val("");
		$("#email").val("");
		$("#ide").val(""); 

}

function guardarRegistro(){
	
	//e.preventDefault(); //No se activará la acción predeterminada del evento	
	var formData = new FormData($("#formulario")[0]);
	$.ajax({
		url: "../ajax/encargado.php?opc=guardaryeditar",
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
					url: '../ajax/encargado.php?opc=listar',
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

function mostrarPerfil(ide) {
	$.post("../ajax/encargado.php?opc=mostrar", { ide: ide }, function (data, status) {
	  data = JSON.parse(data);
  
	  $("#modal-nombre").text(data.nombre);
	  $("#modal-dni").text(data.dni);
	  $("#modal-parentesco").text(data.parentesco);
	  $("#modal-alumno").text(data.alumno);
      $("#modal-direccion").text(data.direccion);
	  $("#modal-telefono").text(data.telefono);
	  $("#modal-email").text(data.email);

  
	  $("#perfilModal").modal("show");
	});
  }
  



init();


  