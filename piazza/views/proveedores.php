<?php
session_start();
include_once( "views/class.TemplatePower.inc.php" );

$tpl = new TemplatePower("views/proveedores.tpl");

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
            $tpl->newBlock( "ver_proveedores" );
                    foreach($datos_proveedor as $fila){
                        // ////var_dump($fila);
                        $tpl->newBlock( "fila_proveedores" );
                            foreach ($fila as $item => $valor){
                                $tpl->assign( "$item",$valor);               
                            } 
                       ////echo "<br>"; 
                    }
        break;

        case 'agregar':
            $tpl->newBlock( "form_proveedores" );
                $tpl->assign( "que",'insert');
                $tpl->assign( "id_proveedor",'si');
                $tpl->assign( "titulo_form",'Nuevo Proveedor:');
                $tpl->assign( "titulo_boton",'Cargar');                
        break;    

        case 'insert':
            $tpl->newBlock( "ver_proveedores" );
                    foreach($datos_proveedor as $fila){
                        // ////var_dump($fila);
                        $tpl->newBlock( "fila_proveedores" );
                            foreach ($fila as $item => $valor){
                                $tpl->assign( "$item",$valor);               
                            } 
                       ////echo "<br>"; 
                    }
        break;

        case 'buscar':
            $tpl->newBlock( "form_proveedores" );
                $tpl->assign( "que",'update');
                $tpl->assign( "titulo_form",'Actualizar Proveedor:');
                $tpl->assign( "titulo_boton",'Actualizar');

                    foreach($datos_proveedor as $fila){
                       // ////var_dump($fila);           
                        foreach ($fila as $item => $valor){
                            $tpl->assign( "$item",$valor); 
                        }
                    }                 
        break;

        case 'update':
            $tpl->newBlock( "ver_proveedores" );
                    foreach($datos_proveedor as $fila){
                        // ////var_dump($fila);
                        $tpl->newBlock( "fila_proveedores" );
                            foreach ($fila as $item => $valor){
                                $tpl->assign( "$item",$valor);               
                            } 
                       ////echo "<br>"; 
                    }
        break;    

        case 'eliminar':
            $tpl->newBlock( "ver_proveedores" );
                    foreach($datos_proveedor as $fila){
                        // ////var_dump($fila);
                        $tpl->newBlock( "fila_proveedores" );
                            foreach ($fila as $item => $valor){
                                $tpl->assign( "$item",$valor);               
                            } 
                       ////echo "<br>"; 
                    }
        break;    

        default:
            $tpl->newBlock( "ver_proveedores" );
                    foreach($datos_proveedor as $fila){
                        // ////var_dump($fila);
                        $tpl->newBlock( "fila_proveedores" );
                            foreach ($fila as $item => $valor){
                                $tpl->assign( "$item",$valor);               
                            } 
                       ////echo "<br>"; 
                    }
        break;
    }
    
}else{
   // movePage(301,"index.php");
    header ("Location: index.php");
}
    
$tpl->printToScreen();