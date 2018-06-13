<?php
session_start();
include_once( "views/class.TemplatePower.inc.php" );
//echo '<script src="views/js/SetDestino.js"></script>';

$tpl = new TemplatePower("views/clientes.tpl");

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
            $tpl->newBlock( "ver_clientes" );
                    foreach($datos_cliente as $fila){
                        // ////var_dump($fila);
                        $tpl->newBlock( "fila_clientes" );
                            foreach ($fila as $item => $valor){
                                $tpl->assign( "$item",$valor);               
                            } 
                       ////echo "<br>"; 
                    }
					foreach($datos_destino as $fila){
                        ////var_dump($fila);
                        //$tpl->newBlock( "fila_clientes" );
                            foreach ($fila as $item => $valor){
                                $tpl->assign( "$item",$valor);               
                            } 
                       ////echo "<br>"; 
                    }
        break;

        case 'agregar':
            $tpl->newBlock( "form_clientes" );
                $tpl->assign( "que",'insert');
                $tpl->assign( "id_cliente",'si');
                $tpl->assign( "titulo_form",'Nuevo Cliente:');
                $tpl->assign( "titulo_boton",'Cargar');    
       // cargo la lista de destinos
                    foreach($datos_destino as $fila2){
                        $tpl->newBlock( "lista_destinos" );
                            foreach ($fila2 as $item => $valor){
                                $tpl->assign( "$item",$valor);
                            } 
                        ////echo "<br>";    
                    }				
        break;    

        case 'insert':
            $tpl->newBlock( "ver_clientes" );
                    foreach($datos_cliente as $fila){
                        // ////var_dump($fila);
                        $tpl->newBlock( "fila_clientes" );
                            foreach ($fila as $item => $valor){
                                $tpl->assign( "$item",$valor);               
                            } 
                       ////echo "<br>"; 
                    }
					
					foreach($datos_destino as $fila1){
                       // //var_dump($fila1);
                        $tpl->newBlock( "fila_destino" );
                            foreach ($fila1 as $item => $valor){
                                $tpl->assign( "$item",$valor);               
                            } 
                       ////echo "<br>"; 
                    }
        break;

        case 'buscar':
            $tpl->newBlock( "form_clientes" );
                $tpl->assign( "que",'update');
                $tpl->assign( "titulo_form",'Actualizar Cliente:');
                $tpl->assign( "titulo_boton",'Actualizar');

                    foreach($datos_cliente as $fila){
                       // ////var_dump($fila);           
                        foreach ($fila as $item => $valor){
                            $tpl->assign( "$item",$valor); 
                        }
                    }
					
					foreach($datos_destino as $fila1){
                       // //var_dump($fila1);
                        $tpl->newBlock( "lista_destinos" );
                            foreach ($fila1 as $item => $valor){
                                $tpl->assign( "$item",$valor);               
                            } 
                       ////echo "<br>"; 
                    }                 
        break;

        case 'update':
            $tpl->newBlock( "ver_clientes" );
                    foreach($datos_cliente as $fila){
                        // ////var_dump($fila);
                        $tpl->newBlock( "fila_clientes" );
                            foreach ($fila as $item => $valor){
                                $tpl->assign( "$item",$valor);               
                            } 
                       ////echo "<br>"; 
                    }
        break;    

        case 'eliminar':
            $tpl->newBlock( "ver_clientes" );
                    foreach($datos_cliente as $fila){
                        // ////var_dump($fila);
                        $tpl->newBlock( "fila_clientes" );
                            foreach ($fila as $item => $valor){
                                $tpl->assign( "$item",$valor);               
                            } 
                       ////echo "<br>"; 
                    }
        break;    

        default:
            $tpl->newBlock( "ver_clientes" );
                    foreach($datos_cliente as $fila){
                        // ////var_dump($fila);
                        $tpl->newBlock( "fila_clientes" );
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