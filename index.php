<?php 
    include("includes/conexion.php");
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
    <!-- Icono -->
    <link rel="apple-touch-icon" href="includes/iconos/home.png" />
    <!-- JQuery -->
    <script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>    
    <!-- MENU -->
    <script type="text/javascript" language="javascript" src="includes/menu/jquery.mmenu.js"></script>
    <link type="text/css" rel="stylesheet" media="all" href="includes/menu/mmenu.css" />
    <!-- JS Menú -->
    <script type="text/javascript">
        $(function() {
            $('#menu').mmenu({
                position: "left"
            });
        });
    </script>
    <!-- Phonegap -->
    <script type="text/javascript" src="includes/phonegap/android/cordova.js"></script>
    <script type="text/javascript" src="includes/phonegap/ios/cordova.js"></script>
    <!-- JQuery Mobile -->    
    <script src="http://code.jquery.com/mobile/1.3.0/jquery.mobile-1.3.0.min.js"></script>
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.0/jquery.mobile-1.3.0.min.css" /> 

    <style type="text/css">
        .icon-menu{
            margin: 0 10px -5px 0;
        }

        /*CSS DEL BOTÓN PERSONALIZADO*/
        a[data-role="button"][data-theme="reset"] {
            border-radius: 0px; -webkit-border-radius: 0px; -moz-border-radius: 0px;
            box-shadow: none !important; -webkit-box-shadow: none !important; -moz-box-shadow: none !important;
            text-decoration: none;
        }

        a[data-role="button"][data-theme="reset"] .ui-btn-inner {
            color: white;
            overflow: visible;
            text-shadow: 0 -1px 0 #000;
            padding-left: 10px !important;
            padding-right: 10px !important;
            border: 1px solid #333;
            border-radius: 5px; -webkit-border-radius: 5px; -moz-border-radius: 5px;
            background: #333;
            box-shadow: 0 1px 0 rgba(255,255,255, 0.25), inset 0 1px 1px rgba(0,0,0, 0.2);
                -webkit-box-shadow: 0 1px 0 rgba(255,255,255, 0.25), inset 0 1px 1px rgba(0,0,0, 0.2);
                -moz-box-shadow: 0 1px 0 rgba(255,255,255, 0.25), inset 0 1px 1px rgba(0,0,0, 0.2);
        }

        /* no-background */
        a[data-role="button"][data-theme="reset"].app-theme-none .ui-btn-inner {
            color: #222;
            background: none;
            border: none;
            box-shadow: none;
            text-shadow: none;
        }

        .ui-icon-menu{
            background-image: url('includes/iconos/menu28.png');
            width: 28px;
            height: 28px;
            background-color: rgba(0, 0, 0, 0);
            border: none;
            box-shadow: none;
            margin: 0px!important;
            /*margin-left: 5px!important;*/
        }
    </style>
</head>


<body>
    <nav id="menu">
       <ul>
          <li class="Selected"><a href="#"><img class="icon-menu" src="includes/iconos/hoy.png" width="20px" height="20px">Hoy</a></li>
          <li><a href="paginas/buscar.php"><img class="icon-menu" src="includes/iconos/search.png" width="20px" height="20px">Buscar</a></li>
          <!-- <li><a data-rel=external data-ajax=false href="http://www.facebook.com/matutinadejovenesadventistas"><img class="icon-menu" src="includes/iconos/like.png" width="20px" height="20px">Facebook Ambos</a></li> -->
          <li><a href="paginas/creditos.php"><img class="icon-menu" src="includes/iconos/idea.png" width="20px" height="18px">Créditos</a></li>
       </ul>
    </nav>

<div data-role="page" id="page" data-theme="e">
	<div data-role="header" data-theme="e" style='margin-left: 0px; position: fixed; width: 100%;'>
        <!-- BOTÓN PERSONALIZADO -->
        <a href="#menu"
        data-role="button"
        data-icon="menu"
        data-theme="reset"
        data-corners="false"
        data-iconpos="notext"
        class="app-theme-none">Menu</a>
        
        <h1>Hoy</h1> 
	</div>
    
    
	<div data-role="content">
        <?php
            //CALCULAR FECHA ACTUAL
            $dia = date("j");       //ej. 7
            $mes_num = date("n");   //ej. 9           
            $anio = date("Y");      //ej. 1991

            $hay_resultado = mysql_num_rows(mysql_query("SELECT * FROM `reflexiones` WHERE `dia`='$dia' AND `mes`='$mes_num' AND `anio`='$anio' ")); 


            //VERIFICAR SI HAY O NO CONEXIÓN A INTERNET
            //Para saber si existe la conexión, se hace un ping a una página web. (Google)
            if (!$sock = @fsockopen('www.google.com', 80, $num, $error, 5)) {
                echo "<h4 style='text-align: center; padding-top: 50px;'>Lo sentimos, hemos detectado que no existe conexión a internet
                 y este contenido está solo disponible con conexión a internet.</h4>";

            }


            //VERIFICAR SI EXISTE LA REFLEXIÓN DEL DÍA
            elseif ($hay_resultado == 0) {
                //Se podría mandar un correo para agregar la reflexión.
                //Que no repita los correos
                //Decir cuantos usuarios han entrado y no lo encontraron.
                echo "<h4 style='text-align: center; padding-top: 50px;'>Ocurrió un error, por el momento no se puede mostrar el contenido de hoy. <br> Por favor intente más tarde.</h4>";
            }


            //SI TODO ESTÁ BIEN, MOSTRAR LA REFLEXIÓN
            else{
            //Select de las REFLEXIONES
            $result_reflexion = mysql_query("SELECT * FROM `reflexiones` WHERE `dia`='$dia' AND `mes`='$mes_num' AND `anio`='$anio' ");
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
            echo "<div id='fecha' style='text-align: right; padding-top: 50px;'>";
            
            //Poner fecha con los nombres de los meses
            switch ($mes_num) {
                case '1': $mes_nom = "Enero"; break;
                case '2': $mes_nom = "Febrero"; break;
                case '3': $mes_nom = "Marzo"; break;
                case '4': $mes_nom = "Abril"; break;
                case '5': $mes_nom = "Mayo"; break;
                case '6': $mes_nom = "Junio"; break;
                case '7': $mes_nom = "Julio"; break;
                case '8': $mes_nom = "Agosto"; break;
                case '9': $mes_nom = "Septiembre"; break;
                case '10': $mes_nom = "Octubre"; break;
                case '11': $mes_nom = "Noviembre"; break;
                case '12': $mes_nom = "Diciembre"; break;
            }

            echo $dia."/".$mes_nom."/".$anio;

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
