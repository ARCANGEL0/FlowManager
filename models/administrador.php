<?php 

class administrador { 


private $usuario;
private $senha;



 public function setUsuario($usuario)
{
	$this->usuario = $usuario;

}
 public function getUsuario()
{
	return $this->usuario;
}



 public function setSenha($senha)
{
	$this->senha = $senha;

}
 public function getSenha()
{
	return $this->senha;
}




public function Login($usuario, $senha) {



	
	require_once 'db.php';

	$dbObj = new db();
	$conn = $dbObj->conectar();
	if($conn->connect_error){
		die("Erro na conexão: ". $conn->connect_error);
	}



	$sql = "select * from DATABASE.Login where Usuarion = '".$usuario."' AND Senha = '".$senha."';";
	$re = $conn->query($sql);
	$r = $re->fetch_object();
	if($r!=null)
	{
		$this->usuario = $r->Usuarion;
		$this->senha = $r->Senha;
		$conn->close();
		return TRUE;
	}
	else {

		$conn->close();
		return FALSE;
	}

	}






}

 ?>
