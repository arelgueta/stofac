<?php
require_once('db_abstract_model.php');

class Producto extends DBAbstractModel {
    protected $id_producto;
    public $nombre;
    public $precio;
    public $stock;
    private $id_categoria;
    private $codigo;
    
    
    function __construct() {
        $this->db_name ='facturacion';
    }
	
    public function listar() {
        $this->query = " SELECT p.id_producto, p.nombre, p.precio, p.stock, p.id_categoria,p.codigo , c.nombre as categoria, p.foto"
                . "      FROM producto p left "
                . "      JOIN (select id_categoria, nombre from categoria) c on (p.id_categoria = c.id_categoria) ";
        $this->get_results_from_query();
		
	return $this->rows;
    }
    
    public function gets() {
        $this->query = " SELECT id_producto, nombre, precio,codigo , stock, id_categoria, foto FROM producto ";
        $this->get_results_from_query();
		
	return $this->rows;
    }    
    
    public function get($id='') {
        if($id !=''):
            $this->query = " SELECT id_producto, nombre, precio, stock, id_categoria,codigo, foto FROM producto WHERE id_producto = $id ";
            $this->get_results_from_query();
        endif;
        
        if(count($this->rows) == 1):
            foreach ($this->rows[0] as $propiedad=>$valor):
                $this->$propiedad = $valor;
            endforeach;
        endif;
        return $this->rows;
    }
    
    public function set($prod_data=array()) {
        foreach ($prod_data as $campo=>$valor):
            $$campo = $valor;
        endforeach;        
      /*  if(array_key_exists('id_producto', $prod_data)):
            $this->get($prod_data['id_producto']);
            if($prod_data['id_producto'] != $this->id_producto):
                foreach ($prod_data as $campo=>$valor):
                    $$campo = $valor;
                endforeach;*/
              //  //echo " INSERT INTO producto (nombre, precio, stock, id_categoria) VALUES ('$nombre', $precio, $stock, $id_categoria) ";
       
                $this->query = " INSERT INTO producto (nombre, precio, stock, id_categoria, foto,codigo) VALUES ('$nombre', $precio, $stock, $id_categoria, '$foto','$codigo') ";
                
                $this->execute_single_query();
          /*  endif;
        endif;*/
    }
    
    public function set2($prod_data=array()) {
        foreach ($prod_data as $campo=>$valor):
            $$campo = $valor;
        endforeach;        

        $this->query = " INSERT INTO producto (nombre, precio, stock, id_categoria, foto,codigo) VALUES ('$nombre', $precio, $stock, $id_categoria, '$foto','$codigo') ";
                
        $this->execute_single_query2();
       // $this->traer_id();
        
        return $this->ultimo_id;
    }    
    
    public function edit($prod_data=array()) {
        foreach ($prod_data as $campo=>$valor):
            $$campo = $valor;
        endforeach;
        
        $this->query = " UPDATE producto SET nombre = '$nombre', precio = $precio, stock = $stock, codigo=$codigo , id_categoria = $id_categoria, foto = '$foto' WHERE id_producto = $id_producto ";
        $this->execute_single_query();
    }
    
    public function edit_foto($id_producto,$foto) {
        $this->query = " UPDATE producto SET foto = '$foto' WHERE id_producto = $id_producto ";
        $this->execute_single_query();
    }    
    
    public function edit_stock($id_producto,$cantidad) {
        $this->query = " UPDATE producto SET stock = (stock - $cantidad) WHERE id_producto = $id_producto ";
        $this->execute_single_query();
    }      
	
	public function edit_stock2($id_producto,$cantidad) {
        $this->query = " UPDATE producto SET stock = (stock + $cantidad) WHERE id_producto = $id_producto ";
        $this->execute_single_query();
    }
    
    public function delete($id='') {
        $this->query = " DELETE FROM producto WHERE id_producto = $id ";
        $this->execute_single_query();
    }
    
    function __destruct() {
 #       unset($this);
    }
}
