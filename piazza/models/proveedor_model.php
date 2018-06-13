<?php
require_once('db_abstract_model.php');

class Proveedor extends DBAbstractModel {
    protected $id_proveedor;
    public $nombre;
    public $apellido;
    public $direccion;
    public $fecha_nacimiento;
    public $telefono;
    public $email;   
    public $cuit;
    
    function __construct() {
        $this->db_name ='facturacion';
    }
    
    public function gets() {
        $this->query = " SELECT id_proveedor,nombre,apellido,direccion,fecha_nacimiento,telefono,email, cuit FROM proveedor ";
        $this->get_results_from_query();
		
	return $this->rows;
    }    
    
    public function get($id='') {
        if($id !=''):
            $this->query = " SELECT id_proveedor,nombre,apellido,direccion,fecha_nacimiento,telefono,email, cuit FROM proveedor WHERE id_proveedor = $id ";
            $this->get_results_from_query();
        endif;
        
        if(count($this->rows) == 1):
            foreach ($this->rows[0] as $propiedad=>$valor):
                $this->$propiedad = $valor;
            endforeach;
        endif;
        return $this->rows;
    }
    
    public function buscar_apellido($apellido='') {
        if($apellido !=''):
            $this->query = " SELECT * FROM proveedor where apellido like '%" . $apellido . "%'";
            $this->get_results_from_query();
        endif;
		
	return $this->rows;
    }        
    
    public function set($prod_data=array()) {
        foreach ($prod_data as $campo=>$valor):
            $$campo = $valor;
        endforeach;        

        $this->query = " INSERT INTO proveedor (nombre, apellido, direccion, fecha_nacimiento, telefono, email, cuit) VALUES ('$nombre', '$apellido', '$direccion','$fecha_nacimiento','$telefono','$email', '$cuit') ";
        $this->execute_single_query();

    }
    
    public function edit($prod_data=array()) {
        foreach ($prod_data as $campo=>$valor):
            $$campo = $valor;
        endforeach;
        
        $this->query = " UPDATE proveedor SET nombre = '$nombre', apellido='$apellido', direccion='$direccion', fecha_nacimiento='$fecha_nacimiento', "
                . " telefono='$telefono', email= '$email' , cuit = '$cuit' WHERE id_proveedor = $id_proveedor ";
        $this->execute_single_query();
    }
    
    public function delete($id_proveedor='') {
        $this->query = " DELETE FROM proveedor WHERE id_proveedor = $id_proveedor ";
        $this->execute_single_query();
    }
    
    function __destruct() {
       # unset($this);
    }
}
