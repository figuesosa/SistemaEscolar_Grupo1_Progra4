<?PHP 
		require_once"../modelo/ejecutarSQL.php";
	$matricula=new ejecutarSQL();

	$idalu= isset( $_POST['idalu'] ) ? limpiarCadena($_POST['idalu']): "";
	$idalumno= isset( $_POST['idalumno'] ) ? limpiarCadena($_POST['idalumno']): "";
	$nombre= isset( $_POST['nombre'] ) ? limpiarCadena($_POST['nombre']): "";
	$fecha_nac= isset( $_POST['fecha_nac'] ) ? limpiarCadena($_POST['fecha_nac']): "";
	$edad= isset( $_POST['edad'] ) ? limpiarCadena($_POST['edad']): "";
	$sexo= isset( $_POST['sexo'] ) ? limpiarCadena($_POST['sexo']): "";
	$grado= isset( $_POST['grado'] ) ? limpiarCadena($_POST['grado']): "";
    $jornada= isset( $_POST['jornada'] ) ? limpiarCadena($_POST['jornada']): "";
	$encargado= isset( $_POST['encargado'] ) ? limpiarCadena($_POST['encargado']): "";
	$parentesco= isset( $_POST['parentesco'] ) ? limpiarCadena($_POST['parentesco']): "";
	$idencargado= isset( $_POST['idencargado'] ) ? limpiarCadena($_POST['idencargado']): "";
    $direccion= isset( $_POST['direccion'] ) ? limpiarCadena($_POST['direccion']): "";
    $telefono= isset( $_POST['telefono'] ) ? limpiarCadena($_POST['telefono']): "";
    $correo= isset( $_POST['correo'] ) ? limpiarCadena($_POST['correo']): "";



	switch ($_GET['opc']) {
		case 'listar':
			$sql="select * from matricula where condicion=1";
			$resp=$matricula->listar("select * from matricula");
			$data=Array();

			while($fila=$resp->fetch_object()){
				$data[]=array("7"=>
					($fila->condicion) ?
					'<button type="button" onclick="mostrar('.$fila->idalu .')" class="btn btn-primary" ><i class="fas fa-edit" data-toggle="modal" data-target="#exampleModal"></i></button>'.
					'<button type="button" onclick="anular('.$fila->idalu .')" class="btn btn-success" ><i class="fas fa-eraser"></i></button>'.
					'<button type="button" onclick="mostrarPerfil('.$fila->idalu .')" class="btn btn-warning" ><i class="fas fa-eye"></i></button>' :
					'<button type="button" onclick="mostrar('.$fila->idalu .')" class="btn btn-primary" ><i class="fas fa-edit" data-toggle="modal" data-target="#exampleModal"></i></button>'.
					'<button type="button" onclick="activar('.$fila->idalu .')" class="btn btn-danger" ><i class="fas fa-calendar-check"></i></button>'.
					'<button type="button" onclick="mostrarPerfil('.$fila->idalu .')" class="btn btn-warning" ><i class="fas fa-eye"></i></button>',
					

					"0"=> $fila->idalumno,
					"1"=> $fila->nombre,
					"2"=> $fila->grado,
					"3"=> $fila->encargado,
					"4"=> $fila->parentesco,
					"5"=> $fila->telefono,
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
		$respx=$matricula->insertar("update matricula set condicion='0'  where idalu='$idalu'");
		
	echo $respx ?" El producto del matricula se anulo correctante ": " No se puedo realizar";

		break;
				case 'activar':
		$respx=$matricula->insertar("update matricula set condicion='1'  where idalu='$idalu'");
		
	echo $respx ?" La matricula se activo correctante ": " No se puedo realizar";

		break;
        

            case 'guardaryeditar':
			
				// Aqui verifico si el idproveedor ya lo tengo en uso
				$checkQuery = "SELECT idalu FROM matricula WHERE idalumno = '$idalumno' AND idalu != '$idalu'";
				$checkResult = $matricula->listar($checkQuery);
				if ($checkResult->num_rows > 0) {
					echo "El registro no puede ser guardado porque el ID de matricula que ingreso ya está en uso, ingrese un ID diferente";
				} else {
					if (empty($idalu)){
					$sql="insert into matricula(idalumno,nombre,fecha_nac,edad,sexo,grado,jornada,encargado,parentesco,idencargado, direccion, telefono,condicion)
				values('$idalumno','$nombre','$fecha_nac','$edad','$sexo','$grado','$jornada','$encargado','$parentesco','$idencargado','$direccion','$telefono','1')";
						$resp=$matricula->insertar($sql);

				echo $resp ?" El producto del matricula se inserto correctante ": " No se puedo realizar";

				}else
				{
					$sql="update matricula set idalumno='$idalumno',nombre='$nombre',fecha_nac='$fecha_nac',edad='$edad',sexo='$sexo',grado='$grado',jornada='$jornada',encargado='$encargado',parentesco='$parentesco',idencargado='$idencargado',direccion='$direccion',telefono='$telefono' where idalu='$idalu'";
						$resp=$matricula->insertar($sql);
echo $resp ?" El matricula se edito correctante ": " No se puedo realizar la edición";

				}
        }


			break;
		case 'mostrar':
		$respx=$matricula->mostrar("select * from matricula where idalu='$idalu'");
		echo json_encode($respx);

		break;


				case 'mostrarPerfil':
					$respx = $matricula->mostrar("select * from matricula where idalu='$idalu'");
					echo json_encode($respx);
					break;
					break;
	}



?>



