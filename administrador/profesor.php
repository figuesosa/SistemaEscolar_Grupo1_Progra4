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
          <span style="font-size: 50px; color: black;">Profesores</span>
      </div>
  </div>
        <div class="card-body">

      
                <table id="tbllistado" class="table table-striped"> 
                  <thead>
                  <tr>
                    <th>Nombre Completo</th>
                    <th>Grado</th>
                    <th>Seccion</th>
                    <th>Correo</th>
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
                  <th>Nombre Completo</th>
                    <th>Grado</th>
                    <th>Seccion</th>
                    <th>Correo</th>
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
        <h5 class="modal-title">PROFESORES</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <div class="modal-body">
    <form id="formulario" name="formulario">

    <div class="row">
        <div class="col-md-7"> 
        <input type="hidden" name="idp" id="idp" class="form-control" value="">
            <label>Nombre_Completo:</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="" required="required" pattern="" title="">
        </div>

        <div class="col-md-5"> 
            <label>DNI:</label>
            <input type="text" name="dni" id="dni" class="form-control" value="" required="required" pattern="" title="">
        </div>

        <div class="col-md-4"> 
            <label>Fecha_nac:</label>
            <input type="date" name="fecha_nac" id="fecha_nac" class="form-control" value="" required="required" pattern="" title="">
        </div>

        <div class="col-md-4">
            <label>Edad:</label>
            <input type="text" name="edad" id="edad" class="form-control" value="" required="required" pattern="" title="">
        </div>


        <div class="col-md-4"> 
          <label>Genero:</label>
            <select name="genero" id="genero" class="form-control select2" value="" required="required" pattern="" title="">
        <option value="Femenino">Femenino</option>
        <option value="Masculino">Masculino</option>
        <option value="Prefiero no decirlo">Prefiero no decirlo</option>
        <option value="Seleccionar" select >Seleccionar</option>
        </select> 
        </div>

        <div class="col-md-4"> 
            <label>Area:</label>
            <input type="text" name="area" id="area" class="form-control" value="" required="required" pattern="" title="">
        </div>

        <div class="col-md-4">
            <label>Grado:</label>
            <select id="grado" name="grado" class="form-control select2" style="width: 100%;"> </select>
        </div>


        <div class="col-md-4">
            <label>Seccion:</label>
            <select id="seccion" name="seccion" class="form-control select2" style="width: 100%;"> </select>
        </div>

        <div class="col-md-6"> 
            <label>E-mail:</label>
            <input type="text" name="email" id="email" class="form-control" value="" required="required" pattern="" title="">
        </div>

        <div class="col-md-6"> 
            <label>Telefono:</label>
            <input type="text" name="telefono" id="telefono" class="form-control" value="" required="required" pattern="" title="">
        </div>

        <div class="col-md-6"> 
            <label>Direccion:</label>
            <input type="text" name="direccion" id="direccion" class="form-control" value="" required="required" pattern="" title="">
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
        <h5 class="modal-title" id="perfilModalLabel">Perfil del Profesor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p><strong>Nombre Completo:</strong> <span id="modal-nombre"></span></p>
        <p><strong>DNI:</strong> <span id="modal-dni"></span></p>
        <p><strong>Fecha de nacimiento:</strong> <span id="modal-fecha_nac"></span></p>
        <p><strong>Edad:</strong> <span id="modal-edad"></span></p>
        <p><strong>Genero:</strong> <span id="modal-genero"></span></p>
        <p><strong>Area:</strong> <span id="modal-area"></span></p>
        <p><strong>Grado:</strong> <span id="modal-grado"></span></p>
        <p><strong>Seccion:</strong> <span id="modal-seccion"></span></p>
        <p><strong>Email:</strong> <span id="modal-email"></span></p>
        <p><strong>Telefono:</strong> <span id="modal-telefono"></span></p>
        <p><strong>Direccion:</strong> <span id="modal-direccion"></span></p>
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

<script type="text/javascript" src="js/profesor.js"></script>






