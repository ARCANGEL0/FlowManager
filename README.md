
<div align="center">
    <img height="20%" width="20%" src="https://cdn-icons-png.flaticon.com/512/5501/5501564.png" >
  <br>
  <h1>FlowManager 💲</h1>
  <strong>Financial dashboard to manage subscriptions, incomes and outcomes, monthly and annual report and info</strong>
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

#### This project was made for the Sea Scouts [77GEMAR Jair Mattenauer Silveira](https://www.77gemar-jairmattenauer.com) located in SP/Brazil, a financial dashboard to manage scouts subscription.. along with their website

## Project Description

FlowManager is a comprehensive financial management dashboard built using Laravel. It provides secure login authentication and a user-friendly interface for managing monthly subscriptions, tracking payments, and displaying client/subscriber information. The dashboard also enables users to control their data, handle monthly and annual finances, access financial statistics, and generate detailed reports for specific months or years.

## Table of Contents

- [About the project](#project-description)
- [Table of Contents](#table-of-contents)
- [Installation](#installation)
- [Usage](#usage)
- [Getting Started](#getting-started)
  - [Project Structure](#project-structure)
  - [Functions and methods](#functions-and-methods)
- [Contribute](#contribute)
- [License](#license)

## Installation 

Firstly, verify if you have PHP and Laravel installed in your device. Clone the repo to your preferred location, and edit the Phinx and database configuration files for your database data

```shell
    git clone https://github.com/ARCANGEL0/FlowManager.git
    cd FlowManager
    nano phinx.php
    nano database.php
```
On phinx.php, edit the phinx configuration based on your SQL database
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
And then edit global variables for the project on database.php:
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
and last but not least, models/db.php:
```php
Class db {
	
	private $maquina = "";
	private $user = "";
	private $password ="";
	private $db = "";
```

### Usage 
Make sure you've created a database to be used for the system
Run the migrations to generate the tables and data in the database you want.

```shell
    vendor/bin/phinx migrate -e flowManager
    vendor/bin/phinx seed:run -e flowManager
 ```
 Make sure to add an entry to Administradores in your database, and use as your login.
 Then run the local server in the root folder however you prefer.

```shell
 php -S localhost:8000 -t . 
```
 &nbsp; or

```shell
 symfony server:start
```



## Getting Started

This section provides a high-level quick start guide, explaining project structure, functions and processes.
### Project Structure 

The project follows Model-View-Controller structure, divided by folders.

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

### Functions and methods

In this project, there's a Users model to handle clients data
> Create users and manage their data 
> Set category, scout rank or whatsoever (To-do)
> Update and delete Data

A subscription model
> Establish monthly payment value 
> Control payments per month, toggle paid or not subscriptions 
> See current month balance by subscription 

A money control model 
> Manage incomes and outcomes by month or year
> Check current balance based on past month
> Generate reports with all money transactions 

## License

This program is free software: you can redistribute it and/or modify it under the terms of the GNU Affero General Public License as published by the Free
Software Foundation, either version 3 of the License, or (at your option) any later version. Please see the [LICENSE](./LICENSE) file in the repo for the full text.

Like many open source projects, it is required that contributors provide a Contributor License Agreement (CLA). By submitting code used, you are granting the right to use that code under the terms of the CLA.

<br>


<p align="center">
 <a href="https://ko-fi.com/henryarcangelo">
   <img src="https://ko-fi.com/img/githubbutton_sm.svg" alt="Buy Me a Coffee at ko-fi.com" data-canonical-src="https://ko-fi.com/img/githubbutton_sm.svg" style="max-width: 100%;">
 </a> <br>
&nbsp;&nbsp;&nbsp; <strong>Happy Coding</strong> ❤️
</p>



[🔝](#table-of-contents)