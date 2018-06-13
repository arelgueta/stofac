<?php
require_once('db_abstract_model.php');

class Recibo extends DBAbstractModel {
    protected $id_recibo;
    public $id_proveedor;
    public $fecha;
    public $total;
    
    function __construct() {
        $this->db_name ='facturacion';
    }
    
    public function listar() {
        $this->query = " SELECT r.id_recibo, r.id_proveedor, r.fecha,  r.total, p.apellido, p.nombre as proveedor "
                . "      FROM recibo r left "
                . "      JOIN (select id_proveedor, nombre, apellido from proveedor) p on (r.id_proveedor = p.id_proveedor) ";
        $this->get_results_from_query();
		
	return $this->rows;
    }    
    
    public function listar_cabecera($id) {
        $this->query = " SELECT r.id_recibo, r.id_proveedor, r.fecha,  r.total, p.apellido, p.nombre, p.direccion  "
                . "      FROM recibo r left "
                . "      JOIN (select id_proveedor, nombre, apellido, direccion from proveedor) p on (r.id_proveedor = p.id_proveedor) "
                . " where r.id_recibo = $id ";
        
        $this->get_results_from_query();
		
	return $this->rows;
    }     
    
    public function gets() {
        $this->query = " SELECT id_recibo,id_proveedor,fecha,total FROM recibo ";
        $this->get_results_from_query();
		
	return $this->rows;
    }    
    
    public function get($id='') {
        if($id !=''):
            $this->query = " SELECT id_recibo,id_proveedor,fecha,total FROM recibo WHERE id_recibo = $id ";
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
		$id_proveedor=0; $fecha=0; $total=0;
        foreach ($prod_data as $campo=>$valor):
            $$campo = $valor;
        endforeach;        

        $this->query = " INSERT INTO recibo (id_proveedor,fecha,total) VALUES ($id_proveedor, '$fecha', $total) ";           
        $this->execute_single_query();
    }
    
    public function set2($prod_data=array()) {
        foreach ($prod_data as $campo=>$valor):
            $$campo = $valor;
        endforeach;        

        $this->query = " INSERT INTO recibo (id_proveedor,fecha,total) VALUES ($id_proveedor, '$fecha', $total) ";
        $this->execute_single_query2();
       // $this->traer_id();
        
        return $this->ultimo_id;
    }
    
    public function edit($prod_data=array()) {
        foreach ($prod_data as $campo=>$valor):
            $$campo = $valor;
        endforeach;
        
        $this->query = " UPDATE recibo SET id_proveedor = $id_proveedor, fecha='$fecha',  total=$total WHERE id_recibo = $id_proveedor ";
        $this->execute_single_query();
    }
    
    public function delete($id='') {
        $this->query = " DELETE FROM recibo WHERE id_proveedor = $id ";
        $this->execute_single_query();
    }
    
    function __destruct() {
       # unset($this);
    }
}
