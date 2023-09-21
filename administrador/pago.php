<?php
 require 'headadmi.php';

?>

<div class="content-wrapper">        
        <!-- Main content -->
        <section class="content">
        <div class="card">

  <div class="card-header">
  <button type="button" class="btn btn-success" data-toggle="modal" data-target=".bd-example-modal-lg">
    Efectuar Pago <i class="fas fa-dollar-sign"></i>
</button>

      <div style="text-align: center;">
          <span style="font-size: 50px; color: black;">REGISTRO DE PAGOS</span>
      </div>
  </div>



        <div class="card-body">
                <table id="tbllistado" class="table table-striped"> 
                  <thead>
                  <tr>
                    <th>Nombre Completo</th>
                    <th>Fecha</th>
                    <th>Descripcion</th>
                    <th>Total</th>
                    <th>Estado</th>
                    <th>Acciones</th>                
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
                    <th>Fecha</th>
                    <th>Descripcion</th>
                    <th>Total</th>
                    <th>Estado</th>
                    <th>Acciones</th>
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
        <h5 class="modal-title">REGISTRO DE PAGOS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <div class="modal-body">
    <form id="formulario" name="formulario">

    <div class="row">
        <div class="col-md-6">
            <input type="hidden" name="idpa" id="idpa" class="form-control" value="">
            <label>Nombre:</label>
            <select id="nombrecliente" name="nombrecliente" class="form-control select2" style="width: 100%;"> </select>
        </div>

        <div class="col-md-4"> 
            <label>Fecha_emision:</label>
            <input type="date" name="FechaEmision" id="FechaEmision" class="form-control" value="" required="required" pattern="" title="">
        </div>

        <div class="col-md-4"> 
          <label>Descripcion:</label>
            <select name="descripcion" id="descripcion" class="form-control select2" value="" required="required" pattern="" title="">
        <option value="Matricula">Matricula</option>
        <option value="Seleccionar" select >Seleccionar</option>
        </select> 
        </div>

        <div class="col-md-4">
            <label>Monto:</label>
            <input type="number" name="cantidadapagar" id="cantidadapagar" class="form-control" value="" required="required" step="0.01">
        </div>

        <div class="col-md-5"> 
            <label>Numero_alumnos:</label>
            <input type="number" name="numerodealumnos" id="numerodealumnos" class="form-control" value="" required="required" pattern="" title="">
        </div>

        <div class="col-md-4"> 
          <label>Tipo_de_pago:</label>
            <select name="tipopago" id="tipopago" class="form-control select2" value="" required="required" pattern="" title="">
        <option value="Efectivo">Efectivo</option>
        <option value="Tarjeta">Tarjeta</option>
        <option value="Seleccionar" select >Seleccionar</option>
        </select> 
        </div>

        <div class="col-md-4">
            <label>Cantidad_recibida:</label>
            <input type="number" name="cantidadrecibido" id="cantidadrecibido" class="form-control" value="" required="required" step="0.01">
        </div>

        <div class="col-md-4">
            <label>Cambio:</label>
            <input type="number" name="cambio" id="cambio" class="form-control" value="" required="required" step="0.01">
        </div>

        <div class="col-md-4">
            <label>Descuento:</label>
            <input type="number" name="Descuento" id="Descuento" class="form-control" value="" required="required" step="0.01">
        </div>

        <div class="col-md-4">
            <label>Subtotal:</label>
            <input type="number" name="SubTotal" id="SubTotal" class="form-control" value="" required="required" step="0.01">
        </div>

        <div class="col-md-4">
            <label>Total:</label>
            <input type="number" name="Total" id="Total" class="form-control" value="" required="required" step="0.01">
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
        <h5 class="modal-title" id="perfilModalLabel">Factura</h5>
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
        <p><strong>Cargo:</strong> <span id="modal-cargo"></span></p>
        <p><strong>Ocupacion:</strong> <span id="modal-ocupacion"></span></p>
        <p><strong>Telefono:</strong> <span id="modal-telefono"></span></p>
        <p><strong>Direccion:</strong> <span id="modal-direccion"></span></p>
        <p><strong>Email:</strong> <span id="modal-email"></span></p>
        <p><strong>Observaciones:</strong> <span id="modal-observaciones"></span></p>
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

<script type="text/javascript" src="js/pago.js"></script>






