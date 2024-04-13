<?php
if(!isset($_SESSION))
 {
 session_start();
 }


class usersController{

 public function inserir($nome, $data, $ramo,$email,$cpf,$rg,$endereco,$bairro,$nomeresp,$cpfresp,$grau,$isento) {
 require_once '../../../models/usuarios.php';

 $usuarios = new usuarios();
 $usuarios->setNome($nome);
 $usuarios->setData($data);
 $usuarios->setRamo($ramo);
 $usuarios->setEmail($email);
 $usuarios->setCpf($cpf);
 $usuarios->setRg($rg);
 $usuarios->setEndereco($endereco);
 $usuarios->setBairro($bairro);
 $usuarios->setNomeResp($nomeresp);
 $usuarios->setCpfResp($cpfresp);
 $usuarios->setGrau($grau);
 $usuarios->setIsento($isento);

 $r = $usuarios->inserirBD();

 return $r;
 }

public function atualizar($nome, $data, $ramo,$email,$cpf,$rg,$endereco,$bairro,$nomeresp,$cpfresp,$grau,$isento) {
 require_once '../../../models/usuarios.php';

 $usuarios = new usuarios();
 $usuarios->setNome($nome);
 $usuarios->setData($data);
 $usuarios->setRamo($ramo);
 $usuarios->setEmail($email);
 $usuarios->setCpf($cpf);
 $usuarios->setRg($rg);
 $usuarios->setEndereco($endereco);
 $usuarios->setBairro($bairro);
 $usuarios->setNomeResp($nomeresp);
 $usuarios->setCpfResp($cpfresp);
 $usuarios->setGrau($grau);
 $usuarios->setIsento($isento);

 $r = $usuarios->atualizarBD();

 return $r;
 }

 public function remover($cpf) {
 require_once '../../../models/usuarios.php';
 $usuarios = new usuarios();
 $r = $usuarios->excluirBD($cpf);
 return $r;
 }

 

 public function contUsuarios()

 {

 $usuarios = new usuarios();

 return $results = $usuarios->contarUsuarios();



 }


}
