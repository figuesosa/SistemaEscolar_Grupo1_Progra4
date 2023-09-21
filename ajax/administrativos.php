<?PHP 
		require_once"../modelo/ejecutarSQL.php";
	$administrativos=new ejecutarSQL();

	$iduser= isset( $_POST['iduser'] ) ? limpiarCadena($_POST['iduser']): "";
	$nombre= isset( $_POST['nombre'] ) ? limpiarCadena($_POST['nombre']): "";
	$dni= isset( $_POST['dni'] ) ? limpiarCadena($_POST['dni']): "";
	$fecha_nac= isset( $_POST['fecha_nac'] ) ? limpiarCadena($_POST['fecha_nac']): "";
	$edad= isset( $_POST['edad'] ) ? limpiarCadena($_POST['edad']): "";
	$genero= isset( $_POST['genero'] ) ? limpiarCadena($_POST['genero']): "";
	$cargo= isset( $_POST['cargo'] ) ? limpiarCadena($_POST['cargo']): "";
    $ocupacion= isset( $_POST['ocupacion'] ) ? limpiarCadena($_POST['ocupacion']): "";
	$nivel_estudios= isset( $_POST['nivel_estudios'] ) ? limpiarCadena($_POST['nivel_estudios']): "";
	$telefono= isset( $_POST['telefono'] ) ? limpiarCadena($_POST['telefono']): "";
	$direccion= isset( $_POST['direccion'] ) ? limpiarCadena($_POST['direccion']): "";
    $email= isset( $_POST['email'] ) ? limpiarCadena($_POST['email']): "";
    $observaciones= isset( $_POST['observaciones'] ) ? limpiarCadena($_POST['observaciones']): "";



	switch ($_GET['opc']) {
		case 'listar':
			$sql="select * from administrativos where condicion=1";
			$resp=$administrativos->listar("select * from administrativos");
			$data=Array();

			while($fila=$resp->fetch_object()){
				$data[]=array("7"=>
					($fila->condicion) ?
					'<button type="button" onclick="mostrar('.$fila->iduser .')" class="btn btn-primary" ><i class="fas fa-edit" data-toggle="modal" data-target="#exampleModal"></i></button>'.
					'<button type="button" onclick="anular('.$fila->iduser .')" class="btn btn-success" ><i class="fas fa-eraser"></i></button>'.
					'<button type="button" onclick="mostrarPerfil('.$fila->iduser .')" class="btn btn-warning" ><i class="fas fa-eye"></i></button>' :
					'<button type="button" onclick="mostrar('.$fila->iduser .')" class="btn btn-primary" ><i class="fas fa-edit" data-toggle="modal" data-target="#exampleModal"></i></button>'.
					'<button type="button" onclick="activar('.$fila->iduser .')" class="btn btn-danger" ><i class="fas fa-calendar-check"></i></button>'.
					'<button type="button" onclick="mostrarPerfil('.$fila->iduser .')" class="btn btn-warning" ><i class="fas fa-eye"></i></button>',
					

					"0"=> $fila->nombre,
					"1"=> $fila->dni,
					"2"=> $fila->telefono,
					"3"=> $fila->email,
					"4"=> $fila->cargo,
					"5"=> $fila->ocupacion,
					"6"=>($fila->condicion) ? '<span class="label bg-green">Activado</span>':'<span class="label bg-red">Desactivado</span>',
					
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
		$respx=$administrativos->insertar("update administrativos set condicion='0'  where iduser='$iduser'");
		
	echo $respx ?" El producto del administrativos se anulo correctante ": " No se puedo realizar";

		break;
				case 'activar':
		$respx=$administrativos->insertar("update administrativos set condicion='1'  where iduser='$iduser'");
		
	echo $respx ?" La administrativos se activo correctante ": " No se puedo realizar";

		break;
        

            case 'guardaryeditar':
			
				// Aqui verifico si el idproveedor ya lo tengo en uso
				$checkQuery = "SELECT iduser FROM administrativos WHERE nombre = '$nombre' AND iduser != '$iduser'";
				$checkResult = $administrativos->listar($checkQuery);
				if ($checkResult->num_rows > 0) {
					echo "El registro no puede ser guardado porque el ID de administrativos que ingreso ya está en uso, ingrese un ID diferente";
				} else {
					if (empty($iduser)){
					$sql="insert into administrativos(nombre,dni,fecha_nac,edad,genero,cargo,ocupacion,nivel_estudios,telefono,direccion, email, observaciones,condicion)
				values('$nombre','$dni','$fecha_nac','$edad','$genero','$cargo','$ocupacion','$nivel_estudios','$telefono','$direccion','$email','$observaciones','1')";
						$resp=$administrativos->insertar($sql);

				echo $resp ?" El producto del administrativos se inserto correctante ": " No se puedo realizar";

				}else
				{
					$sql="update administrativos set nombre='$nombre',dni='$dni',fecha_nac='$fecha_nac',edad='$edad',genero='$genero',cargo='$cargo',ocupacion='$ocupacion',nivel_estudios='$nivel_estudios',telefono='$telefono',direccion='$direccion',email='$email',observaciones='$observaciones' where iduser='$iduser'";
						$resp=$administrativos->insertar($sql);
echo $resp ?" El administrativos se edito correctante ": " No se puedo realizar la edición";

				}
        }


			break;
		case 'mostrar':
		$respx=$administrativos->mostrar("select * from administrativos where iduser='$iduser'");
		echo json_encode($respx);

		break;


				case 'mostrarPerfil':
					$respx = $administrativos->mostrar("select * from administrativos where iduser='$iduser'");
					echo json_encode($respx);
					break;
				
					// code...
					break;
					
	}



?>



