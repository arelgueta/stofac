<?php
require_once('db_abstract_model.php');

class Ruta extends DBAbstractModel {
    protected $id_usuario;
    public $fecha;
    public $destino;
    public $visitado;
    public $id_factura;
	
	    public $nombre;
    public $cantidad;
    public $id_cliente; 
    
    function __construct() {
        $this->db_name ='facturacion';
    }
	
    public function gets() {
        $this->query = "SELECT rutas.id_rutas,concat(usuarios.apellido,', ' ,usuarios.nombre) as uNombre,rutas.fecha,concat(cliente.nombre,', ',cliente.apellido,' -> ',cliente.direccion) as direccion,rutas.visitado,rutas.id_factura, cliente.id_cliente FROM rutas,usuarios, cliente WHERE usuarios.id_usuario=rutas.id_usuario and cliente.id_cliente=rutas.id_cliente order by id_rutas desc";
        $this->get_results_from_query();
	return $this->rows;
    }  
   
    public function get($id_rutas='') {
        if($id_rutas!=''):
            $this->query = " SELECT id_rutas,id_usuario,fecha,id_cliente,visitado,id_factura FROM rutas WHERE id_rutas = $id_rutas order by id_rutas desc ";  // Busca por usuario
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
			////echo "campo: ".$$campo."<br>valor: ".$valor."<br>";
        endforeach;      
		$visitado=$id_factura=0;
        $this->query = " INSERT INTO rutas (id_usuario,fecha,id_cliente,visitado,id_factura) VALUES ('$id_usuario','$fecha','$id_cliente','$visitado', '$id_factura') ";
		$this->execute_single_query();
	echo "fecha:".$fecha."<br>";
    }
	
	public function setFactura($prod_data=array()) {
        foreach ($prod_data as $campo=>$valor):
            $$campo = $valor;
        endforeach;      
		$visitado=$id_factura=0;
        $this->query = " INSERT INTO factura (id_factura,id_cliente,fecha,total) VALUES ('$id_usuario','$fecha','$id_cliente','$visitado', '$id_factura') ";
		$this->execute_single_query();

    }
    
    public function edit($prod_data=array()) {
        foreach ($prod_data as $campo=>$valor):
            $$campo = $valor;
        endforeach;
        $this->query = " UPDATE rutas SET id_usuario = '$id_usuario', fecha='$fecha', id_destino='$id_destino', visitado='$visitado', "
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
        $this->query = " DELETE FROM rutas WHERE id_rutas = $id_rutas ";
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
	
	    public function getsHojaRuta($fecha='',$id_usuario='') {
        $this->query = "Select factura.id_factura, factura.id_cliente, concat(cliente.apellido,', ',cliente.nombre) as nombre, 
					factura.fecha as fechaFactura, factura.total, rutas.id_usuario, rutas.fecha as fechaRuta FROM factura 
		INNER JOIN rutas on factura.id_cliente=rutas.id_cliente and factura.id_factura=rutas.id_factura 
		INNER JOIN cliente on factura.id_cliente=cliente.id_cliente 
		WHERE rutas.id_factura is not null and  factura.fecha=$fecha and rutas.id_usuario=$id_usuario";
        $this->get_results_from_query();
		
	return $this->rows;
    }    
    
    public function getsHojaCarga() {
        $this->query = "SELECT producto.nombre, sum(factura_detalle.cantidad) as cantidad from factura_detalle
INNER JOIN producto on factura_detalle.id_producto=producto.id_producto GROUP BY producto.nombre ";
        $this->get_results_from_query();
		
	return $this->rows;
    }   
    
    public function getsHoja() {
        $this->query = "SELECT * FROM rutas group by id_usuario, fecha";
        $this->get_results_from_query();
		
	return $this->rows;
    }
	
	
    function __destruct() {
       # unset($this);
    }
}
