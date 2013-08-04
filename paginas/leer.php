<?php 
    include("../includes/conexion.php");
 ?>

<!DOCTYPE html> 
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes"/>
<!--
<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, height=device-height, width=device-width, user-scalable=no"/>
-->


<title>Matinal</title>
    <!-- JQuery -->
    <script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>    
    <!-- MENU -->
    <script type="text/javascript" language="javascript" src="../includes/menu/jquery.mmenu.js"></script>
    <link type="text/css" rel="stylesheet" media="all" href="../includes/menu/mmenu.css" />
    <!-- JS Menú -->
    <script type="text/javascript">
        $(function() {
            $('#menu_leer').mmenu({
                position: "left"
            });
        });
    </script>
    <!-- Phonegap -->
    <script type="text/javascript" src="../includes/phonegap/android/cordova.js"></script>
    <script type="text/javascript" src="includes/phonegap/ios/cordova.js"></script>
    <!-- JQuery Mobile -->    
    <script src="http://code.jquery.com/mobile/1.3.0/jquery.mobile-1.3.0.min.js"></script>
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.0/jquery.mobile-1.3.0.min.css" /> 
</head>

<body>
    <nav id="menu_leer">
       <ul>
          <li><a href="../index.html">Hoy</a></li>
          <li class="Selected"><a href="buscar.php">Buscar</a></li>          
          <!-- <li><a href="https://www.facebook.com/matutinadejovenesadventistas" target="_blank">Facebook</a></li> -->
          <li><a href="creditos.php">Créditos</a></li>
       </ul>
    </nav>

<div data-role="page" id="page" data-theme="e">
	<header data-role="header" data-theme="e">
        <a href="buscar.php" data-iconpos="notext" data-icon="arrow-l" class="ui-icon-nodisc" data-iconshadow="false">Regresar</a>
        <h1>Buscar</h1>        
	</header>
    
    
	<div data-role="content">
        <?php 
            $dia = $_POST['dia'];
            $mes = $_POST['mes'];
            $anio = date("Y");

            //Verificar si existe el resultado
            $hay_resultado = mysql_num_rows(mysql_query("SELECT * FROM `reflexiones` WHERE `dia`='$dia' AND `mes`='$mes' AND `anio`='$anio' ")); 

            //NO EXISTE?
            if ($hay_resultado==0) {
                echo "<h4 style='text-align: center;'>No se encontraron resultados de la búsqueda. Intente buscar otra vez.</h4>";
            } else{                
                $result_reflexion = mysql_query("SELECT * FROM `reflexiones` WHERE `dia`='$dia' AND `mes`='$mes' AND `anio`='$anio' ");
                while ($row_reflexion = mysql_fetch_array($result_reflexion)) {
                    $id_reflexionHoy = $row_reflexion["id_reflexion"];
                    $titulo = $row_reflexion["titulo"];
                    $versiculo = $row_reflexion["versiculo"];
                    $contenido = $row_reflexion["contenido"];
                    $idMatinal = $row_reflexion["id_matinal"];                
                }

                //Select de los MATINALES
                $result_matinal = mysql_query("SELECT * FROM `matinales` WHERE `id_matinal`='$idMatinal' ");
                while ($row_matinal = mysql_fetch_array($result_matinal)) {
                    $Matinal = $row_matinal["nombreMatinal"];
                    $idTipoMatinal = $row_matinal["tipo"];
                    $autor = $row_matinal ["autor"];
                    $anio = $row_matinal ["anio"];
                }

                //Select del TIPO DE MATINALES
                $result_tipoMatinal = mysql_query("SELECT * FROM `tipo_matinal` WHERE `id_tipoMatinal`='$idTipoMatinal' ");
                while ($row_tipoMatinal = mysql_fetch_array($result_tipoMatinal)) {
                    $tipoMatinal = $row_tipoMatinal["tipoMatinal"];
                }
            
         
            //<!-- A la derecha -->        
            echo "<div id='fecha' style='text-align: right';>";            
            
            //Poner fecha con los nombres de los meses
            switch ($mes) {
                case '1': $mes = "Enero"; break;
                case '2': $mes = "Febrero"; break;
                case '3': $mes = "Marzo"; break;
                case '4': $mes = "Abril"; break;
                case '5': $mes = "Mayo"; break;
                case '6': $mes = "Junio"; break;
                case '7': $mes = "Julio"; break;
                case '8': $mes = "Agosto"; break;
                case '9': $mes = "Septiembre"; break;
                case '10': $mes = "Octubre"; break;
                case '11': $mes = "Noviembre"; break;
                case '12': $mes = "Diciembre"; break;
            }

            echo $dia."/".$mes."/".$anio;            
            echo "</div>";
        
            //<!-- Centrado -->
            echo "<h1 id='titulo' style='text-align: center;'>$titulo</h1>";
            
            //<!-- Centrado y curisva -->
            echo "<p id='versiculo' style='font-style:italic; text-align: center;'>$versiculo</p>";

            //<!-- Justificado, *Tabulado y *Capital -->
            echo "<div id='contedido' style='text-align: justify; text-indent: 1cm'>$contenido</div>";

            echo "<p id='tipoMatinal' style='text-align: left; font-size: 12px; font-style: italic;'>
            Tomado del $tipoMatinal $anio<br>
            $Matinal<br>
            $autor
            </p>";
        }
?>
    </div>

    <!-- Footer -->

</div>    
</body>
</html>
