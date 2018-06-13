<?php
session_start();
include_once( "views/class.TemplatePower.inc.php" );

$tpl = new TemplatePower("views/facturas2.tpl");

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



	$id_cliente=$_REQUEST['id_cliente'];
    ////echo " id de cliente: " . $id_cliente;
  //  ////var_dump($valores2);
    $opcion = '';

    if (isset($_REQUEST['buscar'])){
        //$buscar = $_REQUEST['buscar'];
        $opcion = 'buscar';
    }

    if (isset($_REQUEST['update'])){
        $opcion = 'update';
    }

    if (isset($_REQUEST['agregar1'])){
        $opcion = 'agregar1';
    }

    if (isset($_REQUEST['insert'])){
        $opcion = 'insert';
    }

    if (isset($_REQUEST['eliminar'])){
        $opcion = 'eliminar';
    }

    switch ($opcion) {
        case '':
            $tpl->newBlock( "ver_facturas" );
                    foreach($datos_factura as $fila){
                        // ////var_dump($fila);
                        $tpl->newBlock( "fila_facturas" );
                            foreach ($fila as $item => $valor){
                                $tpl->assign( "$item",$valor);               
                            } 
                      //  //echo "<br>";    
                    }
        break;

        case 'agregar':
            $tpl->newBlock( "form_facturas" );
                $tpl->assign( "que",'insert');
                $tpl->assign( "id_factura",'si');
                $tpl->assign( "titulo_form",'Nuevo Factura:');
                $tpl->assign( "titulo_boton",'Cargar Datos');
			
					// cargo la lista de clientes
                    foreach($datos_cli as $fila){
                        $tpl->newBlock( "lista_clientes" );
                            foreach ($fila as $item => $valor){
							//	//echo "item: ".$item."<br>valor: ".$valor."<br>";
                                $tpl->assign( "$item",$valor);
                            } 
                    //    //echo "<br>";    
                    }    
				
                // cargo la lista de productos
                    foreach($datos_product as $fila2){
                        $tpl->newBlock( "lista_productos" );
                            foreach ($fila2 as $item => $valor){
                                $tpl->assign( "$item",$valor);
                            } 
                      //  //echo "<br>";    
                    }                  
        break;    

		case 'agregar1':
            $tpl->newBlock( "form_facturas" );
                $tpl->assign( "que",'insert1');
                $tpl->assign( "id_factura",'no');
                $tpl->assign( "id_rutas",$id_rutas);
                $tpl->assign( "titulo_form",'Nuevo Factura:');
                $tpl->assign( "titulo_boton",'Cargar Datos');

					// cargo la lista de clientes
                    foreach($datos_cli as $fila){
                        $tpl->newBlock( "lista_clientes" );
                $tpl->assign( "id_rutas",$id_rutas);
                            foreach ($fila as $item => $valor){
							//	//echo "item: ".$item."<br>valor: ".$valor."<br>";
                                $tpl->assign( "$item",$valor);
                            } 
                    //    //echo "<br>";    
                    }    
				//}
                // cargo la lista de productos
                    foreach($datos_product as $fila2){
                        $tpl->newBlock( "lista_productos" );
                            foreach ($fila2 as $item => $valor){
                                $tpl->assign( "$item",$valor);
                            } 
                      //  //echo "<br>";    
                    }                  
        break;
		
        case 'insert':        
            $tpl->newBlock( "ver_facturas" );
                    foreach($datos_factura as $fila){
                        $tpl->newBlock( "fila_facturas" );
                            foreach ($fila as $item => $valor){
                                $tpl->assign( "$item",$valor);               
                            } 
                    //    //echo "<br> ";    
                    }
        break;
		
        case 'insert1':        
				
            $tpl->newBlock( "ver_facturas" );
                    foreach($datos_factura as $fila){
                        $tpl->newBlock( "fila_facturas" );
                            foreach ($fila as $item => $valor){
                                $tpl->assign( "$item",$valor);               
                            } 
                        //echo "hola<br> ";    
                    }
        break;

        case 'buscar':
            $tpl->newBlock( "form_facturas" );
                $tpl->assign( "que",'update');
                $tpl->assign( "titulo_form",'Actualizar Factura:');
                $tpl->assign( "titulo_boton",'Actualizar');

                    foreach($datos_factura as $fila){  
                        ////var_dump($fila);
                        foreach ($fila as $item => $valor){
                            $tpl->assign( "$item",$valor);     

                            if ($item=='id_tipo') {
                                $tipo_actual = $valor;
                            }	                        
                        }
                    }                 

            // cargo la lista de clientes
                    foreach($datos_cli as $fila){
                        $tpl->newBlock( "lista_clientes" );
                            foreach ($fila as $item => $valor){
                                $tpl->assign( "$item",$valor);

                                if ($item == 'id_tipo') {
                                    if ($tipo_actual==$valor) {
                                                $tpl->assign( "seleccionado_tipo", "selected='selected'" );
                                    }
                                }
                            } 
                    //    //echo "<br>";    
                    }                  
        break;

        case 'update':
            $tpl->newBlock( "ver_facturas" );
                    foreach($datos_factura as $fila){
                        $tpl->newBlock( "fila_facturas" );
                            foreach ($fila as $item => $valor){
                                $tpl->assign( "$item",$valor);               
                            } 
                    //    //echo "<br>";    
                    }
        break;    

        case 'eliminar':
            $tpl->newBlock( "ver_facturas" );
                    foreach($datos_factura as $fila){
                        $tpl->newBlock( "fila_facturas" );
                            foreach ($fila as $item => $valor){
                                $tpl->assign( "$item",$valor);               
                            } 
                     //   //echo "<br>";    
                    }
        break;    



        default:
            $tpl->newBlock( "ver_facturas" );
                    foreach($datos_factura as $fila){
                        $tpl->newBlock( "fila_facturas" );
                            foreach ($fila as $item => $valor){
                                $tpl->assign( "$item",$valor);               
                            } 
                        //echo "<br>";    
                    }
        break;
    }
    
}else{
   // movePage(301,"index.php");
    header ("Location: index.php");
}
    
$tpl->printToScreen();