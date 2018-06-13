<?php
session_start();
include_once( "views/class.TemplatePower.inc.php" );
//echo '<script src="views/js/SetCliente_rutas.js"></script>';
//echo '<script src="views/js/SetUsuario_rutas.js"></script>';
//echo '<script src="views/js/agregaRuta.js"></script>';

$tpl = new TemplatePower("views/rutas.tpl");
$tpl->assignInclude( "header", "views/cabecera.tpl" );
$tpl->assignInclude( "footer", "views/pie.tpl" );
$tpl->prepare();

if(isset($_SESSION['usuario'])){
    /*
     * Segun el tipo de usuario muestro los menus
     */ 
    if(isset($_SESSION['tipo'])){
        switch ($_SESSION['tipo']) {
            case 1:
                $tpl->newBlock( "m_vender" );
                $tpl->newBlock( "m_acceso" );
            break;   

            case 2:
                $tpl->newBlock( "m_vender" );
            break; 

        }        
    } 
    /*
     * Muestro el menu de salir
     */
    $tpl->newBlock( "m_salir" );
        $tpl->assign( "usu_activo",'hola');
        $tpl->assign( "ingreso",'INGRESAR');    

    $opcion = '';

    if (isset($_REQUEST['buscar'])){
        //$buscar = $_REQUEST['buscar'];
        $opcion = 'buscar';
    }

    if (isset($_REQUEST['update'])){
        $opcion = 'update';
    }

    if (isset($_REQUEST['agregar'])){
        $opcion = 'agregar';
    }

    if (isset($_REQUEST['insert'])){
        $opcion = 'insert';
    }

    if (isset($_REQUEST['eliminar'])){
        $opcion = 'eliminar';
    }
            
    if (isset($_REQUEST['hojaRuta'])){
		$opcion = 'hojaRuta';
    }           
            
    if (isset($_REQUEST['hojaCarga'])){
		$opcion = 'hojaCarga';
    }           
               
    switch ($opcion) {
        case '':
            $tpl->newBlock( "ver_rutas" );
                    foreach($datos_ruta as $fila){
                        // //var_dump($fila);
                        $tpl->newBlock( "fila_rutasA" );
                            foreach ($fila as $item => $valor){
                                $tpl->assign( "$item",$valor);               
                            } 
                   //     //echo "<br>";    
                    }
        break;

        case 'agregar':
            $tpl->newBlock( "form_rutas" );
                $tpl->assign( "que",'insert');
                $tpl->assign( "id_rutas",'si');
                $tpl->assign( "titulo_form",'Nueva Ruta 2:');
                $tpl->assign( "titulo_boton",'Cargar Ruta');

                // cargo la lista de clientes
                    foreach($datos_destino as $fila){
                        $tpl->newBlock( "lista_destinos" );
                            foreach ($fila as $item => $valor){
								////echo "item: ".$item."<br>valor: ".$valor."<br>";
                                $tpl->assign( "$item",$valor);
                            } 
                //        //echo "<br>";    
                    }    

                // cargo la lista usuarios
                    foreach($datos_usr as $fila2){
                        $tpl->newBlock( "lista_usr" );
                            foreach ($fila2 as $item => $valor){
							//	//echo "usr_item: ".$item."<br>valor: ".$valor."<br>";
                                $tpl->assign( "$item",$valor);
                            } 
               //         //echo "<br>";    
                    }       
        break;    

        case 'insert':
            $tpl->newBlock( "ver_rutas" );
                    foreach($datos_ruta as $fila){
                        $tpl->newBlock( "fila_rutas" );
                            foreach ($fila as $item => $valor){
								//echo "ver_rutas: ".$item."<br>valor: ".$valor."<br>";
                                $tpl->assign( "$item",$valor);               
                            } 
                 //       //echo "<br>";    
                    }
        break;

        case 'buscar':
            $tpl->newBlock( "form_rutas" );
                $tpl->assign( "que",'update');
                $tpl->assign( "titulo_form",'Actualizar Ruta:');
                $tpl->assign( "titulo_boton",'Actualizar');
//Trae id_rutas
                   foreach($datos_ruta as $fila){
                        ////var_dump($fila);           
                        foreach ($fila as $item => $valor){
                            $tpl->assign( "$item",$valor); 
                        }
                    }    

        break;

        case 'update':
            $tpl->newBlock( "ver_rutas" );
                    foreach($datos_ruta as $fila){
                        // //var_dump($fila);
                        $tpl->newBlock( "fila_rutas" );
                            foreach ($fila as $item => $valor){
                                $tpl->assign( "$item",$valor);               
                            } 
                     //   //echo "<br>";    
                    }
        break;    

        case 'eliminar':
            $tpl->newBlock( "ver_rutas" );
                    foreach($datos_ruta as $fila){
                        // //var_dump($fila);
                        $tpl->newBlock( "fila_rutas" );
                            foreach ($fila as $item => $valor){
                                $tpl->assign( "$item",$valor);               
                            } 
                     //   //echo "<br>";    
                    }
        break;
		
		
		case 'hojaCarga':
            $tpl->newBlock( "ver_hoja_cargas" );
                    foreach($datos_ruta as $fila){
                        // //var_dump($fila);
                        $tpl->newBlock( "fila_rutas2" );
                            foreach ($fila as $item => $valor){
                                $tpl->assign( "$item",$valor);               
                            } 
                 //       //echo "<br>";    
                    }
        break;
		
        case 'hojaRuta':
            $tpl->newBlock( "ver_hoja_rutas" );
                    foreach($datos_ruta as $fila){
                        // //var_dump($fila);
                        $tpl->newBlock( "fila_rutas" );
                            foreach ($fila as $item => $valor){
                                $tpl->assign( "$item",$valor);               
                            } 
                 //       //echo "<br>";    
                    }
        break;
    }
}else{
   // movePage(301,"index.php");
    header ("Location: index.php");
}
$tpl->printToScreen();