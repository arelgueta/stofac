<?php
require_once('db_abstract_model.php');

class Destino extends DBAbstractModel {
    protected $id_destino;
    public $id_localidad;
    public $id_cliente;
    public $nombre;
    
    function __construct() {
        $this->db_name ='facturacion';
    }
	
    public function gets() {
        $this->query = "SELECT 	id_destino,nombre as nombreDestino FROM destinos ";
		////echo $query = "SELECT 	id_destino,nombre as nombreDestino FROM destinos<br>";
        $this->get_results_from_query();
	return $this->rows;
    }  
   
    public function get($id_destino='') {
        if($id_destino!=''):
            $this->query = " SELECT id_destino,id_localidad,nombre as nombreDestino,id_cliente, 
								FROM destinos 
								WHERE id_destino = $id_destino
								order by id_destino desc ";  // Busca por usuario
            $this->get_results_from_query();
        endif;
        
        if(count($this->rows) == 1):
            foreach ($this->rows[0] as $propiedad=>$valor):
                $this->$propiedad = $valor;
				////echo "Valor: ".$valor."<br>";
            endforeach;
        endif;
        return $this->rows;
    }
    
	public function set($prod_data=array()) {
        foreach ($prod_data as $campo=>$valor):
            $$campo = $valor;
        endforeach;      
		$visitado=$id_factura=0;
        $this->query = " INSERT INTO destinos (nombre) VALUES ('$nombre') ";
		$this->execute_single_query();

    }
	
	public function setFactura($prod_data=array()) {
        foreach ($prod_data as $campo=>$valor):
            $$campo = $valor;
        endforeach;      
		$visitado=$id_factura=0;
        $this->query = " INSERT INTO factura (id_factura,id_cliente,fecha,total) VALUES ('$id_usuario','$fecha','$direccion','$visitado', '$id_factura') ";
		$this->execute_single_query();

    }
    
    public function edit($prod_data=array()) {
        foreach ($prod_data as $campo=>$valor):
            $$campo = $valor;
        endforeach;
        $this->query = " UPDATE rutas SET id_usuario = '$id_usuario', fecha='$fecha', id_cliente='$id_cliente', visitado='$visitado', "
                . " id_factura='$id_factura' WHERE id_rutas = $id_rutas ";
        $this->execute_single_query();
    }
    
    public function edit2($prod_data=array()) {
		header('Location: www.google.com');
        foreach ($prod_data as $campo=>$valor):
            $$campo = $valor;
        endforeach;
		$query = " UPDATE rutas SET visitado='$visitado', id_factura='$id_factura' WHERE id_rutas = $id_rutas ";
		//echo $query."<br>";
		/*
        $this->query = " UPDATE rutas SET visitado='$visitado', id_factura='$id_factura' WHERE id_rutas = $id_rutas ";
        $this->execute_single_query();
    */}
    
    public function delete($id_rutas='') {
        $this->query = " DELETE FROM destinos WHERE id_destino = $id_rutas ";
		$this->execute_single_query();
    }
    
	public function vta_ruta($prod_data=array(),$id_nuevo){
		//$hoy=date();
        foreach ($prod_data as $campo=>$valor):
            $$campo = $valor;
        endforeach;
        $this->query = " UPDATE rutas SET visitado='$fecha', id_factura='$id_nuevo' WHERE id_rutas = $id_rutas ";
        //$query = " UPDATE rutas SET visitado='$fecha', id_factura='$id_nuevo' WHERE id_rutas = $id_rutas<br> ";
        ////echo $query;
		$this->execute_single_query();
		
	}
	
    function __destruct() {
  #      unset($this);
    }
}
