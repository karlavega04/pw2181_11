<?php
include 'conexiones.php';
function valida()
{
	 $respuesta = false;
	 $usuario = $_POST["usuario"];
	 //conectarnos al servidor de BD.
	 $con=conecta();
	 $consulta="select * from usuarios where usuario= '".$usuario."'limit 1" ; //Hace que la consulta se ejecute mas rapido
	
//echo $consulta;
	  $resConsulta= mysqli_query($con,$consulta); //Por si estamos accediendo a otra BD.
	   //Si la contraseña esta mal no debe regresar ningun registro.
	  $nombre="";
	  $clave ="";
	  if(mysqli_num_rows ($resConsulta) > 0){
	  	$respuesta = true;
	  	while($regconsulta = mysqli_fetch_array($resConsulta)){//reg de registros
              $nombre = $regconsulta["nombre"];
              $clave = $regconsulta["clave"];
		}
	  }
	  //para que regrese el valor en json
	  $salidaJSON = array('respuesta' => $respuesta,
	                      'nombre'    => $nombre,
	                      'clave'     => $clave );
	  print json_encode($salidaJSON); //devuelve el valor de salida json y lo convierte a json

}

$opc = $_POST["opc"];
Switch	
   ($opc)
   {
   	 case 'buscaUsuario':
   	 buscausuario();
   	 break;


   	 default:
   	 break;
   }

?>