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
          <li><a href="buscar.php"><img class="icon-menu" src="../includes/iconos/search.png" width="20px" height="20px">Buscar</a></li>
          <li class="Selected"><a href="#"><img class="icon-menu" src="../includes/iconos/idea.png" width="20px" height="18px">Créditos</a></li>
       </ul>
    </nav>

<div data-role="page" id="page" data-theme="e">
    <div data-role="header" data-theme="e">
        <a href="#menu"
        data-role="button"
        data-icon="menu"
        data-theme="reset"
        data-corners="false"
        data-iconpos="notext"
        class="app-theme-none">Menu</a>

        <h1>Créditos</h1> 
    </div>
    
    
    <div data-role="content">
        <p>Jabel Márquez</p>
        <p>Carlos Mondragón</p>
        <p>Fernando Alonso</p>
        <p>
            Página de Facebook: <a href="https://www.facebook.com/matutinadejovenesadventistas" target="_blank">Facebook</a>
        </p>
    </div>


    <!-- Footer -->

</div>    
</body>
</html>
