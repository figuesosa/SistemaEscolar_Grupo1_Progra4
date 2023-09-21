
var tabla;
function init(){

	listar();

	$.post("../ajax/usuario.php?opc=permisos&id=",function(r){
		$("#permisos").html(r);
});


$.post("../ajax/usuario.php?opc=seleadminombre", function(r){
	$("#nombre").html(r);
	$("#nombre").selectpicker('refresh');
});


}

function activar(idusuario){


	Swal.fire({
		title: 'Esta seguro de activar el registro?',
		text: "No se podra revertir el estado",
		icon: 'question',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Sí, activar!'
	  }).then((result) => {
		if (result.isConfirmed) {
		  Swal.fire(
			'',
			'El registro fue activado',
			'success'
		  )

		  $.post("../ajax/usuario.php?opc=activar", {idusuario : idusuario}, function(e){
		//	alert(e);
			tabla.ajax.reload();
		});	

		}
	  })
	
}
function anular(idusuario){

	Swal.fire({
		title: 'Esta seguro de anular?',
		text: "No se podra revertir el estado",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Sí, anular!'
	  }).then((result) => {
		if (result.isConfirmed) {
		  Swal.fire(
			'Deleted!',
			'El registro fue anulado',
			'success'
		  )

		  $.post("../ajax/usuario.php?opc=anular", {idusuario : idusuario}, function(e){
		//	alert(e);
			tabla.ajax.reload();
		});	

		}
	  })

	
}
function mostrar(idusuario){
	$("#exampleModal").modal('hide');

$.post("../ajax/usuario.php?opc=mostrar",{idusuario : idusuario}, function(data, status)
	{
		data = JSON.parse(data);		
		

		$("#nombre").val(data.nombre);
		$("#email").val(data.email);
 		$("#cargo").val(data.cargo);
		$("#login").val(data.login);
		$("#clave").val(data.clave);
		$("#condicion").val(data.condicion);
 	//	$("#estante").val(data.estante);
	 

 	})
}
function limpiar(){

	$("#nombre").val("");
	$("#email").val("");
	$("#cargo").val("");
	$("#login").val("");
	$("#clave").val("");
	$("#condicion").val("");
 	

}

function guardarRegistro(){
	//e.preventDefault(); //No se activará la acción predeterminada del evento	
	var formData = new FormData($("#formulario")[0]);
	$.ajax({
		url: "../ajax/usuario.php?opc=guardaryeditar",
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
					url: '../ajax/usuario.php?opc=listar',
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

function validarClave() {
    var claveInput = document.getElementById('clave');
    var mensajeClave = document.getElementById('mensajeClave');
    var clave = claveInput.value;
    
    // Expresión regular para validar la clave
    var regex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
    
    if (regex.test(clave)) {
        // La clave cumple con los requisitos
        mensajeClave.textContent = "";
    } else {
        // La clave no cumple con los requisitos
        mensajeClave.textContent = "La contraseña no cumple con los requisitos";
    }
}


function mostrarPerfil(idusuario) {
	$.post("../ajax/usuario.php?opc=mostrar", { idusuario: idusuario }, function (data, status) {
	  data = JSON.parse(data);
  
	  $("#modal-nombre").text(data.nombre);
	  $("#modal-email").text(data.email);
	  $("#modal-cargo").text(data.cargo);
	  $("#modal-login").text(data.login);
	 // $("#modal-clave").text(data.clave);
  
	  $("#perfilModal").modal("show");
	});


  }



init();