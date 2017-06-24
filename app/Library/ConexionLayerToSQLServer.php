<?php

$serverName = "ANLLERYS-PC\sqlexpress"; 
$dataBase = "a1";
$UID = "root";
$PWD = "proyectoponchador";

/***********************No object Oriented access****************/
/****************************************************************/
//$connectionInfo = array( "Database"=>"a1", "UID"="root", 

//$connectionInfo = array( "Database"=>$dataBase, "UID"=>$UID, "PWD"=>$PWD);
//
//$conn = sqlsrv_connect( $serverName, $connectionInfo);



//test de funcionalidad y troubleshooting 

//    if( $conn ) {
//         echo "Conexión Establecida.<br/>";
//    }else{
//         echo "Conexión no se pudo establecer.<br/>";
//         die( print_r( sqlsrv_errors(), true));
//    }


$select = "SELECT * FROM AtdRecord";
//
//$t = sqlsrv_query($conn, $select);
//
//while( $row = sqlsrv_fetch_array( $t, SQLSRV_FETCH_ASSOC) ) {
//      echo $row['RecDate'].", ".$row['RecTime']."<br />";
//}


//****************************PDO Access ************************/
/****************************************************************/

try 
{ 
    $conn = new PDO("sqlsrv:Server=$serverName;Database=$dataBase", $UID, $PWD);
    
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    
} 
catch(Exception $e)
{ 
    die( print_r( $e->getMessage() ) );
}

//        $db = $GLOBALS['db'];
//        $Result = $conn->query($select); 
//        print_r($conn->query($select)->fetchAll());
        

























?>