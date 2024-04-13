<?php
 

include_once '../../global_config.php';

// Fetch the global variables for database connection details
$host = $GLOBALS['sql']['host'];
$db = $GLOBALS['sql']['db'];
$user = $GLOBALS['sql']['user'];
$pass = $GLOBALS['sql']['pass'];

// Define the $sql_details array with the fetched values
$sql_details = array(
    'host' => $host,
    'db' => $db,
    'user' => $user,
    'pass' => $pass
);
 

$table = 'Usuarios'; // tabela
 
//chave primaria 

$primaryKey = 'CPF';
 
// dados das colunas
$columns = array(
    array( 'db' => 'Isento', 'dt' => 5 ),
    array( 'db' => 'Nome',  'dt' => 1 ),
    array( 'db' => 'Ramo',   'dt' => 2 ),
    array( 'db' => 'Email',   'dt' => 3 ),
    array( 'db' => 'DataNascimento',     'dt' => 4 ),
    array('db'  => 'CPF', 'dt'  => 0),
    array('db'  => 'RG', 'dt'  => 6),
    array('db'  => 'Endereco', 'dt'  => 7),
    array('db'  => 'Bairro', 'dt'  => 8),
    array('db'  => 'NomeResponsavel', 'dt'  => 9),
    array('db'  => 'GrauResponsavel', 'dt'  => 10),
    array('db'  => 'CPFresponsavel', 'dt'  => 11),

);
 
require('../../plugins/datatables/ssp.class.php');


echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns)
);
