<?php
if (strlen(session_id()) < 1) 
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="../dist/img/logoescuela.png" />
  <title>Esc. Syapa Funez Lobo</title>


  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Font Awesome proveedor -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">




 <style>
  .table-container {
    max-width: 100%; 
    overflow-x: auto;
  }


  #mislider {
    background-color: rgb(0 43 96);
  }

  thead {
    background-color: #256D9D; 
    color: #fff; 
  }

  th {
    padding: 10px; 
  }
</style>
</head>


<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper"  id="miTabla">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar (Barra de arriba)-->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light" >
    <!-- Left navbar links -->
    <ul class="navbar-nav" >
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" id="mislider" >
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link"> 
      <img src="../dist/img/logoescuela.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Esc. Suyapa F.L.</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" >
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../dist/img/pamelaweb.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        <a href="#" class="d-block"><?php echo $_SESSION["nousuario"]; ?>  </a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
    

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
          <ul class="nav nav-treeview">
              <li class="nav-item">
          <a href="#" class="nav-link active"> 
                <i class="app-menu__icon fa fa-users"></i>
                  <p>Nuevo registro<i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">

                <?php

if ($_SESSION['controlcate']==1) {
 echo         '<li class="nav-item">
            <a href="categoria.php" class="nav-link active">
              <i class="far fa-circle nav-icon"></i>
              <p>Categoria</p>
            </a>
          </li>';
}
        
   ?>     
        
        <?php

if ($_SESSION['controlprov']==1) {
echo         '   
        <li class="nav-item">
            <a href="./index2.html" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Proveedor</p>
            </a>
          </li>';
}
        
   ?>     
        <?php

if ($_SESSION['proanular']==1 || $_SESSION['proeditar']==1 || $_SESSION['procrear']==1)   
{         
        echo ' <li class="nav-item">
            <a href="producto.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Producto</p>
            </a>
          </li>
        </ul>
      </li>';
}

      ?>
      <!-- Segundo menu -->
<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
             <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="administrativos.php" class="nav-link">  
                <i class="fa-solid fa-person-chalkboard"></i>
                  <p>Administradores</p>
                </a>
              </li>
             <li class="nav-item">
                <a href="usuario.php" class="nav-link">  
                <i class="fa-regular fa-user"></i>
                  <p>Usuario</p>
                </a>
             </li>
            </ul>
         </li>
         </li>
     </ul>

        </li>
        </ul>

        <!-- fin del segundo menu -->

        <!-- menu de usuario -->
 <!-- Segundo menu -->
 <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        
               <li class="nav-item menu-open">

               <ul class="nav nav-treeview">
              <li class="nav-item">
               <a href="#" class="nav-link active"> 
               <i class="fa-solid fa-school"></i>
              <p>
                Gestion de matricula
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="matricula.php" class="nav-link"> 
              <i class="fa-solid fa-school-circle-check"></i>
                  <p>Matricula</p>
                </a>
              </li>
              <li class="nav-item">
              <a href="pago.php" class="nav-link"> 
              <i class="fa-solid fa-money-check-dollar"></i>
                  <p>Efectuar pago</p>
                </a>
              </li>
            </ul>

             
          
          
            <ul class="nav nav-treeview">
              
            <?php

if ($_SESSION['controusu']==1)   
{         
            echo '
            <li class="nav-item">
                <a href="usuario.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Registro usuario</p>
                </a>
              </li>
              ';
  }

          ?>

            </ul>
          </li>

         <!-- fin del menu -->

        
                  <!-- OTRO Menu -->
                 <!-- <nav class="mt-2">-->
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item menu-open">
            
          <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="#" class="nav-link active">
                <i class="app-menu__icon fa fa-users"></i>
                  <p>Mas...</p>
                  <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="profesor.php" class="nav-link">  
                <i class="fa-solid fa-chalkboard-user"></i>
                  <p>Profesor</p>
                </a>
              </li>
            </li>
            <li class="nav-item">
                <a href="alumno.php" class="nav-link">  
                <i class="fa-solid fa-children"></i>
                  <p>Alumnos</p>
                </a>
          </li>
          <li class="nav-item">
                <a href="encargado.php" class="nav-link">  
                <i class="fa-solid fa-person-breastfeeding"></i>
                  <p>Encargados</p>
                </a>
          </li>
          <li class="nav-item">
                <a href="grados.php" class="nav-link">  
                <i class="fa-solid fa-person-breastfeeding"></i>
                  <p>Grados</p>
                </a>
          </li>
          </ul>
              </li>
              <li class="nav-item">
                <a href="inventario.php" class="nav-link">  
                <i class="fa-solid fa-clipboard-list"aria-hidden="true"></i>
                  <p>Inventario</p>
                </a>
              </li>
        </ul>

<!-- /.Boton salir-->  
<p>
<p>

<a class="btn btn-primary" href="../ajax/usuario.php?opc=salir"> Cerrar sesion <i class="fa-solid fa-arrow-right-from-bracket"></i> </a>
</p>
</p>

        </nav>
 
       <!-- /.FIN OTRO MENU --> 
        </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>