<?PHP 
		require_once"../modelo/ejecutarSQL.php";
	$profesor=new ejecutarSQL();

	$idp= isset( $_POST['idp'] ) ? limpiarCadena($_POST['idp']): "";
	$nombre= isset( $_POST['nombre'] ) ? limpiarCadena($_POST['nombre']): "";
	$dni= isset( $_POST['dni'] ) ? limpiarCadena($_POST['dni']): "";
	$fecha_nac= isset( $_POST['fecha_nac'] ) ? limpiarCadena($_POST['fecha_nac']): "";
	$edad= isset( $_POST['edad'] ) ? limpiarCadena($_POST['edad']): "";
	$genero= isset( $_POST['genero'] ) ? limpiarCadena($_POST['genero']): "";
	$area= isset( $_POST['area'] ) ? limpiarCadena($_POST['area']): "";
    $grado= isset( $_POST['grado'] ) ? limpiarCadena($_POST['grado']): "";
	$seccion= isset( $_POST['seccion'] ) ? limpiarCadena($_POST['seccion']): "";
	$email= isset( $_POST['email'] ) ? limpiarCadena($_POST['email']): "";
	$telefono= isset( $_POST['telefono'] ) ? limpiarCadena($_POST['telefono']): "";
    $direccion= isset( $_POST['direccion'] ) ? limpiarCadena($_POST['direccion']): "";



	switch ($_GET['opc']) {
		case 'listar':
			$sql="select * from profesor where condicion=1";
			$resp=$profesor->listar("select * from profesor");
			$data=Array();

			while($fila=$resp->fetch_object()){
				$data[]=array("6"=>
					($fila->condicion) ?
					'<button type="button" onclick="mostrar('.$fila->idp .')" class="btn btn-primary" ><i class="fas fa-edit" data-toggle="modal" data-target="#exampleModal"></i></button>'.
					'<button type="button" onclick="anular('.$fila->idp .')" class="btn btn-success" ><i class="fas fa-eraser"></i></button>'.
					'<button type="button" onclick="mostrarPerfil('.$fila->idp .')" class="btn btn-warning" ><i class="fas fa-eye"></i></button>' :
					'<button type="button" onclick="mostrar('.$fila->idp .')" class="btn btn-primary" ><i class="fas fa-edit" data-toggle="modal" data-target="#exampleModal"></i></button>'.
					'<button type="button" onclick="activar('.$fila->idp .')" class="btn btn-danger" ><i class="fas fa-calendar-check"></i></button>'.
					'<button type="button" onclick="mostrarPerfil('.$fila->idp .')" class="btn btn-warning" ><i class="fas fa-eye"></i></button>',
					

					"0"=> $fila->nombre,
					"1"=> $fila->grado,
					"2"=> $fila->seccion,
					"3"=> $fila->email,
					"4"=> $fila->telefono,
					"5"=>($fila->condicion) ? '<span class="label bg-green">Activado</span>':'<span class="label bg-red">Desactivado</span>',
					
				);
			}
			
			$results = array(
 			"sEcho"=>1, 
 			"iTotalRecords"=>count($data), 
 			"iTotalDisplayRecords"=>count($data), 
 			"aaData"=>$data);
 		echo json_encode($results);

		break;
		case 'anular':
		$respx=$profesor->insertar("update profesor set condicion='0'  where idp='$idp'");
		
	echo $respx ?" El producto del profesor se anulo correctante ": " No se puedo realizar";

		break;
				case 'activar':
		$respx=$profesor->insertar("update profesor set condicion='1'  where idp='$idp'");
		
	echo $respx ?" La profesor se activo correctante ": " No se puedo realizar";

		break;
        

            case 'guardaryeditar':
			
				// Aqui verifico si el idproveedor ya lo tengo en uso CAMBIAR
				$checkQuery = "SELECT idp FROM profesor WHERE dni = '$dni' AND idp != '$idp'";
				$checkResult = $profesor->listar($checkQuery);
				if ($checkResult->num_rows > 0) {
					echo "El registro no puede ser guardado porque el ID de profesor que ingreso ya está en uso, ingrese un ID diferente";
				} else {
					if (empty($idp)){
					$sql="insert into profesor(nombre,dni,fecha_nac,edad,genero,area,grado,seccion,email,telefono, direccion,condicion)
				values('$nombre','$dni','$fecha_nac','$edad','$genero','$area','$grado','$seccion','$email','$telefono','$direccion','1')";
						$resp=$profesor->insertar($sql);

				echo $resp ?" El producto del profesor se inserto correctante ": " No se puedo realizar";

				}else
				{
					$sql="update profesor set nombre='$nombre',dni='$dni',fecha_nac='$fecha_nac',edad='$edad',genero='$genero',area='$area',grado='$grado',seccion='$seccion',email='$email',telefono='$telefono',direccion='$direccion' where idp='$idp'";
						$resp=$profesor->insertar($sql);
echo $resp ?" El profesor se edito correctante ": " No se puedo realizar la edición";

				}
        }


			break;
		case 'mostrar':
		$respx=$profesor->mostrar("select * from profesor where idp='$idp'");
		echo json_encode($respx);

		break;


				case 'mostrarPerfil':
					$respx = $profesor->mostrar("select * from profesor where idp='$idp'");
					echo json_encode($respx);
					break;
				
					// code...
					break;
					
	}



?>



