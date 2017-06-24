<?php

include 'App\lib\ConexionLayer';
//include 'App\lib\ConexionLayerToSQLServer';

use DB;

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Exe2 extends Controller
{
    public function index(){
        switch($_POST['action']){
        
    case "testing":
        
        break;
        
    case "crearHorario": //OJO**** Descontinuado en segunda revision
//        print_r("que coass");
//        return

        crearHorario();
        
        break;

    case "ConsultaClaseLimit": //OJO**** Descontinuado en segunda revision
//        print_r("que coass");
//        return
        
        ConsultaClaseLimit();
        
        break;
    
    case "ActualizarClase": 
//        print_r("que coass");
//        return

        ActualizarClase();
        
        break;
        
    case "crearClase": 
//        print_r("que cosas");
//        return

        crearClase();
        
        break;
    
    case "guardarHorario":
//        print_r("que coass");
//        return

        guardarHorario();
        
        echo "ok";
        
        break;
        
    case "horarioReposicion":
        
        $nombreClase = $_POST['nombreClase'];
        $diaDeReposicion = $_POST['diaDeReposicion'];
        $Entrada = $_POST['Inicio'];
        $Salida = $_POST['Salida'];
        
//comprobación de parametros
        //vacios
        if(!isset($nombreClase) || !isset($diaDeReposicion) || !isset($Entrada) || !isset($Salida)){
            echo "camposVacios";
            exit;
        }
        //error en horario
        $tin = strtotime($Entrada);
        $tout = strtotime($Salida);
//        echo var_dump($tin);exit;
            if($tin>=$tout){
                echo "HE";
                exit;
            }
//fin de comprobacion
        
        actionReposition($nombreClase, $diaDeReposicion, $Entrada, $Salida);
        
        break;
    
    case "dataList":
        
        $SELECTFROM = $_POST['select'];
//       $SELECTFROM = "";
        
        dataList($SELECTFROM);
        
        break;
        
    case "asig":
//        echo "entro a la funcion CrearAsignatura";
        
//        print_r($_POST);
        CrearAsignaturaQuery();
//        CargarPensum();
      header("location: ../home.php?action=ok");
        break;
    
    case "ProfList":
        ListadoGral();
        
        break;
        
        
    case "Pensum":
//        echo $_POST['action'], "<br>";
        $ConsultaEA = $_POST['ACarrera'];
//        echo $ConsultaEA, "<br>";
        CargarPensum($ConsultaEA);
        
        break; 
    case "ConsultarClase":
        
        $ConsultaEA = $_POST['ACarrera'];
        $selector = $_POST['selector'];
        
        $test = "SELECT Nombre FROM proyecto_ponchador.clases_creadas WHERE proyecto_ponchador.clases_creadas.Nombre LIKE '$ConsultaEA'";
        $db = $GLOBALS['db'];
        $Result = $db->query($test);
            if (mysqli_num_rows($Result)===0) {
                echo "error";
                exit;    
            }
//        echo $selector;
        if($selector==='1'){
            
            $query = "SELECT Nombre as 'Nombre de la Clase', proyecto_ponchador.profesores.PNombre as 'Profesor', proyecto_ponchador.Asignatura.ANombre as 'Asignatura', proyecto_ponchador.clases_creadas.NHorario 'Bajo el Horario' FROM proyecto_ponchador.clases_creadas INNER JOIN proyecto_ponchador.profesores ON (proyecto_ponchador.clases_creadas.PMatricula = proyecto_ponchador.profesores.PMatricula) INNER JOIN proyecto_ponchador.asignatura on (proyecto_ponchador.clases_creadas.ACodigo = proyecto_ponchador.asignatura.ACodigo) WHERE proyecto_ponchador.clases_creadas.Nombre='$ConsultaEA'";
            
        }else{
            
            $query = "SELECT proyecto_ponchador.horarios_creados.Nombre, Alias, proyecto_ponchador.dias.DiaSemana, Entrada, Salida FROM proyecto_ponchador.horarios_creados INNER JOIN proyecto_ponchador.clases_creadas ON (proyecto_ponchador.clases_creadas.NHorario = proyecto_ponchador.horarios_creados.Nombre) INNER JOIN proyecto_ponchador.dias ON (proyecto_ponchador.dias.ID = proyecto_ponchador.horarios_creados.Dia) WHERE proyecto_ponchador.clases_creadas.Nombre LIKE '$ConsultaEA'";
            
            
        }

//        echo $query;
//        echo $ConsultaEA, "<br>";
        ConsultarClase($query);
        
        
        break;   
        
    case "Horarios":
//        echo $_POST['action'], "<br>";exit;
        $ConsultaEA = $_POST['AHorarios'];
//        echo $ConsultaEA, "<br>";
        CargarHorarios($ConsultaEA);
        
        break;    
    
    case "ConsultaEditarAsignatura":
//        echo $_POST['action'], "<br>";
        $ConsultaEA = $_POST['InputEditAsig'];
//        echo $carrera, "<br>";
//        echo $ConsultaEA;
        if ($ConsultaEA===""){
        echo "vacio";
        exit;
        }else{   
        ConsultarAsignatura($ConsultaEA);
        }
        
        break;
    
    case "ConsultaEditarProfesor":
//        echo $_POST['action'], "<br>";
        $ConsultaEA = $_POST['InputEditAsig'];
//        echo $carrera, "<br>";
//        echo $ConsultaEA;
        if ($ConsultaEA===""){
        echo "vacio";
        exit;
        }else{   
        ConsultarProfesor($ConsultaEA);
        }
        break; 
        
    case "Consulta2EditarAsignatura":
//        echo $_POST['action'], "<br>";
        $ConsultaEA = $_POST['InputEditAsig'];
//        echo $carrera, "<br>";
        ConsultarAsignaturaEliminar($ConsultaEA);
        
        break;
    case "EliminarHorarioConsulta":
//        echo $_POST['action'], "<br>";
        $ConsultaEA = $_POST['InputEliminarHorario'];
//        echo $carrera, "<br>";
        EliminarHorarioConsulta($ConsultaEA);
        
        break;
    case "EliminarClaseConsulta":
//        echo $_POST['action'], "<br>";
        $ConsultaEA = $_POST['InputEliminarClase'];
//        echo $carrera, "<br>";
        EliminarClaseConsulta($ConsultaEA);
        
        break; 
     
    case "EditarAsignatura":
//        $_POST['InputEditAsig'] = "";

        $ConsultaEA = $_POST['InputEditAsig'];
        if ($ConsultaEA===""){
        echo "vacio";
        exit;
        }else{   
        EditarAsignatura($ConsultaEA);
        }

        break;
    case "EditarClase":
//        $_POST['InputEditAsig'] = "";
        $ConsultaEA = $_POST['InputEditHorario'];
        if ($ConsultaEA===""){
            echo "vacio";
            exit;
        }else{   
            EditarClase($ConsultaEA);
        }

        break;
        
    case "EditarHorario":
//        $_POST['InputEditAsig'] = "";

        $ConsultaEA = $_POST['InputEditAsig'];
        if ($ConsultaEA===""){
        echo "vacio";
        exit;
        }else{   
        EditarHorario($ConsultaEA);
        }

        break; 
        
    case "EditarProfesor":
//        $_POST['InputEditAsig'] = "math";

        $ConsultaEA = $_POST['InputEditAsig'];
        Editarprofesor($ConsultaEA);

        break;
        
    case "UpdateAsignatura":
//        $_POST['InputEditAsig'] = "math";

        $ConsultaEA = $_POST['InputEditAsig'];
//        echo $ConsultaEA;
        header('location: ../home.php?action=*-*');
        //Mas un alert que se agregara con colorsito y redireccionamiento al home o reports. 
        UpdateAsignatura($ConsultaEA);
        

        break;
        
    case "ActualizarHorario":
//        $_POST['InputEditAsig'] = "math";

//        $ConsultaEA = $_POST['nombreHorario'];
//        echo $ConsultaEA;
        foreach($_POST as $key => $Val){
            if(empty($Val)){
                echo "PH";
                exit;
                break;
            }
        }
        
        ActualizarHorario();
        //Mas un alert que se agregara con colorsito y redireccionamiento al home o reports. 
//        header('location: ../home.php?action=UH');
        
        break;
    
    case "UpdateEstatus":
//        $_POST['InputEditAsig'] = "math";

        $ConsultaEA = $_POST['InputEditAsig'];
//        echo $ConsultaEA;
//        header('location: ../home.php?action=*-*');
        //Mas un alert que se agregara con colorsito y redireccionamiento al home o reports. 
        UpdateEstatus($ConsultaEA);
        

        break;
        
    case "InactivarProfesor":
//        $_POST['InputEditAsig'] = "math";

        $ConsultaEA = $_POST['InputEditAsig'];
//        echo $ConsultaEA;
//        return;
//        header('location: ../home.php?action=*-*');
        //Mas un alert que se agregara con colorsito y redireccionamiento al home o reports. 
        InactivarProfesor($ConsultaEA);
        

        break;
    case "ActivarProfesor":
//        $_POST['InputEditAsig'] = "math";

        $ConsultaEA = $_POST['InputEditAsig'];
//        echo $ConsultaEA;
//        return;
//        header('location: ../home.php?action=*-*');
        //Mas un alert que se agregara con colorsito y redireccionamiento al home o reports. 
        ActivarProfesor($ConsultaEA);
        

        break;
        
    case "UpdateProfesor":
//        $_POST['InputEditAsig'] = "math";

        $ConsultaEA = $_POST['PMatricula'];
//        echo $ConsultaEA;
//        header('location: ../home.php?action=*P*');
        //Mas un alert que se agregara con colorsito y redireccionamiento al home o reports. 
//        echo $ConsultaEA;
        UpdateProfesor($ConsultaEA);
        header('location: ../home.php?action=UPP');
        

        break;
        
    case "EliminarAsignatura":
//        $_POST['InputEditAsig'] = "math";

        $ConsultaEA = $_POST['InputEditAsig'];
//        echo $ConsultaEA;
//        return($_POST['InputEditAsig']);
//        header('location: ../home.php?done="lavida"');
//Mas un alert que se agregara con colorsito y redireccionamiento al home o reports. 
        EliminarAsignatura($ConsultaEA);
        
        
        break;
        
    case "EliminarClase":
//        $_POST['InputEditAsig'] = "math";

        $ConsultaEA = $_POST['InputEliminarClase'];
//        echo $ConsultaEA;
//        return($_POST['InputEditAsig']);
//        header('location: ../home.php?done="lavida"');
//Mas un alert que se agregara con colorsito y redireccionamiento al home o reports. 
        EliminarClase($ConsultaEA);
        
        
        break;
        
    case "EliminarHorario":
//        $_POST['InputEditAsig'] = "math";

        $ConsultaEA = $_POST['InputEliminarHorario'];
//        echo $ConsultaEA;
//        return($_POST['InputEditAsig']);
//        header('location: ../home.php?done="lavida"');
//Mas un alert que se agregara con colorsito y redireccionamiento al home o reports. 
        EliminarHorario($ConsultaEA);
        
        
        break;
//************************ Descontinuada en segunda revicion ***************//        
//    case "EliminarHorario":
////        $_POST['InputEditAsig'] = "math";
//
////        $ConsultaEA = $_POST['InputEditAsig'];
////        echo $ConsultaEA;
////        return($_POST['InputEditAsig']);
////        header('location: ../home.php?done="lavida"');
//        //Mas un alert que se agregara con colorsito y redireccionamiento al home o reports. 
//        EliminarHorario();
//        
//        break;
        

    case "addProf":
        addProf('profesor');
        header('location: ../home.php?action=addedProf');
        
    break;
    case "verDetalles":

        verDetalles();
        
        
    break;
        
    }
    }
function ConsultaClaseLimit(){
    
   
    $levelLimit = $_POST['limite'];
    $selector = $_POST['selector'];
//    echo $selector;
//    echo "<br><br>";
//    echo $levelLimit;
//    
    
    if($selector==='1'){
        $campo = $_POST['campo'];
        $filtro = $_POST['filtro'];
        
        $query = "select proyecto_ponchador.clases_creadas.ID, Nombre AS 'Nombre de la Clase', ANombre as 'Nombre de Asignatura', proyecto_ponchador.clases_creadas.ASeccion as 'Secci&oacute;n de la Clase', PNombre as 'Profesor Vinculado', NHorario AS 'Horario'  FROM proyecto_ponchador.clases_creadas INNER JOIN proyecto_ponchador.profesores on (proyecto_ponchador.clases_creadas.PMatricula = proyecto_ponchador.profesores.PMatricula) INNER JOIN proyecto_ponchador.asignatura on (proyecto_ponchador.asignatura.ACodigo = proyecto_ponchador.clases_creadas.ACodigo) WHERE $campo LIKE '%".$filtro."%'";
        
    }elseif($levelLimit < 0){
        echo "dt";exit;
    }else{
//        echo "$levelLimit";
    $query = "select proyecto_ponchador.clases_creadas.ID, Nombre AS 'Nombre de la Clase', ANombre as 'Nombre de Asignatura', proyecto_ponchador.clases_creadas.ASeccion as 'Secci&oacute;n de la Clase', PNombre as 'Profesor Vinculado', NHorario AS 'Horario'  FROM proyecto_ponchador.clases_creadas INNER JOIN proyecto_ponchador.profesores on (proyecto_ponchador.clases_creadas.PMatricula = proyecto_ponchador.profesores.PMatricula) INNER JOIN proyecto_ponchador.asignatura on (proyecto_ponchador.asignatura.ACodigo = proyecto_ponchador.clases_creadas.ACodigo) ORDER BY Nombre limit 0, $levelLimit";
    }
    
//    $in = $_POST['antes'];
    
    
    
//    echo $query;
//    echo "<br><br>";

//    
//    $db = $GLOBALS['db'];
//    
//    $Result = $db->query($query);
////    print_r($Result);
////    echo $Result;
//        if (mysqli_num_rows($Result)===0) {
//            echo "error";
////                printf("Errormessage: %s\n", $db->error);
//
//            exit;    
//        }

//            while ($row = $Result->fetch_object()){
//  	    echo "<p class='rows'>".$row['comment']."</p>";
//            }
    
    
    $CargarData = aquery($query);
//    print_r( $CargarData);
//    echo $CargarData;
//    $tipoVar = var_dump($CargarData);
//    echo var_dump($CargarData);
//    exit;
    if ($CargarData==='fail'){
        echo "<table class='table table-condensed table-bordered table-reports table-consulta table-limited table-profList'>
            <thead>
                <tr>
                    <th>Nombre de la Clase</th>
                    <th>Nombre de Asignatura</th>
                    <th>Sección de la Clase</th>
                    <th>Profesor Vinculado</th>
                    <th>Horario</th>
                    <th>Ver Detalle</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>No data</td>
                    <td>No data</td>
                    <td>No data</td>
                    <td>No data</td>
                    <td>No data</td>
                    <td>No data</td>
                </tr>
            </tbody>
        </table>";
        exit;
    }
    display_Limited_data($CargarData);
//    $json = json_encode($CargarData[0]);
//    echo $json;

    
    
}
function verDetalles(){
    $NH = $_POST['campo'];
    $sl = $_POST['selector'];
//    echo $sl;exit;
    if($sl==='1'){
//        echo "estoy aqui";
        $query = "select ANombre as 'Nombre Asignatura', proyecto_ponchador.asignatura.ACodigo as 'Codigo Asignatura', proyecto_ponchador.asignatura.ASeccion as 'Secci&oacute;n', proyecto_ponchador.carreras.CNombre as 'Carrera', ACuatrimestre as 'Cuatrimestre', ACreditos as 'Cantidad de Creditos' FROM proyecto_ponchador.clases_creadas INNER JOIN proyecto_ponchador.asignatura on (proyecto_ponchador.clases_creadas.ACodigo = proyecto_ponchador.asignatura.ACodigo) INNER JOIN proyecto_ponchador.carreras on (proyecto_ponchador.asignatura.CNombre = proyecto_ponchador.carreras.ID) WHERE proyecto_ponchador.clases_creadas.ID = '$NH'";
        
        ConsultarClase($query);
        
    } elseif ($sl==="2"){
        $query = "select PNombre as 'Profesor Vinculado', PApellido as Apellido, PCedula as 'C&eacute;dula', proyecto_ponchador.profesores.PMatricula as 'ID del Profesor', PDireccion as 'Direcci&oacute;n', PTelefono as 'Tel&eacute;fono' FROM proyecto_ponchador.clases_creadas INNER JOIN proyecto_ponchador.profesores on (proyecto_ponchador.clases_creadas.PMatricula = proyecto_ponchador.profesores.PMatricula) where proyecto_ponchador.clases_creadas.ID = '$NH'";
        
        ConsultarClase($query);
        
    } elseif($sl==='3'){
        $query = "select proyecto_ponchador.horarios_creados.Nombre, proyecto_ponchador.horarios_creados.Alias, proyecto_ponchador.dias.DiaSemana, Entrada, Salida FROM proyecto_ponchador.clases_creadas INNER JOIN proyecto_ponchador.horarios_creados on (proyecto_ponchador.clases_creadas.NHorario = proyecto_ponchador.horarios_creados.Nombre) INNER JOIN proyecto_ponchador.dias ON (proyecto_ponchador.dias.ID = proyecto_ponchador.horarios_creados.Dia) where proyecto_ponchador.clases_creadas.ID = '$NH'";
        
        ConsultarClase($query);

    }
//    echo $query;
}
function display_Limited_data($data) {
    $output = '<table class="table table-condensed table-bordered table-reports table-consulta table-limited table-profList">';
    foreach($data as $key => $var) {
        //$output .= '<tr>';
        if($key===0) {
            $output .= '<thead><tr>';
            foreach($var as $col => $val) {
                if($col==='ID'){
                $output .= "<th class='ND'>" . $col . '</th>';    
                }else{
                    
                $output .= "<th>" . $col . '</th>';
                }
            }
            $output .= '<th>Ver Detalle</th></tr></thead><tr>';
            foreach($var as $col => $val) {
                if($col==='ID'){$ID = $val;
                $output .= "<td class='ND'>" . $val . "</td>";
                    
                }else{
                $output .= '<td>' . $val . '</td>';
                                }
            }
            $output .= "<td class='tdVerDetalle'> <input type='text' class='ND' value='$ID'> <button type='button' class='btnTable btn btn-primary' id='verDetalles$ID'>Ver detalle</button><script>$('#verDetalles$ID').click((e) => {verDetalles($ID);});</script></td></tr>";
        }
        else {
            $output .= '<tr>';
            foreach($var as $col => $val) {
                if($col==='ID'){$ID = $val;
                $output .= "<td class='ND'>" . $val . "</td>";
//                 echo "<input type='text' value='$val'>";   
                }else{
                $output .= '<td>' . $val . '</td>';
                }
            }
            $output .= "<td class='tdVerDetalle'> <input type='text' class='ND' value='$ID'> <button type='button' class='btnTable btn btn-primary' id='verDetalles$ID'>Ver detalle</button><script>$('#verDetalles$ID').click((e) => {verDetalles($ID);});</script></td></tr>";
        }
    }
    $output .= '</table>';
    echo ($output);

//    return $output;

}






function ActualizarClase(){
    $oldName = $_POST['oldName'];
//    echo $oldName;
    $NClase = $_POST['NombreClase'];
    $PMatri = $_POST['inputProf2'];
    $ACodigo = $_POST['inputA'];
    $Seccion = $_POST['FSeccion'];
    $NHorario = $_POST['inputHorario'];
    
//    if($NClase==="" or $PMatri==="" or $ACodigo==="" or $Seccion==="" or $NHorario===""){
//        echo "fieldNull";  
//        exit;
//    }
    
    $upQuery = "UPDATE proyecto_ponchador.clases_creadas SET Nombre='$NClase', PMatricula='$PMatri', ACodigo='$ACodigo', ASeccion='$Seccion', NHorario='$NHorario' WHERE proyecto_ponchador.clases_creadas.Nombre='$oldName'";
//    echo $upQuery;
//    $test = "select * from proyecto_ponchador.clases_creadas where proyecto_ponchador.clases_creadas.Nombre='$oldName'"
    
//    $Result = aquery($test);
//    if(mysql_num_rows($Result)===0){
//        echo 
//    }
    
    $Result = tquery($upQuery);
    
//    echo $Result;
    echo "ok";
    
}


/************************** crearClase ************/

function crearClase(){
    $profesor = $_POST['inputProf2'];
    $Asignatura = $_POST['inputA'];
    $horario = $_POST['inputHorario'];
    $Seccion = $_POST['FSeccion'];
    $claseNombre = $_POST['NombreClase'];
    
//ver si ya la asignatura esta asignada
    $testAsignatura = "select * from proyecto_ponchador.clases_creadas where ACodigo='$Asignatura' and ASeccion='$Seccion'";
    $Result = tquery($testAsignatura);    
    if (mysqli_num_rows($Result)>0){
        echo "claseDupli";
        exit;
    }
//fin de la prueba
//comprobar el Nombre no exista
    $test = "select * from proyecto_ponchador.clases_creadas where Nombre='$claseNombre'";
    $Result = tquery($test);
//    echo var_dump($Result);
    if (mysqli_num_rows($Result)>0){
        echo "NombreUsado";
        exit;
    }
//fin de la prueba
    
//*************Comprobar existe el horario
    $testHorario = "select * from proyecto_ponchador.horarios_creados_linear where Nombre like '$horario'";
//echo $testHorario;
    $db = $GLOBALS['db'];
    $Result = $db->query($testHorario);
    if(!$Result){
            
    printf("Errormessage: %s\n", $db->error);
        
        }
//    $db->close();
//print_r($Result); exit;
    
    if (mysqli_num_rows($Result)===0){
        echo "NH";
        exit;
    }
//****************fin de la prueba

//***************Comprobar existe el profesor
    $testProfesor = "select * from proyecto_ponchador.profesores where PMatricula like '$profesor'";
//echo $testProfesor;
    
    $db = $GLOBALS['db'];
    $Result = $db->query($testProfesor);
    //Traer el nombre del prof
//    print_r($Result); exit;
    
    if (mysqli_num_rows($Result)===0){
        echo "NP";
        exit;
    }
//*********************fin de la prueba
    
    
    $INSERTINTO = "insert into proyecto_ponchador.clases_creadas (Nombre, PMatricula, ACodigo, ASeccion, NHorario) VALUES ('$claseNombre','$profesor','$Asignatura','$Seccion','$horario')";
    
//    echo $INSERTINTO;
    
    
    $Result = tquery($INSERTINTO);
    
//    echo $Result;
    
    echo "ok";
    
}

/**************************Seccion para manejo data profesor************/
//dataListProf()
//datalist();

function dataList($SELECTFROM){
    
    $Result = aquery($SELECTFROM);
//   echo json_encode($Result[0]);

//    exit;
    
    $a = array();
    $x = -1;
    
    foreach($Result as $key => $var) {
        if($key===0) {
            foreach($var as $col => $val) {
//                $output .='<option>'. $val . '</option>';
                $x = $x + 1;
                
                $a[$x] = $col;
//                echo $a[$x];
//                echo $col;
                
                
            }        }    } 

    

    
    foreach($Result as $key => $var) {
        if($key===0) {
        $output = "";
            foreach($var as $col => $val) {
                if($a[0]===$col){
                    $output .='<option value="'. $val . '">';   
                }else{
                    $output .= $val . '</option>';   
                }
            }
        }
        else {
            foreach($var as $col => $val) {
                if($a[0]===$col){
                    $output .='<option value="'. $val . '">';   
                }else{
                    $output .= $val . '</option>';   
                }
            }
        }
    }
//    echo   htmlspecialchars($output);
    echo $output;
}
//function dataList1($SELECTFROM){
//    
//    $Result = aquery($SELECTFROM);
////   echo json_encode($Result[0]);
//
////    exit;
//    
//    $a = array();
//    $x = -1;
//    
//    foreach($Result as $key => $var) {
//        if($key===0) {
//            foreach($var as $col => $val) {
////                $output .='<option>'. $val . '</option>';
//                $x = $x + 1;
//                
//                $a[$x] = $col;
////                echo $a[$x];
////                echo $col;
//                
//                
//            }        }    } 
//
//    
//
//    
//    foreach($Result as $key => $var) {
//        if($key===0) {
//        $output = "";
//            foreach($var as $col => $val) {
//                if($a[0]===$col){
//                    $output .='<option>'. $val . '</option>';   
//                }else{
//                    $output .= $val . '</option>';   
//                }
//            }
//        }
//        else {
//            foreach($var as $col => $val) {
//                if($a[0]===$col){
//                    $output .='<option>'. $val . '</option>';   
//                }else{
//                    $output .= $val . '</option>';   
//                }
//            }
//        }
//    }
////    echo   htmlspecialchars($output);
//    echo $output;
//}

function dataisted($data) {
//    $output = '<table class="table table-condensed table-bordered table-reports">';
    
    foreach($data as $key => $var) {
        //$output .= '<tr>';
        if($key===0) {
//            $output .= '<thead><tr>';
            foreach($var as $col => $val) {
//                $output .= "<th>" . $col . '</th>';
                $output .= $col;
            }
//            $output .= '</tr></thead><tr>';
            foreach($var as $col => $val) {
//                $output .= '<td>' . $val . '</td>';
                $output .= $val;
            }
//            $output .= '</tr>';
        }
        else {
//            $output .= '<tr>';
            foreach($var as $col => $val) {
//                $output .= '<td>' . $val . '</td>';
                $output .=$val;
            }
//            $output .= '</tr>';
        }
    }
//    $output .= '</table>';
    echo  $output;
//    return $output;
}

function addProf($CC){
    $PNombre = $_POST['PNombre'];
    $PApellido = $_POST['PApellido'];
    $PCedula = $_POST['PCedula'];
    $PCelular = $_POST['PCelular'];
    $PMatricula = $_POST['PMatricula'];
    $PDireccion = $_POST['PDireccion'];
    $PL=$PM=$PMM=$PJ=$PV=$PS=$PDD=$PDN=$PDV=false;
    
    if(isset($_POST['PTelefono'])){
        $PTelefono = $_POST['PTelefono'];
        echo $PTelefono;
    }
    //disponibilidad
    if(isset($_POST['PL'])){
        $PL = $_POST['PL'];
    }
    if(isset($_POST['PM'])){
        $PM = $_POST['PM'];
    }
    if(isset($_POST['PMM'])){
        $PMM = $_POST['PMM'];
    }
    if(isset($_POST['PJ'])){
        $PJ = $_POST['PJ'];
    }
    if(isset($_POST['PV'])){
        $PV = $_POST['PV'];
    }
    if(isset($_POST['PS'])){
        $PS = $_POST['PS'];
    }
    //horario disponible
    if(isset($_POST['PDD'])){
        $PDD = $_POST['PDD'];
    }
    if(isset($_POST['PDN'])){
        $PDN = $_POST['PDN'];
    }
    if(isset($_POST['PDV'])){
        $PDV = $_POST['PDV'];
    }

           //Comprobar//
    $Condicional = "SELECT * FROM proyecto_ponchador.profesores WHERE proyecto_ponchador.profesores.PCedula = '$PCedula'";
    $Condicional = "SELECT * FROM proyecto_ponchador.profesores WHERE proyecto_ponchador.profesores.PMatricula = '$PMatricula'";
    $Condicional = "SELECT * FROM proyecto_ponchador.profesores WHERE proyecto_ponchador.profesores.PCedula = '$PCedula'";
    
   $db = $GLOBALS['db'];
    $InfoDelSelect = $db->query($Condicional);
 

        if (mysqli_num_rows($InfoDelSelect)>0){
            
        echo "<link rel='stylesheet' href='../css/bootstrap.min.css'>
        <link rel='stylesheet' href='../localStyles.css'>
        <script src='../js/Shadows.js'></script>
        <script src='../js/jquery.js'></script>
        <script src='../js/bootstrap.min.js'></script>


                <div class='alert alert-danger container alertCondi'  id='fadeout'>
            <button type='button' class='close' data-dismiss='alert'>x</button>
            <p><strong>Lo Sentimos!!</strong> Ya existe un profesor con &eacute;sta matr&iacute;cula en el sistema</p> 
        </div>

            <script>
                        $(document).ready(function () {
                            $('#fadeout').animate({
                            top: 300
                            });

                            $('#fadeout').fadeTo(2000, 500).fadeOut(4000, function () {
                                $('#fadeout').fadeOut(500, window.history.go(-1)
                                );
                            });
                        })
            </script>
            ";
        exit;
    }else{

    $Consulta = "INSERT INTO proyecto_ponchador.profesores (PNombre, PApellido, PCedula, PTelefono, PCelular, PMatricula, PDireccion, DisponibilidadLunes,DisponibilidadMartes,DisponibilidadMiercoles,DisponibilidadJueves,DisponibilidadViernes,DisponibilidadSabado,HorarioDiurno,HorarioVespertino,HorarioNocturno) VALUES ('$PNombre', '$PApellido','$PCedula','$PTelefono','$PCelular','$PMatricula','$PDireccion','$PL','$PM','$PMM','$PJ','$PV','$PS','$PDD','$PDV','$PDN')";        
            
    $Result = aquery($Consulta);
            echo $Result;
   
    }
}


/*****************************Seccion para manejo deta materia**********/



function EliminarAsignatura($CC){
//    return($CC);
    $ConsultaEA = "DELETE FROM proyecto_ponchador.asignatura where Proyecto_ponchador.asignatura.ACodigo = '$CC'";
    $db = $GLOBALS['db'];
    $Eliminada = $db->query($ConsultaEA);
    
    if($Eliminada===true){
           echo "ss";
    } else {
        echo "Ah habido un error al eliminar: " . $db->error;
    }
//    mysqli_query($conexion, $ConsultaEA);
//    echo $CC;
//    return("Estoy mandando algo");
//    header('location: ../home.php?done="lavida"');
};
function EliminarClase($CC){
    $ConsultaEA = "DELETE FROM proyecto_ponchador.clases_creadas where Proyecto_ponchador.clases_creadas.Nombre = '$CC'";
//    echo $ConsultaEA;
    
    $db = $GLOBALS['db'];
    $Eliminada = $db->query($ConsultaEA);
    
    if($Eliminada===true){
           echo "ss";
    } else {
        echo "Ah habido un error al eliminar: " . $db->error;
    }
};
function EliminarHorario($CC){
//**************Eliminar Horarios de procesos *****************//

    $ConsultaEA2 = "DELETE FROM proyecto_ponchador.horarios_creados_linear where Proyecto_ponchador.horarios_creados_linear.Nombre = '$CC'";
//    echo $ConsultaEA;
    $Result = tquery($ConsultaEA2);
//    echo $Result;
    
    
//**************Eliminar Horarios de procesor *****************//

    
//**************Eliminar Horarios de presentacion funcional *****************//
    
    $ConsultaEA = "DELETE FROM proyecto_ponchador.horarios_creados where Proyecto_ponchador.horarios_creados.Nombre = '$CC'";
    $db = $GLOBALS['db'];
    $Eliminada = $db->query($ConsultaEA);
    
//**************Eliminar Horarios de presentacion funcional *****************//

    
    if($Eliminada===true){
           echo "ss";
    } else {
        echo "Ah habido un error al eliminar: " . $db->error;
    }
};
//********************* Descontinuada en segunda revicion ******************//
//function EliminarHorario(){
////    return($CC);
//    $MatriProfesor = $_POST['inputProf'];
//    $Seccion = $_POST['seccion'];
//    $CodigoAsignatura = $_POST['inputAsig']; 
//    
//    $ConsultaEA = "DELETE FROM proyecto_ponchador.horarios WHERE proyecto_ponchador.horarios.ACodigo = '$CodigoAsignatura' AND proyecto_ponchador.horarios.ASeccion = '$Seccion'";
////    echo $ConsultaEA;
////    exit;
//    
//    $db = $GLOBALS['db'];
//    
//    $Eliminada = $db->query($ConsultaEA);
//    
//    if($Eliminada===true){
//           echo "EverythingNices";
//    } else {
//        echo "Ah habido un error al eliminar: " . $db->error;
//    }
////    mysqli_query($conexion, $ConsultaEA);
////    echo $CC;
////    return("Estoy mandando algo");
////    header('location: ../home.php?done="lavida"');
//};

function UpdateAsignatura($Data){
    
$FAsignatura = $_POST["FAsignatura"];
$FCodigoAsignatura = $_POST['FCodigoAsignatura'];
$FCantidadCreditos = $_POST['FCantidadCreditos'];
$FCarrera = $_POST['FCarrera'];
$FCicloAsignatura = $_POST['FCicloAsignatura'];
$FSeccion = $_POST['FSeccion'];
$FTieneLab = $_POST['TieneLab']; 


//Estring para insertar en la db//
 $INSERTINTO = "UPDATE proyecto_ponchador.asignatura SET CNombre='$FCarrera', ACodigo='$FCodigoAsignatura', ACreditos='$FCantidadCreditos', ACuatrimestre='$FCicloAsignatura', ANombre='$FAsignatura', ASeccion='$FSeccion', Laboratorio='$FTieneLab' WHERE proyecto_ponchador.asignatura.ACodigo='$Data'";

//    echo $INSERTINTO;

//Ejecutar todo para db//
$FEjecutor = aquery($INSERTINTO);
    


    
    //if (mysqli_connect_errno()) {
//  echo "Failed to connect to MySQL: " . mysqli_connect_errno();
//}
//    echo $query;
//    echo $FEjecutor;
};
function InactivarProfesor($Data){
//echo 'data';
//Estring para actualizar el estatus en la db de los profesores//
 $INSERTINTO = "UPDATE proyecto_ponchador.profesores SET Estatus='1' WHERE proyecto_ponchador.profesores.PMatricula='$Data'";

//    echo $INSERTINTO;

//Ejecutar todo para db//
$FEjecutor = aquery($INSERTINTO);
    


    
    //if (mysqli_connect_errno()) {
//  echo "Failed to connect to MySQL: " . mysqli_connect_errno();
//}
//    echo $query;
//    echo $FEjecutor;
};

function ActivarProfesor($Data){
//echo 'data';
//Estring para actualizar el estatus en la db de los profesores//
 $INSERTINTO = "UPDATE proyecto_ponchador.profesores SET Estatus='0' WHERE proyecto_ponchador.profesores.PMatricula='$Data'";

//    echo $INSERTINTO;

//Ejecutar todo para db//
$FEjecutor = aquery($INSERTINTO);
    


    
    //if (mysqli_connect_errno()) {
//  echo "Failed to connect to MySQL: " . mysqli_connect_errno();
//}
//    echo $query;
//    echo $FEjecutor;
};

function UpdateProfesor($Data){
//    print_r($_POST);
//    echo "<br><br>";
    $PNombre = $_POST['PNombre'];
    $PApellido = $_POST['PApellido'];
    $PCedula = $_POST['PCedula'];
    $PCelular = $_POST['PCelular'];
    $PMatricula = $_POST['PMatricula'];
    $PDireccion = $_POST['PDireccion'];
    $PL=$PM=$PMM=$PJ=$PV=$PS=$PDD=$PDN=$PDV=false;
    
    if(isset($_POST['PTelefono'])){
        $PTelefono = $_POST['PTelefono'];
    }
    //disponibilidad
    if(isset($_POST['PL'])){
        $PL = $_POST['PL'];
    }
    if(isset($_POST['PM'])){
        $PM = $_POST['PM'];
    }
    if(isset($_POST['PMM'])){
        $PMM = $_POST['PMM'];
    }
    if(isset($_POST['PJ'])){
        $PJ = $_POST['PJ'];
    }
    if(isset($_POST['PV'])){
        $PV = $_POST['PV'];
    }
    if(isset($_POST['PS'])){
        $PS = $_POST['PS'];
    }
    //horario disponible
    if(isset($_POST['PDD'])){
        $PDD = $_POST['PDD'];
    }
    if(isset($_POST['PDN'])){
        $PDN = $_POST['PDN'];
    }
    if(isset($_POST['PDV'])){
        $PDV = $_POST['PDV'];
    }
    
//Estring para insertar en la db//
//    echo $Data;
 $INSERTINTO = "UPDATE proyecto_ponchador.profesores SET PNombre = '$PNombre', PApellido = '$PApellido', PCedula = '$PCedula', PTelefono = '$PTelefono', PCelular = '$PCelular', PMatricula = '$PMatricula', PDireccion = '$PDireccion', DisponibilidadLunes = '$PL',DisponibilidadMartes = '$PM',DisponibilidadMiercoles = '$PMM',DisponibilidadJueves = '$PJ',DisponibilidadViernes = '$PV',DisponibilidadSabado = '$PS',HorarioDiurno = '$PDD',HorarioVespertino = '$PDV',HorarioNocturno = '$PDN' WHERE proyecto_ponchador.profesores.PMatricula='$Data'";

    
    
//    echo $INSERTINTO;

//Ejecutar todo para db//
//    echo "<br><br>";
//    echo $INSERTINTO;
//    echo "<br>";
//    echo $INSERTINTO;
//    exit;
$FEjecutor = aquery($INSERTINTO);
    


    
    //if (mysqli_connect_errno()) {
//  echo "Failed to connect to MySQL: " . mysqli_connect_errno();
//}
//    echo $query;
//    echo $FEjecutor;
};





function EditarAsignatura($CC){
    $ConsultaEA = "SELECT * FROM proyecto_ponchador.asignatura where Proyecto_ponchador.asignatura.ACodigo LIKE '$CC'";
    
    $db = $GLOBALS['db'];
    $InfoDelSelect = $db->query($ConsultaEA);
    if (mysqli_num_rows($InfoDelSelect)===0){
        
        echo "nocoincidencia";
        
        return;
    }
//    echo "estoy aquiii";
   
    $EditAsig01 = aquery($ConsultaEA);
//    print_r($EditAsig01);
//    $EditAsig02 = $EditAsig01[0];
//    echo "<br><br>";
    $sjdb = json_encode($EditAsig01);
//    $sjdb = json_encode($EditAsig02);
    
//    print_r($sjdb);
//    exit;
    header('Content-Type: application/json');
    
    echo $sjdb;
//    print_r($sjdb);
//    return($sjdb);
    
    
//    $VarToEditA = json_decode(json_encode($EditAsig02), true);
//    print_r($VarToEditA);


        
}
function EditarClase($CC){
    
    $ConsultaEA = "SELECT * FROM proyecto_ponchador.clases_Creadas where Proyecto_ponchador.Clases_Creadas.Nombre LIKE '$CC'";
//    echo $ConsultaEA;
    $db = $GLOBALS['db'];
    $InfoDelSelect = $db->query($ConsultaEA);
    
//    print_r($InfoDelSelect);exit;
    
    if (mysqli_num_rows($InfoDelSelect)===0){
        
        echo "nocoincidencia";
        exit;
    }
//    echo "estoy aquiii";
   
    $EditAsig01 = aquery($ConsultaEA);
//    print_r($EditAsig01);
//    $EditAsig02 = $EditAsig01[0];
//    echo "<br><br>";
    $sjdb = json_encode($EditAsig01);
//    $sjdb = json_encode($EditAsig02);
    
//    print_r($sjdb);
//    exit;
    header('Content-Type: application/json');
    
    echo $sjdb;
//    print_r($sjdb);
//    return($sjdb);
    
//    $VarToEditA = json_decode(json_encode($EditAsig02), true);
//    print_r($VarToEditA);  
}
function EditarHorario($CC){
    $ConsultaEA = "SELECT * FROM proyecto_ponchador.horarios_creados_linear where Proyecto_ponchador.horarios_creados_linear.Nombre LIKE '$CC'";
    
//    echo $ConsultaEA;
//    exit;
    
    $db = $GLOBALS['db'];
    $InfoDelSelect = $db->query($ConsultaEA);
    if (mysqli_num_rows($InfoDelSelect)===0){
        
        echo "nocoincidencia";
        
        return;
    }
//    echo "estoy aquiii";
   
    $EditAsig01 = aquery($ConsultaEA);
//    print_r($EditAsig01);exit;
//    $EditAsig02 = $EditAsig01[0];
//    echo "<br><br>";
    $sjdb = json_encode($EditAsig01);
//    $sjdb = json_encode($EditAsig02);
    
//    print_r($sjdb);
//    exit;
    header('Content-Type: application/json');
    
    echo $sjdb;
//    print_r($sjdb);
//    return($sjdb);
    
    
//    $VarToEditA = json_decode(json_encode($EditAsig02), true);
//    print_r($VarToEditA);


        
}

function EditarProfesor($CC){
    $ConsultaEA = "SELECT * FROM proyecto_ponchador.profesores WHERE Proyecto_ponchador.profesores.PMatricula LIKE '$CC'";
    $db = $GLOBALS['db'];
    
    $InfoDelSelect = $db->query($ConsultaEA);

    
    if (mysqli_num_rows($InfoDelSelect)===0){
        
        echo "nocoincidencia";
        
        return;
    }
    $EditAsig01 = aquery($ConsultaEA);

    $sjdb = json_encode($EditAsig01);

    header('Content-Type: application/json');
    echo $sjdb;


        
}
function ConsultarAsignaturaEliminar($CC){
    $SELECTFROM = "SELECT Acodigo as 'C&oacute;digo', ANombre as Nombre, Acuatrimestre Cuatrimestre, ASeccion as 'Secci&oacute;n' FROM proyecto_ponchador.asignatura WHERE Proyecto_ponchador.asignatura.ACodigo='$CC'";
//    echo $SELECTFROM;
//    $db = $GLOBALS['db'];
    
    $CargarData = aquery($SELECTFROM);
//    print_r( $CargarData);
    if($CargarData === "fail"){
        echo "fail";
        exit();
    }else{
//    $x = $db->query($SELECTFROM);
//    if(($x->num_rows) > 0){
//        echo "El codigo suministrados no es valido";
//            exit();
//    }
    display_data2($CargarData);
//    $json = json_encode($CargarData);
//    echo $json;
    }
    
}
function EliminarClaseConsulta($CC){
    $SELECTFROM = "SELECT Nombre as 'Clase', proyecto_ponchador.profesores.PNombre as 'Profesor', proyecto_ponchador.Asignatura.ANombre as 'Asignatura', proyecto_ponchador.clases_creadas.NHorario 'Bajo el Horario' FROM proyecto_ponchador.clases_creadas INNER JOIN proyecto_ponchador.profesores ON (proyecto_ponchador.clases_creadas.PMatricula = proyecto_ponchador.profesores.PMatricula) INNER JOIN proyecto_ponchador.asignatura ON (proyecto_ponchador.clases_creadas.ACodigo = proyecto_ponchador.asignatura.ACodigo) WHERE proyecto_ponchador.clases_creadas.Nombre='$CC'";
//    echo $SELECTFROM;
//    $db = $GLOBALS['db'];
    
    $CargarData = aquery($SELECTFROM);
//    print_r( $CargarData);
    if($CargarData === "fail"){
        echo "fail";
        exit();
    }else{
//    $x = $db->query($SELECTFROM);
//    if(($x->num_rows) > 0){
//        echo "El codigo suministrados no es valido";
//            exit();
//    }
    display_data2($CargarData);
//    $json = json_encode($CargarData);
//    echo $json;
    }
    
}
function EliminarHorarioConsulta($CC){
    $SELECTFROM = "SELECT Nombre, Alias, proyecto_ponchador.dias.DiaSemana, Entrada, Salida FROM proyecto_ponchador.horarios_creados INNER JOIN proyecto_ponchador.dias ON (proyecto_ponchador.horarios_creados.Dia = proyecto_ponchador.dias.ID) WHERE proyecto_ponchador.horarios_creados.Nombre='$CC'";
//    echo $SELECTFROM;
//    $db = $GLOBALS['db'];
    
    $CargarData = aquery($SELECTFROM);
//    print_r( $CargarData);
    if($CargarData === "fail"){
        echo "fail";
        exit();
    }else{
//    $x = $db->query($SELECTFROM);
//    if(($x->num_rows) > 0){
//        echo "El codigo suministrados no es valido";
//            exit();
//    }
    display_data2($CargarData);
//    $json = json_encode($CargarData);
//    echo $json;
    }
    
}


        //"SELECT * FROM proyecto_ponchador.asignatura where Proyecto_ponchador.asignatura.ANombre LIKE '%".$CC."%' OR Proyecto_ponchador.asignatura.ACodigo LIKE '%".$CC."%'";
    
function ConsultarAsignatura($CC){
    $SELECTFROM ="SELECT ANombre as Nombre, ACuatrimestre as Cuatrimestre, ACodigo as 'C&oacute;digo', ACreditos as 'Creditos', upper(proyecto_ponchador.asignaturalab.laboratorio) as 'Tiene Lab.', proyecto_ponchador.carreras.cnombre as Carrera, ASeccion as 'Secci&oacute;n' FROM proyecto_ponchador.asignatura INNER JOIN proyecto_ponchador.asignaturalab On (proyecto_ponchador.asignatura.laboratorio = proyecto_ponchador.asignaturalab.ID)   INNER JOIN proyecto_ponchador.carreras ON (proyecto_ponchador.asignatura.CNombre = proyecto_ponchador.carreras.Id) where	proyecto_ponchador.asignatura.ANombre LIKE '%".$CC."%' OR proyecto_ponchador.asignatura.ACodigo LIKE '%".$CC."%'";
        
    $db = $GLOBALS['db'];
    $InfoDelSelect = $db->query($SELECTFROM);

    
    if (mysqli_num_rows($InfoDelSelect)===0){
        
//        echo "vacio";
        echo "objetoVacio";
        
        exit;
    }
//        $SELECTFROM ="SELECT ACodigo as Codigo, ANombre as Nombre, ACuatrimestre as Cuatrimestre, ACreditos as 'Cantidas de creditos', proyecto_ponchador.asignatura.CNombre as Carrera, ASeccion, upper(proyecto_ponchador.asignaturalab.laboratorio) as 'Tiene Lab.', proyecto_ponchador.carreras.cnombre FROM proyecto_ponchador.asignatura INNER JOIN proyecto_ponchador.asignaturalab On proyecto_ponchador.asignatura.laboratorio = proyecto_ponchador.asignaturalab.ID AND INNER JOIN proyecto_ponchador.carreras ON (proyecto_ponchador.asignatura.CNombre = proyecto_ponchador.carreras.Id) where proyecto_ponchador.asignatura.ANombre LIKE '%".$CC."%' OR proyecto_ponchador.asignatura.ACodigo LIKE '%".$CC."%'"
    
    
    
//    echo $SELECTFROM;
    $CargarData = aquery($SELECTFROM);
//    print_r( $CargarData);
//    if()
    display_data($CargarData);
//    $json = json_encode($CargarData);
//    echo $json;
    
}
//ConsultarProfesor("");
//ConsultarProfesor("aaa");
function ConsultarProfesor($CC){

    $SELECTFROM = "SELECT PNombre AS 'Profesor', PApellido AS Apellido, PCelular AS 'Telefono Celular', PMatricula AS 'Matr&iacute;cula' FROM proyecto_ponchador.profesores WHERE Proyecto_ponchador.profesores.PMatricula LIKE '%".$CC."%'";
    
//    echo $SELECTFROM;
    $db = $GLOBALS['db'];
    $InfoDelSelect = $db->query($SELECTFROM);

    
    if (mysqli_num_rows($InfoDelSelect)===0){
        
        echo "vacio";
        
        exit;
    }
        
    $CargarData = aquery($SELECTFROM);
//    print_r( $CargarData);
//    if()
    display_data($CargarData);
//    $json = json_encode($CargarData);
//    echo $json;
    
    

}
function ListadoGral(){

    $SELECTFROM = "SELECT PNombre as Nombre, PApellido as Apellido, PCelular as Celular, PMatricula as Matricula, PDireccion as Direccion, PTelefono as Telefono, proyecto_ponchador.estado.Estado FROM proyecto_ponchador.profesores INNER JOIN proyecto_ponchador.estado on (proyecto_ponchador.estado.ID = proyecto_ponchador.profesores.Estatus)";
//    $SELECTFROM = "SELECT * FROM proyecto_ponchador.profesores";
    
//    echo $SELECTFROM;
    $db = $GLOBALS['db'];
    $InfoDelSelect = $db->query($SELECTFROM);

    
    if (mysqli_num_rows($InfoDelSelect)===0){
        
        echo "vacio";
        
        exit;
    }
        
    $CargarData = aquery($SELECTFROM);
//    print_r( $CargarData);
//    if()
    display_data3($CargarData);
//    $json = json_encode($CargarData);
//    echo $json;
    
    

}

function UpdateEstatus($CC){

    $SELECTFROM = "SELECT Estatus FROM proyecto_ponchador.profesores WHERE Proyecto_ponchador.profesores.PMatricula LIKE '%".$CC."%'";
    
//    echo $SELECTFROM;
    $db = $GLOBALS['db'];
    $InfoDelSelect = $db->query($SELECTFROM);

    
    if (mysqli_num_rows($InfoDelSelect)===0){
        
        echo "vacio";
        
        exit;
    }
        
    $CargarData = aquery($SELECTFROM);
    
    foreach($CargarData as $key => $var) {
        //$output .= '<tr>';
        foreach($var as $col => $val){
            print_r($val);
        }}
    return($val);

    
    
    

}

function CargarPensum($CC){
    $SELECTFROM = "SELECT ANombre as Nombre, ACuatrimestre as Cuatrimestre, ACodigo as 'C&oacute;digo', ACreditos as Creditos FROM proyecto_ponchador.asignatura, proyecto_ponchador.carreras where Proyecto_ponchador.asignatura.CNombre = proyecto_ponchador.carreras.ID AND proyecto_ponchador.carreras.CNombre = '$CC'";
    
    $test = "select proyecto_ponchador.asignatura.CNombre from proyecto_ponchador.asignatura inner join proyecto_ponchador.carreras on (proyecto_ponchador.carreras.ID = proyecto_ponchador.asignatura.CNombre) where proyecto_ponchador.carreras.CNombre like '$CC'";
//    echo $test;
    $db = $GLOBALS['db'];
    
    $Result = $db->query($test);
//    print_r($Result);
//    echo $Result;
        if (mysqli_num_rows($Result)===0) {
            echo "error";
//                printf("Errormessage: %s\n", $db->error);

            exit;    
        }
    
//    echo $SELECTFROM;
    $CargarData = aquery($SELECTFROM);
//    print_r( $CargarData);
//    if()
    display_data($CargarData);
//    $json = json_encode($CargarData);
//    echo $json;


};
function ConsultarClase($CC){
    
//    echo $CC;
    $CargarData = tquery($CC);
//    print_r( $CargarData);
//    if()
    display_data($CargarData);
//    $json = json_encode($CargarData);
//    echo $json;


};
function CargarHorarios($CC){
    $SELECTFROM = "select Nombre, Alias, DiaSemana,Entrada,Salida from proyecto_ponchador.horarios_creados INNER JOIN proyecto_ponchador.dias on (proyecto_ponchador.dias.ID = proyecto_ponchador.horarios_creados.Dia) where proyecto_ponchador.horarios_creados.Nombre like '$CC'";
//    echo $SELECTFROM;    
    $CargarData = aquery($SELECTFROM);
//    print_r( $CargarData);
//    if()
        if(!$CargarData){
            printf ("error: %s\n", $db->error);
        }
    display_data($CargarData);
//    $json = json_encode($CargarData);
//    echo $json;  
   
}


function  actionReposition($NC, $DR, $E, $S){
//compobacion existe clase
$SELECT = "SELECT Nombre FROM proyecto_ponchador.clases_creadas WHERE proyecto_ponchador.clases_creadas.Nombre = '$NC'";
    
    $db = $GLOBALS['db'];
    $NoDupli = $db->query($SELECT);
    if (mysqli_num_rows($NoDupli)===0){
            echo "noExisteClase";
            exit;
        }
//fin comprobacion existe clase
    
//comprueba si ya existe una reposicion para este dia
    $SELECTNoDupli = "SELECT ID FROM proyecto_ponchador.reposiciones WHERE proyecto_ponchador.reposiciones.DiaReposicion = '$DR' AND proyecto_ponchador.reposiciones.NombreClase = '$NC' AND proyecto_ponchador.reposiciones.Entrada = '$E'";
    
    $db = $GLOBALS['db'];
    $NoDupli = $db->query($SELECTNoDupli);
    if (mysqli_num_rows($NoDupli)>0){
            echo "YaExiste";
            exit;
        }
//************fin comprobacion**************    
    
    $INSERTINTO = "INSERT INTO proyecto_ponchador.reposiciones(NombreClase,DiaReposicion, Entrada, Salida)VALUES ('$NC', '$DR','$E', '$S')";
//    echo $INSERTINTO;

    $Result = tquery($INSERTINTO);
    
    if(!$Result){
//            printf ("error: %s\n", $db->error);
        echo "insertError";
        }
    
    echo "todobien";
};
function aquery($query){
//    echo $query,"<br><br>";
    $db = $GLOBALS['db'];
//    $Result = $db->query($query);
    $Result = $db->query($query);
//    print_r($Result);
//    echo $Result;
        if(!$Result){
            
    printf("Errormessage: %s\n", $db->error);
        
        } 
//    exit;
    if($Result->num_rows < 1){
        return("fail");
        exit();
    }
        if(gettype($Result ) =="object"){
         // Cycle through Results
            while ($row = $Result->fetch_object()){
                    $DataAsig[] = $row;
            }
            // Free Result set
            $Result->close();
            $db->next_Result();        
        }else{
            $db->close();
            return  false;
        }
    $db->close();
    return  $DataAsig;
}

function tquery($query){
//    echo $query,"<br><br>";
    $db = $GLOBALS['db'];
    $Result = $db->query($query);
//    print_r($Result);
//    echo $Result;
        if(!$Result){
            
    printf("Errormessage: %s\n", $db->error);
        
        } 
    
    return($Result);
//    $db->close();
    
}
    

function CrearAsignaturaQuery(){
    
$FAsignatura = $_POST["FAsignatura"];
$FCodigoAsignatura = $_POST['FCodigoAsignatura'];
$FCantidadCreditos = $_POST['FCantidadCreditos'];
$FCarrera = $_POST['FCarrera'];
$FCicloAsignatura = $_POST['FCicloAsignatura'];
$db = $GLOBALS['db'];
$Lab = false;
$FSeccion = $_POST['FSeccion'];    
if (isset($_POST['TieneLab'])) {
    $Lab = true;
//    echo $Lab;
}   
    


    //Comprobar//
    $Condicional = "SELECT * FROM proyecto_ponchador.asignatura WHERE proyecto_ponchador.asignatura.ACodigo = '$FCodigoAsignatura'";
    
    $InfoDelSelect = $db->query($Condicional);

    
    if (mysqli_num_rows($InfoDelSelect)>0){
        
        echo "<link rel='stylesheet' href='../css/bootstrap.min.css'>
    <link rel='stylesheet' href='../localStyles.css'>
    <script src='../js/Shadows.js'></script>
    <script src='../js/jquery.js'></script>
    <script src='../js/bootstrap.min.js'></script>
    
        
            <div class='alert alert-danger container alertCondi'  id='fadeout'>
        <button type='button' class='close' data-dismiss='alert'>x</button>
        <p><strong>Lo Sentimos!!</strong> Ya existe una asignatura con este código guardada</p>
    </div>
    
        <script>
                    $(document).ready(function () {
                        $('#fadeout').animate({
                        top: 300
                        });
                        
                        $('#fadeout').fadeTo(2000, 500).fadeOut(4000, function () {
                            $('#fadeout').fadeOut(500, window.history.go(-1)
                            );
                        });
                    })
        </script>
        ";
        
        exit;
    } else{
    
//Estring para insertar en la db//
$INSERTINTO = "INSERT INTO proyecto_ponchador.asignatura(CNombre, ACodigo, ACreditos, ACuatrimestre, ANombre, Laboratorio, ASeccion) VALUES ('$FCarrera', '$FCodigoAsignatura','$FCantidadCreditos','$FCicloAsignatura','$FAsignatura','$Lab','$FSeccion')";

//    echo $INSERTINTO;
    
//Ejecutar todo para db//
$FEjecutor = aquery($INSERTINTO);
    echo $FEjecutor;


    
    //if (mysqli_connect_errno()) {
//  echo "Failed to connect to MySQL: " . mysqli_connect_errno();
//}
//    echo $query;
//    echo $FEjecutor;
    };
};

//************** OJO ----- Descontinuado por la revicion del desarrollo
function crearHorario() {
    
    $MatriProfesor = $_POST['inputProf'];
    $Seccion = $_POST['FSeccion'];
    $CodigoAsignatura = $_POST['inputAsig']; 
    
    if(!isset($_POST['lunesDe']) and !isset($_POST['martesDe']) and !isset($_POST['miercolesDe']) and !isset($_POST['juevesDe']) and !isset($_POST['viernesDe']) and !isset($_POST['sabadoDe'])) {
        echo "NH";
        exit;  
    }

        //Comprobar//
    $SELECTFROM = "SELECT * FROM proyecto_ponchador.profesores WHERE proyecto_ponchador.profesores.PMatricula = '$MatriProfesor' and proyecto_ponchador.asignatura.ACodigo = '$CodigoAsignatura'";
    
    $SProf = "SELECT * FROM proyecto_ponchador.profesores WHERE proyecto_ponchador.profesores.PMatricula = '$MatriProfesor'";
    
//    echo $CodigoAsignatura;
    $SAsig = "SELECT * FROM proyecto_ponchador.asignatura WHERE proyecto_ponchador.asignatura.ACodigo = '$CodigoAsignatura'";
    
    $SSecc = "SELECT * FROM proyecto_ponchador.asignatura WHERE proyecto_ponchador.asignatura.ACodigo = '$CodigoAsignatura' AND proyecto_ponchador.asignatura.ASeccion = '$Seccion'";
    
    
//fuctionality test, there allready is a function making this work "aquery"
    $SELECTNoDupli= "SELECT ID FROM proyecto_ponchador.horarios WHERE proyecto_ponchador.horarios.ACodigo = '$CodigoAsignatura' AND proyecto_ponchador.horarios.ASeccion = '$Seccion'";
    
//    echo $SSecc;
    
   $db = $GLOBALS['db'];
    
    $SelectProf = $db->query($SProf);
//    echo mysqli_num_rows($SelectProf);
//    $db -> close();
    
    $SelectAsig = $db->query($SAsig);
//    print_r($SelectAsig);
//    $db -> close();
//exit;
    $SelectSecc = $db->query($SSecc);
    
//    echo $SELECTNoDupli;
//    exit;
    $NoDupli= $db->query($SELECTNoDupli);
    
//    print_r($NoDupli);
        if (mysqli_num_rows($NoDupli)>0){
            echo "Dupli";
            exit;
        }
        if (mysqli_num_rows($SelectProf)===0){
            echo "noProf";
        }
        if(mysqli_num_rows($SelectAsig)===0){
            echo "noAsig";
            exit;
        }
//   exit; 
    if(mysqli_num_rows($SelectSecc)===0){
            echo "noSecc";
            exit;
        }
    else{
//        echo "eeooo";
//    $lunesHasta = $_POST['lunesDe'] = "7:00";

    if(isset($_POST['lunesDe'])){  
        $in = $_POST['lunesDe'];
         $out = $_POST['lunesHasta'];
        if($in>=$out){
            echo "EHS";
            exit;
        }
//        echo $MatriProfesor;
        ADD_Horario($MatriProfesor,$CodigoAsignatura,$Seccion,1,$in,$out,0);
    }     
    if(isset($_POST['martesDe'])){ 
        $in = $_POST['martesDe']; 
        $out = $_POST['martesHasta']; 
        if($in>=$out){
            echo "EHS";
            exit;
        }
        ADD_Horario($MatriProfesor,$CodigoAsignatura,$Seccion,2,$in,$out,0);
    }
     if(isset($_POST['miercolesDe'])){ 
        $in = $_POST['miercolesDe']; 
        $out = $_POST['miercolesHasta']; 
        if($in>=$out){
            echo "EHS";
            exit;
        }
         ADD_Horario($MatriProfesor,$CodigoAsignatura,$Seccion,3,$in,$out,0);
    }
       if(isset($_POST['juevesDe'])){ 
        $in = $_POST['juevesDe']; 
        $out = $_POST['juevesHasta']; 
        if($in>=$out){
            echo "EHS";
            exit;
        }
           ADD_Horario($MatriProfesor,$CodigoAsignatura,$Seccion,4,$in,$out,0);
    }
       if(isset($_POST['viernesDe'])){ 
        $in = $_POST['viernesDe']; 
        $out = $_POST['viernesHasta']; 
        if($in>=$out){
            echo "EHS";
            exit;
        }
           ADD_Horario($MatriProfesor,$CodigoAsignatura,$Seccion,5,$in,$out,0);
    }
       if(isset($_POST['sabadoDe'])){ 
        $in = $_POST['sabadoDe']; 
        $out = $_POST['sabadoHasta']; 
        if($in>=$out){
            echo "EHS";
            exit;
        }
           ADD_Horario($MatriProfesor,$CodigoAsignatura,$Seccion,6,$in,$out,0);
    }
        
   
    }
    
    
};

function guardarHorario() {
    
    
    $HNombre = $_POST['nombreHorario']; 
    $alias = $_POST['aliasHorario'];
    
    if(!isset($_POST['lunesDe']) and !isset($_POST['martesDe']) and !isset($_POST['miercolesDe']) and !isset($_POST['juevesDe']) and !isset($_POST['viernesDe']) and !isset($_POST['sabadoDe'])) {
        echo "NH";
        exit;  
    }

//Comprobar //    
//fuctionality test, there allready is a function making this work "aquery"
    $SELECTNoDupli= "SELECT * FROM proyecto_ponchador.horarios_Creados WHERE proyecto_ponchador.horarios_Creados.Nombre = '$HNombre'";
    

    
   $db = $GLOBALS['db'];
    
    $NoDupli= $db->query($SELECTNoDupli);
    

        if (mysqli_num_rows($NoDupli)>0){
            echo "Dupli";
            exit;
        }else{
            $crearTabla = "INSERT INTO proyecto_ponchador.horarios_creados_linear (Nombre) VALUES ('$HNombre')";
         $Result = tquery($crearTabla);

//        echo var_dump($Result);
//            echo $alias;
    if(isset($alias)){
        $upQuery = "update proyecto_ponchador.horarios_creados_linear set Alias='$alias' where proyecto_ponchador.horarios_creados_linear.Nombre like '$HNombre'";
        tquery($upQuery);
//        echo $upQuery;exit;
    }
            


    if(isset($_POST['lunesDe'])){  
        $in = $_POST['lunesDe'];
         $out = $_POST['lunesHasta'];
        $tin = strtotime($in);
        $tout = strtotime($out);
//        echo var_dump($tin);exit;
            if($tin>=$tout){
                echo "EHS";
                exit;
            }

        ADD_Horario2($HNombre,1,$in,$out,0,$alias);
        
        tquery("UPDATE proyecto_ponchador.horarios_creados_linear SET lunesDe='$in', lunesHasta='$out' WHERE proyecto_ponchador.horarios_creados_linear.Nombre='$HNombre'");
        
    }     
    if(isset($_POST['martesDe'])){ 
        $in = $_POST['martesDe']; 
        $out = $_POST['martesHasta']; 
        $tin = strtotime($in);
        $tout = strtotime($out);
//        echo var_dump($tin);exit;
            if($tin>=$tout){
                echo "EHS";
                exit;
            }
        ADD_Horario2($HNombre,2,$in,$out,0,$alias);
        tquery("UPDATE proyecto_ponchador.horarios_creados_linear SET MartesDe='$in', MartesHasta='$out' WHERE proyecto_ponchador.horarios_creados_linear.Nombre='$HNombre'");

    }
     if(isset($_POST['miercolesDe'])){ 
        $in = $_POST['miercolesDe']; 
        $out = $_POST['miercolesHasta']; 
        $tin = strtotime($in);
        $tout = strtotime($out);
//        echo var_dump($tin);exit;
            if($tin>=$tout){
                echo "EHS";
                exit;
            }
         ADD_Horario2($HNombre,3,$in,$out,0,$alias);
        tquery("UPDATE proyecto_ponchador.horarios_creados_linear SET MiercolesDe='$in', MiercolesHasta='$out' WHERE proyecto_ponchador.horarios_creados_linear.Nombre='$HNombre'");

    }
       if(isset($_POST['juevesDe'])){ 
        $in = $_POST['juevesDe']; 
        $out = $_POST['juevesHasta']; 
        $tin = strtotime($in);
        $tout = strtotime($out);
//        echo var_dump($tin);exit;
            if($tin>=$tout){
                echo "EHS";
                exit;
            }
           ADD_Horario2($HNombre,4,$in,$out,0,$alias);
        tquery("UPDATE proyecto_ponchador.horarios_creados_linear SET JuevesDe='$in', JuevesHasta='$out' WHERE proyecto_ponchador.horarios_creados_linear.Nombre='$HNombre'");

    }
       if(isset($_POST['viernesDe'])){ 
        $in = $_POST['viernesDe']; 
        $out = $_POST['viernesHasta']; 
        $tin = strtotime($in);
        $tout = strtotime($out);
//        echo var_dump($tin);exit;
            if($tin>=$tout){
                echo "EHS";
                exit;
            }
           ADD_Horario2($HNombre,5,$in,$out,0,$alias);
        tquery("UPDATE proyecto_ponchador.horarios_creados_linear SET ViernesDe='$in', ViernesHasta='$out' WHERE proyecto_ponchador.horarios_creados_linear.Nombre='$HNombre'");

    }
       if(isset($_POST['sabadoDe'])){ 
        $in = $_POST['sabadoDe']; 
        $out = $_POST['sabadoHasta']; 
        $tin = strtotime($in);
        $tout = strtotime($out);
//        echo var_dump($tin);exit;
            if($tin>=$tout){
                echo "EHS";
                exit;
            }
           ADD_Horario2($HNombre,6,$in,$out,0,$alias);
        tquery("UPDATE proyecto_ponchador.horarios_creados_linear SET SabadoDe='$in', SabadoHasta='$out' WHERE proyecto_ponchador.horarios_creados_linear.Nombre='$HNombre'");

    }
        
 
    }
    
    
};
function ActualizarHorario() {
    
    
    $HNombre = $_POST['nombreHorario']; 
    $oldName = $_POST['oldName'];
//Dias
    $Lunes = "Lunes";
    $Martes = "Martes";
    $Miercoles = "Miercoles";
    $Jueves = "Jueves";
    $Viernes = "Viernes";
    $Sabado = "Sabado";
    


//Comprobar //    
//fuctionality test, there allready is a function making this work "aquery"
//    $SELECTNoDupli= "SELECT * FROM proyecto_ponchador.horarios_Creados WHERE proyecto_ponchador.horarios_Creados.Nombre = '$HNombre'";
    

    
//   $db = $GLOBALS['db'];
//    
//    $NoDupli= $db->query($SELECTNoDupli);
    

//        if (mysqli_num_rows($NoDupli)>0){
//            echo "Dupli";
//            exit;
//        }else{
//    $creaTabla = "INSERT INTO proyecto_ponchador.horarios_creados_linear (Nombre) VALUES ('$HNombre')";
//            aquery($creaTabla);
    
//echo "UPDATE proyecto_ponchador.horarios_creados_linear SET Nombre='$HNombre' WHERE proyecto_ponchador.horarios_creados_linear.Nombre LIKE '$oldName'";exit;
    
            aquery("UPDATE proyecto_ponchador.horarios_creados_linear SET Nombre='$HNombre' WHERE proyecto_ponchador.horarios_creados_linear.Nombre LIKE '$oldName'");

        UPDATE_Delete_Horario($oldName);

    if(isset($_POST['lunesDe'])){  
        $in = $_POST['lunesDe'];
         $out = $_POST['lunesHasta'];
        $strIn = strtotime($in);
        $strOut = strtotime($out);
        
        if($strIn >= $strOut){
            echo "EMS";exit;
            
        }
//        echo "entre al lunes";exit;
        

        ADD_Horario2($HNombre,1,$in,$out,0);
        
        UPDATE_Horario_Linear_Poner($HNombre,$in,$out, $Lunes);
        
        
    }else{
//Funcionalidad porcion puede ser agregada a UPDATE_Delete_Horario y pasar  el parametro extra $HNombre
        
        UPDATE_Horario_Linear_Quitar($HNombre,$Lunes);
//                echo $Dia;


    }    
    if(isset($_POST['martesDe'])){ 
        $in = $_POST['martesDe']; 
        $out = $_POST['martesHasta'];
        $strIn = strtotime($in);
        $strOut = strtotime($out);
        
        if($strIn >= $strOut){
            echo "EMS";exit;
            
        }
        

        ADD_Horario2($HNombre,2,$in,$out,0);
        
        UPDATE_Horario_Linear_Poner($HNombre,$in,$out, $Martes);

               
    }else{
        
        UPDATE_Horario_Linear_Quitar($HNombre,$Martes);



    }
     if(isset($_POST['miercolesDe'])){ 
        $in = $_POST['miercolesDe']; 
        $out = $_POST['miercolesHasta']; 
        $strIn = strtotime($in);
        $strOut = strtotime($out);
        
        if($strIn >= $strOut){
            echo "EMS";exit;
            
        }

         ADD_Horario2($HNombre,3,$in,$out,0);
         
        UPDATE_Horario_Linear_Poner($HNombre,$in,$out, $Miercoles);
                 

    }else{
        
        UPDATE_Horario_Linear_Quitar($HNombre,$Miercoles);




    }
       if(isset($_POST['juevesDe'])){ 
        $in = $_POST['juevesDe']; 
        $out = $_POST['juevesHasta']; 
        $strIn = strtotime($in);
        $strOut = strtotime($out);
        
        if($strIn >= $strOut){
            echo "EMS";exit;
            
        }
        

        ADD_Horario2($HNombre,4,$in,$out,0);

        UPDATE_Horario_Linear_Poner($HNombre,$in,$out, $Jueves);


    }else{

   
        UPDATE_Horario_Linear_Quitar($HNombre,$Jueves);


       }
       if(isset($_POST['viernesDe'])){ 
        $in = $_POST['viernesDe']; 
        $out = $_POST['viernesHasta'];
        $strIn = strtotime($in);
        $strOut = strtotime($out);
        
        if($strIn >= $strOut){
            echo "EMS";exit;
            
        }
        

        ADD_Horario2($HNombre,5,$in,$out,0);

        UPDATE_Horario_Linear_Poner($HNombre,$in,$out,$Viernes );

    }else{


        UPDATE_Horario_Linear_Quitar($HNombre,$Viernes);



    }
       if(isset($_POST['sabadoDe'])){ 
        $in = $_POST['sabadoDe']; 
        $out = $_POST['sabadoHasta'];
        $strIn = strtotime($in);
        $strOut = strtotime($out);
        
        if($strIn >= $strOut){
            echo "EMS";exit;
            
        }
        

        ADD_Horario2($HNombre,6,$in,$out,0);

        UPDATE_Horario_Linear_Poner($HNombre,$in,$out,$Sabado);


    }else{

        UPDATE_Horario_Linear_Quitar($HNombre,$Sabado);



    }
        
   
    
    
    
};

function reposicionHorario() {
    
    $PMatricula = $_POST['PMatricula']; 
    $CodigoAsignatura = $_POST['ACodigo']; 
    $Seccion = $_POST['ASeccion'];
    $diaDeReposicion = $_POST['diaDeReposicion'];
    $in= $_POST['Inicio'];
    $out = $_POST['final'];  
//    $tipo = 1;
    
//print_r($_POST);
//    if($PMatricula===""){
//        echo "cool";
//        exit;
//    } 
 if($PMatricula==="" ||$CodigoAsignatura==="" ||$Seccion===""){
     
     echo "NEA";
     exit;
     
 }
     if($diaDeReposicion===""){
         
         echo "NHS";
         exit;
     }

    
    ADD_Horario($PMatricula,$CodigoAsignatura,$Seccion,$diaDeReposicion,$in,$out,1);
        
   
    
    
    
};
    function ADD_Horario($PMatri,$ACode,$secc,$day,$in,$out,$tipo){
                
    $INSERTINTO = "INSERT INTO proyecto_ponchador.horarios (PMatricula, ACodigo, ASeccion, Dia, HIN, HOUT, TipoHorario) VALUES ('$PMatri', '$ACode','$secc','$day','$in','$out', $tipo)";
        
//        echo $INSERTINTO;
        
        aquery($INSERTINTO);
//    $db = $GLOBALS['db'];
//    $Result = $db->query($INSERTINTO);
        
//        echo "good";
    };    
function UPDATE_Horario($oldName,$HN,$day,$in,$out,$tipo){
                
    $INSERTINTO = "update proyecto_ponchador.horarios_creados SET Nombre='$HN', Entrada='$in', Salida='$out') WHERE proyecto_ponchador.horarios_creados.Dia='$day' AND proyecto_ponchador.horarios_creados.Nombre='$oldName'";
        
        echo $INSERTINTO;
        
        aquery($INSERTINTO);
//    $db = $GLOBALS['db'];
//    $Result = $db->query($INSERTINTO);
        
//        echo "good";
    };

function UPDATE_Horario_Linear_Poner($HN,$in,$out,$Dia){
//    echo $Dia;
    $DiaDE = $Dia . "De";             
    $DiaHasta = $Dia . "Hasta";          
    $INSERTINTO = "UPDATE proyecto_ponchador.horarios_creados_linear SET $DiaDE='$in', $DiaHasta='$out' WHERE proyecto_ponchador.horarios_creados_linear.Nombre='$HN'";
        
        echo $INSERTINTO;
        
        aquery($INSERTINTO);
//    $db = $GLOBALS['db'];
//    $Result = $db->query($INSERTINTO);
        
//        echo "good";
    };
function UPDATE_Horario_Linear_Quitar($HN,$Dia){
//    echo $Dia;
    
    $DiaDE = $Dia . "De";             
    $DiaHasta = $Dia . "Hasta";
    $INSERTINTO = "UPDATE proyecto_ponchador.horarios_creados_linear SET $DiaDE=0, $DiaHasta=0 WHERE proyecto_ponchador.horarios_creados_linear.Nombre='$HN'";
        
        echo $INSERTINTO;
        
        aquery($INSERTINTO);
//    $db = $GLOBALS['db'];
//    $Result = $db->query($INSERTINTO);
        
//        echo "good";
    };

function UPDATE_Delete_Horario($oldName){
                
    $INSERTINTO = "DELETE FROM proyecto_ponchador.horarios_creados WHERE proyecto_ponchador.horarios_creados.Nombre='$oldName'";
        
//        echo $INSERTINTO;
        
        aquery($INSERTINTO);
//    $db = $GLOBALS['db'];
//    $Result = $db->query($INSERTINTO);
        
//        echo "good";
    };

function ADD_Horario2($HN,$day,$in,$out,$tipo,$alias){
                
    $INSERTINTO = "INSERT INTO proyecto_ponchador.horarios_creados (Nombre, Dia, Entrada, Salida, Alias) VALUES ('$HN','$day','$in','$out','$alias')";
        
//        echo $INSERTINTO;
        
        tquery($INSERTINTO);
//    $db = $GLOBALS['db'];
//    $Result = $db->query($INSERTINTO);
        
//        echo "good";
    };

function display_data2($data) {
    $output = '<table class="table table-condensed table-bordered table-reports">';
    
    foreach($data as $key => $var) {
        //$output .= '<tr>';
        if($key===0) {
            $output .= '<thead><tr>';
            foreach($var as $col => $val) {
                $output .= "<th>" . $col . '</th>';
            }
            $output .= '</tr></thead><tr>';
            foreach($var as $col => $val) {
                $output .= '<td>' . $val . '</td>';
            }
            $output .= '</tr>';
        }
        else {
            $output .= '<tr>';
            foreach($var as $col => $val) {
                $output .= '<td>' . $val . '</td>';
            }
            $output .= '</tr>';
        }
    }
    $output .= '</table>';
    echo  $output;
//    return $output;
}

function display_data($data) {
    $output = '<table class="table table-condensed table-bordered table-reports table-consulta">';
    foreach($data as $key => $var) {
        //$output .= '<tr>';
        if($key===0) {
            $output .= '<thead><tr>';
            foreach($var as $col => $val) {
                $output .= "<th>" . $col . '</th>';
            }
            $output .= '</tr></thead><tr>';
            foreach($var as $col => $val) {
                $output .= '<td>' . $val . '</td>';
            }
            $output .= '</tr>';
        }
        else {
            $output .= '<tr>';
            foreach($var as $col => $val) {
                $output .= '<td>' . $val . '</td>';
            }
            $output .= '</tr>';
        }
    }
    $output .= '</table>';
    echo ($output);

//    return $output;
}
function display_data3($data) {
    $output = '<table class="table table-condensed table-bordered table-reports table-profList">';
    foreach($data as $key => $var) {
        //$output .= '<tr>';
        if($key===0) {
            $output .= '<thead><tr>';
            foreach($var as $col => $val) {
                $output .= "<th>" . $col . '</th>';
            }
            $output .= '</tr></thead><tr>';
            foreach($var as $col => $val) {
                $output .= '<td>' . $val . '</td>';
            }
            $output .= '</tr>';
        }
        else {
            $output .= '<tr>';
            foreach($var as $col => $val) {
                $output .= '<td>' . $val . '</td>';
            }
            $output .= '</tr>';
        }
    }
    $output .= '</table>';
    echo ($output);

//    return $output;
}
//TraerDB();


function TraerDB(){
    $SELECTFROM = "SELECT * FROM Proyecto_ponchador.carreras";
    
    $CargarData = aquery($SELECTFROM);
//    display_data($CargarData);
    $json = json_encode($CargarData);
    echo $json;


}
//TestingSqlsrv();
function TestingSqlsrv(){
    $dbb = $GLOBALS['conn'];
    
    $SELECT = "SELECT CardNo, RecDate, RecTime FROM AtdRecord";
    $Result = $dbb->query($SELECT);
    $pepe = $Result->fetchAll();
    $pepe = json_encode($pepe);
    print_r($pepe);
//    print_r($pepe[0]);
    
    
    
}

}













