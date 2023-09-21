<?PHP 
		require_once"../modelo/ejecutarSQL.php";
	$matricula=new ejecutarSQL();
	$grados=new ejecutarSQL();
	$profesor=new ejecutarSQL();
	$alumno=new ejecutarSQL();

	$id= isset( $_POST['id'] ) ? limpiarCadena($_POST['id']): "";
	$idestudiante= isset( $_POST['idestudiante'] ) ? limpiarCadena($_POST['idestudiante']): "";
	$nombre= isset( $_POST['nombre'] ) ? limpiarCadena($_POST['nombre']): "";
	$grado= isset( $_POST['grado'] ) ? limpiarCadena($_POST['grado']): "";
	$jornada= isset( $_POST['jornada'] ) ? limpiarCadena($_POST['jornada']): "";
	$seccion= isset( $_POST['seccion'] ) ? limpiarCadena($_POST['seccion']): "";
	$maestro= isset( $_POST['maestro'] ) ? limpiarCadena($_POST['maestro']): "";
    $encargadonombre= isset( $_POST['encargadonombre'] ) ? limpiarCadena($_POST['encargadonombre']): "";


	switch ($_GET['opc']) {

		case 'aluid':
            $resp=$matricula->listar("select * from matricula");
			
			while($fila=$resp->fetch_object()){
            echo '<option value="'.$fila->idalumno.'">'.$fila->idalumno.'</option>';
            }

        break;

		case 'alunombre':
            $resp=$matricula->listar("select * from matricula");
			
			while($fila=$resp->fetch_object()){
            echo '<option value="'.$fila->nombre.'">'.$fila->nombre.'</option>';
            }

        break;

		case 'alugrado':
            $resp=$grados->listar("select * from grados");
			
			while($fila=$resp->fetch_object()){
            echo '<option value="'.$fila->grado.'">'.$fila->grado.'</option>';
            }

        break;

		case 'alujornada':
            $resp=$grados->listar("select * from grados");
			
			while($fila=$resp->fetch_object()){
            echo '<option value="'.$fila->jornada.'">'.$fila->jornada.'</option>';
            }

        break;

		case 'aluseccion':
            $resp=$grados->listar("select * from grados");
			
			while($fila=$resp->fetch_object()){
            echo '<option value="'.$fila->seccion.'">'.$fila->seccion.'</option>';
            }

        break;

		case 'alumaestro':
            $resp=$profesor->listar("select * from profesor");
			
			while($fila=$resp->fetch_object()){
            echo '<option value="'.$fila->nombre.'">'.$fila->nombre.'</option>';
            }

        break;

		case 'matriencargado':
            $resp=$matricula->listar("select * from matricula");
			
			while($fila=$resp->fetch_object()){
            echo '<option value="'.$fila->encargado.'">'.$fila->encargado.'</option>';
            }

        break;
		case 'listar':
			$sql="select * from alumno where condicion=1";
			$resp=$alumno->listar("select * from alumno");
			$data=Array();

			while($fila=$resp->fetch_object()){
				$data[]=array("6"=>
					($fila->condicion) ?
					'<button type="button" onclick="mostrar('.$fila->id .')" class="btn btn-primary" ><i class="fas fa-edit" data-toggle="modal" data-target="#exampleModal"></i></button>'.
					'<button type="button" onclick="anular('.$fila->id .')" class="btn btn-success" ><i class="fas fa-eraser"></i></button>'.
					'<button type="button" onclick="mostrarPerfil('.$fila->id .')" class="btn btn-warning" ><i class="fas fa-eye"></i></button>' :
					'<button type="button" onclick="mostrar('.$fila->id .')" class="btn btn-primary" ><i class="fas fa-edit" data-toggle="modal" data-target="#exampleModal"></i></button>'.
					'<button type="button" onclick="activar('.$fila->id .')" class="btn btn-danger" ><i class="fas fa-calendar-check"></i></button>'.
					'<button type="button" onclick="mostrarPerfil('.$fila->id .')" class="btn btn-warning" ><i class="fas fa-eye"></i></button>',
					

					"0"=> $fila->idestudiante,
					"1"=> $fila->nombre,
					"2"=> $fila->grado,
					"3"=> $fila->maestro,
					"4"=> $fila->encargadonombre,
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
		$respx=$alumno->insertar("update alumno set condicion='0'  where id='$id'");
		
	echo $respx ?" El producto del alumno se anulo correctante ": " No se puedo realizar";

		break;
				case 'activar':
		$respx=$alumno->insertar("update alumno set condicion='1'  where id='$id'");
		
	echo $respx ?" La alumno se activo correctante ": " No se puedo realizar";

		break;
        

            case 'guardaryeditar':
			
				// Aqui verifico si el idproveedor ya lo tengo en uso
				$checkQuery = "SELECT id FROM alumno WHERE idestudiante = '$idestudiante' AND id != '$id'";
				$checkResult = $alumno->listar($checkQuery);
				if ($checkResult->num_rows > 0) {
					echo "El registro no puede ser guardado porque el ID de alumno que ingreso ya está en uso, ingrese un ID diferente";
				} else {
					if (empty($id)){
					$sql="insert into alumno(idestudiante,nombre,grado,jornada,seccion,maestro,encargadonombre,condicion)
				values('$idestudiante','$nombre','$grado','$jornada','$seccion','$maestro','$encargadonombre','1')";
						$resp=$alumno->insertar($sql);

				echo $resp ?" El registro del alumno se inserto correctante ": " No se puedo realizar";

				}else
				{
					$sql="update alumno set idestudiante='$idestudiante',nombre='$nombre',grado='$grado',jornada='$jornada',seccion='$seccion',maestro='$maestro',encargadonombre='$encargadonombre' where id='$id'";
						$resp=$alumno->insertar($sql);
echo $resp ?" El alumno se edito correctante ": " No se puedo realizar la edición";

				}
        }


			break;
		case 'mostrar':
		$respx=$alumno->mostrar("select * from alumno where id='$id'");
		echo json_encode($respx);

		break;


				case 'mostrarPerfil':
					$respx = $alumno->mostrar("select * from alumno where id='$id'");
					echo json_encode($respx);
					break;
				
					// code...
					break;
	}



?>



