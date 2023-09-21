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
  <span style="font-size: 50px; color: black;">Alumnos</span>
</div>   
    </div>
        <div class="card-body">

      
                <table id="tbllistado" class="table table-striped"> 
                  <thead>
                  <tr>
                    <th>ID_Alumno</th>
                    <th>Nombre</th>
                    <th>Grado</th>
                    <th>Maestro</th>
                    <th>Encargado</th>
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
                  <th>ID_Alumno</th>
                    <th>Nombre</th>
                    <th>Grado</th>
                    <th>Maestro</th>
                    <th>Encargado</th>
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
        <h5 class="modal-title">ALUMNOS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <div class="modal-body">
    <form id="formulario" name="formulario">

    <div class="row">
    <div class="col-md-4">
            <input type="hidden" name="id" id="id" class="form-control" value="">
            <label>ID_Alumno:</label>
            <select id="idestudiante" name="idestudiante" class="form-control select2" style="width: 100%;"> </select>
        </div>

        <div class="col-md-8">
            <label>Nombre:</label>
            <select id="nombre" name="nombre" class="form-control select2" style="width: 100%;"> </select>
        </div>

        <div class="col-md-4"> 
            <label>Grado:</label>
            <select id="grado" name="grado" class="form-control select2" style="width: 100%;"> </select>
        </div>

        <div class="col-md-4">
            <label>Jornada:</label>
            <select id="jornada" name="jornada" class="form-control select2" style="width: 100%;"> </select>
        </div>

        <div class="col-md-4"> 
            <label>Seccion:</label>
            <select id="seccion" name="seccion" class="form-control select2" style="width: 100%;"> </select> 
        </div>
    
        <div class="col-md-4"> 
          <label>Profesor:</label>
          <select id="maestro" name="maestro" class="form-control select2" style="width: 100%;"> </select>
        </div>

        <div class="col-md-4"> 
          <label>Nombre del encargado:</label>
          <select id="encargadonombre" name="encargadonombre" class="form-control select2" style="width: 100%;"> </select>
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
        <h5 class="modal-title" id="perfilModalLabel">Perfil del Alumno</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p><strong>ID del alumno:</strong> <span id="modal-idestudiante"></span></p>
        <p><strong>Nombre Completo:</strong> <span id="modal-nombre"></span></p>
        <p><strong>Grado:</strong> <span id="modal-grado"></span></p>
        <p><strong>Jornada:</strong> <span id="modal-jornada"></span></p>
        <p><strong>Seccion:</strong> <span id="modal-seccion"></span></p>
        <p><strong>Profesor:</strong> <span id="modal-maestro"></span></p>
        <p><strong>Nombre del encargado:</strong> <span id="modal-encargadonombre"></span></p>
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
<select id="nombre" name="nombre" class="form-control select2" style="width: 100%;"> </select>
<script src="ruta/a/select2.min.js"></script>
<script>
    $(document).ready(function () {
        $('.select2').select2();
    });
</script>

<script type="text/javascript" src="js/alumno.js"></script>






