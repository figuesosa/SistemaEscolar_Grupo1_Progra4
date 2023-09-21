<?PHP 
		require_once"../modelo/ejecutarSQL.php";
    $matricula=new ejecutarSQL();
	$pago=new ejecutarSQL();

	$idpa= isset( $_POST['idpa'] ) ? limpiarCadena($_POST['idpa']): "";
	$nombrecliente= isset( $_POST['nombrecliente'] ) ? limpiarCadena($_POST['nombrecliente']): "";
	$FechaEmision= isset( $_POST['FechaEmision'] ) ? limpiarCadena($_POST['FechaEmision']): "";
	$descripcion= isset( $_POST['descripcion'] ) ? limpiarCadena($_POST['descripcion']): "";
	$cantidadapagar= isset( $_POST['cantidadapagar'] ) ? limpiarCadena($_POST['cantidadapagar']): "";
	$numerodealumnos= isset( $_POST['numerodealumnos'] ) ? limpiarCadena($_POST['numerodealumnos']): "";
	$tipopago= isset( $_POST['tipopago'] ) ? limpiarCadena($_POST['tipopago']): "";
    $cantidadrecibido= isset( $_POST['cantidadrecibido'] ) ? limpiarCadena($_POST['cantidadrecibido']): "";
	$cambio= isset( $_POST['cambio'] ) ? limpiarCadena($_POST['cambio']): "";
	$Descuento= isset( $_POST['Descuento'] ) ? limpiarCadena($_POST['Descuento']): "";
	$SubTotal= isset( $_POST['SubTotal'] ) ? limpiarCadena($_POST['SubTotal']): "";
    $Total= isset( $_POST['Total'] ) ? limpiarCadena($_POST['Total']): "";


	switch ($_GET['opc']) {

        case 'clientenombre':
            $resp=$matricula->listar("select * from matricula");
			
			while($fila=$resp->fetch_object()){
            echo '<option value="'.$fila->encargado.'">'.$fila->encargado.'</option>';
            }

        break;


		case 'listar':
			$sql="select * from pago where condicion=1";
			$resp=$pago->listar("select * from pago");
			$data=Array();

			while($fila=$resp->fetch_object()){
				$data[]=array("5"=>
					($fila->condicion) ?
					'<button type="button" onclick="mostrar('.$fila->idpa .')" class="btn btn-primary" ><i class="fas fa-edit" data-toggle="modal" data-target="#exampleModal"></i></button>'.
					'<button type="button" onclick="anular('.$fila->idpa .')" class="btn btn-success" ><i class="fas fa-eraser"></i></button>'.
					'<button type="button" onclick="mostrarPerfil('.$fila->idpa .')" class="btn btn-warning" ><i class="fas fa-eye"></i></button>' :
					'<button type="button" onclick="mostrar('.$fila->idpa .')" class="btn btn-primary" ><i class="fas fa-edit" data-toggle="modal" data-target="#exampleModal"></i></button>'.
					'<button type="button" onclick="activar('.$fila->idpa .')" class="btn btn-danger" ><i class="fas fa-calendar-check"></i></button>'.
					'<button type="button" onclick="mostrarPerfil('.$fila->idpa .')" class="btn btn-warning" ><i class="fas fa-eye"></i></button>',
					

					"0"=> $fila->nombrecliente,
					"1"=> $fila->FechaEmision,
					"2"=> $fila->descripcion,
					"3"=> $fila->Total,
					"4"=>($fila->condicion) ? '<span class="label bg-green">Activado</span>':'<span class="label bg-red">Desactivado</span>',
					
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
		$respx=$pago->insertar("update pago set condicion='0'  where idpa='$idpa'");
		
	echo $respx ?" El producto del pago se anulo correctante ": " No se puedo realizar";

		break;
				case 'activar':
		$respx=$pago->insertar("update pago set condicion='1'  where idpa='$idpa'");
		
	echo $respx ?" La pago se activo correctante ": " No se puedo realizar";

		break;
        

            case 'guardaryeditar':
			
				// Aqui verifico si el idproveedor ya lo tengo en uso
				/*$checkQuery = "SELECT idpa FROM pago WHERE nombrecliente = '$nombrecliente' AND idpa != '$idpa'";
				$checkResult = $pago->listar($checkQuery);
				if ($checkResult->num_rows > 0) {
					echo "El registro no puede ser guardado porque el ID de pago que ingreso ya está en uso, ingrese un ID diferente";
				} else {*/
					if (empty($idpa)){
					$sql="insert into pago(nombrecliente,FechaEmision,descripcion,cantidadapagar,numerodealumnos,tipopago,cantidadrecibido,cambio,Descuento,SubTotal, Total,condicion)
				values('$nombrecliente','$FechaEmision','$descripcion','$cantidadapagar','$numerodealumnos','$tipopago','$cantidadrecibido','$cambio','$Descuento','$SubTotal','$Total','1')";
						$resp=$pago->insertar($sql);

				echo $resp ?" El producto del pago se inserto correctante ": " No se puedo realizar";

				}else
				{
					$sql="update pago set nombrecliente='$nombrecliente',FechaEmision='$FechaEmision',descripcion='$descripcion',cantidadapagar='$cantidadapagar',numerodealumnos='$numerodealumnos',tipopago='$tipopago',cantidadrecibido='$cantidadrecibido',cambio='$cambio',Descuento='$Descuento',SubTotal='$SubTotal',Total='$Total' where idpa='$idpa'";
						$resp=$pago->insertar($sql);
echo $resp ?" El pago se edito correctante ": " No se puedo realizar la edición";

				}
       // }


			break;
		case 'mostrar':
		$respx=$pago->mostrar("select * from pago where idpa='$idpa'");
		echo json_encode($respx);

		break;


				case 'mostrarPerfil':
					$respx = $pago->mostrar("select * from pago where idpa='$idpa'");
					echo json_encode($respx);
					break;
				
					// code...
					break;
					
	}



?>



