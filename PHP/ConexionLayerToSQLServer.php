<?php

$serverName = "ANLLERYS-PC\sqlexpress"; //serverName\instanceName
//
//// Puesto que no se han especificado UID ni PWD en el array  $connectionInfo,
//// La conexión se intentará utilizando la autenticación Windows.
//$connectionInfo = array( "Database"=>"a1", "UID"="root", 

$connectionInfo = array( "Database"=>"a1", "UID"=>"root", "PWD"=>"proyectoponchador");

$conn = sqlsrv_connect( $serverName, $connectionInfo);


//$conn = new PDO( "sqlsrv:server=('local');Database='a1'");  
//$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );  
//$conn->setAttribute( PDO::SQLSRV_ATTR_QUERY_TIMEOUT, 1 );


//test de funcionalidad y troubleshooting 
/*
    if( $conn ) {
         echo "Conexión establecida.<br/>";
    }else{
         echo "Conexión no se pudo establecer.<br/>";
         die( print_r( sqlsrv_errors(), true));
    }


$select = "SELECT * FROM AtdRecord";

$t = sqlsrv_query($conn, $select);

while( $row = sqlsrv_fetch_array( $t, SQLSRV_FETCH_ASSOC) ) {
      echo $row['RecDate'].", ".$row['RecTime']."<br />";
}
*/


?>