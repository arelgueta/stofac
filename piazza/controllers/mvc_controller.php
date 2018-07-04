<?php
session_start(); 
//Llamada al modelo
require_once("models/producto_model.php");
require_once("models/usuario_model.php");
require_once("models/categoria_model.php");
require_once("models/cliente_model.php");
require_once("models/proveedor_model.php");
require_once("models/tipo-usuario_model.php");
require_once("models/factura_model.php");
require_once("models/factdetalle_model.php");
require_once("models/recibo_model.php");
require_once("models/recibodetalle_model.php");
require_once("models/rutas_model.php");
require_once("models/destinos_model.php");
require_once("models/piezas_model.php");

//llamadas a librerias
require_once("views/lib/obj_soporte.php");
require_once("views/lib/funciones.php");

class mvc_controller{
    
   function principal() {
        require_once("views/principal.php");
   }   
    
    public function buscar_usuario_ppal($usuario){
        $log = new Usuario();
        $log->buscar_usuario($usuario);
        
        $usu_log = $log->usuario;
        //$id_usu_log = $log->id_usuario;
        $cla_log = $log->clave;
        $tipo_log = $log->id_tipo;
        
        //Llamada a la vista
        require_once("views/principal.php");
    }  
															// PIEZAS
    public function listar_pieza(){
        $piez = new Pieza();
	$datos_pieza = $piez->listar();
  	
	$prod= new Producto();
	$datos_prod = $prod->gets();
   
        //debo recorrer el array y guardar cada linea de detalle
         foreach($datos_prod as $fila){    
		//	var_dump($fila);
		//	echo "<br>";
            //$datos_usuario = $det->set2($fila, $id_nuevo);
            //al cargar el producto, tengo que descontar del stock la cantidad comprada
            // lo que es un update sobre la tabla producto            
           // $datos_prod = $prod->edit_stock($fila['id_producto'],$fila['cantidad']);                    
        }         
        // Aca tiene que ir el Update en ruta
        //muestro el listado de facturas
        //$datos_factura = $fac->listar();
        //Llamada a la vista
       // require_once("views/piezas2.php");


//Llamada a la vista
        require_once("views/piezas.php");
    }      
   
    public function buscar_pieza($id){
        $fpiez = new Pieza();
        $datos_factura = $piez->get($id);

        //Llamada a la vista
        require_once("views/piezas.php");
    }     
    
    public function cargar_pieza($valores1, $valores2){      
        //cargo la cabecera de la pieza
        $fac = new Pieza();        
        $id_nuevo= $fac->set2($valores1);
        
        //$id_nuevo = $fac->ultimo_id;
        //cargo el detalle de la factura
        
        //$det = new FacturaDetalle(); 
        //$prod = new Producto();
        //debo recorrer el array y guardar cada linea de detalle
       // foreach($valores2 as $fila){    
			////var_dump($fila);
			//echo "<br>";
         //   $datos_usuario = $det->set2($fila, $id_nuevo);
            //al cargar el producto, tengo que descontar del stock la cantidad comprada
            // lo que es un update sobre la tabla producto            
           // $datos_prod = $prod->edit_stock($fila['id_producto'],$fila['cantidad']);                    
    //    }         
        // Aca tiene que ir el Update en ruta
        //muestro el listado de facturas
        //$datos_factura = $fac->listar();
        //Llamada a la vista
       // require_once("views/piezas2.php");
    }
public function cargar_pieza1($valores1, $valores2){      
        //cargo la cabecera de la factura
        $fac = new Pieza();        
        $id_nuevo= $fac->set2($valores1);
       // $id_nuevo= $fac->set2a($valores1);
        
//		$ruta= new Ruta();
//		$rut=$ruta->vta_ruta($valores1,$id_nuevo);
		
  //      $det = new FacturaDetalle(); 
    //    $prod = new Producto();
        //debo recorrer el array y guardar cada linea de detalle
      //  foreach($valores2 as $fila){              
        //    $datos_usuario = $det->set2($fila, $id_nuevo);
            //al cargar el producto, tengo que descontar del stock la cantidad comprada
            // lo que es un update sobre la tabla producto            
          //  $datos_prod = $prod->edit_stock($fila['id_producto'],$fila['cantidad']);                    
        //}         
       //muestro el listado de facturas
        //$datos_factura = $fac->listar();
        //Llamada a la vista
       require_once("views/piezas2.php");
    }	
    
    public function imprimir_pieza($id){      
        //busco la cabecera de la factura
        $fac = new Pieza();        
        $datos_factura = $fac->listar_pieza($id);
        
        //cargo el detalle de la factura        
       // $det = new FacturaDetalle();
        //$datos_factdetalle = $det->listar($id);
    
       // require_once("views/comprobante.php");
    }           
    
    public function update_pieza($valores){
        $fac = new Pieza();
        $datos_factura = $fac->edit($valores);
        
        $datos_factura = $fac->listar();
        //Llamada a la vista
        require_once("views/piezas.php");
    }
    
    public function eliminar_pieza($valores){
        $fac = new Pieza();
        $datos_factura = $fac->delete($valores);
        
        $datos_factura = $fac->listar();
        //Llamada a la vista
        require_once("views/piezas.php");
    }
	
   /*  public function listar_datos_fact1($id,$id_rutas){
        $cli = new Cliente();
        $datos_cli = $cli->get($id);
        //////var_dump($datos_cli);
        $product = new Producto();
        $datos_product = $product->gets();
        
        //Llamada a la vista
        require_once("views/facturas2.php");
   }*/          
		
   /* public function listar_datos_fact(){
        $cli = new Cliente();
        $datos_cli = $cli->gets();
        
        $product = new Producto();
        $datos_product = $product->gets();
        
        //Llamada a la vista
        require_once("views/facturas.php");
    }          

    */

																	// PRODUCTOS
    public function listar_productos(){
        $prod = new Producto();
        $datos_prod = $prod->listar();
        //Llamada a la vista
        require_once("views/productos.php");
    }    
    
    public function buscar_producto($id){
        $prod = new Producto();
        $datos_prod = $prod->get($id);
        
        //llamo a la consulta de categorias
        $cat = new Categoria();
        $datos_cat = $cat->gets();
        
        //Llamada a la vista
        require_once("views/productos.php");
    }     
    
    public function cargar_producto($valores, $tempor){        
        $prod = new Producto();
        //$datos_prod = $prod->set($valores);
        //cargo los datos y tomo el id, para luego mediante un update pasar el nombre a la foto
        $id_prod = $prod->set2($valores);
        
        //aqui tomo el id, cargo con ese id como nombre la foto en la tabla y hago el upload al directorio correspondiente
        $archivo = "views/img/" .$id_prod.".jpg"; 
        if (!move_uploaded_file($tempor, $archivo )){
                //echo "<br>ERROR Al COPIAR EL ARCHIVO<br>";
        }else{
                //echo "<script> alert ('Archivo Subido')</script>";
                //hago el update en la bd
                $datos_prod = $prod->edit_foto($id_prod, $id_prod.".jpg");
        }        
        
        
        $datos_prod = $prod->listar();
        //Llamada a la vista
        require_once("views/productos.php");
    }       
    
    public function update_producto($valores, $tempor,$id_pro){
        $prod = new Producto();
        $datos_prod = $prod->edit($valores);
        
        //aqui tomo el id, cargo con ese id como nombre la foto en la tabla y hago el upload al directorio correspondiente
        $archivo = "views/img/" .$id_pro.".jpg"; 
        if (!move_uploaded_file($tempor, $archivo )){
                //echo "<br>ERROR Al COPIAR EL ARCHIVO<br>";
        }else{
                //echo "<script> alert ('Archivo Subido')</script>";
                //hago el update en la bd
                $datos_prod = $prod->edit_foto($id_pro, $id_pro.".jpg");
        }         
        
        $datos_prod = $prod->listar();
        //Llamada a la vista
        require_once("views/productos.php");
    }     
    
    public function eliminar_producto($valores){
        $prod = new Producto();
        $datos_prod = $prod->delete($valores);
        
        $datos_prod = $prod->listar();
        //Llamada a la vista
        require_once("views/productos.php");
    }      
																	// Categorias
    public function listar_categorias_prod(){
        $cat = new Categoria();
        $datos_cat = $cat->gets();
        //Llamada a la vista
        require_once("views/productos.php");
    }    
    
    public function listar_categorias(){
        $cat = new Categoria();
        $datos_cat = $cat->gets();
        //Llamada a la vista
        require_once("views/categorias.php");
    }      
    
    public function buscar_categoria($id){
        $cat = new Categoria();
        $datos_cat = $cat->get($id);
        //Llamada a la vista
        require_once("views/categorias.php");
    }     
    
    public function cargar_categoria($valores){        
        $cat = new Categoria();
        $datos_cat = $cat->set($valores);
        
        $datos_cat = $cat->gets();
        //Llamada a la vista
        require_once("views/categorias.php");
    }       
    
    public function update_categoria($valores){
        $cat = new Categoria();
        $datos_cat = $cat->edit($valores);
        
        $datos_cat = $cat->gets();
        //Llamada a la vista
        require_once("views/categorias.php");
    }
    
    public function eliminar_categoria($valores){
        $cat = new Categoria();
        $datos_cat = $cat->delete($valores);
        
        $datos_cat = $cat->gets();
        //Llamada a la vista
        require_once("views/categorias.php");
    }            
																	// CLIENTES
    public function listar_clientes(){
        $cliente = new Cliente();
        $datos_cliente = $cliente->gets();
		
        $destino = new Destino();
        $datos_destino = $destino->gets();
		
        //Llamada a la vista
        require_once("views/clientes.php");
    }    
    
    public function buscar_cliente($id){
        $cliente = new Cliente();
        $datos_cliente = $cliente->get($id);
		
        $destino = new Destino();
        $datos_destino = $destino->gets();
        
        //Llamada a la vista
        require_once("views/clientes.php");
    }     
    
    public function cargar_cliente($valores){        
        $cliente = new Cliente();
        $datos_cliente = $cliente->set($valores);
        
        $datos_cliente = $cliente->gets();
		
		$destino = new Destino();
		$datos_destino = $destino->gets();
		
        //Llamada a la vista
        require_once("views/clientes.php");
    }       
    
    public function update_cliente($valores){
        $cliente = new Cliente();
        $datos_cliente = $cliente->edit($valores);
        
        $datos_cliente = $cliente->gets();
        //Llamada a la vista
        require_once("views/clientes.php");
    }
    
    public function eliminar_cliente($valores){
        $cliente = new Cliente();
        $datos_cliente = $cliente->delete($valores);
        
        $datos_cliente = $cliente->gets();
        //Llamada a la vista
        require_once("views/clientes.php");
    }     
																	// USUARIOS
    public function listar_usuarios(){
        $usu = new Usuario();
        $datos_usuario = $usu->listar();
        //Llamada a la vista
        require_once("views/usuarios.php");
    }      
   
    public function buscar_usuario($id){
        $usu = new Usuario();
        $datos_usuario = $usu->get($id);
        
        //llamo a la consulta de categorias
        $tip = new TipoUsuario();
        $datos_tip  = $tip ->gets();
        
        //Llamada a la vista
        require_once("views/usuarios.php");
    }     
    
    public function cargar_usuario($valores){        
        $usu = new Usuario();
        $datos_usuario = $usu->set($valores);
        
        $datos_usuario = $usu->listar();
        //Llamada a la vista
        require_once("views/usuarios.php");
    }       
    
    public function update_usuario($valores){
        $usu = new Usuario();
        $datos_usuario = $usu->edit($valores);
        
        $datos_usuario = $usu->listar();
        //Llamada a la vista
        require_once("views/usuarios.php");
    }
    
    public function eliminar_usuario($valores){
        $usu = new Usuario();
        $datos_usuario = $usu->delete($valores);
        
        $datos_usuario = $usu->listar();
        //Llamada a la vista
        require_once("views/usuarios.php");
    }     
    
    public function listar_tipo_usu(){
        $tip = new TipoUsuario();
        $datos_tip = $tip->gets();
        //Llamada a la vista
        require_once("views/usuarios.php");
    }       
																	// FACTURAS
    public function listar_facturas(){
        $fac = new Factura();
        $datos_factura = $fac->listar();
        //Llamada a la vista
        require_once("views/facturas.php");
    }      
   
    public function buscar_factura($id){
        $fac = new Factura();
        $datos_factura = $fac->get($id);
        
        //llamo a la consulta de categorias
        $tip = new Cliente();
        $datos_cli  = $tip ->gets();
        
        //Llamada a la vista
        require_once("views/facturas.php");
    }     
    
    public function cargar_factura($valores1, $valores2){      
        //cargo la cabecera de la factura
        $fac = new Factura();        
        $id_nuevo= $fac->set2($valores1);
        
        //$id_nuevo = $fac->ultimo_id;
        //cargo el detalle de la factura
        
        $det = new FacturaDetalle(); 
        $prod = new Producto();
        //debo recorrer el array y guardar cada linea de detalle
        foreach($valores2 as $fila){    
			////var_dump($fila);
			//echo "<br>";
            $datos_usuario = $det->set2($fila, $id_nuevo);
            //al cargar el producto, tengo que descontar del stock la cantidad comprada
            // lo que es un update sobre la tabla producto            
            $datos_prod = $prod->edit_stock($fila['id_producto'],$fila['cantidad']);                    
        }         
        // Aca tiene que ir el Update en ruta
        //muestro el listado de facturas
        $datos_factura = $fac->listar();
        //Llamada a la vista
        require_once("views/facturas2.php");
    }
public function cargar_factura1($valores1, $valores2){      
        //cargo la cabecera de la factura
        $fac = new Factura();        
        $id_nuevo= $fac->set2($valores1);
       // $id_nuevo= $fac->set2a($valores1);
        
		$ruta= new Ruta();
		$rut=$ruta->vta_ruta($valores1,$id_nuevo);
		
        $det = new FacturaDetalle(); 
        $prod = new Producto();
        //debo recorrer el array y guardar cada linea de detalle
        foreach($valores2 as $fila){              
            $datos_usuario = $det->set2($fila, $id_nuevo);
            //al cargar el producto, tengo que descontar del stock la cantidad comprada
            // lo que es un update sobre la tabla producto            
            $datos_prod = $prod->edit_stock($fila['id_producto'],$fila['cantidad']);                    
        }         
       //muestro el listado de facturas
        $datos_factura = $fac->listar();
        //Llamada a la vista
       require_once("views/facturas2.php");
    }	
    
    public function imprimir_factura($id){      
        //busco la cabecera de la factura
        $fac = new Factura();        
        $datos_factura = $fac->listar_cabecera($id);
        
        //cargo el detalle de la factura        
        $det = new FacturaDetalle();
        $datos_factdetalle = $det->listar($id);
    
        require_once("views/comprobante.php");
    }           
    
    public function update_factura($valores){
        $fac = new Factura();
        $datos_factura = $fac->edit($valores);
        
        $datos_factura = $fac->listar();
        //Llamada a la vista
        require_once("views/facturas.php");
    }
    
    public function eliminar_factura($valores){
        $fac = new Factura();
        $datos_factura = $fac->delete($valores);
        
        $datos_factura = $fac->listar();
        //Llamada a la vista
        require_once("views/facturas.php");
    }
	
     public function listar_datos_fact1($id,$id_rutas){
        $cli = new Cliente();
        $datos_cli = $cli->get($id);
        //////var_dump($datos_cli);
        $product = new Producto();
        $datos_product = $product->gets();
        
        //Llamada a la vista
        require_once("views/facturas2.php");
    }          
		
    public function listar_datos_fact(){
        $cli = new Cliente();
        $datos_cli = $cli->gets();
        
        $product = new Producto();
        $datos_product = $product->gets();
        
        //Llamada a la vista
        require_once("views/facturas.php");
    }          
																	// RECIBOS
	public function listar_recibos(){
        $rec = new Recibo();
        $datos_recibo = $rec->listar();
        //Llamada a la vista
        require_once("views/recibos.php");
    }      
   
    public function buscar_recibo($id){
        $rec = new Recibo();
        $datos_recibo = $rec->get($id);
        //llamo a la consulta de categorias
        $tip = new TipoUsuario();
        $datos_tip  = $tip ->gets();
        //Llamada a la vista
        require_once("views/recibos.php");
    }     
    
    public function cargar_recibo($valores1, $valores2){ 
        //cargo la cabecera de la factura
        $rec = new Recibo();     
		$id_nuevo= $rec->set2($valores1);
        
        //$id_nuevo = $rec->ultimo_id;
        //cargo el detalle del recibo
        
        $det = new ReciboDetalle(); 
        $prod = new Producto();
        //debo recorrer el array y guardar cada linea de detalle
        foreach($valores2 as $fila){  
			//////var_dump($fila);
			////echo "<br>";
            $datos_usuario = $det->set2($fila, $id_nuevo);
            //al cargar el producto, tengo que aumentar del stock la cantidad comprada
            // lo que es un update sobre la tabla producto            
            $datos_prod = $prod->edit_stock2($fila['id_producto'],$fila['cantidad']);                    
        }         

        //muestro el listado de recibos
        $datos_recibo = $rec->listar();
        //Llamada a la vista
        require_once("views/recibos.php");
    }       
    
    public function imprimir_recibo($id){      
        //busco la cabecera del recibo
        $rec = new Recibo();        
        $datos_recibo = $rec->listar_cabecera($id);
        
        //cargo el detalle del Recibo       
        $det = new ReciboDetalle();
        $datos_recibodetalle = $det->listar($id);
    
        require_once("views/comprobante1.php");
    }           
    
    public function update_recibo($valores){
        $rec = new Recibo();
        $datos_recibo = $rec->edit($valores);
        
        $datos_recibo = $rec->listar();
        //Llamada a la vista
        require_once("views/recibos.php");
    }
    
    public function eliminar_recibo($valores){
        $rec = new Recibo();
        $datos_recibo = $rec->delete($valores);
        
        $datos_recibo = $rec->listar();
        //Llamada a la vista
        require_once("views/recibos.php");
    }
    
    public function listar_datos_recibo(){
        $prov = new Proveedor();
        $datos_prov = $prov->gets();
        
        $product = new Producto();
        $datos_product = $product->gets();
        
        //Llamada a la vista
        require_once("views/recibos.php");
    }  
																	// PROVEEDORES
    public function listar_proveedores(){
        $proveedor = new Proveedor();
        $datos_proveedor = $proveedor->gets();
        //Llamada a la vista
        require_once("views/proveedores.php");
    }    
    
    public function buscar_proveedor($id){
        $proveedor = new Proveedor();
        $datos_proveedor = $proveedor->get($id);
        
        //Llamada a la vista
        require_once("views/proveedores.php");
    }     
    
    public function cargar_proveedor($valores){        
        $proveedor = new Proveedor();
        $datos_proveedor = $proveedor->set($valores);
        
        $datos_proveedor = $proveedor->gets();
        //Llamada a la vista
        require_once("views/proveedores.php");
    }       
    
    public function update_proveedor($valores){
        $proveedor = new Proveedor();
        $datos_proveedor = $proveedor->edit($valores);
        
        $datos_proveedor = $proveedor->gets();
        //Llamada a la vista
        require_once("views/proveedores.php");
    }
    
    public function eliminar_proveedor($valores){
        $proveedor = new Proveedor();
        $datos_proveedor = $proveedor->delete($valores);
        
        $datos_proveedor = $proveedor->gets();
        //Llamada a la vista
        require_once("views/proveedores.php");
	}		

	
	public function crear_Ruta($valores){						// RUTAS
		$ruta=new Ruta();
		$datos_ruta = $ruta->set($valores);
		
		$datos_ruta =$ruta->gets();
		//Llamada a la vista
		require_once("views/rutas.php");
	}
	
    public function cargar_ruta($valores){   
		$cliente = new Cliente();
        $datos_clientes = $cliente->getDestino($valores);
		$i=0;
		$ruta = new Ruta();
          foreach ($datos_clientes as $destino):
			$valores['id_cliente']=$destino["id_cliente"];
        $datos_ruta = $ruta->set($valores);
            endforeach;
		$datos_ruta = $ruta->gets();
        //Llamada a la vista
        require_once("views/rutas.php");
    }       
	
	public function listar_rutas(){
        $ruta = new Ruta();
        $datos_ruta = $ruta->gets();
        //Llamada a la vista
        require_once("views/rutas.php");
    }    
    
	public function listar_datos_rutas(){
      //  $cliente = new Cliente();
       // $datos_clientes = $cliente->gets();
     //   //var_dump ($datos_cliente);
		$destino = new Destino();
		$datos_destino = $destino->gets();

	   $usr = new Usuario();
    //    $datos_usr = $usr->gets_Usr_Ruta();
        $datos_usr = $usr->gets_Usr_Ruta();
        
        //Llamada a la vista
        require_once("views/rutas.php");
	}
    public function buscar_ruta($id_rutas){
        $ruta = new Ruta();
        $datos_ruta = $ruta->get($id_rutas);
        
        //Llamada a la vista
        require_once("views/rutas.php");
    }     
    
    public function update_ruta($valores){
        $ruta = new Ruta();
        $datos_ruta = $ruta->edit($valores);
        
		$datos_ruta = $ruta->gets();
        //Llamada a la vista
        require_once("views/rutas.php");
    }
    
    public function eliminar_ruta($valores){
        $ruta = new Ruta();
        $datos_ruta = $ruta->delete($valores);
        
        $datos_ruta = $ruta->gets();
        //Llamada a la vista
        require_once("views/rutas.php");
    }                 
	
	public function listar_hojas(){
        $ruta = new Ruta();
        $datos_ruta = $ruta->getsHoja();
        //Llamada a la vista
        require_once("views/rutas.php");
    }  
	
	public function listar_hoja_carga(){
        $ruta = new Ruta();
        $datos_ruta = $ruta->getsHojaCarga();
        //Llamada a la vista
        require_once("views/rutas.php");
    }          
	
	public function listar_hoja_rutas(){
        $ruta = new Ruta();
        $datos_ruta = $ruta->getsHojaRuta();
        //Llamada a la vista
        require_once("views/rutas.php");
    } 
	
		public function crear_Destino($valores){						// Destinos
		$destino=new Destino();
		$datos_destino = $destino->set($valores);
		
		$datos_destino =$destino->gets();
		//Llamada a la vista
		require_once("views/destinos.php");
	}
	
    public function cargar_destino($valores){       
		$destino = new Destino();
        $destino_usuario = $destino->set($valores);
        
        $datos_destino = $destino->gets();
        //Llamada a la vista
        require_once("views/destinos.php");
    }       
	
	public function listar_destino(){
        $destino = new Destino();
        $datos_destino = $destino->gets();
        //Llamada a la vista
        require_once("views/destinos.php");
    }    
    
	public function listar_datos_destino(){
        $destino = new Destino();
    //    $datos_usr = $destino->gets_Usr_Ruta();
        $datos_destino = $destino->gets();
        
        //Llamada a la vista
        require_once("views/destinos.php");
	}
    public function buscar_destino($id_rutas){
        $destino = new Destinos();
        $datos_destino = $destino->get($id_rutas);
        
        //Llamada a la vista
        require_once("views/destinos.php");
    }     
    
    public function update_destino($valores){
        $destino = new Destino();
        $datos_destino = $destino->edit($valores);
        
		$datos_destino = $destino->gets();
        //Llamada a la vista
        require_once("views/destinos.php");
    }
    
    public function eliminar_destino($valores){
        $destino1 = new Destino();
        $datos_destino = $destino1->delete($valores);
        
        $destino = new Destino();
        $datos_destino = $destino->gets();
        //Llamada a la vista
        require_once("views/destinos.php");
    }     

}
