<?php 


require_once '../../gastosController.php';
require_once '../../../models/gastos.php';
 $gControl = new gastosController();

$tipo = $_POST["tipo"];
$mes = $_POST["mes"];
$custo = $_POST["custo"];

 if($gControl->inserirEntrada($mes, $tipo, $custo))
 {

 return TRUE;
 }

 else
 {

 return FALSE;
}


 ?>