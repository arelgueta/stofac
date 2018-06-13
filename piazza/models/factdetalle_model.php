<?php
require_once('db_abstract_model.php');

class FacturaDetalle extends DBAbstractModel {
    public $id_detalle;
    public $id_factura;
    public $id_producto;
    public $id_usuario;
    public $cantidad;
    public $precio;
    public $subtotal;
    
    function __construct() {
        $this->db_name ='facturacion';
    }
   
    public function listar($id) {
        $this->query = " SELECT  d.id_detalle, p.nombre, d.cantidad, d.precio, d.subtotal 
            FROM factura_detalle d, producto p
            WHERE d.id_producto = p.id_producto
            and d.id_factura = $id 
            order by d.id_detalle";
        
        $this->get_results_from_query();
		
	return $this->rows;
    }     
    
    public function gets() {
        $this->query = " SELECT * FROM factura_detalle ";
        $this->get_results_from_query();
		
	return $this->rows;
    }    
    
    public function get($id='') {
        if($id !=''):
            $this->query = " SELECT * FROM factura_detalle WHERE id_factura = $id ";
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
        $this->query = " INSERT INTO factura_detalle (id_detalle, id_factura, id_producto, cantidad, precio, subtotal,id_usuario) VALUES ($id_detalle, $id_factura, $id_producto, $cantidad, $precio, $subtotal,$id_usuario) ";
        $query = " INSERT INTO factura_detalle (id_detalle, id_factura, id_producto, cantidad, precio, subtotal,id_usuario) VALUES ($id_detalle, $id_factura, $id_producto, $cantidad, $precio, $subtotal,$id_usuario) ";
         echo $query."<br>";
        $this->execute_single_query();

    }
    
    public function set2($prod_data=array(), $id_fact) {
        foreach ($prod_data as $campo=>$valor):
            $$campo = $valor;
        endforeach;
        $this->query = " INSERT INTO factura_detalle (id_detalle, id_factura, id_producto, cantidad, precio, subtotal) VALUES ($id_detalle, $id_fact, $id_producto, $cantidad, $precio, $subtotal) ";
        $query = " INSERT INTO factura_detalle (id_detalle, id_factura, id_producto, cantidad, precio, subtotal) VALUES ($id_detalle, $id_fact, $id_producto, $cantidad, $precio, $subtotal) ";
         //echo $query."<br>";                
        $this->execute_single_query();

    }    
    
    public function edit($prod_data=array()) {
        foreach ($prod_data as $campo=>$valor):
            $$campo = $valor;
        endforeach;
        
        $this->query = " UPDATE factura_detalle SET id_producto = $id_cliente, cantidad=$cantidad,  precio=$precio WHERE id_factura = $id_cliente ";
        $this->execute_single_query();
    }
    
    public function delete($id='') {
        $this->query = " DELETE FROM factura_detalle WHERE id_factura = $id ";
        $this->execute_single_query();
    }
    
    function __destruct() {
     #   unset($this);
    }
}
