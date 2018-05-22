
<?php
include 'conexiones.php';
function valida()
{
	 $respuesta = false;
	 $usuario = $_POST["usuario"];
	 $clave =  md5($_POST["clave"]);
	 //conectarnos al servidor de BD.
	 $con=conecta();
	 $consulta="select * from usuarios where usuario= '".$usuario."' and
	  clave='".$clave. "' limit 1" ; //Hace que la consulta se ejecute mas rapido
	

	  $resConsulta= mysql_query($con,$consulta); //Por si estamos accediendo a otra BD.
	    //Si la contraseña esta mal no debe regresar ningun registro.
	  if(mysql_num_rows ($resConsulta) > 0){
	  	$respuesta = true;

	  }
	  //para que regrese el valor en json
	  $salidaJSON = array('respuesta' => $respuesta );
	  print json_encode($salidaJSON); //devuelve el valor de salida json y lo convierte a json

}

$opc = $_POST["opc"];
Switch	
   ($opc)
   {
   	 case 'validaentrada':
   	 valida();
   	 break;


   	 default:
   	 break;
   }

?>