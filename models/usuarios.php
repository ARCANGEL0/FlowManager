
<?php

class usuarios{


	private $nome;
	private $data;
	private $ramo;
	private $email;
	private $cpf;
	private $rg;
	private $endereco;
	private $bairro;
	private $nomeresp;
	private $cpfresp;
	private $grau;
	private $isento;


public function setNome($nome)
{
	$this->nome = $nome;

}
public function getNome()
{
	return $this->nome;
}



public function setData($data)
{
	$this->data = $data;

}
public function getData()
{
	return $this->data;
}



public function setRamo($ramo)
{
	$this->ramo = $ramo;

}
public function getRamo()
{
	return $this->ramo;
}



public function setEmail($email)
{
	$this->email = $email;

}
public function getEmail()
{
	return $this->email;
}


public function setCpf($cpf)
{
	$this->cpf = $cpf;

}
public function getCpf()
{
	return $this->cpf;
}


public function setRg($rg)
{
	$this->rg = $rg;

}
public function getRg()
{
	return $this->rg;
}


public function setEndereco($endereco)
{
	$this->endereco = $endereco;

}
public function getEndereco()
{
	return $this->endereco;
}


public function setBairro($bairro)
{
	$this->bairro = $bairro;

}
public function getBairro()
{
	return $this->bairro;
}


public function setNomeResp($nomeresp)
{
	$this->nomeresp = $nomeresp;

}
public function getNomeResp()
{
	return $this->nomeresp;
}


public function setCpfResp($cpfresp)
{
	$this->cpfresp = $cpfresp;

}
public function getCpfResp()
{
	return $this->cpfresp;
}


public function setGrau($grau)
{
	$this->grau = $grau;

}
public function getGrau()
{
	return $this->grau;
}


public function setIsento($isento)
{
	$this->isento = $isento;

}
public function getIsento()
{
	return $this->isento;
}




 

public function inserirBD()
{

	require_once 'db.php'; 

	$objectCon = new db();
	$conn = $objectCon->conectar();
	if($conn->connect_error){
		die("Connection error: ". $conn->connect_error);
	}


	$sql = "INSERT INTO `Usuarios` (`Nome`, `DataNascimento`, `CPF`, `RG`, `Email`, `NomeResponsavel`, `CPFresponsavel`, `Endereco`, `Bairro`, `Isento`, `GrauResponsavel`, `Ramo`) VALUES ('".$this->nome."', '".$this->data."', '".$this->cpf."', '".$this->rg."', '".$this->email."', '".$this->nomeresp."', '".$this->cpfresp."', '".$this->endereco."', '".$this->bairro."', '".$this->isento."', '".$this->grau."', '".$this->ramo."'); INSERT INTO `Mensalidades` (`CPF`, `Mes`, `Pago`) VALUES ('".$this->cpf."', 'Janeiro', 'Nao'),('".$this->cpf."', 'Fevereiro', 'Nao'),('".$this->cpf."', 'Marco', 'Nao'),('".$this->cpf."', 'Abril', 'Nao'),('".$this->cpf."', 'Maio', 'Nao'),('".$this->cpf."', 'Junho', 'Nao'),('".$this->cpf."', 'Julho', 'Nao'),('".$this->cpf."', 'Agosto', 'Nao'),('".$this->cpf."', 'Setembro', 'Nao'),('".$this->cpf."', 'Outubro', 'Nao'),('".$this->cpf."', 'Novembro', 'Nao'),('".$this->cpf."', 'Dezembro', 'Nao'); ";

	if($conn->multi_query($sql) === TRUE) {
		$this->id = mysqli_insert_id($conn);
		$conn->close();
		return TRUE;
	}
	else {
		$conn->close();
		return FALSE;
	}
}



public function atualizarBD()
{

	require_once 'db.php';

	$objectCon = new db();
	$conn = $objectCon->conectar();
	if($conn->connect_error){
		die("Connection error: ". $conn->connect_error);
	}


	$sql = "UPDATE Usuarios SET Nome = '".$this->nome."', Ramo ='".$this->ramo."', DataNascimento='".$this->data."',Email='".$this->email."',Isento='".$this->isento."',Endereco='".$this->endereco."',Bairro='".$this->bairro."',NomeResponsavel='".$this->nomeresp."',GrauResponsavel='".$this->grau."',CPFresponsavel='".$this->cpfresp."' where CPF
= '".$this->cpf."';";

	if($conn->query($sql) === TRUE) {
		$this->id = mysqli_insert_id($conn);
		$conn->close();
		return TRUE;
	}
	else {
		$conn->close();
		return FALSE;
	}
}


public function atualizarMov()
{

	require_once 'db.php';

	$objectCon = new db();
	$conn = $objectCon->conectar();
	if($conn->connect_error){
		die("Connection error: ". $conn->connect_error);
	}


	$sql = "UPDATE Movimentacoes SET FK_Numero_Conteiner = '".$this->id."',Movimentacoes.Cliente='".$this->cliente."', Movimentacoes.Categoria='".$this->categoria."' WHERE FK_Numero_Conteiner = '".$this->oldid."';";

	if($conn->query($sql) === TRUE) {
		$this->id = mysqli_insert_id($conn);
		$conn->close();
		return TRUE;
	}
	else {
		$conn->close();
		return FALSE;
	}
}



public function excluirBD($cpf)
{

	require_once 'db.php';

	$objectCon = new db();
	$conn = $objectCon->conectar();
	if($conn->connect_error){
		die("Connection error: ". $conn->connect_error);
	}


	$sql = "delete from Usuarios where CPF = '".$cpf."';";

	if($conn->query($sql) === TRUE) {
		$this->id = mysqli_insert_id($conn);
		$conn->close();
		return TRUE;
	}
	else {
		$conn->close();
		return FALSE;
	}
}


public function contarUsuarios()
{

	require_once 'db.php';

	$objectCon = new db();
	$conn = $objectCon->conectar();
	if($conn->connect_error){
		die("Connection error: ". $conn->connect_error);
	}


	$sql = "Select Count(*) from Usuarios;";
$re = $conn->query($sql);
	$conn->close();
	return $re;



}




}

?>
