<?php
if(!isset($_SESSION))
 {
 session_start();
 require_once '../models/administrador.php';

 }
class adminController {

public function login($usuario, $senha)
 {
 	
 $admin = new administrador();
 if($admin->Login($usuario,$senha))
 { 

 $_SESSION['admin'] = serialize($admin);

 return true;
 }


 else
 {
 return false;
 }


 }

}
?>