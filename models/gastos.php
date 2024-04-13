
<?php

class gastos{


	private $tipo;
	private $mes;
	private $custo;
 


public function setTipo($tipo)
{
	$this->tipo = $tipo;

}
public function getTipo()
{
	return $this->tipo;
}



public function setMes($mes)
{
	$this->mes = $mes;

}
public function getMes()
{
	return $this->mes;
}

public function setCusto($custo)
{
	$this->custo = $custo;

}
public function getCusto()
{
	return $this->custo;
}




public function criarEntrada()
{

	require_once 'db.php';

	$objectCon = new db();
	$conn = $objectCon->conectar();
	if($conn->connect_error){
		die("Connection error: ". $conn->connect_error);
	}


$sql = "INSERT INTO `Entradas` (`Mes`, `Tipo`, `Custo`) VALUES ('".$this->mes."', '".$this->tipo."', '".$this->custo."');UPDATE `Saldo` SET `Saldo`.`Saldo` = (SELECT ((SELECT SUM(Custo) FROM Entradas) - (SELECT SUM(Custo) FROM Saidas)));";


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


public function criarSaida()
{

	require_once 'db.php';

	$objectCon = new db();
	$conn = $objectCon->conectar();
	if($conn->connect_error){
		die("Connection error: ". $conn->connect_error);
	}


$sql = "INSERT INTO `Saidas` (`Mes`, `Tipo`, `Custo`) VALUES ('".$this->mes."', '".$this->tipo."', '".$this->custo."');UPDATE `Saldo` SET `Saldo`.`Saldo` = (SELECT ((SELECT SUM(Custo) FROM Entradas) - (SELECT SUM(Custo) FROM Saidas)));";


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



public function Saldo()
{

		require_once 'db.php';

	$objectCon = new db();
	$conn = $objectCon->conectar();
	if($conn->connect_error){
		die("Connection error: ". $conn->connect_error);
	}

$sql = "SELECT Saldo from Saldo WHERE Mes ='".$this->mes."';  ";

	$re = $conn->query($sql);
	$conn->close();
	return $re;
	echo json_encode($rows);


}



}

?>
