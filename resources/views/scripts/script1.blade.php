<?php
   
//        $GLOBALS['ok']=null;   
            
        if(isset($_GET['action'])){            
            switch($_GET['action']){        
                case "ok":
                    
                echo " 
            <div class='alert alert-success alertCondi2'  id='fadeout'>
        <button type='button' class='close' data-dismiss='alert'>x</button>
        <p><strong>Exito!!!</strong> Asignatura guardada correctamente</p>
    </div>
    
        <script>
                    $(document).ready(function () {
                        //$('#fadeout').animate({
                        //top: 300
                        //});
                        
                        $('#fadeout').fadeTo(5000, 500).slideUp(3000, function () {
                            $('#fadeout').slideUp(500);
                        });
                    })
        </script>
        ";         
                break;
                case "HE":
                    
                echo " 
            <div class='alert alert-success alertCondi2'  id='fadeout'>
        <button type='button' class='close' data-dismiss='alert'>x</button>
        <p><strong>Exito!!!</strong> Horario editado correctamente</p>
    </div>
    
        <script>
                    $(document).ready(function () {
                        //$('#fadeout').animate({
                        //top: 300
                        //});
                        
                        $('#fadeout').fadeTo(5000, 500).slideUp(3000, function () {
                            $('#fadeout').slideUp(500);
                        });
                    })
        </script>
        ";         
                break;
                    
                case "*-*":
                
                echo " 
            <div class='alert alert-success alertCondi2'  id='fadeout'>
        <button type='button' class='close' data-dismiss='alert'>x</button>
        <p><strong>Actualizaci&oacute;n:</strong> Asignatura actualizada de manera correcta</p>
    </div>
    
        <script>
                    $(document).ready(function () {
                        //$('#fadeout').animate({
                        //top: 300
                        //});
                        
                        $('#fadeout').fadeTo(5000, 500).slideUp(3000, function () {
                            $('#fadeout').slideUp(500);
                        });
                    })
        </script>
        ";
                break;
                case "e":
                
                echo " 
            <div class='alert alert-success alertCondi2'  id='fadeout'>
        <button type='button' class='close' data-dismiss='alert'>x</button>
        <p><strong></strong> La asignatura ha sido eliminada</p>
    </div>
    
        <script>
                    $(document).ready(function () {
                        //$('#fadeout').animate({
                        //top: 300
                        //});
                        
                        $('#fadeout').fadeTo(5000, 500).slideUp(3000, function () {
                            $('#fadeout').slideUp(500);
                        });
                    })
        </script>
        ";
                    break;
                case "CE":
                
                echo " 
            <div class='alert alert-success alertCondi2'  id='fadeout'>
        <button type='button' class='close' data-dismiss='alert'>x</button>
        <p><strong></strong> La Clase ha sido eliminada</p>
    </div>
    
        <script>
                    $(document).ready(function () {
                        //$('#fadeout').animate({
                        //top: 300
                        //});
                        
                        $('#fadeout').fadeTo(5000, 500).slideUp(3000, function () {
                            $('#fadeout').slideUp(500);
                        });
                    })
        </script>
        ";
                break;                    
                case "EH":
                
                echo " 
            <div class='alert alert-success alertCondi2'  id='fadeout'>
        <button type='button' class='close' data-dismiss='alert'>x</button>
        <p><strong></strong> El horario ha sido eliminado correctamente</p>
    </div>
    
        <script>
                    $(document).ready(function () {
                        //$('#fadeout').animate({
                        //top: 300
                        //});
                        
                        $('#fadeout').fadeTo(5000, 500).slideUp(3000, function () {
                            $('#fadeout').slideUp(500);
                        });
                    })
        </script>
        ";
                break;                    
                case "addedProf":
                
                echo " 
            <div class='alert alert-success alertCondi2'  id='fadeout'>
        <button type='button' class='close' data-dismiss='alert'>x</button>
        <p>Profesor agregado correctamente a la curricula docente <strong>Gracias!!!</strong></p>
    </div>
    
        <script>
                    $(document).ready(function () {
                        //$('#fadeout').animate({
                        //top: 300
                        //});
                        
                        $('#fadeout').fadeTo(5000, 500).slideUp(3000, function () {
                            $('#fadeout').slideUp(500);
                        });
                    })
        </script>
        ";
                break;                    
                case "UPP":
                
                echo " 
            <div class='alert alert-success alertCondi2'  id='fadeout'>
        <button type='button' class='close' data-dismiss='alert'>x</button>
        <p>Datos para docente actualizados de manera correcta <strong>Gracias!!!</strong></p>
    </div>
    
        <script>
                    $(document).ready(function () {
                        //$('#fadeout').animate({
                        //top: 300
                        //});
                        
                        $('#fadeout').fadeTo(5000, 500).slideUp(3000, function () {
                            $('#fadeout').slideUp(500);
                        });
                    })
        </script>
        ";
                break;                    
                    
            } 
        } 
            ?>