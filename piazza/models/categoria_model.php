<?php
require_once('db_abstract_model.php');

class Categoria extends DBAbstractModel {
    protected $id_categoria;
    public $nombre;
    public $descripcion;
    
    
    function __construct() {
        $this->db_name ='facturacion';
    }
    
    public function gets() {
        $this->query = " SELECT id_categoria, nombre, descripcion FROM categoria ";
        $this->get_results_from_query();
		
	return $this->rows;
    }    
    
    public function get($id='') {
        if($id !=''):
            $this->query = " SELECT id_categoria, nombre, descripcion FROM categoria WHERE id_categoria = $id ";
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

        $this->query = " INSERT INTO categoria (nombre, descripcion) VALUES ('$nombre', '$descripcion') ";
        $this->execute_single_query();
          /*  endif;
        endif;*/
    }
    
    public function edit($prod_data=array()) {
        foreach ($prod_data as $campo=>$valor):
            $$campo = $valor;
        endforeach;
        
        $this->query = " UPDATE categoria SET nombre = '$nombre', descripcion = '$descripcion' WHERE id_categoria = $id_categoria ";
        $this->execute_single_query();
    }
    
    public function delete($id='') {
        $this->query = " DELETE FROM categoria WHERE id_categoria = $id ";
        $this->execute_single_query();
    }
    
    function __destruct() {
#        unset($this);
    }
}
