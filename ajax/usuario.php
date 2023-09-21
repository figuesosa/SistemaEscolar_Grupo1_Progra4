<?PHP 

if (strlen(session_id()) < 1) 
  session_start();

		require_once"../modelo/ejecutarSQL.php";
	$administrativos=new ejecutarSQL();
	$usuario=new ejecutarSQL();

	$idusuario= isset( $_POST['idusuario'] ) ? limpiarCadena($_POST['idusuario']): "";
	$nombre= isset( $_POST['nombre'] ) ? limpiarCadena($_POST['nombre']): "";
	$email= isset( $_POST['email'] ) ? limpiarCadena($_POST['email']): "";
	$cargo= isset( $_POST['cargo'] ) ? limpiarCadena($_POST['cargo']): "";
	$login= isset( $_POST['login'] ) ? limpiarCadena($_POST['login']): "";
	$clave= isset( $_POST['clave'] ) ? limpiarCadena($_POST['clave']): "";
	$imagen= isset( $_POST['imagen'] ) ? limpiarCadena($_POST['imagen']): "";
	




	switch ($_GET['opc']) {

		case 'seleadminombre':
            $resp=$administrativos->listar("select * from administrativos");
			
			while($fila=$resp->fetch_object()){
            echo '<option value="'.$fila->iduser.'">'.$fila->nombre.'</option>';
            }

        break;

		case 'salir':
			session_unset();
			session_destroy();
			
			header('Location: ../index.php');
		
			break;

		case 'verificar':
           
			$usu=$_REQUEST['usu'];
			$cla=$_REQUEST['clave'];
			
            //Mostramos la lista de permisos en la vista y si están o no marcados
            $resp=$administrativos->listar("select * from usuario where login='".$usu."' and clave='".$cla."'");
			$salida="no";
            while ($reg =  $resp->fetch_object())
                    {
						$salida="si";  
						$_SESSION["nousuario"]=$reg->nombre;  
						
						$respd=$administrativos->listar("select * from usuario_permiso where idusuario='".$reg->idusuario. "'");
						$valores=array();
						while ($regd =  $respd->fetch_object())
						{
								array_push($valores,$regd->idpermiso);
						}
						in_array(27,$valores)?$_SESSION['controlcate']=1:$_SESSION['controlcate']=0;
						in_array(28,$valores)?$_SESSION['controlprov']=1:$_SESSION['controlprov']=0;
						in_array(29,$valores)?$_SESSION['procrear']=1:$_SESSION['procrear']=0;
						in_array(30,$valores)?$_SESSION['proeditar']=1:$_SESSION['proeditar']=0;
						in_array(31,$valores)?$_SESSION['proanular']=1:$_SESSION['proanular']=0;
						in_array(32,$valores)?$_SESSION['controusu']=1:$_SESSION['controusu']=0;
						
			


                    }


					echo $salida;

        break;

		case 'listar':
			$sql="select * from usuario where condicion=1";
			$resp=$usuario->listar("select * from usuario");
			$data=Array();

			while($fila=$resp->fetch_object()){
				$data[]=array("5"=>
                    ($fila->condicion) ?					
                    '<button type="button" onclick="mostrar('.$fila->idusuario .')" class="btn btn-primary" ><i class="fas fa-edit" data-toggle="modal" data-target="#exampleModal"></i></button>'.
					'<button type="button" onclick="anular('.$fila->idusuario .')" class="btn btn-success" ><i class="fas fa-eraser"></i></button>'.
					'<button type="button" onclick="mostrarPerfil('.$fila->idusuario .')" class="btn btn-warning" ><i class="fas fa-eye"></i></button>' :
					'<button type="button" onclick="mostrar('.$fila->idusuario .')" class="btn btn-primary" ><i class="fas fa-edit" data-toggle="modal" data-target="#exampleModal"></i></button>'.
					'<button type="button" onclick="activar('.$fila->idusuario .')" class="btn btn-danger" ><i class="fas fa-calendar-check"></i></button>'.
					'<button type="button" onclick="mostrarPerfil('.$fila->idusuario .')" class="btn btn-warning" ><i class="fas fa-eye"></i></button>',
						
					    "0"=> $fila->nombre,
						"1"=> $fila->login,
						"2"=> $fila->cargo,
						"3"=> $fila->email,
						"4"=>($fila->condicion) ? '<span class="label bg-green">Activado</span>'
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
		$respx=$usuario->insertar("update usuario set condicion='0'  where idusuario='$idusuario'");
		
	echo $respx ?" El registro del ususario se anulo correctante ": " No se puedo realizar";

		break;
				case 'activar':
		$respx=$usuario->insertar("update usuario set condicion='1'  where idusuario='$idusuario'");
		
	echo $respx ?" El registro del ussuario se activo correctante ": " No se puedo realizar";

		break;

		case 'guardaryeditar':
			
				if (empty($idusuario)){
				$sql="INSERT INTO `usuario`( `nombre`, `email`, `cargo`, `login`, `clave`, `condicion`) VALUES ('$nombre','$email','$cargo','$login','$clave',1)";

				$resp=$usuario->insertar($sql);
				//$permi=$_POST["permiso"];

					$i=0;
					/*while ($i < count($permi)){

				$sql="INSERT INTO `usuario_permiso`( `idusuario`, `idpermiso`) VALUES ( (select max(idusuario) from usuario ),'$permi[$i]')";

				$resp=$usuario->insertar($sql);
						$i++;
					}*/	
				

				echo $resp ?" El usuario se  inserto correctante ": " No se puedo realizar";

				}else
				{
					$sql="update usuario set usuario='$nombre',email='$email',cargo='$cargo',login='$login' where idusuario='$idusuario'";
					$resp=$usuario->insertar($sql);

					


echo $resp ?" El registro del usuasrio se edito correctante ": " No se puedo realizar la edición";

				}


			break;
		case 'mostrar':
		$respx=$usuario->mostrar("select * from usuario where idusuario='$idusuario'");
		echo json_encode($respx);

		break;
		default:
			// code...
			break;


			case 'mostrarPerfil':
				$respx = $usuario->mostrar("select * from usuario where idusuario='$idusuario'");
				echo json_encode($respx);
				break;
			
				// code...
				break;

	}



?>