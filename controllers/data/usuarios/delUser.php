<?php 


require_once '../../usersController.php';
require_once '../../../models/usuarios.php';
 $uControl = new usersController();

$cpf = $_POST["cpf"];

 if($uControl->remover($cpf)) // && $uControl->removerMov($id))
 {

 return TRUE;
 }

 else
 {

 return FALSE;
}


 ?>