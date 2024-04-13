
<?php

class mensalidades{


	private $cpf;
	private $mes;
	private $status;



public function setCPF($cpf)
{
	$this->cpf = $cpf;

}
public function getCPF()
{
	return $this->cpf;
}



public function setMes($mes)
{
	$this->mes = $mes;

}
public function getMes()
{
	return $this->mes;
}

public function setStatus($status)
{
	$this->status = $status;

}
public function getStatus()
{
	return $this->status;
}




public function atualizarBD()
{

	require_once 'db.php';

	$objectCon = new db();
	$conn = $objectCon->conectar();
	if($conn->connect_error){
		die("Connection error: ". $conn->connect_error);
	}


$sql = "update Mensalidades set Pago = '".$this->status."' Where CPF = '".$this->cpf."' AND Mes = '".$this->mes."';update `Entradas` set Custo = (SELECT COUNT(*)*20 FROM `Mensalidades` WHERE `Mensalidades`.`Pago` = 'Sim' AND `Mensalidades`.`Mes` = 'Novembro' ) WHERE `Entradas`.`Mes` = 'Novembro' AND `Entradas`.`Tipo` = 'Mensalidade';
UPDATE `Saldo` SET `Saldo`.`Saldo` = (SELECT SUM(Custo) FROM `Entradas`);";


	if($conn->multi_query($sql) === TRUE) {
		$this->id = mysqli_insert_id($conn);
		$conn->close();
		return TRUE;
	}
	else {
		$conn->close();
		 return false;
	}
}



public function contMensalidadePendentes()
{

		require_once 'db.php';

	$objectCon = new db();
	$conn = $objectCon->conectar();
	if($conn->connect_error){
		die("Connection error: ". $conn->connect_error);
	}

$sql = "SELECT count(*) from Mensalidades mens left join Usuarios us on mens.CPF = us.CPF  where mens.Pago = 'Nao' AND mens.Mes = '".$this->mes."' AND us.Isento = 'Nao';";

	$re = $conn->query($sql);
	$conn->close();
	return $re;



}



}

?>
