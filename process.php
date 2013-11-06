<?php
if (isset($_POST)) {
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];
    $sexo = $_POST["sexo"];
    $edad = $_POST["edad"];
    $autorizacion = (isset($_POST['autorizacion']) ? $_POST['autorizacion'] : 0);

    if ($nombre && $email && $telefono && $sexo && $edad !== "") {
        include_once("webService/lib/nusoap.php");
        try{
          $client = new SoapClient("http://stage.havasww.com.mx/axa/rodarSeguro/webService/registerData.php?wsdl");
          $params = array('nombre' => $nombre, 
                       'email' => $email, 
                       'telefono' => $telefono, 
                       'edad' => $edad,  
                       'sexo' => $sexo, 
                       'autorizacion' => $autorizacion);
        
          $result = $client->__call("registerDataContact",$params);
         
          if($result == 0){
              header("Location: index.php?error=2");
          }
        }catch (SoapFault $e){
            header("Location: index.php?error=2");
        }
        
        include_once "util.php";
        $gender = ($sexo=="M")? "Masculino" : "Femenino";
        $autoriza = ($autorizacion==0)? "NO" : "S&Iacute;";
        $subject = "Nuevo registro AXA Rodar Seguro";
        $body = "<html>
                <head>
                <meta charset='iso-8859-1' />
                </head>
                <body>
                <div style='font-family: Arial; font-size: 12px'>
                    Hay un nuevo registro de <b>AXA Rodar Seguro</b>:<br/><br/>
                    
                    Datos enviados:<br/><br/>
                    <b>Nombre: </b>".$nombre."<br/>
                    <b>Correo electr&oacute;nico: </b>".$email."<br/>
                    <b>Tel&eacute;fono: </b>".$telefono."<br/>
                    <b>Sexo: </b>".$gender."<br/>
                    <b>Edad: </b>". $edad." a&ntilde;os<br/><br/>
                    
                    El usuario <b>".$autoriza."</b> ha permitido que AXA comparta su informaci&oacute;n con un asesor para que sea contactado por tel&eacute;fono o correo electr&oacute;nico.<br/><br/>
                    
                    Fecha de env&iacute;o del formulario: ".date("j M, Y, g:i a")."</div></body></html>";
         if(!enviarEmail($subject, $body)){
             header("Location: index.php?error=3");
         }
    }
    else{
        header("Location: index.php?error=1");
    }
} else {
    header("Location: index.php");
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8" />
        <title>AXA - Rodar Seguro</title>

        <link rel="stylesheet" type="text/css" href="css/reset.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <script src="js/jquery-1.10.2.min.js"></script>
        <script src="js/jquery.validate.js"></script>
        <script src="js/jquery.maskedinput.min.js"></script>
        <script src="js/main.js"></script>
    </head>

    <body>
        <div id="container">

            <div id="title">
                &nbsp;
            </div>

            <div id="content">
                <div id="info">
                    <img class="imgMap" src="images/body.png" usemap="#infoToolTip">

                    <map name="infoToolTip">
                        <area shape="circle" coords="240,90,10" alt="Gastos médicos" class="info" id="tooltip1">
                        <area shape="circle" coords="240,126,10" alt="Pérdidas orgánicas" class="info" id="tooltip2">
                        <area shape="circle" coords="240,159,10" alt="Muerte accidental" class="info" id="tooltip3">
                        <area shape="circle" coords="240,189,10" alt="Médico 24hrs" class="info" id="tooltip4">
                    </map>
                </div>
                <div id="resp">
                    <a href="http://s16338.gridserver.com/reaccionaporlavida/" target="_blank"><img src="images/logo-reacciona-por-la-vida.png" alt="Reacciona por la vida"></a> 
                </div>
            </div>

            <div id="footer">
                &nbsp;
            </div>

        </div>
        <div id="tool1"></div>
        <div id="tool2"></div>
        <div id="tool3"></div>
        <div id="tool4"></div>
    </body>
</html>
