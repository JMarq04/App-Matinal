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
            $('#menu').mmenu({
                position: "left",
                configuration: {
                    hardwareAcceleration: false
                }
            });
        });
    </script>
    <!-- Phonegap -->
    <script type="text/javascript" src="../includes/phonegap/android/cordova.js"></script>
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
            background-image: url('../includes/iconos/menu28.png');
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
          <li><a href="../index.html"><img class="icon-menu" src="../includes/iconos/hoy.png" width="20px" height="20px">Hoy</a></li>
          <li class="Selected"><a href="#"><img class="icon-menu" src="../includes/iconos/search.png" width="20px" height="20px">Buscar</a></li>          
          <!-- <li><a href="https://www.facebook.com/matutinadejovenesadventistas" target="_blank">Facebook</a></li> -->
          <li><a href="creditos.php"><img class="icon-menu" src="../includes/iconos/idea.png" width="20px" height="18px">Créditos</a></li>
       </ul>
    </nav>

<div data-role="page" id="page" data-theme="e">
	<header data-role="header" data-theme="e">
        <a href="#menu"
        data-role="button"
        data-icon="menu"
        data-theme="reset"
        data-corners="false"
        data-iconpos="notext"
        class="app-theme-none">Menu</a>

        <h1>Buscar</h1>
	</header>
    
    
	<div data-role="content">
        <?php 
        if (!$sock = @fsockopen('www.google.com', 80, $num, $error, 5)) {
                echo "<h4 style='text-align: center;'>Lo sentimos, hemos detectado que no existe conexión a internet
                 y este contenido está solo disponible con conexión a internet.</h4>";

            } else{

            echo "<p>Busca reflexiones anteriores especificando la fecha.</p>";

            echo "<form action='leer.php' method='post'>";
            echo "<p>";
            echo "Día:";
                echo "<select name='dia'/>";
                    echo "<optgroup label='Selecciona...'>";
                    echo "<option value='1'>1</option> <option value='2'>2</option> <option value='3'>3</option> <option value='4'>4</option> <option value='5'>5</option>";
                    echo "<option value='6'>6</option> <option value='7'>7</option> <option value='8'>8</option> <option value='9'>9</option> <option value='10'>10</option>";
                    echo "<option value='11'>11</option> <option value='12'>12</option> <option value='13'>13</option> <option value='14'>14</option> <option value='15'>15</option>";
                    echo "<option value='16'>16</option> <option value='17'>17</option> <option value='18'>18</option> <option value='19'>19</option> <option value='20'>20</option>";
                    echo "<option value='21'>21</option> <option value='22'>22</option> <option value='23'>23</option> <option value='24'>24</option> <option value='25'>25</option>";
                    echo "<option value='26'>26</option> <option value='27'>27</option> <option value='28'>28</option> <option value='29'>29</option> <option value='30'>30</option>";                    
                    echo "<option value='31'>31</option>";
                echo "</select>";
            echo "</p>";

            echo "<p>";
                echo "Mes:";
                echo "<select name='mes'/>";
                    echo "<optgroup label='Selecciona...'>";
                    echo "<option value='1'>Enero</option>";
                    echo "<option value='2'>Febrero</option>";
                    echo "<option value='3'>Marzo</option>";
                    echo "<option value='4'>Abril</option>";
                    echo "<option value='5'>Mayo</option>";
                    echo "<option value='6'>Junio</option>";
                    echo "<option value='7'>Julio</option>";
                    echo "<option value='8'>Agosto</option>";
                    echo "<option value='9'>Septiembre</option>";
                    echo "<option value='10'>Octubre</option>";
                    echo "<option value='11'>Noviembre</option>";
                    echo "<option value='12'>Diciembre</option>";
                echo "</select>";
            echo "</p>";

            echo "<p><input type='submit' value='Buscar'/></p>";
        echo "</form>";
    }
        ?>
    </div>


    <!-- Footer -->

</div>    
</body>
</html>
