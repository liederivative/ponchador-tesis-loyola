<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <title>Ponchador</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">


    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="localStyles.css">


    <?php include 'PHP/Shadows.php'?>

</head>

<?php 
    
        
        function CrearAsignatura($data){
            $data = trim($data);
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    ?>
    <?php/*
  $r=$_GET['action']; 
    $r1=$_GET['toma'];*/
      ?> 

        <body class="body1">

            <div class="container">
                <?php echo BarNav?>
            </div>
                        <script src="js/jquery.js"></script>
            <script src="js/bootstrap.min.js"></script>
<!--            <script src="js/chartjs/Chart.min.js"></script>-->
            <script src="js/Shadows.js"></script>
    </body>
    </html>