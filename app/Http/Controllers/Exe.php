<?php

//include 'App\lib\ConexionLayer';
//include 'App\lib\ConexionLayerToSQLServer';

namespace App\Http\Controllers;

use DB;

use Illuminate\Http\Request;

class Exe extends Controller
{
    //    print_r($_POST['action']);
    //    return
    
    
    public function index()
    {
        switch ($_POST['action']) {
            
            case "testing":
                
                break;
            
            case "crearHorario": //OJO**** Descontinuado en segunda revision
                //        print_r("que coass");
                //        return
                
                $this->crearHorario();
                
                break;
            
            case "ConsultaClaseLimit": //OJO**** Descontinuado en segunda revision
//                        print_r("que coass");
//                        return
                $this->ConsultaClaseLimit();
                
                break;
            
            case "ActualizarClase":
                //        print_r("que coass");
                //        return
                
                $this->ActualizarClase();
                
                break;
            
            case "crearClase":
                //        print_r("que cosas");
                //        return
                
                $this->crearClase();
                
                break;
            
            case "guardarHorario":
                //        print_r("que coass");
                //        return
                
                $this->guardarHorario();
                
                echo "ok";
                
                break;
            
            case "horarioReposicion":
                
                $nombreClase     = $_POST['nombreClase'];
                $diaDeReposicion = $_POST['diaDeReposicion'];
                $Entrada         = $_POST['Inicio'];
                $Salida          = $_POST['Salida'];
                
                //comprobación de parametros
                //vacios
                if (!isset($nombreClase) || !isset($diaDeReposicion) || !isset($Entrada) || !isset($Salida)) {
                    echo "camposVacios";
                    exit;
                }
                //error en horario
                $in  = strtotime($Entrada);
                $out = strtotime($Salida);
                //        echo var_dump($tin);exit;
                if ($in >= $out) {
                    echo "HE";
                    exit;
                }
                //fin de comprobacion
                $Entrada = date("Y-m-d H:i:s", strtotime($diaDeReposicion . ' ' . $Entrada));
                $Salida  = date("Y-m-d H:i:s", strtotime($diaDeReposicion . ' ' . $Salida));
                $this->actionReposition($nombreClase, date("Y-m-d H:i:s", strtotime($diaDeReposicion)), $Entrada, $Salida);
                
                break;
            
            case "dataList":
                
                $SELECTFROM = $_POST['select'];
                //       $SELECTFROM = "";
                
                if ($SELECTFROM == 'ANombre') {
                    $SELECTFROM = 'select DISTINCT(ANombre) FROM clases_creadas INNER JOIN asignatura ON (clases_creadas.Acodigo = asignatura.ACodigo)';
                    
                } elseif ($SELECTFROM == 'PNombre') {
                    $SELECTFROM = 'select DISTINCT(PNombre) FROM clases_creadas INNER JOIN profesores ON (clases_creadas.PMatricula = profesores.PMatricula)';
                    
                } elseif ($SELECTFROM == 'NHorario') {
                    $SELECTFROM = 'select DISTINCT(NHorario) FROM clases_creadas INNER JOIN horarios_creados_linear ON (clases_creadas.NHorario = horarios_creados_linear.Nombre)';
                }

                $this->dataList($SELECTFROM);
                
                break;
            
            case "asig":
                //        echo "entro a la funcion CrearAsignatura";
                
                //        print_r($_POST);
                $data = $this->CrearAsignaturaQuery();
                //        CargarPensum();
                //      header("location: ../home?action=ok");
                return redirect('/home?action=ok');
                break;
            
            case "ProfList":
                $data = $this->ListadoGral();
                return response()->json($data);
                break;
            
            
            case "Pensum":
                //        echo $_POST['action'], "<br>";
                $ConsultaEA = $_POST['ACarrera'];
                //        echo $ConsultaEA, "<br>";
                $this->CargarPensum($ConsultaEA);
                
                break;
            case "ConsultarClase":
                
                $ConsultaEA = $_POST['ACarrera'];
                $selector   = $_POST['selector'];
                
                $test = "SELECT Nombre FROM  clases_creadas WHERE  clases_creadas.Nombre LIKE '$ConsultaEA'";
                
                $Result = DB::select($test);
                if (count($Result) === 0) {
                    echo "error";
                    exit;
                }
                //        echo $selector;
                if ($selector === '1') {
                    
                    $query = "SELECT Nombre as 'Nombre de la Clase',  profesores.PNombre as 'Profesor',  Asignatura.ANombre as 'Asignatura',  clases_creadas.NHorario 'Bajo el Horario' FROM  clases_creadas INNER JOIN  profesores ON ( clases_creadas.PMatricula =  profesores.PMatricula) INNER JOIN  asignatura on ( clases_creadas.ACodigo =  asignatura.ACodigo) WHERE  clases_creadas.Nombre='$ConsultaEA'";
                    
                } else {
                    
                    $query = "SELECT  horarios_creados.Nombre, Alias,  dias.DiaSemana, Entrada, Salida FROM  horarios_creados INNER JOIN  clases_creadas ON ( clases_creadas.NHorario =  horarios_creados.Nombre) INNER JOIN  dias ON ( dias.ID =  horarios_creados.Dia) WHERE  clases_creadas.Nombre LIKE '$ConsultaEA'";
                    
                    
                }
                
                //        echo $query;
                //        echo $ConsultaEA, "<br>";
                $this->ConsultarClase($query);
                
                
                break;
            
            case "Horarios":
                //        echo $_POST['action'], "<br>";exit;
                $ConsultaEA = $_POST['AHorarios'];
                //        echo $ConsultaEA, "<br>";
                $this->CargarHorarios($ConsultaEA);
                
                break;
            
            case "ConsultaEditarAsignatura":
                //        echo $_POST['action'], "<br>";
                $ConsultaEA = $_POST['InputEditAsig'];
                //        echo $carrera, "<br>";
                //        echo $ConsultaEA;
                if ($ConsultaEA === "") {
                    echo "vacio";
                    exit;
                } else {
                    $this->ConsultarAsignatura($ConsultaEA);
                }
                
                break;
            
            case "ConsultaEditarProfesor":
                //        echo $_POST['action'], "<br>";
                $ConsultaEA = $_POST['InputEditAsig'];
                //        echo $carrera, "<br>";
                //        echo $ConsultaEA;
                if ($ConsultaEA === "") {
                    echo "vacio";
                    exit;
                } else {
                    $this->ConsultarProfesor($ConsultaEA);
                }
                break;
            
            case "Consulta2EditarAsignatura":
                //        echo $_POST['action'], "<br>";
                $ConsultaEA = $_POST['InputEditAsig'];
                //        echo $carrera, "<br>";
                $this->ConsultarAsignaturaEliminar($ConsultaEA);
                
                break;
            case "EliminarHorarioConsulta":
                //        echo $_POST['action'], "<br>";
                $ConsultaEA = $_POST['InputEliminarHorario'];
                //        echo $carrera, "<br>";
                $this->EliminarHorarioConsulta($ConsultaEA);
                
                break;
            case "EliminarClaseConsulta":
                //        echo $_POST['action'], "<br>";
                $ConsultaEA = $_POST['InputEliminarClase'];
                //        echo $carrera, "<br>";
                $this->EliminarClaseConsulta($ConsultaEA);
                
                break;
            
            case "EditarAsignatura":
                //        $_POST['InputEditAsig'] = "";
                
                $ConsultaEA = $_POST['InputEditAsig'];
                if ($ConsultaEA === "") {
                    echo "vacio";
                    exit;
                } else {
                    $data = $this->EditarAsignatura($ConsultaEA);
                    return response()->json($data);
                }
                
                break;
            case "EditarClase":
                //        $_POST['InputEditAsig'] = "";
                $ConsultaEA = $_POST['InputEditHorario'];
                if ($ConsultaEA === "") {
                    echo "vacio";
                    exit;
                } else {
                    $data = $this->EditarClase($ConsultaEA);
                    
                    return response()->json($data);
                }
                
                break;
            
            case "EditarHorario":
                //        $_POST['InputEditAsig'] = "";
                
                $ConsultaEA = $_POST['InputEditAsig'];
                if ($ConsultaEA === "") {
                    echo "vacio";
                    exit;
                } else {
                    $data = $this->EditarHorario($ConsultaEA);
                    return response()->json($data);
                }
                
                break;
            
            case "EditarProfesor":
                //        $_POST['InputEditAsig'] = "math";
                
                $ConsultaEA = $_POST['InputEditAsig'];
                $data       = $this->Editarprofesor($ConsultaEA);
                return response()->json($data);
                
                break;
            
            case "UpdateAsignatura":
                //        $_POST['InputEditAsig'] = "math";
                
                $ConsultaEA = $_POST['InputEditAsig'];
                //        echo $ConsultaEA;
                //        header('location: ../home?action=*-*');
                //Mas un alert que se agregara con colorsito y redireccionamiento al home o reports. 
                $this->UpdateAsignatura($ConsultaEA);
                return redirect('home?action=*-*');
                
                
                break;
            
            case "ActualizarHorario":
                //        $_POST['InputEditAsig'] = "math";
                
                //        $ConsultaEA = $_POST['nombreHorario'];
                //        echo $ConsultaEA;
                foreach ($_POST as $key => $Val) {
                    if (empty($Val)) {
                        echo "PH";
                        exit;
                        break;
                    }
                }
                
                $this->ActualizarHorario();
                //Mas un alert que se agregara con colorsito y redireccionamiento al home o reports. 
                //        header('location: ../home?action=UH');
                
                break;
            
            case "UpdateEstatus":
                //        $_POST['InputEditAsig'] = "math";
                
                $ConsultaEA = $_POST['InputEditAsig'];
                //        echo $ConsultaEA;
                //        header('location: ../home?action=*-*');
                //Mas un alert que se agregara con colorsito y redireccionamiento al home o reports. 
                $this->UpdateEstatus($ConsultaEA);
                
                
                break;
            
            case "InactivarProfesor":
                //        $_POST['InputEditAsig'] = "math";
                
                $ConsultaEA = $_POST['InputEditAsig'];
                //        echo $ConsultaEA;
                //        return;
                //        header('location: ../home?action=*-*');
                //Mas un alert que se agregara con colorsito y redireccionamiento al home o reports. 
                $this->InactivarProfesor($ConsultaEA);
                
                
                break;
            case "ActivarProfesor":
                //        $_POST['InputEditAsig'] = "math";
                
                $ConsultaEA = $_POST['InputEditAsig'];
                //        echo $ConsultaEA;
                //        return;
                //        header('location: ../home?action=*-*');
                //Mas un alert que se agregara con colorsito y redireccionamiento al home o reports. 
                $this->ActivarProfesor($ConsultaEA);
                
                
                break;
            
            case "UpdateProfesor":
                //        $_POST['InputEditAsig'] = "math";
                
                $ConsultaEA = $_POST['PMatricula'];
                //        echo $ConsultaEA;
                //        header('location: ../home?action=*P*');
                //Mas un alert que se agregara con colorsito y redireccionamiento al home o reports. 
                //        echo $ConsultaEA;
                $this->UpdateProfesor($ConsultaEA);
                //        header('location: ../home?action=UPP');
                return redirect('/home?action=UPP');
                
                
                break;
            
            case "EliminarAsignatura":
                
                $ConsultaEA = $_POST['InputEditAsig'];
                
                //Mas un alert que se agregara con colorsito y redireccionamiento al home o reports. 
                $data = $this->EliminarAsignatura($ConsultaEA);
                
                return response()->json($data);
                
                
                break;
            
            case "EliminarClase":
                //        $_POST['InputEditAsig'] = "math";
                
                $ConsultaEA = $_POST['InputEliminarClase'];
                //        echo $ConsultaEA;
                //        return($_POST['InputEditAsig']);
                //        header('location: ../home?done="lavida"');
                //Mas un alert que se agregara con colorsito y redireccionamiento al home o reports. 
                $data       = $this->EliminarClase($ConsultaEA);
                return response()->json($data);
                
                break;
            
            case "EliminarHorario":
                //        $_POST['InputEditAsig'] = "math";
                
                $ConsultaEA = $_POST['InputEliminarHorario'];
                //        echo $ConsultaEA;
                //        return($_POST['InputEditAsig']);
                //        header('location: ../home?done="lavida"');
                //Mas un alert que se agregara con colorsito y redireccionamiento al home o reports. 
                $data       = $this->EliminarHorario($ConsultaEA);
                return response()->json($data);
                
                
                break;
            //************************ Descontinuada en segunda revicion ***************//        
            //    case "EliminarHorario":
            ////        $_POST['InputEditAsig'] = "math";
            //
            ////        $ConsultaEA = $_POST['InputEditAsig'];
            ////        echo $ConsultaEA;
            ////        return($_POST['InputEditAsig']);
            ////        header('location: ../home?done="lavida"');
            //        //Mas un alert que se agregara con colorsito y redireccionamiento al home o reports. 
            //        EliminarHorario();
            //        
            //        break;
            
            
            case "addProf":
                $this->addProf('profesor');
                return redirect('/home?action=addedProf');
                //        header('location: ../home?action=addedProf');
                
                break;
            case "verDetalles":
                
                $this->verDetalles();
                
                
                break;
                
        }
    }
    function ConsultaClaseLimit()
    {
        
        
        $levelLimit = $_POST['limite'];
        $selector   = $_POST['selector'];
        
        //    echo $selector;
        //    echo "<br><br>";
        //    echo $levelLimit;
        //    
        
        if ($selector === '1') {
            $campo  = $_POST['campo'];
            $filtro = $_POST['filtro'];
            
            $query = "select  clases_creadas.ID, Nombre AS 'Nombre de la Clase', ANombre as 'Nombre de Asignatura',  clases_creadas.ASeccion as 'Secci&oacute;n de la Clase', PNombre as 'Profesor Vinculado', NHorario AS 'Horario'  FROM  clases_creadas INNER JOIN  profesores on ( clases_creadas.PMatricula =  profesores.PMatricula) INNER JOIN  asignatura on ( asignatura.ACodigo =  clases_creadas.ACodigo) WHERE $campo LIKE '%" . $filtro . "%'";
            
        } elseif ($levelLimit < 0) {
            echo "dt";
            exit;
        } else {
//                    echo "$levelLimit";return
            $query = "select  clases_creadas.ID, Nombre AS 'Nombre de la Clase', ANombre as 'Nombre de Asignatura',  clases_creadas.ASeccion as 'Secci&oacute;n de la Clase', PNombre as 'Profesor Vinculado', NHorario AS 'Horario'  FROM  clases_creadas INNER JOIN  profesores on ( clases_creadas.PMatricula =  profesores.PMatricula) INNER JOIN  asignatura on ( asignatura.ACodigo =  clases_creadas.ACodigo) ORDER BY Nombre limit 0, $levelLimit";
        }
        
        
        
        
        $CargarData = DB::select($query);
        //    print_r( $CargarData);
        //    echo $CargarData;
        //    $tipoVar = var_dump($CargarData);
        //    echo var_dump($CargarData);
        //    exit;
        if ($CargarData === 'fail') {
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
        $this->display_Limited_data($CargarData);
        //    $json = json_encode($CargarData[0]);
        //    echo $json;
        
        
        
    }
    function verDetalles()
    {
        $NH = $_POST['campo'];
        $sl = $_POST['selector'];

        //    echo $sl;exit;
        if ($sl === '1') {
            //        echo "estoy aqui";
            $query = "select ANombre as 'Nombre Asignatura',  asignatura.ACodigo as 'Codigo Asignatura',  asignatura.ASeccion as 'Secci&oacute;n',  carreras.CNombre as 'Carrera', ACuatrimestre as 'Cuatrimestre', ACreditos as 'Cantidad de Creditos' FROM  clases_creadas INNER JOIN  asignatura on ( clases_creadas.ACodigo =  asignatura.ACodigo) INNER JOIN  carreras on ( asignatura.CNombre =  carreras.ID) WHERE  clases_creadas.ID = '$NH'";
            
            $this->ConsultarClase($query);
            
        } elseif ($sl === "2") {
            $query = "select PNombre as 'Profesor Vinculado', PApellido as Apellido, PCedula as 'C&eacute;dula',  profesores.PMatricula as 'ID del Profesor', PDireccion as 'Direcci&oacute;n', PTelefono as 'Tel&eacute;fono' FROM  clases_creadas INNER JOIN  profesores on ( clases_creadas.PMatricula =  profesores.PMatricula) where  clases_creadas.ID = '$NH'";
            
            $this->ConsultarClase($query);
            
        } elseif ($sl === '3') {
            $query = "select  horarios_creados.Nombre,  horarios_creados.Alias,  dias.DiaSemana, Entrada, Salida FROM  clases_creadas INNER JOIN  horarios_creados on ( clases_creadas.NHorario =  horarios_creados.Nombre) INNER JOIN  dias ON ( dias.ID =  horarios_creados.Dia) where  clases_creadas.ID = '$NH'";
            
            $this->ConsultarClase($query);
            
        }
        //    echo $query;
    }
    function display_Limited_data($data)
    {
        $output = '<table class="table table-condensed table-bordered table-reports table-consulta table-limited table-profList">';
        foreach ($data as $key => $var) {
            //$output .= '<tr>';
            if ($key === 0) {
                $output .= '<thead><tr>';
                foreach ($var as $col => $val) {
                    if ($col === 'ID') {
                        $output .= "<th class='ND'>" . $col . '</th>';
                    } else {
                        
                        $output .= "<th>" . $col . '</th>';
                    }
                }
                $output .= '<th>Ver Detalle</th></tr></thead><tr>';
                foreach ($var as $col => $val) {
                    if ($col === 'ID') {
                        $ID = $val;
                        $output .= "<td class='ND'>" . $val . "</td>";
                        
                    } else {
                        $output .= '<td>' . $val . '</td>';
                    }
                }
                $output .= "<td class='tdVerDetalle'> <input type='text' class='ND' value='$ID'> <button type='button' class='btnTable btn btn-primary' id='verDetalles$ID'>Ver detalle</button><script>$('#verDetalles$ID').click((e) => {verDetalles($ID);});</script></td></tr>";
            } else {
                $output .= '<tr>';
                foreach ($var as $col => $val) {
                    if ($col === 'ID') {
                        $ID = $val;
                        $output .= "<td class='ND'>" . $val . "</td>";
                        //                 echo "<input type='text' value='$val'>";   
                    } else {
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
    
    
    
    
    
    
    function ActualizarClase()
    {
        $oldName  = $_POST['oldName'];
        $NClase   = $_POST['NombreClase'];
        $PMatri   = $_POST['inputProf2'];
        $ACodigo  = $_POST['inputA'];
        $Seccion  = $_POST['FSeccion'];
        $NHorario = $_POST['inputHorario'];
        
        
        $upQuery = "UPDATE  clases_creadas SET Nombre='$NClase', PMatricula='$PMatri', ACodigo='$ACodigo', ASeccion='$Seccion', NHorario='$NHorario' WHERE  clases_creadas.Nombre='$oldName'";
        
        
        $Result = DB::update($upQuery);
        
        echo "ok";
        
    }
    
    
    /************************** crearClase ************/
    
    function crearClase()
    {
        $profesor    = $_POST['inputProf2'];
        $Asignatura  = $_POST['inputA'];
        $horario     = $_POST['inputHorario'];
        $Seccion     = $_POST['FSeccion'];
        $claseNombre = $_POST['NombreClase'];
        
        $testAsignatura = "select * from  clases_creadas where PMatricula='$profesor' and NHorario='$horario'";
        $Result         = DB::select($testAsignatura);
        if (count($Result) > 0) {
            echo "Duplicate_Record";
            exit;
        }
        
        
        //ver si ya la asignatura esta asignada
        $testAsignatura = "select * from  clases_creadas where ACodigo='$Asignatura' and ASeccion='$Seccion'";
        $Result         = DB::select($testAsignatura);
        if (count($Result) > 0) {
            echo "claseDupli";
            exit;
        }
        //fin de la prueba
        //comprobar el Nombre no exista
        $test   = "select * from  clases_creadas where Nombre='$claseNombre'";
        $Result = DB::select($test);
        //    echo var_dump($Result);
        if (count($Result) > 0) {
            echo "NombreUsado";
            exit;
        }
        //fin de la prueba
        
        //*************Comprobar existe el horario
        $testHorario = "select * from  horarios_creados_linear where Nombre like '$horario'";
        //echo $testHorario;
        
        $Result = DB::select($testHorario);
        if (!$Result) {
            
            printf("Errormessage: %s\n", $Result);
            
        }
        
        if (count($Result) === 0) {
            echo "NH";
            exit;
        }
        //****************fin de la prueba
        
        //***************Comprobar existe el profesor
        $testProfesor = "select * from  profesores where PMatricula like '$profesor'";
        //echo $testProfesor;
        
        
        $Result = DB::select($testProfesor);
        //Traer el nombre del prof
        //    print_r($Result); exit;
        
        if (count($Result) === 0) {
            echo "NP";
            exit;
        }
        //*********************fin de la prueba
        
        
        $INSERTINTO = "insert into  clases_creadas (Nombre, PMatricula, ACodigo, ASeccion, NHorario) VALUES ('$claseNombre','$profesor','$Asignatura','$Seccion','$horario')";
        
        //    echo $INSERTINTO;
        
        
        $Result = DB::insert($INSERTINTO);
        
        //    echo $Result;
        
        echo "ok";
        
    }
    
    /**************************Seccion para manejo data profesor************/
    //dataListProf()
    //datalist();
    
    function dataList($SELECTFROM)
    {
        
        
        
        
        $Result = DB::select($SELECTFROM);
//           echo json_encode($Result[0]);
//        return
        //    echo ('estoy aqui');
        
        //    exit;
        
        $a = array();
        $x = -1;
        
        foreach ($Result as $key => $var) {
            if ($key === 0) {
                foreach ($var as $col => $val) {
                    //                $output .='<option>'. $val . '</option>';
                    $x = $x + 1;
                    
                    $a[$x] = $col;
                    //                echo $a[$x];
                    //                echo $col;
                    
                    
                }
            }
        }
        
        
        
        $output = "";
        foreach ($Result as $key => $var) {
            if ($key === 0) {
                $output = "";
                foreach ($var as $col => $val) {
                    if ($a[0] === $col) {
                        $output .= '<option value="' . $val . '">';
                    } else {
                        $output .= $val . '</option>';
                    }
                }
            } else {
                foreach ($var as $col => $val) {
                    if ($a[0] === $col) {
                        $output .= '<option value="' . $val . '">';
                    } else {
                        $output .= $val . '</option>';
                    }
                }
            }
        }
        //    echo   htmlspecialchars($output);
        echo $output;
        
    }
    function dataisted($data)
    {
        //    $output = '<table class="table table-condensed table-bordered table-reports">';
        
        foreach ($data as $key => $var) {
            //$output .= '<tr>';
            if ($key === 0) {
                //            $output .= '<thead><tr>';
                foreach ($var as $col => $val) {
                    //                $output .= "<th>" . $col . '</th>';
                    $output .= $col;
                }
                //            $output .= '</tr></thead><tr>';
                foreach ($var as $col => $val) {
                    //                $output .= '<td>' . $val . '</td>';
                    $output .= $val;
                }
                //            $output .= '</tr>';
            } else {
                //            $output .= '<tr>';
                foreach ($var as $col => $val) {
                    //                $output .= '<td>' . $val . '</td>';
                    $output .= $val;
                }
                //            $output .= '</tr>';
            }
        }
        //    $output .= '</table>';
        echo $output;
        //    return $output;
    }
    
    function addProf($CC)
    {
        $PNombre    = $_POST['PNombre'];
        $PApellido  = $_POST['PApellido'];
        $PCedula    = $_POST['PCedula'];
        $PCelular   = $_POST['PCelular'];
        $PMatricula = $_POST['PMatricula'];
        $PDireccion = $_POST['PDireccion'];
        $PL         = $PM = $PMM = $PJ = $PV = $PS = $PDD = $PDN = $PDV = false;
        
        if (isset($_POST['PTelefono'])) {
            $PTelefono = $_POST['PTelefono'];
        }
        $opts = array(
            'PL',
            'PM',
            'PMM',
            'PJ',
            'PV',
            'PS',
            'PDD',
            'PDN',
            'PDV'
        );
        $vals = array();
        foreach ($opts as $o) {
            if (isset($_POST[$o])) {
                $vals[$o] = ($_POST[$o] ? 1 : 0);
            } else {
                $vals[$o] = 0;
            }
        }
        // avoid SQL Injection
        $left_vals = array(
            'PNombre' => $PNombre,
            'PApellido' => $PApellido,
            'PCedula' => $PCedula,
            'PCelular' => $PCelular,
            'PMatricula' => $PMatricula,
            'PDireccion' => $PDireccion,
            'PTelefono' => $PTelefono,
            'Estatus' => 0
        );
        $vals      = array_merge($vals, $left_vals);
        
        //Comprobar//
        $Condicional = "SELECT * FROM  profesores WHERE  profesores.PCedula = '$PCedula'";
        $Condicional = "SELECT * FROM  profesores WHERE  profesores.PMatricula = '$PMatricula'";
        $Condicional = "SELECT * FROM  profesores WHERE  profesores.PCedula = '$PCedula'";
        
        
        $InfoDelSelect = DB::select($Condicional);
        
        
        if (count($InfoDelSelect) > 0) {
            
            echo "<link rel='stylesheet' href='../css/bootstrap.min.css'>
        <link rel='stylesheet' href='../localStyles.css'>
        <script src='../js/Shadows.js'></script>
        <script src='../js/jquery.js'></script>
        <script src='../js/bootstrap.min.js'></script>


                <div class='alert alert-danger container alertCondi'  id='fadeout'>
            <button type='button' class='close' data-dismiss='alert'>x</button>
            <p><strong>Lo Sentimos!!</strong> Ya existe un profesor con estos datos en el sistema</p> 
            <p><strong>Causa:</strong> Puede tener un ID, como cédula, pasaporte o ID de control de tiempo repetido.
            Favor verificar las entrada de datos.</p> 
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
        } else {
            
            DB::insert("INSERT INTO  profesores (PNombre, PApellido, PCedula, PTelefono, PCelular, PMatricula, PDireccion, DisponibilidadLunes,DisponibilidadMartes,DisponibilidadMiercoles,DisponibilidadJueves,DisponibilidadViernes,DisponibilidadSabado,HorarioDiurno,HorarioVespertino,HorarioNocturno,Estatus) VALUES (:PNombre, :PApellido,:PCedula,:PTelefono,:PCelular,:PMatricula,:PDireccion,:PL,:PM,:PMM,:PJ,:PV,:PS,:PDD,:PDV,:PDN,:Estatus)", $vals);
            
            
        }
    }
    
    
    /*****************************Seccion para manejo deta materia**********/
    
    
    
    function EliminarAsignatura($CC)
    {
        //    return($CC);
        $ConsultaEA = "DELETE FROM  asignatura where  asignatura.ACodigo = '$CC'";
        
        $Eliminada = DB::delete($ConsultaEA);
        
        if ($Eliminada) {
            return "ss";
        } else {
            return "Ah habido un error al eliminar: " . $Eliminada;
        }
        //    mysqli_query($conexion, $ConsultaEA);
        //    echo $CC;
        //    return("Estoy mandando algo");
        //    header('location: ../home?done="lavida"');
    }
    function EliminarClase($CC)
    {
        $ConsultaEA = "DELETE FROM  clases_creadas where  clases_creadas.Nombre = '$CC'";
        //    echo $ConsultaEA;
        
        
        $Eliminada = DB::delete($ConsultaEA);
        
        if ($Eliminada) {
            return "ss";
        } else {
            return "Ah habido un error al eliminar: " . $Eliminada;
        }
    }
    function EliminarHorario($CC)
    {
        //**************Eliminar Horarios de procesos *****************//
        
        $ConsultaEA2 = "DELETE FROM  horarios_creados_linear where  horarios_creados_linear.Nombre = '$CC'";
        //    echo $ConsultaEA;
        $Result      = DB::delete($ConsultaEA2);
        //    echo $Result;
        
        
        //**************Eliminar Horarios de procesor *****************//
        
        
        //**************Eliminar Horarios de presentacion funcional *****************//
        
        $ConsultaEA = "DELETE FROM  horarios_creados where  horarios_creados.Nombre = '$CC'";
        
        $Eliminada = DB::delete($ConsultaEA);
        
        //**************Eliminar Horarios de presentacion funcional *****************//
        
        
        if ($Eliminada) {
            return "ss";
        } else {
            return "Ah habido un error al eliminar: " . $Eliminada;
        }
    }
    
    function UpdateAsignatura($Data)
    {
        //        print_r($_POST);
        $FAsignatura       = $_POST["FAsignatura"];
        $FCodigoAsignatura = $_POST['FCodigoAsignatura'];
        $FCantidadCreditos = $_POST['FCantidadCreditos'];
        $FCarrera          = $_POST['FCarrera'];
        $FCicloAsignatura  = $_POST['FCicloAsignatura'];
        $FSeccion          = $_POST['FSeccion'];
        $FTieneLab         = (isset($_POST['TieneLab']) ? true : false);
        
        
        //Estring para insertar en la db//
        $INSERTINTO = "UPDATE  asignatura SET CNombre='$FCarrera', ACodigo='$FCodigoAsignatura', ACreditos='$FCantidadCreditos', ACuatrimestre='$FCicloAsignatura', ANombre='$FAsignatura', ASeccion='$FSeccion', Laboratorio='$FTieneLab' WHERE  asignatura.ACodigo='$Data'";
        
        //Ejecutar todo para db//
        $FEjecutor = DB::update($INSERTINTO);
        
        
        
    }
    function InactivarProfesor($Data)
    {
        //echo 'data';
        //Estring para actualizar el estatus en la db de los profesores//
        $INSERTINTO = "UPDATE  profesores SET Estatus='1' WHERE  profesores.PMatricula='$Data'";
        
        //    echo $INSERTINTO;
        
        //Ejecutar todo para db//
        $FEjecutor = DB::update($INSERTINTO);
        
        
        
        
        //if (mysqli_connect_errno()) {
        //  echo "Failed to connect to MySQL: " . mysqli_connect_errno();
        //}
        //    echo $query;
        //    echo $FEjecutor;
    }
    
    function ActivarProfesor($Data)
    {
        //echo 'data';
        //Estring para actualizar el estatus en la db de los profesores//
        $INSERTINTO = "UPDATE  profesores SET Estatus='0' WHERE  profesores.PMatricula='$Data'";
        
        //    echo $INSERTINTO;
        
        //Ejecutar todo para db//
        $FEjecutor = DB::update($INSERTINTO);
        
        
        
        
        //if (mysqli_connect_errno()) {
        //  echo "Failed to connect to MySQL: " . mysqli_connect_errno();
        //}
        //    echo $query;
        //    echo $FEjecutor;
    }
    
    function UpdateProfesor($Data)
    {
        //    print_r($_POST);
        //    echo "<br><br>";
        $PNombre    = $_POST['PNombre'];
        $PApellido  = $_POST['PApellido'];
        $PCedula    = $_POST['PCedula'];
        $PCelular   = $_POST['PCelular'];
        $PMatricula = $_POST['PMatricula'];
        $PDireccion = $_POST['PDireccion'];
        $PL         = $PM = $PMM = $PJ = $PV = $PS = $PDD = $PDN = $PDV = false;
        
        if (isset($_POST['PTelefono'])) {
            $PTelefono = $_POST['PTelefono'];
        }
        $opts = array(
            'PL',
            'PM',
            'PMM',
            'PJ',
            'PV',
            'PS',
            'PDD',
            'PDN',
            'PDV'
        );
        $vals = array();
        foreach ($opts as $o) {
            if (isset($_POST[$o])) {
                $vals[$o] = ($_POST[$o] ? 1 : 0);
            } else {
                $vals[$o] = 0;
            }
        }
        // avoid SQL Injection
        $left_vals = array(
            'PNombre' => $PNombre,
            'PApellido' => $PApellido,
            'PCedula' => $PCedula,
            'PCelular' => $PCelular,
            'PMatricula' => $PMatricula,
            'PDireccion' => $PDireccion,
            'PTelefono' => $PTelefono,
            'Data' => $Data
        );
        $vals      = array_merge($vals, $left_vals);
        
        //Estring para insertar en la db//
        DB::update("UPDATE  profesores SET PNombre = :PNombre, PApellido = :PApellido, PCedula = :PCedula, PTelefono = :PTelefono, PCelular = :PCelular, PMatricula = :PMatricula, PDireccion = :PDireccion, DisponibilidadLunes = :PL,DisponibilidadMartes =:PM,DisponibilidadMiercoles =:PMM,DisponibilidadJueves =:PJ,DisponibilidadViernes = :PV,DisponibilidadSabado = :PS,HorarioDiurno = :PDD,HorarioVespertino = :PDV,HorarioNocturno = :PDN WHERE  profesores.PMatricula=:Data", $vals);
        
        
        //$FEjecutor = DB::update($INSERTINTO);
        
    }
    
    
    
    
    
    function EditarAsignatura($CC)
    {
        $ConsultaEA = "SELECT * FROM  asignatura where  asignatura.ACodigo LIKE '$CC'";
        
        
        $EditAsig01 = DB::select($ConsultaEA);
        if (count($EditAsig01) === 0) {
            
            return "nocoincidencia";
            
        }
        
        return $EditAsig01;
        
        
        
        
    }
    function EditarClase($CC)
    {
        
        $ConsultaEA = "SELECT * FROM  clases_Creadas where  Clases_Creadas.Nombre LIKE '$CC'";
        
        $InfoDelSelect = DB::select($ConsultaEA);
        
        if (count($InfoDelSelect) === 0) {
            
            echo "nocoincidencia";
            exit;
        }
        return $InfoDelSelect;
    }
    function EditarHorario($CC)
    {
        $ConsultaEA = "SELECT * FROM  horarios_creados_linear where  horarios_creados_linear.Nombre LIKE '$CC'";
        
        //    echo $ConsultaEA;
        //    exit;
        
        
        $InfoDelSelect = DB::select($ConsultaEA);
        if (count($InfoDelSelect) === 0) {
            
            echo "nocoincidencia";
            
            return;
        }
        
        return $InfoDelSelect;
        
        
        
        
        
    }
    
    function EditarProfesor($CC)
    {
        $ConsultaEA = "SELECT * FROM  profesores WHERE  profesores.PMatricula LIKE '$CC'";
        
        
        $InfoDelSelect = DB::select($ConsultaEA);
        
        
        if (count($InfoDelSelect) === 0) {
            
            echo "nocoincidencia";
            
            return;
        }
        return $InfoDelSelect;
        
        
        
    }
    function ConsultarAsignaturaEliminar($CC)
    {
        $SELECTFROM = "SELECT Acodigo as 'C&oacute;digo', ANombre as Nombre, Acuatrimestre Cuatrimestre, ASeccion as 'Secci&oacute;n' FROM  asignatura WHERE  asignatura.ACodigo='$CC'";
        
        
        $CargarData = DB::select($SELECTFROM);
        
        if ($CargarData === "fail") {
            echo "fail";
            exit();
        } else {
            
            $this->display_data2($CargarData);
            
        }
        
    }
    function EliminarClaseConsulta($CC)
    {
        $SELECTFROM = "SELECT Nombre as 'Clase',  profesores.PNombre as 'Profesor',  Asignatura.ANombre as 'Asignatura',  clases_creadas.NHorario 'Bajo el Horario' FROM  clases_creadas INNER JOIN  profesores ON ( clases_creadas.PMatricula =  profesores.PMatricula) INNER JOIN  asignatura ON ( clases_creadas.ACodigo =  asignatura.ACodigo) WHERE  clases_creadas.Nombre='$CC'";
        //    echo $SELECTFROM;
        //    
        
        $CargarData = DB::select($SELECTFROM);
        //    print_r( $CargarData);
        if (empty($CargarData)) {
            echo "fail";
            exit();
        } else {
            
            $this->display_data2($CargarData);
            
        }
        
    }
    function EliminarHorarioConsulta($CC)
    {
        $SELECTFROM = "SELECT Nombre, Alias,  dias.DiaSemana, Entrada, Salida FROM  horarios_creados INNER JOIN  dias ON ( horarios_creados.Dia =  dias.ID) WHERE  horarios_creados.Nombre='$CC'";
        //    echo $SELECTFROM;
        //    
        
        $CargarData = DB::select($SELECTFROM);
        //    print_r( $CargarData);
        if ($CargarData === "fail") {
            echo "fail";
            exit();
        } else {
            
            $this->display_data2($CargarData);
            
        }
        
    }
    
    
    //"SELECT * FROM  asignatura where  asignatura.ANombre LIKE '%".$CC."%' OR  asignatura.ACodigo LIKE '%".$CC."%'";
    
    function ConsultarAsignatura($CC)
    {
        $SELECTFROM = "SELECT ANombre as Nombre, ACuatrimestre as Cuatrimestre, ACodigo as 'C&oacute;digo', ACreditos as 'Creditos', upper( asignaturalab.laboratorio) as 'Tiene Lab.',  carreras.cnombre as Carrera, ASeccion as 'Secci&oacute;n' FROM  asignatura INNER JOIN  asignaturalab On ( asignatura.laboratorio =  asignaturalab.ID)   INNER JOIN  carreras ON ( asignatura.CNombre =  carreras.Id) where	 asignatura.ANombre LIKE '%" . $CC . "%' OR  asignatura.ACodigo LIKE '%" . $CC . "%'";
        
        
        $InfoDelSelect = DB::select($SELECTFROM);
        
        
        if (count($InfoDelSelect) === 0) {
            
            //        echo "vacio";
            echo "objetoVacio";
            
            exit;
        }
        //        $SELECTFROM ="SELECT ACodigo as Codigo, ANombre as Nombre, ACuatrimestre as Cuatrimestre, ACreditos as 'Cantidas de creditos',  asignatura.CNombre as Carrera, ASeccion, upper( asignaturalab.laboratorio) as 'Tiene Lab.',  carreras.cnombre FROM  asignatura INNER JOIN  asignaturalab On  asignatura.laboratorio =  asignaturalab.ID AND INNER JOIN  carreras ON ( asignatura.CNombre =  carreras.Id) where  asignatura.ANombre LIKE '%".$CC."%' OR  asignatura.ACodigo LIKE '%".$CC."%'"
        
        
        
        //    echo $SELECTFROM;
        $CargarData = DB::select($SELECTFROM);
        //    print_r( $CargarData);
        //    if()
        $this->display_data($CargarData);
        //    $json = json_encode($CargarData);
        //    echo $json;
        
    }
    //ConsultarProfesor("");
    //ConsultarProfesor("aaa");
    function ConsultarProfesor($CC)
    {
        
        $SELECTFROM = "SELECT PNombre AS 'Profesor', PApellido AS Apellido, PCelular AS 'Telefono Celular', PMatricula AS 'Matr&iacute;cula' FROM  profesores WHERE  profesores.PMatricula LIKE '%" . $CC . "%'";
        
        //    echo $SELECTFROM;
        
        $InfoDelSelect = DB::select($SELECTFROM);
        
        
        if (count($InfoDelSelect) === 0) {
            
            echo "vacio";
            
            exit;
        }
        
        $CargarData = DB::select($SELECTFROM);
        //    print_r( $CargarData);
        //    if()
        $this->display_data($CargarData);
        //    $json = json_encode($CargarData);
        //    echo $json;
        
        
        
    }
    function ListadoGral()
    {
        
        $SELECTFROM = "SELECT PNombre as Nombre, PApellido as Apellido, PCelular as Celular, PMatricula as Matricula, PDireccion as Direccion, PTelefono as Telefono,  estado.Estado FROM  profesores INNER JOIN  estado on ( estado.ID =  profesores.Estatus)";
        
        $SELECTFROM = "SELECT PNombre as Nombre, PApellido as Apellido, PCelular as Celular, PMatricula as Matricula, PDireccion as Direccion, PTelefono as Telefono, `DisponibilidadLunes`,`DisponibilidadMartes`,`DisponibilidadMiercoles`,`DisponibilidadJueves`,`DisponibilidadViernes`,`DisponibilidadSabado`,`HorarioDiurno`,`HorarioVespertino`,`HorarioNocturno`, estado.Estado FROM  profesores INNER JOIN  estado on ( estado.ID =  profesores.Estatus)";
        
        //    $SELECTFROM = "SELECT * FROM  profesores";
        
        //    echo $SELECTFROM;
        
        $InfoDelSelect = DB::select($SELECTFROM);
        
        
        if (count($InfoDelSelect) === 0) {
            
            echo "vacio";
            
            exit;
        }
        
        $CargarData = DB::select($SELECTFROM);
        //    print_r( $CargarData);
        //    if()
        //    $this->display_data3($CargarData);
        return $CargarData;
        
        
        
    }
    
    function UpdateEstatus($CC)
    {
        
        $SELECTFROM = "SELECT Estatus FROM  profesores WHERE  profesores.PMatricula LIKE '%" . $CC . "%'";
        
        //    echo $SELECTFROM;
        
        $InfoDelSelect = DB::select($SELECTFROM);
        
        
        if (count($InfoDelSelect) === 0) {
            
            echo "vacio";
            
            exit;
        }
        
        $CargarData = DB::select($SELECTFROM);
        
        foreach ($CargarData as $key => $var) {
            //$output .= '<tr>';
            foreach ($var as $col => $val) {
                print_r($val);
            }
        }
        return ($val);
        
        
        
        
        
    }
    
    function CargarPensum($CC)
    {
        $SELECTFROM = "SELECT ANombre as Nombre, ACuatrimestre as Cuatrimestre, ACodigo as 'C&oacute;digo', ACreditos as Creditos FROM  asignatura,  carreras where  asignatura.CNombre =  carreras.ID AND  carreras.CNombre = '$CC'";
        
        $test = "select  asignatura.CNombre from  asignatura inner join  carreras on ( carreras.ID =  asignatura.CNombre) where  carreras.CNombre like '$CC'";
        //    echo $test;
        //    
        
        $Result = DB::select($test);
        //    print_r($Result);
        //    echo $Result;
        if (count($Result) === 0) {
            echo "error";
            
            exit;
        }
        
        //    echo $SELECTFROM;
        $CargarData = DB::select($SELECTFROM);
        //    print_r( $CargarData);
        //    if()
        
        $this->display_data($CargarData);
        
        //    $json = json_encode($CargarData);
        //    echo $json;
        
        
    }
    function ConsultarClase($CC)
    {
        
        //    echo $CC;
        $CargarData = DB::select($CC);
        //    print_r( $CargarData);
        //    if()
        $this->display_data($CargarData);
        //    $json = json_encode($CargarData);
        //    echo $json;
        
        
    }
    function CargarHorarios($CC)
    {
        $SELECTFROM = "select Nombre, Alias, DiaSemana,Entrada,Salida from  horarios_creados INNER JOIN  dias on ( dias.ID =  horarios_creados.Dia) where  horarios_creados.Nombre like '$CC'";
        //    echo $SELECTFROM;    
        $CargarData = DB::select($SELECTFROM);
        //    print_r( $CargarData);
        //    if()
        if (!$CargarData) {
            print_r("Horario no es válido");
        }
        $this->display_data($CargarData);
        //    $json = json_encode($CargarData);
        //    echo $json;  
        
    }
    
    
    function actionReposition($NC, $DR, $E, $S)
    {
        //compobacion existe clase
        $SELECT = "SELECT Nombre FROM  clases_creadas WHERE  clases_creadas.Nombre = '$NC'";
        
        
        $NoDupli = DB::select($SELECT);
        if (count($NoDupli) === 0) {
            echo "noExisteClase";
            exit;
        }
        //fin comprobacion existe clase
        
        //comprueba si ya existe una reposicion para este dia
        $SELECTNoDupli = "SELECT ID FROM  reposiciones WHERE  reposiciones.DiaReposicion = '$DR' AND  reposiciones.NombreClase = '$NC' AND  reposiciones.Entrada = '$E'";
        
        
        $NoDupli = DB::select($SELECTNoDupli);
        if (count($NoDupli) > 0) {
            echo "YaExiste";
            exit;
        }
        //************fin comprobacion**************    
        
        $INSERTINTO = "INSERT INTO  reposiciones(NombreClase,DiaReposicion, Entrada, Salida)VALUES ('$NC', '$DR','$E', '$S')";
        //    echo $INSERTINTO;
        
        $Result = DB::insert($INSERTINTO);
        
        if (!$Result) {
            echo "insertError";
        }
        
        echo "todobien";
    }
    
    function CrearAsignaturaQuery()
    {
        //        print_r($_POST);
        $FAsignatura       = $_POST["FAsignatura"];
        $FCodigoAsignatura = $_POST['FCodigoAsignatura'];
        $FCantidadCreditos = $_POST['FCantidadCreditos'];
        $FCarrera          = $_POST['FCarrera'];
        $FCicloAsignatura  = $_POST['FCicloAsignatura'];
        
        $Lab      = false;
        $FSeccion = $_POST['FSeccion'];
        if (isset($_POST['TieneLab'])) {
            $Lab = true;
            //    echo $Lab;
        }
        //Comprobar//
        $Condicional = "SELECT * FROM  asignatura WHERE  asignatura.ACodigo = '$FCodigoAsignatura'";
        
        $InfoDelSelect = DB::select($Condicional);
        
        
        if (count($InfoDelSelect) > 0) {
            
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
                $(document).ready(function () { $('#fadeout').animate({top: 300});
                $('#fadeout').fadeTo(2000, 500).fadeOut(4000, function () {                                    $('#fadeout').fadeOut(500, window.history.go(-1));}); })
                </script>
                ";
            
            exit;
        } else {
            
            //Estring para insertar en la db//
            $INSERTINTO = "INSERT INTO  asignatura(CNombre, ACodigo, ACreditos, ACuatrimestre, ANombre, Laboratorio, ASeccion) VALUES ('$FCarrera', '$FCodigoAsignatura','$FCantidadCreditos','$FCicloAsignatura','$FAsignatura'," . ((int) $Lab) . ",'$FSeccion')";
            
            //Ejecutar todo para db//
            $data = DB::insert($INSERTINTO);
            return $data;
            
        }
        
    }
    
    //************** OJO ----- Descontinuado por la revicion del desarrollo
    function crearHorario()
    {
        
        $MatriProfesor    = $_POST['inputProf'];
        $Seccion          = $_POST['FSeccion'];
        $CodigoAsignatura = $_POST['inputAsig'];
        
        if (!isset($_POST['lunesDe']) and !isset($_POST['martesDe']) and !isset($_POST['miercolesDe']) and !isset($_POST['juevesDe']) and !isset($_POST['viernesDe']) and !isset($_POST['sabadoDe'])) {
            echo "NH";
            exit;
        }
        
        //Comprobar//
        $SELECTFROM = "SELECT * FROM  profesores WHERE  profesores.PMatricula = '$MatriProfesor' and  asignatura.ACodigo = '$CodigoAsignatura'";
        
        $SProf = "SELECT * FROM  profesores WHERE  profesores.PMatricula = '$MatriProfesor'";
        
        //    echo $CodigoAsignatura;
        $SAsig = "SELECT * FROM  asignatura WHERE  asignatura.ACodigo = '$CodigoAsignatura'";
        
        $SSecc = "SELECT * FROM  asignatura WHERE  asignatura.ACodigo = '$CodigoAsignatura' AND  asignatura.ASeccion = '$Seccion'";
        
        $SELECTNoDupli = "SELECT ID FROM  horarios WHERE  horarios.ACodigo = '$CodigoAsignatura' AND  horarios.ASeccion = '$Seccion'";
        
        //    echo $SSecc;
        
        
        
        $SelectProf = DB::select($SProf);
        
        
        $SelectAsig = DB::select($SAsig);
        
        //exit;
        $SelectSecc = DB::select($SSecc);
        
        //    echo $SELECTNoDupli;
        //    exit;
        $NoDupli = DB::select($SELECTNoDupli);
        
        //    print_r($NoDupli);
        if (count($NoDupli) > 0) {
            echo "Dupli";
            exit;
        }
        if (count($SelectProf) === 0) {
            echo "noProf";
        }
        if (count($SelectAsig) === 0) {
            echo "noAsig";
            exit;
        }
        //   exit; 
        if (count($SelectSecc) === 0) {
            echo "noSecc";
            exit;
        } else {
            //        echo "eeooo";
            //    $lunesHasta = $_POST['lunesDe'] = "7:00";
            
            if (isset($_POST['lunesDe'])) {
                $in  = $_POST['lunesDe'];
                $out = $_POST['lunesHasta'];
                if ($in >= $out) {
                    echo "EHS";
                    exit;
                }
                //        echo $MatriProfesor;
                ADD_Horario($MatriProfesor, $CodigoAsignatura, $Seccion, 1, $in, $out, 0);
            }
            if (isset($_POST['martesDe'])) {
                $in  = $_POST['martesDe'];
                $out = $_POST['martesHasta'];
                if ($in >= $out) {
                    echo "EHS";
                    exit;
                }
                ADD_Horario($MatriProfesor, $CodigoAsignatura, $Seccion, 2, $in, $out, 0);
            }
            if (isset($_POST['miercolesDe'])) {
                $in  = $_POST['miercolesDe'];
                $out = $_POST['miercolesHasta'];
                if ($in >= $out) {
                    echo "EHS";
                    exit;
                }
                ADD_Horario($MatriProfesor, $CodigoAsignatura, $Seccion, 3, $in, $out, 0);
            }
            if (isset($_POST['juevesDe'])) {
                $in  = $_POST['juevesDe'];
                $out = $_POST['juevesHasta'];
                if ($in >= $out) {
                    echo "EHS";
                    exit;
                }
                ADD_Horario($MatriProfesor, $CodigoAsignatura, $Seccion, 4, $in, $out, 0);
            }
            if (isset($_POST['viernesDe'])) {
                $in  = $_POST['viernesDe'];
                $out = $_POST['viernesHasta'];
                if ($in >= $out) {
                    echo "EHS";
                    exit;
                }
                ADD_Horario($MatriProfesor, $CodigoAsignatura, $Seccion, 5, $in, $out, 0);
            }
            if (isset($_POST['sabadoDe'])) {
                $in  = $_POST['sabadoDe'];
                $out = $_POST['sabadoHasta'];
                if ($in >= $out) {
                    echo "EHS";
                    exit;
                }
                ADD_Horario($MatriProfesor, $CodigoAsignatura, $Seccion, 6, $in, $out, 0);
            }
            
            
        }
        
        
    }
    
    function guardarHorario()
    {
        
        
        $HNombre = $_POST['nombreHorario'];
        $alias   = $_POST['aliasHorario'];
        
        if (!isset($_POST['lunesDe']) and !isset($_POST['martesDe']) and !isset($_POST['miercolesDe']) and !isset($_POST['juevesDe']) and !isset($_POST['viernesDe']) and !isset($_POST['sabadoDe'])) {
            echo "NH";
            exit;
        }
        
        //Comprobar //    
        $SELECTNoDupli = "SELECT * FROM  horarios_Creados WHERE  horarios_Creados.Nombre = '$HNombre'";
        
        
        
        
        
        $NoDupli = DB::select($SELECTNoDupli);
        
        
        if (count($NoDupli) > 0) {
            echo "Dupli";
            exit;
        } else {
            $crearTabla = "INSERT INTO  horarios_creados_linear (Nombre) VALUES ('$HNombre')";
            $Result     = DB::insert($crearTabla);
            
            //        echo var_dump($Result);
            //            echo $alias;
            if (isset($alias)) {
                $upQuery = "update  horarios_creados_linear set Alias='$alias' where  horarios_creados_linear.Nombre like '$HNombre'";
                DB::update($upQuery);
                //        echo $upQuery;exit;
            }
            
            
            
            if (isset($_POST['lunesDe'])) {
                $in   = $_POST['lunesDe'];
                $out  = $_POST['lunesHasta'];
                $tin  = strtotime($in);
                $tout = strtotime($out);
                //        echo var_dump($tin);exit;
                if ($tin >= $tout) {
                    echo "EHS";
                    exit;
                }
                
                $this->ADD_Horario2($HNombre, 1, $in, $out, 0, $alias);
                
                DB::update("UPDATE  horarios_creados_linear SET lunesDe='$in', lunesHasta='$out' WHERE  horarios_creados_linear.Nombre='$HNombre'");
                
            }
            if (isset($_POST['martesDe'])) {
                $in   = $_POST['martesDe'];
                $out  = $_POST['martesHasta'];
                $tin  = strtotime($in);
                $tout = strtotime($out);
                //        echo var_dump($tin);exit;
                if ($tin >= $tout) {
                    echo "EHS";
                    exit;
                }
                $this->ADD_Horario2($HNombre, 2, $in, $out, 0, $alias);
                DB::update("UPDATE  horarios_creados_linear SET MartesDe='$in', MartesHasta='$out' WHERE  horarios_creados_linear.Nombre='$HNombre'");
                
            }
            if (isset($_POST['miercolesDe'])) {
                $in   = $_POST['miercolesDe'];
                $out  = $_POST['miercolesHasta'];
                $tin  = strtotime($in);
                $tout = strtotime($out);
                //        echo var_dump($tin);exit;
                if ($tin >= $tout) {
                    echo "EHS";
                    exit;
                }
                $this->ADD_Horario2($HNombre, 3, $in, $out, 0, $alias);
                DB::update("UPDATE  horarios_creados_linear SET MiercolesDe='$in', MiercolesHasta='$out' WHERE  horarios_creados_linear.Nombre='$HNombre'");
                
            }
            if (isset($_POST['juevesDe'])) {
                $in   = $_POST['juevesDe'];
                $out  = $_POST['juevesHasta'];
                $tin  = strtotime($in);
                $tout = strtotime($out);
                //        echo var_dump($tin);exit;
                if ($tin >= $tout) {
                    echo "EHS";
                    exit;
                }
                $this->ADD_Horario2($HNombre, 4, $in, $out, 0, $alias);
                DB::update("UPDATE  horarios_creados_linear SET JuevesDe='$in', JuevesHasta='$out' WHERE  horarios_creados_linear.Nombre='$HNombre'");
                
            }
            if (isset($_POST['viernesDe'])) {
                $in   = $_POST['viernesDe'];
                $out  = $_POST['viernesHasta'];
                $tin  = strtotime($in);
                $tout = strtotime($out);
                //        echo var_dump($tin);exit;
                if ($tin >= $tout) {
                    echo "EHS";
                    exit;
                }
                $this->ADD_Horario2($HNombre, 5, $in, $out, 0, $alias);
                DB::update("UPDATE  horarios_creados_linear SET ViernesDe='$in', ViernesHasta='$out' WHERE  horarios_creados_linear.Nombre='$HNombre'");
                
            }
            if (isset($_POST['sabadoDe'])) {
                $in   = $_POST['sabadoDe'];
                $out  = $_POST['sabadoHasta'];
                $tin  = strtotime($in);
                $tout = strtotime($out);
                //        echo var_dump($tin);exit;
                if ($tin >= $tout) {
                    echo "EHS";
                    exit;
                }
                $this->ADD_Horario2($HNombre, 6, $in, $out, 0, $alias);
                DB::update("UPDATE  horarios_creados_linear SET SabadoDe='$in', SabadoHasta='$out' WHERE  horarios_creados_linear.Nombre='$HNombre'");
                
            }
            
            
        }
        
        
    }
    function ActualizarHorario()
    {
        
        
        $HNombre   = $_POST['nombreHorario'];
        $oldName   = $_POST['oldName'];
        //Dias
        $Lunes     = "Lunes";
        $Martes    = "Martes";
        $Miercoles = "Miercoles";
        $Jueves    = "Jueves";
        $Viernes   = "Viernes";
        $Sabado    = "Sabado";
        
        
        DB::update("UPDATE  horarios_creados_linear SET Nombre='$HNombre' WHERE  horarios_creados_linear.Nombre LIKE '$oldName'");
        
        $this->UPDATE_Delete_Horario($oldName);
        
        if (isset($_POST['lunesDe'])) {
            $in     = $_POST['lunesDe'];
            $out    = $_POST['lunesHasta'];
            $strIn  = strtotime($in);
            $strOut = strtotime($out);
            
            if ($strIn >= $strOut) {
                echo "EMS";
                exit;
                
            }
            //        echo "entre al lunes";exit;
            
            
            // Input with 6 inputs, but $tipo is not used ... WTF! ($HN,$day,$in,$out,$tipo,$alias)
            
            $this->ADD_Horario2($HNombre, 1, $in, $out, NULL, 0);
            
            $this->UPDATE_Horario_Linear_Poner($HNombre, $in, $out, $Lunes);
            
            
        } else {
            //Funcionalidad porcion puede ser agregada a UPDATE_Delete_Horario y pasar  el parametro extra $HNombre
            
            $this->UPDATE_Horario_Linear_Quitar($HNombre, $Lunes);
            //                echo $Dia;
            
            
        }
        if (isset($_POST['martesDe'])) {
            $in     = $_POST['martesDe'];
            $out    = $_POST['martesHasta'];
            $strIn  = strtotime($in);
            $strOut = strtotime($out);
            
            if ($strIn >= $strOut) {
                echo "EMS";
                exit;
                
            }
            
            
            $this->ADD_Horario2($HNombre, 2, $in, $out, NULL, 0);
            
            $this->UPDATE_Horario_Linear_Poner($HNombre, $in, $out, $Martes);
            
            
        } else {
            
            $this->UPDATE_Horario_Linear_Quitar($HNombre, $Martes);
            
            
            
        }
        if (isset($_POST['miercolesDe'])) {
            $in     = $_POST['miercolesDe'];
            $out    = $_POST['miercolesHasta'];
            $strIn  = strtotime($in);
            $strOut = strtotime($out);
            
            if ($strIn >= $strOut) {
                echo "EMS";
                exit;
                
            }
            
            $this->ADD_Horario2($HNombre, 3, $in, $out, NULL, 0);
            
            $this->UPDATE_Horario_Linear_Poner($HNombre, $in, $out, $Miercoles);
            
            
        } else {
            
            $this->UPDATE_Horario_Linear_Quitar($HNombre, $Miercoles);
            
            
            
            
        }
        if (isset($_POST['juevesDe'])) {
            $in     = $_POST['juevesDe'];
            $out    = $_POST['juevesHasta'];
            $strIn  = strtotime($in);
            $strOut = strtotime($out);
            
            if ($strIn >= $strOut) {
                echo "EMS";
                exit;
                
            }
            
            
            $this->ADD_Horario2($HNombre, 4, $in, $out, NULL, 0);
            
            $this->UPDATE_Horario_Linear_Poner($HNombre, $in, $out, $Jueves);
            
            
        } else {
            
            
            $this->UPDATE_Horario_Linear_Quitar($HNombre, $Jueves);
            
            
        }
        if (isset($_POST['viernesDe'])) {
            $in     = $_POST['viernesDe'];
            $out    = $_POST['viernesHasta'];
            $strIn  = strtotime($in);
            $strOut = strtotime($out);
            
            if ($strIn >= $strOut) {
                echo "EMS";
                exit;
                
            }
            
            
            $this->ADD_Horario2($HNombre, 5, $in, $out, NULL, 0);
            
            $this->UPDATE_Horario_Linear_Poner($HNombre, $in, $out, $Viernes);
            
        } else {
            
            
            $this->UPDATE_Horario_Linear_Quitar($HNombre, $Viernes);
            
            
            
        }
        if (isset($_POST['sabadoDe'])) {
            $in     = $_POST['sabadoDe'];
            $out    = $_POST['sabadoHasta'];
            $strIn  = strtotime($in);
            $strOut = strtotime($out);
            
            if ($strIn >= $strOut) {
                echo "EMS";
                exit;
                
            }
            
            
            $this->ADD_Horario2($HNombre, 6, $in, $out, NULL, 0);
            
            $this->UPDATE_Horario_Linear_Poner($HNombre, $in, $out, $Sabado);
            
            
        } else {
            
            $this->UPDATE_Horario_Linear_Quitar($HNombre, $Sabado);
            
            
            
        }
        
        
        
        
        
    }
    
    function reposicionHorario()
    {
        
        $PMatricula       = $_POST['PMatricula'];
        $CodigoAsignatura = $_POST['ACodigo'];
        $Seccion          = $_POST['ASeccion'];
        $diaDeReposicion  = $_POST['diaDeReposicion'];
        $in               = $_POST['Inicio'];
        $out              = $_POST['final'];
        //    $tipo = 1;
        
        //print_r($_POST);
        //    if($PMatricula===""){
        //        echo "cool";
        //        exit;
        //    } 
        if ($PMatricula === "" || $CodigoAsignatura === "" || $Seccion === "") {
            
            echo "NEA";
            exit;
            
        }
        if ($diaDeReposicion === "") {
            
            echo "NHS";
            exit;
        }
        
        
        ADD_Horario($PMatricula, $CodigoAsignatura, $Seccion, $diaDeReposicion, $in, $out, 1);
        
        
        
        
        
    }
    function ADD_Horario($PMatri, $ACode, $secc, $day, $in, $out, $tipo)
    {
        
        $INSERTINTO = "INSERT INTO  horarios (PMatricula, ACodigo, ASeccion, Dia, HIN, HOUT, TipoHorario) VALUES ('$PMatri', '$ACode','$secc','$day','$in','$out', $tipo)";
        
        
        DB::insert($INSERTINTO);
        
    }
    function UPDATE_Horario($oldName, $HN, $day, $in, $out, $tipo)
    {
        
        $INSERTINTO = "update  horarios_creados SET Nombre='$HN', Entrada='$in', Salida='$out') WHERE  horarios_creados.Dia='$day' AND  horarios_creados.Nombre='$oldName'";
        
        echo $INSERTINTO;
        
        DB::insert($INSERTINTO);
        
    }
    
    function UPDATE_Horario_Linear_Poner($HN, $in, $out, $Dia)
    {
        //    echo $Dia;
        $DiaDE      = $Dia . "De";
        $DiaHasta   = $Dia . "Hasta";
        $INSERTINTO = "UPDATE  horarios_creados_linear SET $DiaDE='$in', $DiaHasta='$out' WHERE  horarios_creados_linear.Nombre='$HN'";
        
        echo $INSERTINTO;
        
        DB::update($INSERTINTO);
        
    }
    function UPDATE_Horario_Linear_Quitar($HN, $Dia)
    {
        //    echo $Dia;
        
        $DiaDE      = $Dia . "De";
        $DiaHasta   = $Dia . "Hasta";
        $INSERTINTO = "UPDATE  horarios_creados_linear SET $DiaDE=0, $DiaHasta=0 WHERE  horarios_creados_linear.Nombre='$HN'";
        
        echo $INSERTINTO;
        
        DB::update($INSERTINTO);
        
    }
    
    function UPDATE_Delete_Horario($oldName)
    {
        
        $INSERTINTO = "DELETE FROM  horarios_creados WHERE  horarios_creados.Nombre='$oldName'";
        
        
        
        DB::delete($INSERTINTO);
        
    }
    
    function ADD_Horario2($HN, $day, $in, $out, $tipo, $alias)
    {
        
        $INSERTINTO = "INSERT INTO  horarios_creados (Nombre, Dia, Entrada, Salida, Alias) VALUES ('$HN','$day','$in','$out','$alias')";
        
        
        DB::insert($INSERTINTO);
        
    }
    
    function display_data2($data)
    {
        $output = '<table class="table table-condensed table-bordered table-reports">';
        
        foreach ($data as $key => $var) {
            //$output .= '<tr>';
            if ($key === 0) {
                $output .= '<thead><tr>';
                foreach ($var as $col => $val) {
                    $output .= "<th>" . $col . '</th>';
                }
                $output .= '</tr></thead><tr>';
                foreach ($var as $col => $val) {
                    $output .= '<td>' . $val . '</td>';
                }
                $output .= '</tr>';
            } else {
                $output .= '<tr>';
                foreach ($var as $col => $val) {
                    $output .= '<td>' . $val . '</td>';
                }
                $output .= '</tr>';
            }
        }
        $output .= '</table>';
        echo $output;
        //    return $output;
    }
    
    function display_data($data)
    {
        $output = '<table class="table table-condensed table-bordered table-reports table-consulta">';
        foreach ($data as $key => $var) {
            //$output .= '<tr>';
            if ($key === 0) {
                $output .= '<thead><tr>';
                foreach ($var as $col => $val) {
                    $output .= "<th>" . $col . '</th>';
                }
                $output .= '</tr></thead><tr>';
                foreach ($var as $col => $val) {
                    $output .= '<td>' . $val . '</td>';
                }
                $output .= '</tr>';
            } else {
                $output .= '<tr>';
                foreach ($var as $col => $val) {
                    $output .= '<td>' . $val . '</td>';
                }
                $output .= '</tr>';
            }
        }
        $output .= '</table>';
        echo ($output);
        
        //    return $output;
    }
    function display_data3($data)
    {
        $output = '<table class="table table-condensed table-bordered table-reports table-profList">';
        foreach ($data as $key => $var) {
            //$output .= '<tr>';
            if ($key === 0) {
                $output .= '<thead><tr>';
                foreach ($var as $col => $val) {
                    $output .= "<th>" . $col . '</th>';
                }
                $output .= '</tr></thead><tr>';
                foreach ($var as $col => $val) {
                    $output .= '<td>' . $val . '</td>';
                }
                $output .= '</tr>';
            } else {
                $output .= '<tr>';
                foreach ($var as $col => $val) {
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
    
    
    function TraerDB()
    {
        $SELECTFROM = "SELECT * FROM  carreras";
        
        $CargarData = DB::select($SELECTFROM);
        //    $this->display_data($CargarData);
        $json       = json_encode($CargarData);
        echo $json;
        
        
    }
    //TestingSqlsrv();
    //function TestingSqlsrv(){
    //    $dbb = $GLOBALS['conn'];
    //    
    //    $SELECT = "SELECT CardNo, RecDate, RecTime FROM AtdRecord";
    //    $Result = DB::select($SELECT);
    //    $pepe = $Result->fetchAll();
    //    $pepe = json_encode($pepe);
    //    print_r($pepe);
    ////    print_r($pepe[0]);
    
    
    
    //}
    
}












