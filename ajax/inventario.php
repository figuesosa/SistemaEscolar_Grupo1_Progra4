<?PHP 
		require_once"../modelo/ejecutarSQL.php";
	$inventario=new ejecutarSQL();

	$idinv= isset( $_POST['idinv'] ) ? limpiarCadena($_POST['idinv']): "";
	$idinventario= isset( $_POST['idinventario'] ) ? limpiarCadena($_POST['idinventario']): "";
	$descripcion= isset( $_POST['descripcion'] ) ? limpiarCadena($_POST['descripcion']): "";
	$fecha_adq= isset( $_POST['fecha_adq'] ) ? limpiarCadena($_POST['fecha_adq']): "";
	$recibido= isset( $_POST['recibido'] ) ? limpiarCadena($_POST['recibido']): "";
	$categoria= isset( $_POST['categoria'] ) ? limpiarCadena($_POST['categoria']): "";
	$estado= isset( $_POST['estado'] ) ? limpiarCadena($_POST['estado']): "";
    $estatus_de_disponibilidad= isset( $_POST['estatus_de_disponibilidad'] ) ? limpiarCadena($_POST['estatus_de_disponibilidad']): "";
	$ubicacion= isset( $_POST['ubicacion'] ) ? limpiarCadena($_POST['ubicacion']): "";
	$responsable= isset( $_POST['responsable'] ) ? limpiarCadena($_POST['responsable']): "";
	$cantidad= isset( $_POST['cantidad'] ) ? limpiarCadena($_POST['cantidad']): "";
	$comentarios= isset( $_POST['comentarios'] ) ? limpiarCadena($_POST['comentarios']): "";


	switch ($_GET['opc']) {
		case 'listar':
			$sql="select * from inventario where condicion=1";
			$resp=$inventario->listar("select * from inventario");
			$data=Array();

			while($fila=$resp->fetch_object()){
				$data[]=array("12"=>
($fila->condicion) ?					
                    '<button type="button" onclick="mostrar('.$fila->idinv .')" class="btn btn-primary" ><i class="fas fa-edit" data-toggle="modal" data-target="#exampleModal"></i></button>'.
					'<button type="button" onclick="anular('.$fila->idinv .')" class="btn btn-success" ><i class="fas fa-eraser"></i></button>'.
					'<button type="button" onclick="mostrarPerfil('.$fila->idinv .')" class="btn btn-warning" ><i class="fas fa-eye"></i></button>' :
					'<button type="button" onclick="mostrar('.$fila->idinv .')" class="btn btn-primary" ><i class="fas fa-edit" data-toggle="modal" data-target="#exampleModal"></i></button>'.
					'<button type="button" onclick="activar('.$fila->idinv .')" class="btn btn-danger" ><i class="fas fa-calendar-check"></i></button>'.
					'<button type="button" onclick="mostrarPerfil('.$fila->idinv .')" class="btn btn-warning" ><i class="fas fa-eye"></i></button>',

					    "0"=> $fila->idinventario,	
					    "1"=> $fila->descripcion,
						"2"=> $fila->fecha_adq,
						"3"=> $fila->recibido,
						"4"=> $fila->categoria,
                        "5"=> $fila->estado,
						"6"=> $fila->estatus_de_disponibilidad,
						"7"=> $fila->ubicacion,
						"8"=> $fila->responsable,
						"9"=> $fila->cantidad,
						"10"=> $fila->comentarios,
						"11"=>($fila->condicion) ? '<span class="label bg-green">Activado</span>'
						:'<span class="label bg-red">Desactivado</span>'
			
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
		$respx=$inventario->insertar("update inventario set condicion='0'  where idinv='$idinv'");
		
	echo $respx ?" El producto del inventario se anulo correctante ": " No se puedo realizar";

		break;
				case 'activar':
		$respx=$inventario->insertar("update inventario set condicion='1'  where idinv='$idinv'");
		
	echo $respx ?" La inventario se activo correctante ": " No se puedo realizar";

		break;

		/*case 'guardaryeditar':
			
				if (empty($idinv)){
					$sql="insert into inventario(idinventario,descripcion,fecha_adq,recibido,categoria,estado,estatus_de_disponibilidad,ubicacion,responsable,cantidad,comentarios,condicion)
				values('$idinventario','$descripcion','$fecha_adq','$recibido','$categoria','$estado','$estatus_de_disponibilidad','$ubicacion','$responsable','$cantidad','$comentarios','1')";
						$resp=$inventario->insertar($sql);

				echo $resp ?" El producto del inventario se inserto correctante ": " No se puedo realizar";

				}else
				{
					$sql="update inventario set idinventario='$idinventario',descripcion='$descripcion',fecha_adq='$fecha_adq',recibido='$recibido',categoria='$categoria',estado='$estado',estatus_de_disponibilidad='$estatus_de_disponibilidad',ubicacion='$ubicacion',responsable='$responsable',cantidad='$cantidad',comentarios='$comentarios' where idinv='$idinv'";
						$resp=$inventario->insertar($sql);
echo $resp ?" El inventario se edito correctante ": " No se puedo realizar la edición";

				}


			break;*/

            case 'guardaryeditar':
			
				// Aqui verifico si el idproveedor ya lo tengo en uso
				$checkQuery = "SELECT idinv FROM inventario WHERE idinventario = '$idinventario' AND idinv != '$idinv'";
				$checkResult = $inventario->listar($checkQuery);
				if ($checkResult->num_rows > 0) {
					echo "El registro no puede ser guardado porque el ID de inventario que ingreso ya está en uso, ingrese un ID diferente";
				} else {
					if (empty($idinv)){
					$sql="insert into inventario(idinventario,descripcion,fecha_adq,recibido,categoria,estado,estatus_de_disponibilidad,ubicacion,responsable,cantidad,comentarios,condicion)
				values('$idinventario','$descripcion','$fecha_adq','$recibido','$categoria','$estado','$estatus_de_disponibilidad','$ubicacion','$responsable','$cantidad','$comentarios','1')";
						$resp=$inventario->insertar($sql);

				echo $resp ?" El producto del inventario se inserto correctante ": " No se puedo realizar";

				}else
				{
					$sql="update inventario set idinventario='$idinventario',descripcion='$descripcion',fecha_adq='$fecha_adq',recibido='$recibido',categoria='$categoria',estado='$estado',estatus_de_disponibilidad='$estatus_de_disponibilidad',ubicacion='$ubicacion',responsable='$responsable',cantidad='$cantidad',comentarios='$comentarios' where idinv='$idinv'";
						$resp=$inventario->insertar($sql);
echo $resp ?" El inventario se edito correctante ": " No se puedo realizar la edición";

				}
        }


			break;
		case 'mostrar':
		$respx=$inventario->mostrar("select * from inventario where idinv='$idinv'");
		echo json_encode($respx);

		break;
		default:
			// code...
			break;
	}



?>