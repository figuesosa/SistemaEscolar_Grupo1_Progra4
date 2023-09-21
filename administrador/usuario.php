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
          <span style="font-size: 50px; color: black;">Usuario</span>
      </div>
  </div>
        <div class="card-body">

      
                <table id="tbllistado" class="table table-striped">
                  <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Login</th>
                    <th>Cargo</th>
                    <th>Email</th>
                    <th>Estado</th>
                    <th>Opciones</th>
                  </tr>
                </thead>
                  <tbody>
                  <tr>
                    <th>Rendering engine</th>
                    <th>Browser</th>
                  </tr>
</tbody>
<tfooter>
                  <tr>
                    <th>Nombre</th>
                    <th>Login</th>
                    <th>Cargo</th>
                    <th>Email</th>
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
        <h5 class="modal-title">Registro de usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <div class="modal-body">
      <form id="formulario" name="formulario">

        <div class="row">
        <div class="col-md-6">
            <input type="hidden" name="iduser" id="iduser" class="form-control" value="">
            <label>Nombre:</label>
            <select id="nombre" name="nombre" class="form-control select2" style="width: 100%;"> </select>
        </div>

        <div class="col-md-6">
            <label>Correo:</label>
            <input type="text" name="email" id="email" class="form-control" value="" required="required" pattern="" title="">
        </div>


        <div class="col-md-6"> 
            <label>Login:</label>
            <input type="text" name="login" id="login" class="form-control" value="" required="required" pattern="" title="">
        </div>

        <div class="col-md-6"> 
             <label>Clave:</label>
             <input type="password" name="clave" id="clave" class="form-control" value="" required="required" pattern="" title="" placeholder="8 caracteres. números y letras" onkeyup="validarClave()">
             <span id="mensajeClave" class="text-danger"></span>
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
        <h5 class="modal-title" id="perfilModalLabel">Perfil del usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p><strong>Nombre Completo:</strong> <span id="modal-nombre"></span></p>
        <p><strong>Email:</strong> <span id="modal-email"></span></p>
        <p><strong>Cargo:</strong> <span id="modal-cargo"></span></p>
        <p><strong>Nombre de usuario:</strong> <span id="modal-login"></span></p>
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
<script type="text/javascript" src="js/usuario.js"></script>