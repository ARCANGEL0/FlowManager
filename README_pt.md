
<div align="center">
    <img height="20%" width="20%" src="https://cdn-icons-png.flaticon.com/512/5501/5501564.png" >
  <br>
  <h1>FlowManager 💲</h1>
  <strong>Painel financeiro para gerenciar assinaturas, gastod,saldo , relatórios e insights mensais e anuais</strong>
</div>
<br>
<p align="center">
  
  <a href="https://www.gnu.org/licenses/agpl-3.0">
    <img src="https://img.shields.io/badge/License-AGPL_v3-blue.svg" alt="License: AGPL v3">
</a>
<a href="https://github.com/ARCANGEL0/FlowManager">
    <img src="https://views.whatilearened.today/views/github/ARCANGEL0/FlowManager.svg" alt="Views">
</a>
<a href="https://github.com/ARCANGEL0/FlowManager">
    <img src="https://img.shields.io/github/stars/ARCANGEL0/FlowManager?label=Stars&color=yellow&style=flat-square" alt="Stars">
</a>
<a href="https://github.com/ARCANGEL0/FlowManager">
    <img src="https://img.shields.io/github/watchers/ARCANGEL0/FlowManager?label=Watchers&color=green&style=flat-square" alt="Watchers">
</a>
<a href="https://github.com/ARCANGEL0/FlowManager">
    <img src="https://img.shields.io/github/forks/ARCANGEL0/FlowManager?label=Forks&color=orange&style=flat-square" alt="Forks">
</a>
</p>

  <table align="center">
 <tr align='center'>
 <td colspan="3">
 ၊၊||၊||၊
 </td>
 </tr>
 <tr><td><a href="README.md"><img src="https://raw.githubusercontent.com/ARCANGEL0/ARCANGEL0/master/img/us-flag.png" height="13"> English</a></td>
 <td><a href="README_fr.md"><img src="https://raw.githubusercontent.com/ARCANGEL0/ARCANGEL0/master/img/fr-flag.png" height="13"> Français</a></td>
 <td><a href="README_pt.md"><img src="https://raw.githubusercontent.com/ARCANGEL0/ARCANGEL0/master/img/br-flag.png" height="13"> Português</a></td></tr>
</table>

#### Este projeto foi realizado para os Escoteiros do mar [77GEMAR Jair Mattenauer Silveira](https://www.77gemar-jairmattenauer.com) localizado em SP/Brasil, um painel financeiro para gerenciar a inscrição dos escoteiros... juntamente com o site

## Descrição do Projeto

O FlowManager é um painel de gerenciamento financeiro completo construído usando o Phinx. Ele fornece autenticação de conexão segura e uma interface amigável para o gerenciamento de assinaturas mensais, monitoramento de pagamentos e exibição de clientes / assinantes. O painel também permite que os usuários controlem seus dados, gerenciem finanças mensais e anuais, o acesso a estatísticas financeiras e gera relatórios detalhados para meses ou anos específicos.

## Indices

- [Descrição do projeto](#Descrição-do-projeto)
- [Índice](#indice)
- [Instalação](#instalação)
- [Uso](#uso)
- [Para iniciar](#para-iniciar)
  - [Estrutura do projeto](#estrutura-do-projeto)
  - [Funções e métodos](#funções-e-métodos)
- [Contribuir](#contribuir)
- [Licença](#Licença)

## Instalação 


Primeiro, verifique se o PHP e o Phinx estão instalados no seu dispositivo. Clone o repo em seu local de preferência e modifique os arquivos de configuração do Phinx e o banco de dados para os dados do seu sql.

```shell
    git clone https://github.com/ARCANGEL0/FlowManager.git
    cd FlowManager
    nano phinx.php
    nano database.php
```
No phinx.php, edite a configuração do phinx de acordo com seu banco de dados SQL
```php 
FlowManager ' => [
            'adapter' => 'mysql',
            'host' => '',
            'name' => '', // database Name || nome do Banco de dados, é preciso já existir um banco com esse nome
            'user' => '',
            'pass' => '',
            'port' => '3306',
            'charset' => 'utf8',
        ],

```
E então modifique as variáveis globais do projeto em database.php:
```php
<?php

// Define your database connection details as global variables
// Définissez les détails de votre connexion à la base de données en tant que variables globales
// Defina as variaveis de conexao aqui
// 
$GLOBALS['sql'] = array(
    'host' => 'your_host',
    'db' => 'your_database_name',
    'user' => 'your_username',
    'pass' => 'your_password'
);

?>
```
e ainda por último, models/db.php:
```php
Class db {
	
	private $maquina = "";
	private $user = "";
	private $password ="";
	private $db = "";
```

Certifique-se de ter criado um banco de dados para usar no sistema
Execute as migrações para gerar as tabelas e dados no banco de dados desejado.

```shell
    vendor/bin/phinx migrate -e flowManager
    vendor/bin/phinx seed:run -e flowManager
 ```

Certifique-se de adicionar uma entrada para Administradores em seu banco de dados e usá-la como seu login.
 Em seguida, execute o servidor local na pasta raiz como preferir.

```shell
 php -S localhost:8000 -t . 
```
 &nbsp; ou

```shell
 symfony server:start
```



## Para iniciar 

Esta seção fornece um guia de início rápido de alto nível, explicando a estrutura, funções e processos do projeto.

### Estrutura do projeto 

O projeto segue a estrutura Model-View-Controller, dividido por pastas.

```txt
|- Models 
|    |- Gastos
|    |- Mensalidades
|    |- Usuarios
|    |- Administrador
|    '- Banco de dados
|- Controllers
|    |- AdministradorControl
|    |- GastosControl
|    |- MensalidadesControl
|    |- UsuariosControl
|    |- db
|    |  '- Controllers to fetch SQL Data
|    |- login
|    |  '- Controllers to handle login
|    '- data
|        '- Controllers to handle CRUD methods
 '- Views
      |- Dashboard
      |- Users
      |- Subscriptions page 
      |- Incomes and outcomes
      |- Reports
```

### Funções e métodos

Neste projeto, há um modelo de usuários para lidar com dados dos clientes 
 > Crie usuários e gerencie seus dados 
 > Define a categoria, Insignia do escoteiro ou outro (A fazer) 
 > Atualiza e exclui dados 

 Um modelo de assinatura 
 > Estabelece valor de pagamento mensal 
 > Controle de pagamentos por mês, alterna e filtra pagos ou não pagos 
 > Consulta o saldo do mês atual por total de assinatura 

 Um modelo de controle de dinheiro 
 > Gerencia renda e resultados por mês ou ano 
 > Verifica o saldo atual com base no mês passado 
 > Gera relatórios mensais ou anuais com todas as transações de dinheiro

## Licença 

Este programa é um software livre: você pode redistribuí -lo e/ou modificá -lo nos termos da licença pública geral do GNU Affero, conforme publicado pelo Free Software Foundation, versão 3 da licença ou (por sua opção) qualquer versão posterior. Consulte o arquivo [LICENSE](./LICENSE) no para obter o texto completo. 

Como muitos projetos de código aberto, é exigido que os colaboradores forneçam um Contrato de licença de colaborador (CLA). Ao enviar o código usado, você está concedendo o direito de usar esse código nos termos do CLA.

<br>


<p align="center">
 <a href="https://ko-fi.com/henryarcangelo">
   <img src="https://ko-fi.com/img/githubbutton_sm.svg" alt="Buy Me a Coffee at ko-fi.com" data-canonical-src="https://ko-fi.com/img/githubbutton_sm.svg" style="max-width: 100%;">
 </a> <br>
&nbsp;&nbsp;&nbsp; <strong>Happy Coding</strong> ❤️
</p>



[🔝](#Indices)