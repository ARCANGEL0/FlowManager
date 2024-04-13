
<?php 


require_once '../../gastosController.php';
require_once '../../../models/gastos.php';
 $gControl = new gastosController();

$mes = $_POST["mes"];

 if($gControl->getSaldo($mes))
 {

 return TRUE;
 }

 else
 {

 return FALSE;
}


 ?>