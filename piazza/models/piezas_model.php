<?php
require_once('db_abstract_model.php');

class Pieza extends DBAbstractModel {
    protected $id_pieza;
    public $nombre;
    public $descripcion;
    public $cantidad;
    public $cantidadMaxima;
    
    function __construct() {
        $this->db_name ='facturacion';
    }
    
    public function listar() {
        $this->query = " SELECT id_pieza,nombre, descripcion, cantidad, cantidadMinima FROM piezas ";
        $this->get_results_from_query();
		
	return $this->rows;
    }    
    
    public function listar_cabecera($id) {
        $this->query = " SELECT id_pieza, nombre, descripcion, cantidad, cantidadMinima  "
                . "      FROM piezas"
                . " where f.id_pieza = $id ";
        
        $this->get_results_from_query();
		
	return $this->rows;
    }     
    
    public function gets() {
        $this->query = " SELECT id_piezas,nombre, descripcion,cantidad, cantidadMinima FROM piezas ";
        $this->get_results_from_query();
		
	return $this->rows;
    }    
    
    public function get($id='') {
        if($id !=''):
            $this->query = " SELECT id_pieza, descripcion, cantidad, cantidadMinima FROM piezas WHERE id_pieza = $id ";
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

        $this->query = " INSERT INTO piezas (id_pieza,nombre,cantidad) VALUES ($id_pieza, '$nombre', $cantidad) ";
                
        $this->execute_single_query();
    }
    
    public function set2($prod_data=array()) {
        foreach ($prod_data as $campo=>$valor):
            $$campo = $valor;
        endforeach;        

        $this->query = " INSERT INTO piezas (id_pieza,nombre,cantidad) VALUES ($id_pieza, '$nombre', $cantidad) ";
                
        $this->execute_single_query2();
       // $this->traer_id();
        
        return $this->ultimo_id;
    }
    
    public function edit($prod_data=array()) {
        foreach ($prod_data as $campo=>$valor):
            $$campo = $valor;
        endforeach;
        
        $this->query = " UPDATE piezas SET id_pieza = $id_pieza, nombre=$nombre,  cantidad=$cantidad, descripcion=$descripcion, cantidadMinima=$cantidadMinima WHERE id_pieza = $id_pieza ";
        $this->execute_single_query();
    }
    
    public function delete($id='') {
        $this->query = " DELETE FROM piezas WHERE id_pieza = $id ";
        $this->execute_single_query();
    }
    
    function __destruct() {
     #   unset($this);
    }
}
