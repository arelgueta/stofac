<?php
require_once('db_abstract_model.php');

class TipoUsuario extends DBAbstractModel {
    protected $id_tipo;
    public $descripcion;
    
    function __construct() {
        $this->db_name ='facturacion';
    }
    
    public function gets() {
        $this->query = " SELECT id_tipo, descripcion FROM tipo_usuario ";
        $this->get_results_from_query();
		
	return $this->rows;
    }    
    
    public function get($id='') {
        if($id !=''):
            $this->query = " SELECT id_tipo, descripcion FROM tipo_usuario WHERE id_tipo = $id ";
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
            
            $this->query = " INSERT INTO tipo_usuario (descripcion) VALUES ('$descripcion') ";
            $this->execute_single_query();
    }
    
    public function edit($prod_data=array()) {
        foreach ($prod_data as $campo=>$valor):
            $$campo = $valor;
        endforeach;
        
        $this->query = " UPDATE tipo_usuario SET descripcion = '$descripcion' WHERE id_tipo = $id_tipo ";
        $this->execute_single_query();
    }
    
    public function delete($id='') {
        $this->query = " DELETE FROM tipo_usuario WHERE id_tipo = $id ";
        $this->execute_single_query();
    }    

    function __destruct() {
    #    unset($this);
    }
}
