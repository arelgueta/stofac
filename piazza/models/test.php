<?php
require_once("usuario_model.php");

$log = new Usuario();

$log->buscar_usuario('vendedor');

//////var_dump($datos_login);
print $log->usuario .' ' . $log->clave .' existe<br>';
