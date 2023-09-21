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
          <span style="font-size: 50px; color: black;">Grados</span>
      </div>
  </div>
        <div class="card-body">
                <table id="tbllistado" class="table table-striped"> 
                  <thead>
                  <tr>
                    <th>Grado</th>
                    <th>Seccion</th>
                    <th>Jornada</th>
                    <th>Maestro</th>
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
                  <th>Grado</th>
                    <th>Seccion</th>
                    <th>Jornada</th>
                    <th>Maestro</th>
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
        <h5 class="modal-title">GRADOS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <div class="modal-body">
    <form id="formulario" name="formulario">
    <div class="row">
        <div class="col-md-6"> 
        <input type="hidden" name="idg" id="idg" class="form-control" value="">
          <label>Grado:</label>
        <select name="grado" id="grado" class="form-control" value="" required="required" pattern="" title="">
        <option value="Primero">Primero</option>
        <option value="Segundo">Segundo</option>
        <option value="Tercero">Tercero</option>
        <option value="Cuarto">Cuarto</option>
        <option value="Quinto">Quinto</option>
        <option value="Sexto">Sexto</option>
        <option value="Seleccionar" select >Seleccionar</option>
        </select> 
        </div>

        <div class="col-md-6"> 
          <label>Seccion:</label>
        <select name="seccion" id="seccion" class="form-control" value="" required="required" pattern="" title="">
        <option value="A">A</option>
        <option value="B">B</option>
        <option value="Seleccionar" select >Seleccionar</option>
        </select> 
        </div>

        <div class="col-md-6"> 
          <label>Jornada:</label>
        <select name="jornada" id="jornada" class="form-control" value="" required="required" pattern="" title="">
        <option value="Matutina">Matutina</option>
        <option value="Vespertina">Vespertina</option>
        <option value="Seleccionar" select >Seleccionar</option>
        </select> 
        </div>

        <div class="col-md-6"> 
            <label>Maestro:</label>
            <select id="maestro" name="maestro" class="form-control select2" style="width: 100%;"> </select>
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


<!-- Modal para mostrar perfil -->
<div class="modal fade" id="perfilModal" tabindex="-1" role="dialog" aria-labelledby="perfilModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="perfilModalLabel">Perfil del Grado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p><strong>Grado:</strong> <span id="modal-grado"></span></p>
        <p><strong>Seccion:</strong> <span id="modal-seccion"></span></p>
        <p><strong>Jornada:</strong> <span id="modal-jornada"></span></p>
        <p><strong>Maestro:</strong> <span id="modal-maestro"></span></p>
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

<script type="text/javascript" src="js/grados.js"></script>

