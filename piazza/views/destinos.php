<?php
session_start();
include_once( "views/class.TemplatePower.inc.php" );
//echo '<script src="views/js/SetCliente_destinos.js"></script>';
//echo '<script src="views/js/SetUsuario_destinos.js"></script>';
//echo '<script src="views/js/agregaRuta.js"></script>';

$tpl = new TemplatePower("views/destinos.tpl");
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
    switch ($opcion) {
        case '':
            $tpl->newBlock( "ver_destinos" );
                    foreach($datos_destino as $fila){
                        // ////var_dump($fila);
                        $tpl->newBlock( "fila_destinos" );
                            foreach ($fila as $item => $valor){
                                $tpl->assign( "$item",$valor);               
                            }  
                    }
        break;

        case 'agregar':
            $tpl->newBlock( "form_destinos" );
                $tpl->assign( "que",'insert');
                $tpl->assign( "id_destinos",'si');
                $tpl->assign( "titulo_form",'Nuevo Destino:');
                $tpl->assign( "titulo_boton",'Cargar Destino');    
    
        break;    

        case 'insert':
            $tpl->newBlock( "ver_destinos" );
                    foreach($datos_destino as $fila){
                        $tpl->newBlock( "fila_destinos" );
                            foreach ($fila as $item => $valor){
                                $tpl->assign( "$item",$valor);               
                            } 
                 //       //echo "<br>";    
                    }
        break;

        case 'buscar':
            $tpl->newBlock( "form_destinos" );
                $tpl->assign( "que",'update');
                $tpl->assign( "titulo_form",'Actualizar Destino:');
                $tpl->assign( "titulo_boton",'Actualizar');
//Trae id_rutas
                   foreach($datos_destino as $fila){
                        //////var_dump($fila);           
                        foreach ($fila as $item => $valor){
                            $tpl->assign( "$item",$valor); 
                        }
                    }    

        break;

        case 'update':
            $tpl->newBlock( "ver_destinos" );
                    foreach($datos_destino as $fila){
                        // ////var_dump($fila);
                        $tpl->newBlock( "fila_destinos" );
                            foreach ($fila as $item => $valor){
                                $tpl->assign( "$item",$valor);               
                            } 
                     //   //echo "<br>";    
                    }
        break;    

        case 'eliminar':
            $tpl->newBlock( "ver_destinos" );
                    foreach($datos_destino as $fila){
                      //  //var_dump($fila);
                        $tpl->newBlock( "fila_destinos" );
                            foreach ($fila as $item => $valor){
                                $tpl->assign( "$item",$valor);               
                            } 
                     //   //echo "<br>";    
                    }
        break;    

        default:
            $tpl->newBlock( "ver_destinos" );
                    foreach($datos_destino as $fila){
                        // ////var_dump($fila);
                        $tpl->newBlock( "fila_destinos" );
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