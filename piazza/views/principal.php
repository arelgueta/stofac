<?php
session_start(); 

include_once( "views/class.TemplatePower.inc.php" );

$tpl = new TemplatePower("views/principal.tpl");

$tpl->assignInclude( "header", "views/cabecera.tpl" );

$tpl->assignInclude( "footer", "views/pie.tpl" );

$tpl->prepare();

if(isset($_SESSION['usuario']) and $_GET['action'] <>'salir'){
    /*
     * Segun el tipo de usuario muestro los menus
     */ 
    if(isset($_SESSION['tipo'])){
        switch ($_SESSION['tipo']) {
            case 1:
                $tpl->newBlock( "m_vender" );
                $tpl->newBlock( "m_acceso" );
            break;   

            case 2:
                $tpl->newBlock( "m_vender" );
            break; 

        }        
    } 
    /*
     * Muestro el menu de salir
     */
    $tpl->newBlock( "m_salir" );
        $tpl->assign( "usu_activo",'hola');
        $tpl->assign( "ingreso",'INGRESAR');    
}
    
$action = '';

if (isset($_GET['action'])){
    $action = $_GET['action'];
}
 
switch ($action) {
    case 'login':
        if(trim($_POST['usuario'])<>'' and trim(sha1($_POST['clave']))<>''){
            $error='';
            //aqui busco el usuario y compruebo si la clave es la que corresponde

            if (trim($_POST['usuario']) <> $usu_log) {
                    $error = 'El usuario no se corresponde con uno valido ' . $valor;
            }
            if (trim(sha1($_POST['clave'])) <> $cla_log) {
                    $error = $error . ' La clave es incorrecta ' . $valor;
                
            }
                
            //echo $error;
            
            if ($error == ''){
                // cargo con el usuario la variable  de sesion
                $_SESSION['usuario'] = $_POST['usuario'];
                $_SESSION['tipo'] = $tipo_log;
                
                $tpl->newBlock( "bienvenido" );
                    $tpl->assign( "usuario_logeado",$_POST['usuario'] );
                    $tpl->assign( "ingreso",'INGRESAR' );
            }else {
                $tpl->newBlock( "mensaje" );
                    $tpl->assign( "err_msg",$error . $ver);                     
            }
                
        }else{  
                $tpl->newBlock( "form_login" );
        
        }
    break;
    
    case 'salir':
        session_destroy();
        $tpl->newBlock( "form_login" );
    break;    
    
    default:
            if(isset($_SESSION['usuario'])){
                $tpl->newBlock( "bienvenido" );
                    $tpl->assign( "usuario_logeado",$_SESSION['usuario']);
                    $tpl->assign( "ingreso",'Pagina Principal' );
            }else {
                $tpl->newBlock( "form_login" );
            }
        
    break;
}
       

$tpl->printToScreen();
