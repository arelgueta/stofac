<?php
require_once('db_abstract_model.php');

class Hoja extends DBAbstractModel {
    public $nombre;
    public $cantidad;
    public $id_factura;
    public $id_cliente;
    public $fecha;
    public $id_usuario;   
    public $cantidad;
    
	/*
	consulta de prueba
	
	SELECT producto.nombre, sum(factura_detalle.cantidad) as cantidad 
from factura_detalle
INNER JOIN producto on factura_detalle.id_producto=producto.id_producto
INNER JOIN rutas on rutas.id_factura=factura_detalle.id_factura
where rutas.fecha ="2017-10-26"
GROUP BY producto.nombre
	
	*/
    public function getsHojaRuta($fecha='',$id_usuario='') {
        $this->query = "Select factura.id_factura, factura.id_cliente, concat(cliente.apellido,', ',cliente.nombre) as nombre, 
					factura.fecha as fechaFactura, factura.total, rutas.id_usuario, rutas.fecha as fechaRuta 
		FROM factura 
		INNER JOIN rutas on factura.id_cliente=rutas.id_cliente and factura.id_factura=rutas.id_factura 
		INNER JOIN cliente on factura.id_cliente=cliente.id_cliente 
		WHERE rutas.id_factura is not null and  factura.fecha=$fecha and rutas.id_usuario=$id_usuario";
        $this->get_results_from_query();
		
	return $this->rows;
    }    
    
    public function getsHojaCarga() {
        $this->query = "SELECT producto.nombre, sum(factura_detalle.cantidad) as cantidad 
from factura_detalle
INNER JOIN producto on factura_detalle.id_producto=producto.id_producto
GROUP BY producto.nombre ";
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
    #    unset($this);
    }
}
