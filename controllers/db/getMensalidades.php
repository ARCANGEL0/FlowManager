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
 


$table = 'Usuarios';

$joinQuery = "FROM `{$table}` AS `u` LEFT JOIN `Mensalidades` AS `m` ON (`m`.`CPF` = `u`.`CPF`)";
// chave primaria 
$extraWhere = "u.Isento = 'Nao'";
$primaryKey = 'CPF';
 
// data das colunas
$columns = array(
    array( 'db' => 'u.CPF', 'dt' => 0,'field' => 'CPF' ),
    array( 'db' => 'Nome',  'dt' => 1,'field' => 'Nome'  ),
    array( 'db' => 'u.ramo',   'dt' => 2, 'field' => 'ramo'  ),
    array( 'db' => 'm.Mes',   'dt' => 3, 'field' => 'Mes'  ),
    array( 'db' => 'm.Pago',   'dt' => 4 , 'field' => 'Pago' ),

);
 


require('../../plugins/datatables/ssp.class.php');


echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns,$joinQuery,$extraWhere)
);
