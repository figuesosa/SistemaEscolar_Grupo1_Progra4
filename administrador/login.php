
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="../dist/img/logoescuela.png" />
  <title>|Bienvenido</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">

  <style>
    .background-radial-gradient {
      height: 690px;
      width: 1390px;
      position: relative;
      background-image:url('../dist/img/escuelafondo.jpeg');
      backdrop-filter: saturate(200%) blur(25px);
    }

  .background-radial-gradient::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 85, 255, 0.7); 
  z-index: -1; 
}


.bg-glass {
      background-color: hsla(0, 0%, 100%, 0.9) !important;
      backdrop-filter: saturate(200%) blur(25px);
      height: 600;
}
  </style>
</head>

<body class="hold-transition login-page">

<!-- Section: Design Block -->
<section class="background-radial-gradient overflow-hidden">
  <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
    <div class="row gx-lg-5 align-items-center mb-5">
      <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
        <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%); font-size: 100px;">
        Escuela <br />
          <span style="color: hsl(220, 100%, 10%); font-size: 60px;"> Suyapa Funez Lobo</span>
        </h1>
        <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 95%); font-size: 25px;">
          Fundada en 2007
        </p>
        <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 95%); font-size: 25px;">
          El Pino, El Porvenir, Atlantida.
        </p>
      </div>

      <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
        <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
        <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

        <div class="card bg-glass">
          <div class="card-body px-4 py-5 px-md-5">
          <h2 class="fw-bold mb-5">Regístrate ahora</h2>
            <form>


              <!-- Email input -->
              <div class="form-outline mb-4">
              <title>Acceso al sistema</title>
                <input type="email" id="login" name="login" class="form-control" placeholder="Email"/>
                <label class="form-label" for="form3Example3">Nombre de usuario</label>
                <span class="fas fa-envelope"></span>
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
                <input type="password" id="clave" name="clave" class="form-control"  placeholder="Password">
                <label class="form-label" for="form3Example4">Contraseña</label>
                <span class="fas fa-lock"></span>
 
              </div>

              <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Recordar
              </label>
            </div>
          </div>

        </div>

              <!-- Submit button -->
              <p>
              <p>
              <button type="submit" onclick="verificar();" class="btn btn-primary btn-block mb-4">
                Sign up
              </button>
              </p>  
              </p>


            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Section: Design Block -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
</body>
</html>
<script type="text/javascript" src="js/login.js"></script>





