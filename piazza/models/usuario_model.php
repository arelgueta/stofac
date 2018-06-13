<?php
require_once('db_abstract_model.php');

class Usuario extends DBAbstractModel {
    protected $id_usuario;
    public $usuario;    
    public $clave;
    public $nombre;
    public $apellido;
    public $email;
    public $id_tipo;
    
    function __construct() {
        $this->db_name ='facturacion';
    }
    
    public function listar() {
        $this->query = " SELECT u.id_usuario,u.usuario, u.clave, u.nombre, u.apellido, u.email, u.id_tipo, t.descripcion "
                . "      FROM usuarios u left "
                . "      JOIN (select id_tipo, descripcion from tipo_usuario) t on (u.id_tipo = t.id_tipo) ";
        $this->get_results_from_query();
		
	return $this->rows;
    }    
    
    public function gets() {
        $this->query = " SELECT id_usuario,usuario,clave, nombre, apellido, email, id_tipo FROM usuarios ";
		////echo $query;
        $this->get_results_from_query();
		
	return $this->rows;
    }    
	
    public function gets_Usr_Ruta() {
        $this->query = "select usuarios.id_usuario, usuarios.usuario,usuarios.nombre, usuarios.apellido, usuarios.email, tipo_usuario.descripcion from usuarios INNER JOIN tipo_usuario on tipo_usuario.id_tipo=usuarios.id_tipo";
       // $query = "select usuarios.id_usuario, usuarios.usuario,usuarios.nombre, usuarios.apellido, usuarios.email, tipo_usuario.descripcion from usuarios INNER JOIN tipo_usuario on tipo_usuario.id_tipo=usuarios.id_tipo";
		////echo $query."<br>";
        $this->get_results_from_query();
		
		return $this->rows;
    }
	
        public function gets_Usr_Destino() {
        $this->query = "select usuarios.id_usuario, usuarios.usuario,usuarios.nombre, usuarios.apellido, usuarios.email, tipo_usuario.descripcion
							from usuarios 
							INNER JOIN tipo_usuario on tipo_usuario.id_tipo=usuarios.id_tipo";
        $this->get_results_from_query();
		
		return $this->rows;
    } 
	
    public function get($id='') {
        if($id !=''):
            $this->query = " SELECT id_usuario, usuario, clave, nombre, apellido, email, id_tipo FROM usuarios WHERE id_usuario = $id ";
            $this->get_results_from_query();
        endif;
        
        if(count($this->rows) == 1):
            foreach ($this->rows[0] as $propiedad=>$valor):
                $this->$propiedad = $valor;
            endforeach;
        endif;
        return $this->rows;
    }
    
    public function buscar_usuario($usuario='') {
        if($usuario !=''):
            $this->query = " SELECT usuario, clave, id_tipo FROM usuarios WHERE usuario = '$usuario' ";
            $this->get_results_from_query();
        endif;
        
        if(count($this->rows) == 1):
            foreach ($this->rows[0] as $propiedad=>$valor):
                $this->$propiedad = $valor;
            endforeach;
        endif;
        //return $this->rows;
        //return $this->query;
    }    
    
    public function set($usuario_data = array()) {
        foreach ($usuario_data as $campo=>$valor):
            $$campo = $valor;
        endforeach;
        $this->query = " INSERT INTO usuarios (usuario, clave, nombre, apellido, email, id_tipo) VALUES ('$usuario', '$clave', '$nombre', '$apellido','$email',$id_tipo) ";
        $this->execute_single_query();
    }
    
    public function edit($usuario_data=array()) {
        foreach ($usuario_data as $campo=>$valor):
            $$campo = $valor;
        endforeach;
        $this->query = " UPDATE usuarios SET usuario = '$usuario', clave = '$clave', nombre = '$nombre' , apellido = '$apellido',email = '$email', id_tipo = $id_tipo WHERE id_usuario = $id_usuario ";
       // $query = " UPDATE usuarios SET usuario = '$usuario', clave = '$clave', nombre = '$nombre' , apellido = '$apellido',email = '$email', id_tipo = $id_tipo WHERE id_usuario = $id_usuario ";
		////echo $query;
        $this->execute_single_query();
    }
    
    public function delete($id_usuario='') {
        $this->query = " DELETE FROM usuarios WHERE id_usuario = $id_usuario ";
        $this->execute_single_query();
    }
    
    function __destruct() {
#        unset($this);
    }
}
