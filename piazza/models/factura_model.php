<?php
require_once('db_abstract_model.php');

class Factura extends DBAbstractModel {
    protected $id_factura;
    public $id_cliente;
    public $fecha;
    public $total;
    
    function __construct() {
        $this->db_name ='facturacion';
    }
    
    public function listar() {
        $this->query = " SELECT f.id_factura, f.id_cliente, f.fecha,  f.total, c.apellido, c.nombre as cliente "
                . "      FROM factura f left "
                . "      JOIN (select id_cliente, nombre, apellido from cliente) c on (f.id_cliente = c.id_cliente) order by f.id_factura desc ";
        $this->get_results_from_query();
		
	return $this->rows;
    }    
    
    public function listar_cabecera($id) {
        $this->query = " SELECT f.id_factura, f.id_cliente, f.fecha,  f.total, c.apellido, c.nombre, c.direccion  "
                . "      FROM factura f left "
                . "      JOIN (select id_cliente, nombre, apellido, direccion from cliente) c on (f.id_cliente = c.id_cliente) "
                . " where f.id_factura = $id ";
        
        $this->get_results_from_query();
		
	return $this->rows;
    }     
    
    public function gets() {
        $this->query = " SELECT id_factura,id_cliente,fecha,total FROM factura ";
        $this->get_results_from_query();
		
	return $this->rows;
    }    
    
    public function get($id='') {
        if($id !=''):
            $this->query = " SELECT id_factura,id_cliente,fecha,total FROM factura WHERE id_factura = $id ";
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

        $this->query = " INSERT INTO factura (id_cliente,fecha,total) VALUES ($id_cliente, '$fecha', $total) ";
                
        $this->execute_single_query();
    }
    
    public function set2($prod_data=array()) {
        foreach ($prod_data as $campo=>$valor):
            $$campo = $valor;
        endforeach;        

        $this->query = " INSERT INTO factura (id_cliente,fecha,total) VALUES ($id_cliente, '$fecha', $total) ";
                
        $this->execute_single_query2();
       // $this->traer_id();
        
        return $this->ultimo_id;
    }
    
    public function edit($prod_data=array()) {
        foreach ($prod_data as $campo=>$valor):
            $$campo = $valor;
        endforeach;
        
        $this->query = " UPDATE factura SET id_cliente = $id_cliente, fecha='$fecha',  total=$total WHERE id_factura = $id_cliente ";
        $this->execute_single_query();
    }
    
    public function delete($id='') {
        $this->query = " DELETE FROM factura WHERE id_factura = $id ";
        $this->execute_single_query();
    }
    
    function __destruct() {
     #   unset($this);
    }
}
