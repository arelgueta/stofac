<?php
session_start();
include_once( "views/class.TemplatePower.inc.php" );

$tpl = new TemplatePower("views/productos.tpl");

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
            $tpl->newBlock( "ver_productos" );
                    foreach($datos_prod as $fila){
                        // ////var_dump($fila);
                        $tpl->newBlock( "fila_productos" );
                            foreach ($fila as $item => $valor){
                                $tpl->assign( "$item",$valor);               
                            } 
                       ////echo "<br>"; 
                    }
        break;

        /*
         * Al dar de alta un producto llamamos a productos.php con la opcion agregar para mostrar el formulario de carga de Nuevo Producto
         */
        case 'agregar':
            $tpl->newBlock( "form_productos" );
                $tpl->assign( "que",'insert');
                $tpl->assign( "id_producto",'si');
                $tpl->assign( "titulo_form",'Nuevo Producto:');
                $tpl->assign( "titulo_boton",'Cargar');

                // cargo la lista de categorias
                    foreach($datos_cat as $fila){
                        // ////var_dump($fila);
                        $tpl->newBlock( "lista_categoria" );
                            foreach ($fila as $item => $valor){
                                $tpl->assign( "$item",$valor);
                            } 
                       ////echo "<br>"; 
                    }            

        break;    

        case 'insert':
            
            $tpl->newBlock( "ver_productos" );
                    foreach($datos_prod as $fila){
                        // ////var_dump($fila);
                        $tpl->newBlock( "fila_productos" );
                            foreach ($fila as $item => $valor){
                                $tpl->assign( "$item",$valor);               
                            } 
                       ////echo "<br>"; 
                    }
        break;

        case 'buscar':
            $tpl->newBlock( "form_productos" );
                $tpl->assign( "que",'update');
                $tpl->assign( "titulo_form",'Actualizar Producto:');
                $tpl->assign( "titulo_boton",'Actualizar');

                    foreach($datos_prod as $fila){
                       // ////var_dump($fila);           
                        foreach ($fila as $item => $valor){
                            $tpl->assign( "$item",$valor);     

                            if ($item=='id_categoria') {
                                $categoria_actual = $valor;
                            }	                        
                        }
                    } 

            // cargo la lista de categorias
                    foreach($datos_cat as $fila){
                        // ////var_dump($fila);
                        $tpl->newBlock( "lista_categoria" );
                            foreach ($fila as $item => $valor){
                                $tpl->assign( "$item",$valor);

                                if ($item == 'id_categoria') {
                                    if ($categoria_actual==$valor) {
                                                $tpl->assign( "seleccionado_categoria", "selected='selected'" );
                                    }
                                }
                            } 
                       ////echo "<br>"; 
                    }          

        break;

        case 'update':
            $tpl->newBlock( "ver_productos" );
                    foreach($datos_prod as $fila){
                        // ////var_dump($fila);
                        $tpl->newBlock( "fila_productos" );
                            foreach ($fila as $item => $valor){
                                $tpl->assign( "$item",$valor);               
                            } 
                       ////echo "<br>"; 
                    }
        break;    

        case 'eliminar':
            $tpl->newBlock( "ver_productos" );
                    foreach($datos_prod as $fila){
                        // ////var_dump($fila);
                        $tpl->newBlock( "fila_productos" );
                            foreach ($fila as $item => $valor){
                                $tpl->assign( "$item",$valor);               
                            } 
                       ////echo "<br>"; 
                    }
        break;    

        default:
            $tpl->newBlock( "ver_productos" );
                    foreach($datos_prod as $fila){
                        // ////var_dump($fila);
                        $tpl->newBlock( "fila_productos" );
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