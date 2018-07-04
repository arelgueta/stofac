<?php
require_once("controllers/mvc_controller.php");
date_default_timezone_set('America/Argentina/Mendoza');

//se instancia al controlador 
$mvc = new mvc_controller();  
 // //echo " Index Has iniciado Sesion: ".$_SESSION['usuario'] ." accion: ".$_GET['action']." usr form: ".$_POST['usuario']."<br>";
$action = '';
if (isset($_GET['action'])){
    $action = $_GET['action'];
}
  
 switch ($action) {							
 
  case 'recibos':     												// RECIBOS
	
            $arreglo1 = array();
            $arreglo2 = array();
            $opcion = '';
            if (isset($_REQUEST['buscar'])){
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
                    $mvc->listar_recibos();
                break;
            
                case 'agregar':
                    $mvc->listar_datos_recibo();
                break; 
            
                case 'insert':
                    $arreglo1 = array();
                    $arreglo2 = array();
					//echo "Imprimo POST<br>";
					////var_dump($_POST);
					//echo"<br>";
					foreach ($_POST as $key => $values) {
                       //CABECERA 
                       if (strrpos($key, 'ec_') == 1){
                            //$arreglo1[$key] = $values;
                            //$arreglo1[$key] = $values;

                            //en el array solo cargo el id de proveedor y el total  
                            if ($key == 'rec_proveedor'){
                                $porciones = explode("*", $values);
                                $arreglo1['id_proveedor'] = $porciones[0];
                            }
                            if ($key == 'rec_total'){
                                $arreglo1['total'] = $values;
                            }        
                            $arreglo1['fecha'] = date('Y-m-d H:i:s');
                       }
                       ////echo "<br> encontro: ".  strrpos($key, 'rec_');

                       //DETALLE
                       if (strrpos($key, 'et_') == 1){             
                           $i = substr($key, -1);       
                          // $arreglo2[$i][$key] = $values;
                            $arreglo2[$i]['id_detalle'] = $i;
                            if (substr($key, 0, -1) == 'det_prod'){
                                $porciones = explode(" - ", $values);
                                $arreglo2[$i]['id_producto'] =  $porciones[0];
                            }
                            if (substr($key, 0, -1) == 'det_cantidad'){
                                $arreglo2[$i]['cantidad'] = $values;
                            }        
                            if (substr($key, 0, -1) == 'det_precio'){
                                $arreglo2[$i]['precio'] = $values;
                            }  
                            if (substr($key, 0, -1) == 'det_subtotal'){
                                $arreglo2[$i]['subtotal'] = $values;
                            }         
                       }
					}  
 			}
                    $mvc->cargar_recibo($arreglo1,$arreglo2 );                    
                break;            
				
				
    case 'productos':     												// PRODUCTOS
            $opcion = '';
            if (isset($_REQUEST['buscar'])){
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
                    $mvc->listar_productos();
                break;
            
                case 'agregar':
                    $mvc->listar_categorias_prod();
                break;               
            
                case 'insert':
                    # Tomamos los valores del nuevo producto
                    $new_producto = array(                   
                    'nombre'=>$_REQUEST['nombre'],
                    'precio'=>$_REQUEST['precio'],
                    'stock'=>$_REQUEST['stock'],
                    'codigo'=>$_REQUEST['codigo'],
                    'id_categoria'=>$_REQUEST['categoria'],
                    'foto'=>'generico.jpg'    
                    );  
                    
                    $a1="foto";
                    $tempor = $_FILES[$a1]['tmp_name'];
                    //////var_dump($new_data);
                    $mvc->cargar_producto($new_producto, $tempor);
                    
                break;            

                case 'buscar':
                    $mvc->buscar_producto($_GET['buscar']);                     
                break;

                case 'update':
                    # Editar los datos de un usuario existente 
                    $edit_producto = array(
                    'id_producto'=>$_REQUEST['update'],
                    'nombre'=>$_REQUEST['nombre'],
                    'precio'=>$_REQUEST['precio'],
                    'stock'=>$_REQUEST['stock'],
                    'codigo'=>$_REQUEST['codigo'],
                    'id_categoria'=>$_REQUEST['categoria'],
                    'foto'=>$_REQUEST['foto']    
                    );         
                    
                    $a1="foto";
                    $tempor = $_FILES[$a1]['tmp_name'];
                    
                    $mvc->update_producto($edit_producto, $tempor,$_REQUEST['update']);                    
                break;
            
                case 'eliminar':
                    $mvc->eliminar_producto($_GET['eliminar']);                     
                break;            

                default:
                    $mvc->listar_productos();
                break;
            }
    break;

    case 'categorias':     												// CATEGORIAS
            $opcion = '';
            if (isset($_REQUEST['buscar'])){
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
                    $mvc->listar_categorias();
                break;
            
                case 'agregar':
                    $mvc->listar_categorias();
                break;               
            
                case 'insert':
                    $new_categoria = array(                   
                    'nombre'=>$_REQUEST['nombre'],
                    'descripcion'=>$_REQUEST['descripcion']
                    );  
                    
                    $mvc->cargar_categoria($new_categoria);
                break;            

                case 'buscar':
                    $mvc->buscar_categoria($_GET['buscar']);                     
                break;

                case 'update':
                    $edit_categoria = array(
                    'id_categoria'=>$_REQUEST['update'],
                    'nombre'=>$_REQUEST['nombre'],
                    'descripcion'=>$_REQUEST['descripcion'] 
                    );                    
                    $mvc->update_categoria($edit_categoria);                    
                break;
            
                case 'eliminar':
                    $mvc->eliminar_categoria($_GET['eliminar']);                     
                break;            

                default:
                    $mvc->listar_categorias();
                break;
            }
    break;

    case 'piezas':     												// PIEZAS
            $opcion = '';
            if (isset($_REQUEST['buscar'])){
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
                    $mvc->listar_pieza();
                break;
            
                case 'agregar':
                    $mvc->listar_pieza();
                break;               
            
                case 'insert':
                    $new_pieza = array(                   
                    'nombre'=>$_REQUEST['nombre'],
                    'descripcion'=>$_REQUEST['descripcion']
                    );  
                    
                    $mvc->cargar_pieza($new_pieza);
                break;            

                case 'buscar':
                    $mvc->buscar_pieza($_GET['buscar']);                     
                break;

                case 'update':
                    $edit_pieza = array(
                    'id_categoria'=>$_REQUEST['update'],
                    'nombre'=>$_REQUEST['nombre'],
                    'descripcion'=>$_REQUEST['descripcion'] 
                    );                    
                    $mvc->update_pieza($edit_pieza);                    
                break;
            
                case 'eliminar':
                    $mvc->eliminar_pieza($_GET['eliminar']);                     
                break;            

                default:
                    $mvc->listar_piezas();
                break;
            }
	    break;

    case 'clientes':     												// CLIENTES
            $opcion = '';
            if (isset($_REQUEST['buscar'])){
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
                    $mvc->listar_clientes();
                break;
            
                case 'agregar':
                    $mvc->listar_clientes();
                break;               
            
                case 'insert':
                    # Tomamos los valores del nuevo cliente
                    $new_cliente = array(                   
                    'nombre'=>$_REQUEST['nombre'],
                    'apellido'=>$_REQUEST['apellido'],
                    'direccion'=>$_REQUEST['direccion'],
                    'id_destino'=>$_REQUEST['id_destino'],
                    'telefono'=>$_REQUEST['telefono'],
                    'email'=>$_REQUEST['email']    
                    );  
                    //var_dump($new_data);
                    $mvc->cargar_cliente($new_cliente);
                break;            

                case 'buscar':
                    $mvc->buscar_cliente($_GET['buscar']);                     
                break;

                case 'update':
                    # Editar los datos de un usuario existente 
                    $edit_cliente = array(
                    'id_cliente'=>$_REQUEST['update'],
                    'nombre'=>$_REQUEST['nombre'],
                    'apellido'=>$_REQUEST['apellido'],
                    'direccion'=>$_REQUEST['direccion'],
                    'id_destino'=>$_REQUEST['id_destino'],
                    'telefono'=>$_REQUEST['telefono'],
                    'email'=>$_REQUEST['email']  
                    );                    
                    $mvc->update_cliente($edit_cliente);                    
                break;
            
                case 'eliminar':
                    $mvc->eliminar_cliente($_GET['eliminar']);                     
                break;            

                default:
                    $mvc->listar_clientes();
                break;
            }
    break;

    case 'usuarios':     												// USUARIOS
            $opcion = '';
            if (isset($_REQUEST['buscar'])){
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
                    $mvc->listar_usuarios();
                break;
            
                case 'agregar':
                    $mvc->listar_tipo_usu();
                break;               
            
                case 'insert':
                    $new_usuario = array(                   
                    'usuario'=>$_REQUEST['usuario'],
                    'clave'=>$_REQUEST['clave'],
                    'nombre'=>$_REQUEST['nombre'],
                    'apellido'=>$_REQUEST['apellido'],
                    'email'=>$_REQUEST['email'],
                    'id_tipo'=>$_REQUEST['tipo']                        
                    );  
                    
                    $mvc->cargar_usuario($new_usuario);
                break;            

                case 'buscar':
                    $mvc->buscar_usuario($_GET['buscar']);                     
                break;

                case 'update':
                    $edit_usuario = array(
                    'id_usuario'=>$_REQUEST['id_usuario'],
                    'id_tipo'=>$_REQUEST['update'],
                    'usuario'=>$_REQUEST['usuario'],
                    'clave'=>$_REQUEST['clave'],
                    'nombre'=>$_REQUEST['nombre'],
                    'apellido'=>$_REQUEST['apellido'],
                    'email'=>$_REQUEST['email'],
                    'id_tipo'=>$_REQUEST['tipo']  
                    );                    
					//echo $edit_usuario['id_usuario'];
                    $mvc->update_usuario($edit_usuario);                    
                break;
            
                case 'eliminar':
                    $mvc->eliminar_usuario($_GET['eliminar']);                     
                break;            

                default:
                    $mvc->listar_usuarios();
                break;
            }
    break;

    case 'facturas':     												// FACTURAS
            $opcion = '';
            if (isset($_REQUEST['buscar'])){
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
            if (isset($_REQUEST['agregar1'])){
                $opcion = 'agregar1';
            }            
            if (isset($_REQUEST['insert1'])){
                $opcion = 'insert1';
            } 
            
            switch ($opcion) {
                case '':
                    $mvc->listar_facturas();
                break;
            
                case 'agregar1':
				if (isset($_REQUEST['id_cliente'])){
					$id = $_REQUEST['id_cliente'];
				} 
					$id_rutas=$_REQUEST['id_rutas'];
                    $mvc->listar_datos_fact1($id,$id_rutas);
                break; 
            
				case 'agregar':
                    $mvc->listar_datos_fact();
                break; 
            
                case 'insert':
					$counter=0;
                    $arreglo1 = array();
                    $arreglo2 = array();
                    foreach ($_POST as $key => $values) {
                       //CABECERA : cargo los datos del cliente
                       if (strrpos($key, 'ac_') == 1){
                            //$arreglo1[$key] = $values;
                            //$arreglo1[$key] = $values;

                            //en el array solo cargo el id de cliente y el total  
                            if ($key == 'fac_cliente'){
                                $porciones = explode("*", $values);
                                $arreglo1['id_cliente'] = $porciones[0];
                            }
                            if ($key == 'fac_total'){
                                $arreglo1['total'] = $values;
                            }        
                            $arreglo1['fecha'] = date('Y-m-d H:i:s');
                       }
  
                       //DETALLE
                       if (strrpos($key, 'et_') == 1){
						   if ($counter<36){
							   $resta=-1;
						   }else if ($counter<360){
							   $resta=-2;
						   }else{
							   $resta=-3;
						   }
                           $i = substr($key, $resta);    
                            $arreglo2[$i]['id_detalle'] = $i;
                            if (substr($key, 0, $resta) == 'det_prod'){
                                $porciones = explode(" - ", $values);
								$arreglo2[$i]['id_producto'] =  $porciones[0];
                            }
                            if (substr($key, 0, $resta) == 'det_cantidad'){
                                $arreglo2[$i]['cantidad'] = $values;
                            }        
                            if (substr($key, 0, $resta) == 'det_precio'){
                                $arreglo2[$i]['precio'] = $values;
                            }  
							if (substr($key, 0, $resta) == 'det_subtotal'){    //if (substr($key, 0, -2) == 'det_subtotal'){
                                $arreglo2[$i]['subtotal'] = $values;
                            }         
						   $counter++;
                       }
                    }
                    $mvc->cargar_factura($arreglo1,$arreglo2 );
                break;            
				
                case 'insert1':
					$counter=0;

                    $arreglo1 = array();
                    $arreglo2 = array();
                    foreach ($_POST as $key => $values) {
                       //CABECERA 
					   ////echo "values: ".$values."<br>";
                       if (strrpos($key, 'ac_') == 1){
                            //$arreglo1[$key] = $values;
                            //$arreglo1[$key] = $values;

                            //en el array solo cargo el id de cliente y el total  
                            if ($key == 'fac_cliente'){
                                $porciones = explode("*", $values);
                                $arreglo1['id_cliente'] = $porciones[1];
								$arreglo1['id_rutas']=$porciones[0];
					        }
                            if ($key == 'fac_total'){
                                $arreglo1['total'] = $values;
                            }        
                            $arreglo1['fecha'] = date('Y-m-d H:i:s');
                       }
                      //  //echo "<br> encontro: ".  strrpos($key, 'ac_');

                       //DETALLE
                       if (strrpos($key, 'et_') == 1){
							////echo "en detalle_: ".$key."<br>";
						   if ($counter<36){
							   $resta=-1;
						   }else if ($counter<360){
							   $resta=-2;
						   }else{
							   $resta=-3;
						   }
							$i = substr($key,$resta);       
                          // $arreglo2[$i][$key] = $values;
                            $arreglo2[$i]['id_detalle'] = $i;
                            if (substr($key, 0,  $resta) == 'det_prod'){
                                $porciones = explode(" - ", $values);
                                $arreglo2[$i]['id_producto'] =  $porciones[0];
                            }
                            if (substr($key, 0,  $resta) == 'det_cantidad'){
                                $arreglo2[$i]['cantidad'] = $values;
                            }        
                            if (substr($key, 0,  $resta) == 'det_precio'){
                                $arreglo2[$i]['precio'] = $values;
                            }  
                            if (substr($key, 0, $resta) == 'det_subtotal'){
                                $arreglo2[$i]['subtotal'] = $values;
                            }  
						   $counter++;       
                       }
                    }
                    $mvc->cargar_factura1($arreglo1,$arreglo2 ); 
                break;            

                case 'buscar':
                    $mvc->buscar_factura($_GET['buscar']);                     
                break;

                case 'update':
                    $edit_usuario = array(
                    'id_tipo'=>$_REQUEST['update'],
                    'usuario'=>$_REQUEST['usuario'],
                    'clave'=>$_REQUEST['clave'],
                    'nombre'=>$_REQUEST['nombre'],
                    'apellido'=>$_REQUEST['apellido'],
                    'email'=>$_REQUEST['email'],
                    'id_tipo'=>$_REQUEST['tipo']  
                    );                    
                    $mvc->update_recibo($edit_usuario);                    
                break;
            
                case 'eliminar':
                    $mvc->eliminar_factura($_GET['eliminar']);                     
                break;            

                default:
                    $mvc->listar_facturas();
                break;
            }
    break;

    case 'proveedores':     												// PROVEEDORES
            $opcion = '';
            if (isset($_REQUEST['buscar'])){
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
                    $mvc->listar_proveedores();
                break;
            
                case 'agregar':
                    $mvc->listar_proveedores();
                break;               
            
                case 'insert':
                    # Tomamos los valores del nuevo producto
                    $new_proveedor = array(                   
                    'nombre'=>$_REQUEST['nombre'],
                    'apellido'=>$_REQUEST['apellido'],
                    'direccion'=>$_REQUEST['direccion'],
                    'fecha_nacimiento'=>$_REQUEST['fecha_nacimiento'],
                    'telefono'=>$_REQUEST['telefono'],
                    'cuit'=>$_REQUEST['cuit'],    
                    'email'=>$_REQUEST['email']    
                    );  
                    //////var_dump($new_data);
                    $mvc->cargar_proveedor($new_proveedor);
                break;            

                case 'buscar':
                    $mvc->buscar_proveedor($_GET['buscar']);                     
                break;

                case 'update':
                    # Editar los datos de un usuario existente 
                    $edit_proveedor = array(
                    'id_proveedor'=>$_REQUEST['update'],
                    'nombre'=>$_REQUEST['nombre'],
                    'apellido'=>$_REQUEST['apellido'],
                    'direccion'=>$_REQUEST['direccion'],
                    'fecha_nacimiento'=>$_REQUEST['fecha_nacimiento'],
                    'telefono'=>$_REQUEST['telefono'],
                    'cuit'=>$_REQUEST['cuit'],   
                    'email'=>$_REQUEST['email']  
                    );                    
                    $mvc->update_proveedor($edit_proveedor);                    
                break;
            
                case 'eliminar':
                    $mvc->eliminar_proveedor($_GET['eliminar']);                     
                break;            

                default:
                    $mvc->listar_proveedores();
                break;
            }
    break;
	
    case 'comprobantes':     												// COMPROBANTES
            $opcion = '';
            
            if (isset($_REQUEST['imprimir'])){
                $opcion = 'imprimir';
            }            
            
            switch ($opcion) {
                case 'imprimir':
                    $mvc->imprimir_factura($_REQUEST['imprimir']);
                break;
                default:
                    $mvc->listar_facturas();
                break;
            }
    break;
	case 'comprobantes1':     												// COMPROBANTES
            $opcion = '';
            
            if (isset($_REQUEST['imprimir'])){
                $opcion = 'imprimir';
            }            
            
            switch ($opcion) {
                case 'imprimir':
                    $mvc->imprimir_recibo($_REQUEST['imprimir']);
                break;

                default:
                    $mvc->listar_recibos();
                break;
            }
    break;
	    case 'rutas':     												// RUTAS
			$opcion = '';
            if (isset($_REQUEST['buscar'])){
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
                    $mvc->listar_rutas();
                    //$mvc->listar_datos_rutas();
                break;
            
                case 'hojas':
                    $mvc->listar_hojas(); 
                break; 
            
                case 'hojaRuta':
                    $mvc->listar_hoja_rutas(); 
                break; 
            
                case 'hojaCarga':
                    $mvc->listar_hoja_carga(); 
                break; 
            
                case 'agregar':
                    $mvc->listar_datos_rutas(); 
                break; 
            
                case 'insert':
                    $arreglo1 = array();
                    $arreglo2 = array();
					foreach ($_POST as $key => $values) {
						//echo "values: ".$values."<br>";
                       //CABECERA 
                       if (strrpos($key, 's_d') == 4){
                            //en el array cargo datos de ruta 
                            if ($key == 'rutas_destino'){				//Datos de Cliente
                                $porciones = explode("*", $values);
                                $arreglo1['id_destino'] = $porciones[0];
                            }     
							//	$fecha = date('Y-m-d H:i:s');
                            //$arreglo1['fecha'] = date('Y-m-d H:i:s');
                       }
                     
                       //DETALLE
                       if (strrpos($key, 'as_u') == 3){    
							if ($key == 'rutas_usuario'){				//Datos de Ruta
                                $porciones = explode("*", $values);
                                $arreglo1['id_usuario'] = $porciones[0];
                            }       
						}
						if (strrpos($key, 'cha') == 2){   						
							if ($key == 'fecha'){				//Datos de Ruta
                                $arreglo1['fecha'] = $values;
                            }       
						}
					}  
                    $mvc->cargar_ruta($arreglo1);                    
                break;            
				
                case 'buscar':
                    $mvc->buscar_ruta($_GET['buscar']);                     
                break;

                case 'update':
                    $edit_ruta = array(
                    'id_rutas'=>$_REQUEST['update'],
                    'id_usuario'=>$_REQUEST['id_usuario'],
                    'fecha'=>$_REQUEST['fecha'],
                    'id_cliente'=>$_REQUEST['id_cliente'],
                    'visitado'=>$_REQUEST['visitado'],
                    'id_factura'=>$_REQUEST['id_factura'] 
                    );        
                    $mvc->update_ruta($edit_ruta);                    
                break;
            
                case 'eliminar':
                    $mvc->eliminar_ruta($_GET['eliminar']);                     
                break;            

                default:
                    $mvc->listar_rutas();
                break;
            }
    break;
	
	
	    case 'destinos':     												// Destinos
			$opcion = '';
            if (isset($_REQUEST['buscar'])){
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
                    $mvc->listar_destino();
                break;
            
                case 'agregar':
                    $mvc->listar_datos_destino(); 
                break; 
            
                case 'insert':
                    #Cargo valor de destino
					
					$destino=array(
					'nombre'=> $_REQUEST['nombre']
					);
                    $mvc->cargar_destino($destino);                    
                break;            
				
                case 'buscar':
                    $mvc->buscar_destino($_GET['buscar']);                     
                break;

                case 'update':
                    $edit_ruta = array(
                    'id_rutas'=>$_REQUEST['update'],
                    'id_usuario'=>$_REQUEST['id_usuario'],
                    'fecha'=>$_REQUEST['fecha'],
                    'id_cliente'=>$_REQUEST['id_cliente'],
                    'visitado'=>$_REQUEST['visitado'],
                    'id_factura'=>$_REQUEST['id_factura'] 
                    );        
                    $mvc->update_destino($edit_ruta);                    
                break;
            
                case 'eliminar':
                    $mvc->eliminar_destino($_GET['eliminar']);                     
                break;            

                default:
                    $mvc->listar_destinos();
                break;
            }
    break;
	    case 'estadisticas':     												// Estadisticas
        if (isset($_POST['usuario'])) {
            
                $mvc->buscar_usuario_ppal($_POST['usuario']);
        }else{
             
                 $mvc->principal();
        }
		
    break;
    case 'login':     												// LOGIN
        if (isset($_POST['usuario'])) {
            
                $mvc->buscar_usuario_ppal($_POST['usuario']);
        }else{
             
                 $mvc->principal();
        }
		
    break;    
    
    case 'salir':
       $mvc->principal();
    break;      
    
    default:
        $mvc->principal();
    break;
}
