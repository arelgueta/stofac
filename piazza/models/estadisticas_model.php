<?php
require_once('db_abstract_model.php');

class Estadisticas extends DBAbstractModel {
    public $id_detalle;
    public $id_recibo;
    public $id_producto;
    public $cantidad;
    public $precio;
    public $subtotal;
    public $codigo;
	
    public function listar($id) {
        $this->query = " SELECT  d.id_detalle, p.nombre,p.codigo, d.cantidad, d.precio, d.subtotal 
            FROM recibo_detalle d, producto p
            WHERE d.id_producto = p.id_producto
            and d.id_recibo = $id 
            order by d.id_detalle";
        
        $this->get_results_from_query();
		
	return $this->rows;
    }     
    
    public function gets() {
        $this->query = " SELECT * FROM recibo_detalle ";
        $this->get_results_from_query();
		
	return $this->rows;
    }    
    
    public function get($id='') {
        if($id !=''):
            $this->query = " SELECT * FROM recibo_detalle WHERE id_recibo = $id ";
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
        $this->query = " INSERT INTO recibo_detalle (id_detalle, id_recibo, id_producto, cantidad, precio, subtotal) VALUES ($id_detalle, $id_recibo, $id_producto, $cantidad, $precio, $subtotal) ";
                
        $this->execute_single_query();

    }
    
    public function set2($prod_data=array(), $id_recibo) {
        foreach ($prod_data as $campo=>$valor):
            $$campo = $valor;
        endforeach;
        $this->query = " INSERT INTO recibo_detalle (id_detalle, id_recibo, id_producto, cantidad, precio, subtotal) VALUES ($id_detalle, $id_recibo, $id_producto, $cantidad, $precio, $subtotal) ";
     	$this->execute_single_query();

    }    
    
    public function edit($prod_data=array()) {
        foreach ($prod_data as $campo=>$valor):
            $$campo = $valor;
        endforeach;
        
        $this->query = " UPDATE recibo_detalle SET id_producto = $id_proveedor, cantidad=$cantidad,  precio=$precio WHERE id_recibo = $id_proveedor ";
        $this->execute_single_query();
    }
    
    public function delete($id='') {
        $this->query = " DELETE FROM recibo_detalle WHERE id_recibo = $id ";
        $this->execute_single_query();
    }
    
    function __destruct() {
    #    unset($this);
    }
}
