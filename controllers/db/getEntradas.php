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
 


$table = 'Entradas';

// chave primaria 
$primaryKey = 'id';
 
// data das colunas
$columns = array(
    array( 'db' => 'Mes',   'dt' => 0, 'field' => 'Mês'  ),

    array( 'db' => 'Tipo',   'dt' => 1, 'field' => 'Entrada'  ),
    array( 'db' => 'Custo',   'dt' => 2, 'field' => 'Custo' ),

);
 


require('../../plugins/datatables/ssp.class.php');


echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns)
);
