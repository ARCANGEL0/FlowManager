<?php
if(!isset($_SESSION))
 {
 session_start();
 }


class gastosController{

 public function inserirEntrada($mes, $tipo, $custo) {
 require_once '../../../models/gastos.php';

 $gasto = new gastos();
 $gasto->setMes($mes);
 $gasto->setTipo($tipo);
 $gasto->setCusto($custo);


 $r = $gasto->criarEntrada();

 return $r;
 }


 public function inserirDespesa($mes, $tipo, $custo) {
 require_once '../../../models/gastos.php';

 $gasto = new gastos();
 $gasto->setMes($mes);
 $gasto->setTipo($tipo);
 $gasto->setCusto($custo);


 $r = $gasto->criarSaida();

 return $r;
 }


 public function getSaldo($mes) {
 require_once '../../../models/gastos.php';

 $gasto = new gastos();
 $gasto->setMes($mes);



 $r = $gasto->Saldo();

 return $r;
 }

}
