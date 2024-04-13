<?php 


require_once '../../usersController.php';
require_once '../../../models/usuarios.php';
 $uControl = new usersController();

$nome = $_POST["nome"];
$data = $_POST["dataNasc"];
$ramo = $_POST["ramo"];
$email = $_POST["email"];
$cpf = $_POST["cpf"];
$rg = $_POST["rg"];
$endereco = $_POST["endereco"];
$bairro = $_POST["bairro"];
$nomeresp = $_POST["nomeresp"];
$cpfresp = $_POST["cpfresp"];
$grau = $_POST["grau"];
$isento = $_POST["isento"];

 if($uControl->inserir($nome,$data,$ramo,$email,$cpf,$rg,$endereco,$bairro,$nomeresp,$cpfresp,$grau,$isento))
 {

 return TRUE;
 }

 else
 {

 return FALSE;
}


 ?>