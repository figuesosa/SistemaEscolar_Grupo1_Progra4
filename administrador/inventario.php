<?php
 require 'headadmi.php';

?>
  <style>
  .table-container {  
    max-width: 100%; 
    overflow-x: auto;
  }

  #miTabla {
    width: 110%;
  }
</style>

<div class="content-wrapper" id="miTabla">        
        <!-- Main content -->
        <section class="content">
        <div class="card">

        
        <div class="card-header">
      <button type="button" class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-lg">Nuevo Registro<i class="fa fa-user" aria-hidden="true"></i> </button> 
      <div style="text-align: center;">
          <span style="font-size: 50px; color: black;">Inventario</span>
      </div>
  </div>


        <div class="card-body">

      
                <table id="tbllistado" class="table table-striped">
                  <thead>
                  <tr>
                    <th>ID Inventario</th>
                    <th>Descripcion</th>
                    <th>Fecha_Adq</th>
                    <th>Recibido_Nom</th>
                    <th>Categoria </th>
                    <th>Estado_Actual</th>
                    <th>Estatus_Dis</th>
                    <th>Ubicacion</th>
                    <th>Responsable</th>
                    <th>Cantidad</th>
                    <th>Comentarios</th>
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
                    <th>ID Inventario</th>
                    <th>Descripcion</th>
                    <th>Fecha_Adq</th>
                    <th>Recibido_Nom</th>
                    <th>Categoria </th>
                    <th>Estado_Actual</th>
                    <th>Estatus_Dis</th>
                    <th>Ubicacion</th>
                    <th>Responsable</th>
                    <th>Cantidad</th>
                    <th>Comentarios</th>
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
        <h5 class="modal-title">INVENTARIO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
    <form id="formulario" name="formulario">

    <div class="row">
        <div class="col-md-6">
        <input type="hidden" name="idinv" id="idinv" class="form-control" value="">
            <label>ID_Producto:</label>
                <input type="text" name="idinventario" id="idinventario" class="form-control" value="" required="required" pattern="" title="">
        </div>

        <div class="col-md-6"> 
            <label>Descripcion:</label>
            <input type="text" name="descripcion" id="descripcion" class="form-control" value="" required="required" pattern="" title="">
        </div>

        <div class="col-md-6"> 
            <label>Fecha_Adq:</label>
            <input type="date" name="fecha_adq" id="fecha_adq" class="form-control" value="" required="required" pattern="" title="">
        </div>

        <div class="col-md-6">
            <label>Nom_Recibido:</label>
            <input type="text" name="recibido" id="recibido" class="form-control" value="" required="required" pattern="" title="">
        </div>
        

        <div class="col-md-6"> 
          <label>Categoria:</label>
            <select type="text" name="categoria" id="categoria" class="form-control" value="" required="required" pattern="" title="">
        <option value="Material de oficina">Material de oficina</option>
        <option value="Equipo deportivo">Equipo deportivo</option>
        <option value="Area de artes">Area de artes</option>
        <option value="Libros">Libros</option>
        <option value="Material de limpieza">Material de limpieza</option>
        <option value="Muebles">Muebles</option>
        <option value="Botiquin">Botiquin</option>
        <option value="Papeleria">Papeleria</option>
        <option value="Otro">Otro</option>
        <option value="seleccione" selected>Seleccione</option>
        </select>
        </div>

        <div class="col-md-6"> 
          <label>Estado:</label>
            <select type="text" name="estado" id="estado" class="form-control" value="" required="required" pattern="" title="">
        <option value="Nuevo">Nuevo</option>
        <option value="Usado">Usado</option>
        <option value="Reparado">Reparado</option>
        <option value="Obsoleto">Obsoleto</option>
        <option value="seleccione" selected>Seleccione</option>
        </select>
        </div>

        <div class="col-md-6"> 
          <label>Estatus:</label>
            <select type="text" name="estatus_de_disponibilidad" id="estatus_de_disponibilidad" class="form-control" value="" required="required" pattern="" title="">
        <option value="En uso">En uso</option>
        <option value="Disponible">Disponible</option>
        <option value="Reservado">Reservado</option>
        <option value="En reparacion">En reparacion</option>
        <option value="Agotado">Matutina</option>
        <option value="seleccione" selected>Seleccione</option>
        </select>
        </div>

        <div class="col-md-6"> 
          <label>Ubicacion:</label>
            <select type="text" name="ubicacion" id="ubicacion" class="form-control" value="" required="required" pattern="" title="">
        <option value="Direccion">Direccion</option>
        <option value="Administracion">Administracion</option>
        <option value="Area de limpieza">Area de limpieza</option>
        <option value="Bodega">Bodega</option>
        <option value="Salon de clases">Salon de clases</option>
        <option value="seleccione" selected>Seleccione</option>
        </select>
        </div>

        <div class="col-md-6"> 
            <label>Responsable:</label>
            <input type="text" name="responsable" id="responsable" class="form-control" value="" required="required" pattern="" title="">
        </div>

        <div class="col-md-6">
            <label>Cantidad:</label>
            <input type="text" name="cantidad" id="cantidad" class="form-control" value="" required="required" pattern="" title="">
        </div>

        <div class="col-md-6"> 
        <label>Comentarios:</label>
            <textarea class="form-control" name="comentarios" id="comentarios"></textarea>  
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
        <h5 class="modal-title" id="perfilModalLabel">Perfil Inventario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p><strong>ID:</strong> <span id="modal-idinventario"></span></p>
        <p><strong>Descripcion:</strong> <span id="modal-descripcion"></span></p>
        <p><strong>Fecha de adquisicion:</strong> <span id="modal-fecha_adq"></span></p>
        <p><strong>Recivido por:</strong> <span id="modal-recibido"></span></p>
        <p><strong>Categoria:</strong> <span id="modal-categoria"></span></p>
        <p><strong>Estado:</strong> <span id="modal-estado"></span></p>
        <p><strong>Estatus de disponibilidad:</strong> <span id="modal-estatus_de_disponibilidad"></span></p>
        <p><strong>Ubicacion:</strong> <span id="modal-ubicacion"></span></p>
        <p><strong>Responsable:</strong> <span id="modal-responsable"></span></p>
        <p><strong>Cantidad:</strong> <span id="modal-cantidad"></span></p>
        <p><strong>Comentarios:</strong> <span id="modal-comentarios"></span></p>
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
<script type="text/javascript" src="js/inventario.js"></script>



