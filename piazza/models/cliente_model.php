<?php
require_once('db_abstract_model.php');

class Cliente extends DBAbstractModel {
    protected $id_cliente;
    public $nombre;
    public $apellido;
    public $direccion;
    public $id_destino;
    public $telefono;
    public $email;   
    public $cuit;
    
    function __construct() {
        $this->db_name ='facturacion';
    }
    
    public function gets() {
        $this->query = " SELECT cliente.id_cliente,cliente.nombre,cliente.apellido,cliente.direccion,cliente.id_destino,cliente.telefono,cliente.email, cliente.cuit 
				,destinos.nombre as nombreDestino
				FROM cliente
				left join destinos on cliente.id_destino=destinos.id_destino	";
        $this->get_results_from_query();
		
	return $this->rows;
    }    
    
    public function get($id='') {
        if($id !=''):
            $this->query = " SELECT id_cliente,nombre,apellido,direccion,id_destino,telefono,email, cuit FROM cliente WHERE id_cliente = $id ";
            $this->get_results_from_query();
        endif;
        
        if(count($this->rows) == 1):
            foreach ($this->rows[0] as $propiedad=>$valor):
                $this->$propiedad = $valor;
            endforeach;
        endif;
        return $this->rows;
    }
       
	public function getDestino($id=array()) {
        if($id !=''):
		
		foreach ($id as $campo=>$valor):
            $$campo = $valor;
			////echo "nombre: ".$campo." , valor: ".$valor."<br>";
			if ($campo == "id_destino"){
				$id=$valor;
				////echo "Id_destino, dentro de if: ".$id."<br>";
			}
        endforeach;
		
            $this->query = " SELECT id_cliente FROM cliente WHERE id_destino = $id ";
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
            $this->query = " SELECT * FROM cliente where apellido like '%" . $apellido . "%'";
            $this->get_results_from_query();
        endif;
		
	return $this->rows;
    }        
    
    public function set($prod_data=array()) {
        foreach ($prod_data as $campo=>$valor):
            $$campo = $valor;
        endforeach;        

        $this->query = " INSERT INTO cliente (nombre, apellido, direccion, id_destino, telefono, email, cuit) VALUES ('$nombre', '$apellido', '$direccion','$id_destino','$telefono','$email', '$cuit') ";
        $this->execute_single_query();

    }
    
    public function edit($prod_data=array()) {
        foreach ($prod_data as $campo=>$valor):
            $$campo = $valor;
        endforeach;
        
        $this->query = " UPDATE cliente SET nombre = '$nombre', apellido='$apellido', direccion='$direccion', id_destino='$id_destino', "
                . " telefono='$telefono', email= '$email' , cuit = '$cuit' WHERE id_cliente = $id_cliente ";
        $this->execute_single_query();
    }
    
    public function delete($id='') {
        $this->query = " DELETE FROM cliente WHERE id_cliente = $id ";
        $this->execute_single_query();
    }
    
    function __destruct() {
       # unset($this);
    }
}
