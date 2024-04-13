<?php
session_start();
include('../../models/db.php');
require_once '../../models/administrador.php';
require_once '../adminController.php';

// Aqui busca os controladores e os modelos PHP

 $adminControl = new adminController();
 $admin = new administrador();
$usuario = $_POST["loginUsuario"];
$senha = $_POST["loginSenha"];

 if($adminControl->login($usuario, $senha)) // verifica login atraves dos metodos
 {
		header('Location: ../../views/dashboard.php');
 }

 else
 {
$_SESSION['sem_autenticacao'] = true;
		
	
		header('Location: ../../index.php');

}

 ?>