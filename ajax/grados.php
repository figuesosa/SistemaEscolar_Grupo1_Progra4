<?PHP 
		require_once"../modelo/ejecutarSQL.php";
	$profesor=new ejecutarSQL();
	$grados=new ejecutarSQL();

	$idg= isset( $_POST['idg'] ) ? limpiarCadena($_POST['idg']): "";
	$grado= isset( $_POST['grado'] ) ? limpiarCadena($_POST['grado']): "";
	$seccion= isset( $_POST['seccion'] ) ? limpiarCadena($_POST['seccion']): "";
	$jornada= isset( $_POST['jornada'] ) ? limpiarCadena($_POST['jornada']): "";
	$maestro= isset( $_POST['maestro'] ) ? limpiarCadena($_POST['maestro']): "";




	switch ($_GET['opc']) {

		case 'gradomaestro':
            $resp=$profesor->listar("select * from profesor");
			
			while($fila=$resp->fetch_object()){
            echo '<option value="'.$fila->idp.'">'.$fila->nombre.'</option>';
            }

        break;

		case 'listar':
			$sql="select * from grados where condicion=1";
			$resp=$grados->listar("select * from grados");
			$data=Array();

			while($fila=$resp->fetch_object()){
				$data[]=array("5"=>
					($fila->condicion) ?
					'<button type="button" onclick="mostrar('.$fila->idg .')" class="btn btn-primary" ><i class="fas fa-edit" data-toggle="modal" data-target="#exampleModal"></i></button>'.
					'<button type="button" onclick="anular('.$fila->idg .')" class="btn btn-success" ><i class="fas fa-eraser"></i></button>'.
					'<button type="button" onclick="mostrarPerfil('.$fila->idg .')" class="btn btn-warning" ><i class="fas fa-eye"></i></button>' :
					'<button type="button" onclick="mostrar('.$fila->idg .')" class="btn btn-primary" ><i class="fas fa-edit" data-toggle="modal" data-target="#exampleModal"></i></button>'.
					'<button type="button" onclick="activar('.$fila->idg .')" class="btn btn-danger" ><i class="fas fa-calendar-check"></i></button>'.
					'<button type="button" onclick="mostrarPerfil('.$fila->idg .')" class="btn btn-warning" ><i class="fas fa-eye"></i></button>',
					

					"0"=> $fila->grado,
					"1"=> $fila->seccion,
					"2"=> $fila->jornada,
					"3"=> $fila->maestro,
					"4"=>($fila->condicion) ? '<span class="label bg-green">Activado</span>':'<span class="label bg-red">Desactivado</span>',
					
				);
			}
			
			$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

		break;
		case 'anular':
		$respx=$grados->insertar("update grados set condicion='0'  where idg='$idg'");
		
	echo $respx ?" El producto del grados se anulo correctante ": " No se puedo realizar";

		break;
				case 'activar':
		$respx=$grados->insertar("update grados set condicion='1'  where idg='$idg'");
		
	echo $respx ?" La grados se activo correctante ": " No se puedo realizar";

		break;
        

            case 'guardaryeditar':
			
				// Aqui verifico si el idproveedor ya lo tengo en uso
				/*$checkQuery = "SELECT idg FROM grados WHERE grado = '$grado' AND idg != '$idg'";
				$checkResult = $grados->listar($checkQuery);
				if ($checkResult->num_rows > 0) {
					echo "El registro no puede ser guardado porque el ID de grados que ingreso ya está en uso, ingrese un ID diferente";
				} else {*/
					if (empty($idg)){
					$sql="insert into grados(grado,seccion,jornada,maestro,condicion)
				values('$grado','$seccion','$jornada','$maestro','1')";
						$resp=$grados->insertar($sql);

				echo $resp ?" El producto del grados se inserto correctante ": " No se puedo realizar";

				}else
				{
					$sql="update grados set grado='$grado',seccion='$seccion',jornada='$jornada',maestro='$maestro'where idg='$idg'";
						$resp=$grados->insertar($sql);
echo $resp ?" El grados se edito correctante ": " No se puedo realizar la edición";

				}
       // }//eliminar


			break;
		case 'mostrar':
		$respx=$grados->mostrar("select * from grados where idg='$idg'");
		echo json_encode($respx);

		break;


				case 'mostrarPerfil':
					$respx = $grados->mostrar("select * from grados where idg='$idg'");
					echo json_encode($respx);
					break;
				
					// code...
					break;
	}



?>



