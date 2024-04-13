<?php
if(!isset($_SESSION))
 {
 session_start();
 }


class mensalidadesController{


 public function atualizar($cpf, $mes,$status) {
 require_once '../../../models/mensalidades.php';
 $mensalidades = new mensalidades();
 $mensalidades->setMes($mes);
 $mensalidades->setCPF($cpf);
 $mensalidades->setStatus($status);
 $r = $mensalidades->atualizarBD();

 return $r;
 }


 public function contPendenciasMes($mes)
 {

 $mensalidades = new mensalidades();
 $mensalidades->setMes($mes);

 return $results = $mensalidades->contMensalidadePendentes();



 }
 


}
