<?PHP 
		require_once"../modelo/ejecutarSQL.php";
    $matricula=new ejecutarSQL();
	$encargado=new ejecutarSQL();

	$ide= isset( $_POST['ide'] ) ? limpiarCadena($_POST['ide']): "";
	$nombre= isset( $_POST['nombre'] ) ? limpiarCadena($_POST['nombre']): "";
	$dni= isset( $_POST['dni'] ) ? limpiarCadena($_POST['dni']): "";
	$parentesco= isset( $_POST['parentesco'] ) ? limpiarCadena($_POST['parentesco']): "";
	$alumno= isset( $_POST['alumno'] ) ? limpiarCadena($_POST['alumno']): "";
	$direccion= isset( $_POST['direccion'] ) ? limpiarCadena($_POST['direccion']): "";
	$telefono= isset( $_POST['telefono'] ) ? limpiarCadena($_POST['telefono']): "";
    $email= isset( $_POST['email'] ) ? limpiarCadena($_POST['email']): "";


	switch ($_GET['opc']) {

        case 'matrinombre':
            $resp=$matricula->listar("select * from matricula");
			
			while($fila=$resp->fetch_object()){
            echo '<option value="'.$fila->encargado.'">'.$fila->encargado.'</option>';
            }

        break;

        case 'matridni':
            $resp=$matricula->listar("select * from matricula");
			
			while($fila=$resp->fetch_object()){
            echo '<option value="'.$fila->idencargado.'">'.$fila->idencargado.'</option>';
            }

        break;

        case 'matriparentesco':
            $resp=$matricula->listar("select * from matricula");
			
			while($fila=$resp->fetch_object()){
            echo '<option value="'.$fila->parentesco.'">'.$fila->parentesco.'</option>';
            }

        break;

        case 'matrialumno':
            $resp=$matricula->listar("select * from matricula");
			
			while($fila=$resp->fetch_object()){
            echo '<option value="'.$fila->nombre.'">'.$fila->nombre.'</option>';
            }

        break;

        case 'matridireccion':
            $resp=$matricula->listar("select * from matricula");
			
			while($fila=$resp->fetch_object()){
            echo '<option value="'.$fila->direccion.'">'.$fila->direccion.'</option>';
            }

        break;

        case 'matritelefono':
            $resp=$matricula->listar("select * from matricula");
			
			while($fila=$resp->fetch_object()){
            echo '<option value="'.$fila->telefono.'">'.$fila->telefono.'</option>';
            }

        break;

        case 'matriemail':
            $resp=$matricula->listar("select * from matricula");
			
			while($fila=$resp->fetch_object()){
            echo '<option value="'.$fila->correo.'">'.$fila->correo.'</option>';
            }

        break;




		case 'listar':
			$sql="select * from encargado where condicion=1";
			$resp=$encargado->listar("select * from encargado");
			$data=Array();

			while($fila=$resp->fetch_object()){
				$data[]=array("6"=>
					($fila->condicion) ?
					'<button type="button" onclick="mostrar('.$fila->ide .')" class="btn btn-primary" ><i class="fas fa-edit" data-toggle="modal" data-target="#exampleModal"></i></button>'.
					'<button type="button" onclick="anular('.$fila->ide .')" class="btn btn-success" ><i class="fas fa-eraser"></i></button>'.
					'<button type="button" onclick="mostrarPerfil('.$fila->ide .')" class="btn btn-warning" ><i class="fas fa-eye"></i></button>' :
					'<button type="button" onclick="mostrar('.$fila->ide .')" class="btn btn-primary" ><i class="fas fa-edit" data-toggle="modal" data-target="#exampleModal"></i></button>'.
					'<button type="button" onclick="activar('.$fila->ide .')" class="btn btn-danger" ><i class="fas fa-calendar-check"></i></button>'.
					'<button type="button" onclick="mostrarPerfil('.$fila->ide .')" class="btn btn-warning" ><i class="fas fa-eye"></i></button>',
					

					"0"=> $fila->nombre,
					"1"=> $fila->dni,
					"2"=> $fila->parentesco,
					"3"=> $fila->alumno,
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
		$respx=$encargado->insertar("update encargado set condicion='0'  where ide='$ide'");
		
	echo $respx ?" El registro del encargado se anulo correctante ": " No se puedo realizar";

		break;
				case 'activar':
		$respx=$encargado->insertar("update encargado set condicion='1'  where ide='$ide'");
		
	echo $respx ?" El registro del encargado se activo correctante ": " No se puedo realizar";

		break;
        

            case 'guardaryeditar':
			
				// Aqui verifico si el idproveedor ya lo tengo en uso
				$checkQuery = "SELECT ide FROM encargado WHERE dni = '$dni' AND ide != '$ide'";
				$checkResult = $encargado->listar($checkQuery);
				if ($checkResult->num_rows > 0) {
					echo "El registro no puede ser guardado porque el ID de encargado que ingreso ya está en uso, ingrese un ID diferente";
				} else {
					if (empty($ide)){
					$sql="insert into encargado(nombre,dni,parentesco,alumno,direccion,telefono,email,condicion)
				values('$nombre','$dni','$parentesco','$alumno','$direccion','$telefono','$email','1')";
						$resp=$encargado->insertar($sql);

				echo $resp ?" El registro del encargado se inserto correctante ": " No se puedo realizar";

				}else
				{
					$sql="update encargado set nombre='$nombre',dni='$dni',parentesco='$parentesco',alumno='$alumno',telefono='$telefono',email='$email' where ide='$ide'";
						$resp=$encargado->insertar($sql);
echo $resp ?" El encargado se edito correctante ": " No se puedo realizar la edición";

				}
        }


			break;
		case 'mostrar':
		$respx=$encargado->mostrar("select * from encargado where ide='$ide'");
		echo json_encode($respx);

		break;


				case 'mostrarPerfil':
					$respx = $encargado->mostrar("select * from encargado where ide='$ide'");
					echo json_encode($respx);
					break;
				
					// code...
					break;
	}



?>



