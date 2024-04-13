<?php 


require_once '../../mensalidadesController.php';
require_once '../../../models/mensalidades.php';
 $mControl = new mensalidadesController();

$cpf = $_POST["cpf"];
$mes = $_POST["mes"];
$status = $_POST["status"];

 if($mControl->atualizar($cpf, $mes, $status))
 {

 return TRUE;
 }

 else
 {

 return FALSE;
}


 ?>