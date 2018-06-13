<?php
session_start();
include_once( "views/class.TemplatePower.inc.php" );

$tpl = new TemplatePower("views/recibos.tpl");

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



   // //echo " id de recibo nuevo: " . $id_nuevo;
    //////var_dump($valores2);
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
            $tpl->newBlock( "ver_recibos" );
                    foreach($datos_recibo as $fila){
                        // ////var_dump($fila);
                        $tpl->newBlock( "fila_recibos" );
                            foreach ($fila as $item => $valor){
                                $tpl->assign( "$item",$valor);               
                            } 
                       ////echo "<br>"; 
                    }
        break;

        case 'agregar':
            $tpl->newBlock( "form_recibos" );
                $tpl->assign( "que",'insert');
                $tpl->assign( "id_recibo",'si');
                $tpl->assign( "titulo_form",'Nuevo Recibo:');
                $tpl->assign( "titulo_boton",'Cargar Datos');

                // cargo la lista de proveedores
                    foreach($datos_prov as $fila){
                        $tpl->newBlock( "lista_proveedores" );
                            foreach ($fila as $item => $valor){
                                $tpl->assign( "$item",$valor);
                            } 
                       ////echo "<br>"; 
                    }    

                // cargo la lista de productos
                    foreach($datos_product as $fila2){
                        $tpl->newBlock( "lista_productos" );
                            foreach ($fila2 as $item => $valor){
                                $tpl->assign( "$item",$valor);
                            } 
                       ////echo "<br>"; 
                    }                  
        break;    

        case 'insert':        
            $tpl->newBlock( "ver_recibos" );
                    foreach($datos_recibo as $fila){
                        $tpl->newBlock( "fila_recibos" );
                            foreach ($fila as $item => $valor){
                                $tpl->assign( "$item",$valor);               
                            } 
                      //  //echo "<br> ";    
                    }
        break;

        case 'buscar':
            $tpl->newBlock( "form_recibos" );
                $tpl->assign( "que",'update');
                $tpl->assign( "titulo_form",'Actualizar Recibo:');
                $tpl->assign( "titulo_boton",'Actualizar');

                    foreach($datos_recibo as $fila){  
                        //////var_dump($fila);
                        foreach ($fila as $item => $valor){
                            $tpl->assign( "$item",$valor);     

                            if ($item=='id_tipo') {
                                $tipo_actual = $valor;
                            }	                        
                        }
                    }                 

            // cargo la lista de proveedores
                    foreach($datos_prov as $fila){
                        $tpl->newBlock( "lista_proveedores" );
                            foreach ($fila as $item => $valor){
                                $tpl->assign( "$item",$valor);

                                if ($item == 'id_tipo') {
                                    if ($tipo_actual==$valor) {
                                                $tpl->assign( "seleccionado_tipo", "selected='selected'" );
                                    }
                                }
                            } 
                       ////echo "<br>"; 
                    }                  
        break;

        case 'update':
            $tpl->newBlock( "ver_recibos" );
                    foreach($datos_recibo as $fila){
                        $tpl->newBlock( "fila_recibos" );
                            foreach ($fila as $item => $valor){
                                $tpl->assign( "$item",$valor);               
                            } 
                       ////echo "<br>"; 
                    }
        break;    

        case 'eliminar':
            $tpl->newBlock( "ver_recibos" );
                    foreach($datos_recibo as $fila){
                        $tpl->newBlock( "fila_recibos" );
                            foreach ($fila as $item => $valor){
                                $tpl->assign( "$item",$valor);               
                            } 
                       ////echo "<br>"; 
                    }
        break;    



        default:
            $tpl->newBlock( "ver_recibos" );
                    foreach($datos_recibo as $fila){
                        $tpl->newBlock( "fila_recibos" );
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