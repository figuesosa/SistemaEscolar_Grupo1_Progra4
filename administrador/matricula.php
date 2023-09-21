
<?php
 require 'headadmi.php';

?>

<div class="content-wrapper">        
        <!-- Main content -->
        <section class="content">
        <div class="card">
        <div class="card-header">
      <button type="button" class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-lg">Nuevo Registro<i class="fa fa-user" aria-hidden="true"></i> </button> 
      <div style="text-align: center;">
          <span style="font-size: 50px; color: black;">Matricula</span>
      </div>
  </div>
        <div class="card-body">

      
                <table id="tbllistado" class="table table-striped"> 
                  <thead>
                  <tr>
                     <th>ID Alumno</th>
                    <th>Nombre Completo</th>
                    <th>Grado</th>
                    <th>Nombre encargado</th>
                    <th>Parentesco</th>
                    <th>Telefono</th>
                    <th>Estado</th>
                    <th>Opciones</th>
                   
                  </tr>
                </thead>
                  <tbody>
                  <tr>
                  <tr>
 
                    <th>Rendering engine</th>
                    <th>Browser</th>
                  </tr>
                  
</tbody>
<tfooter>
                  <tr>
                  <th>ID Alumno</th>
                    <th>Nombre Completo</th>
                    <th>Grado</th>
                    <th>Nombre encargado</th>
                    <th>Parentesco</th>
                    <th>Telefono</th>
                    <th>Estado</th>
                    <th>Opciones</th>
                  </tr>
                </tfooter>
                          
</table>

  </div>
</div>

</section>
</div>
<script>
  $(function () {
    $("#tbllistado").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#tbllistado_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>


<!-- Large modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

    <div class="modal-header">
        <h5 class="modal-title">MATRICULA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <div class="modal-body">
    <form id="formulario" name="formulario">

    <div class="row">
        <div class="col-md-6">
        <input type="hidden" name="idalu" id="idalu" class="form-control" value="">
            <label>ID_Alumno:</label>
                <input type="text" name="idalumno" id="idalumno" class="form-control" value="" required="required" pattern="" title="">
        </div>

        <div class="col-md-6"> 
            <label>Nombre_Completo:</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="" required="required" pattern="" title="">
        </div>

        <div class="col-md-6"> 
            <label>Fecha_nac:</label>
            <input type="date" name="fecha_nac" id="fecha_nac" class="form-control" value="" required="required" pattern="" title="">
        </div>
        

        <div class="col-md-6">
            <label>Edad:</label>
            <input type="text" name="edad" id="edad" class="form-control" value="" required="required" pattern="" title="">
        </div>

        <div class="col-md-6"> 
          <label>Sexo:</label>
            <select type="text" name="sexo" id="sexo" class="form-control" value="" required="required" pattern="" title="">
        <option value="Femenino">Femenino</option>
        <option value="Masculino">Masculino</option>
        <option value="Otro">Otro</option>
        <option value="seleccione" selected>Seleccione</option>
        </select>
        </div>

        <div class="col-md-6">
            <label>Grado:</label>
            <select id="grado" name="grado" class="form-control select2" style="width: 100%;"> </select>
        </div>

        <div class="col-md-6">
            <label>Jornada:</label>
            <select id="jornada" name="jornada" class="form-control select2" style="width: 100%;"> </select>
        </div>


        <div class="col-md-6">
            <label>Nombre_encargado:</label>
            <input type="text" name="encargado" id="encargado" class="form-control" value="" required="required" pattern="" title="">
        </div>

        <div class="col-md-6"> 
            <label>Parentesco:</label>
            <input type="text" name="parentesco" id="parentesco" class="form-control" value="" required="required" pattern="" title="">
        </div>

        <div class="col-md-6">
            <label>ID_encargado:</label>
            <input type="text" name="idencargado" id="idencargado" class="form-control" value="" required="required" pattern="" title="">
        </div>

        <div class="col-md-6"> 
            <label>Direccion:</label>
            <input type="text" name="direccion" id="direccion" class="form-control" value="" required="required" pattern="" title="">
        </div>

            <div class="col-md-6">
            <label>Telefono:</label>
                <input type="text" name="telefono" id="telefono" class="form-control" value="" required="required" pattern="" title="">
        </div>

        <div class="col-md-6"> 
        <label>Correo:</label>
            <input type="text" name="correo" id="correo" class="form-control" value="" required="required" pattern="" title="">
            </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"> <i class="fas fa-door-closed    "></i> </button>
        <button type="button" onclick="guardarRegistro();" class="btn btn-primary"> <i class="fas fa-save"></i> Registrar </button>
    </div>
</form>
</div>
    </div>
  </div>
</div>

<!-- Large modal FIN-->


<!-- Modal para mostrar perfil -->
<div class="modal fade" id="perfilModal" tabindex="-1" role="dialog" aria-labelledby="perfilModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="perfilModalLabel">Perfil de Administrativo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p><strong>ID Alumno:</strong> <span id="modal-idalumno"></span></p>
        <p><strong>Nombre del alumno:</strong> <span id="modal-nombre"></span></p>
        <p><strong>Fecha de nacimiento:</strong> <span id="modal-fecha_nac"></span></p>
        <p><strong>Edad:</strong> <span id="modal-edad"></span></p>
        <p><strong>Genero:</strong> <span id="modal-sexo"></span></p>
        <p><strong>Grado:</strong> <span id="modal-grado"></span></p>
        <p><strong>Jornada:</strong> <span id="modal-jornada"></span></p>
        <p><strong>Nombre del Encargado:</strong> <span id="modal-encargado"></span></p>
        <p><strong>Parentesco:</strong> <span id="modal-parentesco"></span></p>
        <p><strong>DNI Encargado:</strong> <span id="modal-idencargado"></span></p>
        <p><strong>Direccion:</strong> <span id="modal-direccion"></span></p>
        <p><strong>Telefono:</strong> <span id="modal-telefono"></span></p>
        <p><strong>Correo:</strong> <span id="modal-correo"></span></p>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal para mostrar perfil -->

<?php
 require 'footer.php';

?>

<script src="ruta/a/select2.min.js"></script>
<script>
    $(document).ready(function () {
        $('.select2').select2();
    });
</script>

<script type="text/javascript" src="js/matricula.js"></script>








