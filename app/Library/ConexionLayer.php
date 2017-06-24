<?php
/*variable para la conexion*/
$NombreServidor = "localhost";
$NombreUsuario = "root";
$Passwd = "proyectoponchador";

//$GLOBALS['db'];

$db = new mysqli($NombreServidor, $NombreUsuario, $Passwd);
//$conexion = mysqli_connect($NombreServidor, $NombreUsuario, $Passwd);

/*informacion de coneccion*/
if($db->connect_errno){
    printf("Conecci&oacute;n a fallado: " . $db->connect_error);
    exit();
}
//else{
//    echo 'La conexión fue exitosa';
//}

/*para evitar que la conexion spamee la db*/
//mysqli_close($Conx);
?>