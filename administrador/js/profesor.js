var tabla;
function init(){

	listar();

    $.post("../ajax/profesor.php?opc=seleprofegrado", function(r){
        $("#grado").html(r);
        $("#grado").selectpicker('refresh');
    });
    

    $.post("../ajax/profesor.php?opc=seleprofeseccion", function(r){
        $("#seccion").html(r);
        $("#seccion").selectpicker('refresh');
    });
}
  

function activar(idp){

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

		  $.post("../ajax/profesor.php?opc=activar", {idp : idp}, function(e){
		//	alert(e);
			tabla.ajax.reload();
		});	

		}
	  })

	
}
function anular(idp){

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

		  $.post("../ajax/profesor.php?opc=anular", {idp : idp}, function(e){
		//	alert(e);
			tabla.ajax.reload();
		});	

		}
	  })
	
}
function mostrar(idp){
	$("#exampleModal").modal('hide');
$.post("../ajax/profesor.php?opc=mostrar",{idp : idp}, function(data, status)
	{
		data = JSON.parse(data);		
		
		$("#nombre").val(data.nombre);
        $("#dni").val(data.dni);
        $("#fecha_nac").val(data.fecha_nac);
        $("#edad").val(data.edad);
        $("#genero").val(data.genero);
        $("#area").val(data.area);
        $("#grado").val(data.grado);
        $("#seccion").val(data.seccion);
        $("#email").val(data.email);
        $("#telefono").val(data.telefono);
        $("#direccion").val(data.direccion);
        $("#idp").val(data.idp);

 	})
}
function limpiar(){

        $("#nombre").val("");
        $("#dni").val("");
        $("#fecha_nac").val("");
        $("#edad").val("");
        $("#genero").val("");
        $("#area").val("");
        $("#grado").val("");
        $("#seccion").val("");
        $("#email").val("");
        $("#telefono").val("");
		$("#direccion").val("");
		$("#idp").val("");


}
function guardarRegistro(){
	var formData = new FormData($("#formulario")[0]);
	$.ajax({
		url: "../ajax/profesor.php?opc=guardaryeditar",
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

function listar(){

	tabla=$('#tbllistado').dataTable(
    {
		"aProcessing": true,
	    "aServerSide": true,
	    dom: 'Bfrtip',
	    buttons: [		          
		       'copyHtml5','excelHtml5','csvHtml5','pdf'
		        ],
		"ajax":
				{
					url: '../ajax/profesor.php?opc=listar',
					type : "get",
					dataType : "json",						
					error: function(e){
						console.log(e.responseText);	
					}
				},
		"bDestroy": true,
        "paging": false,
		
	    "order": [[ 0, "desc" ]]
	}).DataTable();
	

}

function mostrarPerfil(idp) {
	$.post("../ajax/profesor.php?opc=mostrar", { idp: idp }, function (data, status) {
	  data = JSON.parse(data);
  
	  $("#modal-nombre").text(data.nombre);
	  $("#modal-dni").text(data.dni);
	  $("#modal-fecha_nac").text(data.fecha_nac);
	  $("#modal-edad").text(data.edad);
	  $("#modal-genero").text(data.genero);
	  $("#modal-area").text(data.area);
	  $("#modal-grado").text(data.grado);
	  $("#modal-seccion").text(data.seccion);
	  $("#modal-email").text(data.email);
	  $("#modal-telefono").text(data.telefono);
	  $("#modal-direccion").text(data.direccion);
  
	  $("#perfilModal").modal("show");
	});
  }
  



init();


  