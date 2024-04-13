
<?php 

Class db {
	
	private $maquina = "";
	private $user = "";
	private $password ="";
	private $db = "";


public function conectar()
{
	$conn = new mysqli($this->maquina, $this->user,$this->password, $this->db);
	return $conn;
}

}

 ?>
