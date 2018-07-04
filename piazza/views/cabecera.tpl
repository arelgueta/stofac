<!DOCTYPE html>
<html lang="es-Ar">
  <head>
  <!--	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bombas Piazza</title>

	<script src="views/bootstrap/js/jquery.min.js"></script>
    <script src="views/bootstrap/js/bootstrap.min.js"></script>
    <!--script src='views/bootstrap/js/bootstrap-datetimepicker.es.js'></script-->
    <script src='views/bootstrap/js/moment.min.js'></script>
	<script src='views/bootstrap/js/bootstrap-datetimepicker.min.js'></script>
	<!-- js validacion -->
	<script src="views/js/validaciones_jquery.js"></script>  
	<!--link href=" https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css"  rel="stylesheet"-->
    <!--link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css"  rel="stylesheet"-->
    <link href="views/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="views/bootstrap/css/main.css" rel="stylesheet">
    <link href="views/bootstrap/css/sticky-footer-navbar.css" rel="stylesheet">
	<!--link href="views/bootstrap/css/bootstrap-datetimepicker.min.css" rel="stylesheet"--> 	

	</head>
  
  <body>
    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a href="index.php" class="navbar-brand">PIAZZA Bombas Industriales</a>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
          <ul class="nav navbar-nav  navbar-right" >
              
            <!-- START BLOCK : m_vender -->  
            <li>
              <a href="index.php?action=facturas">Ventas</a>
            </li>    
<!--              <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes" aria-expanded="false">Rutas <span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="themes">
              
             <li><a href="index.php?action=rutas">Listar Rutas</a></li>
                <li><a href="index.php?action=rutas&agregar=si">Rutas Clientes </a></li>
                <li><a href="index.php?action=rutas&hojaRuta">Hoja de Ruta </a></li>
                <li><a href="index.php?action=rutas&hojaCarga">Hoja de Carga</a></li> 
                <li><a href="index.php?action=rutas&hojas">Hojas</a></li> 
			 </ul>
            </li>   
 -->           <!-- END BLOCK : m_vender -->
            
            <!-- START BLOCK : m_acceso -->    

              <!--  <li><a href="index.php?action=estadisticas">Estadisticas</a></li>			-->
			<li>
              <a href="index.php?action=recibos">Ingreso de Stock</a>
            </li>     
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes" aria-expanded="false">Administracion <span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="themes">
                <li><a href="index.php?action=clientes">Clientes</a></li>
                <li><a href="index.php?action=proveedores">Proveedores</a></li>
                <li class="divider"></li>
                <li><a href="index.php?action=productos">Productos</a></li>
                <li><a href="index.php?action=categorias&agregar=si">Categorias</a></li>
                <li><a href="index.php?action=piezas&agregar=si">ProductosXPiezas</a></li>
               <!-- <li class="divider"></li>
                <li><a href="index.php?action=destinos">Agregar nuevo destino</a></li>-->
              </ul>
            </li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes" aria-expanded="false">Acceso <span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="themes">
                <li><a href="index.php?action=usuarios">Usuarios</a></li>
	           </ul>
            </li>  
            <!-- END BLOCK : m_acceso -->
            
            <!-- START BLOCK : m_salir -->
            <li>
              <a href="index.php?action=salir">Salir</a>
            </li>             
            <!-- END BLOCK : m_salir -->
          </ul>
        </div>
      </div>
    </div>
