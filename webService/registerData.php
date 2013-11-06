<?php
include_once("lib/nusoap.php");
include_once("../util.php");

$server = new soap_server();
$url = "http://stage.havasww.com.mx/axa/rodarSeguro/webService/registerData.php";

$server->wsdl->schemaTargerNamespace = $url;
$server->configureWSDL("registerData");

$server->register(
        'registerDataContact',
        array( 'nombre' => 'xsd:string', 
               'email' => 'xsd:string', 
               'telefono' => 'xsd:string', 
               'edad' => 'xsd:int',  
               'sexo' => 'xsd:string', 
               'autorizacion' => 'xsd:int'),
         array('return' => "xsd:int"),
         $url       
        );
        
 function registerDataContact($nombre, $email, $telefono, $edad, $sexo, $autorizacion){
     if(insertar($nombre, $email, $telefono, $edad, $sexo, $autorizacion)){
         return 1;
     }
     else {
         return 0;
     }
 }

$POST_DATA = isset($GLOBALS['HTTP_RAW_POST_DATA']) ? $GLOBALS['HTTP_RAW_POST_DATA'] : '';
 
$server->service($POST_DATA);

exit();
?>