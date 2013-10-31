<?php
if (isset($_GET["error"])) {
    $error = $_GET["error"];

    if ($error == 1) {
        $mensaje = "Hubo un problema en el envío de sus datos, intente de nuevo por favor.";
    }
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
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
            <div id="error" style="display: <?php echo (isset($mensaje))? 'block': 'none';?>"  class="info-error"><?php echo (isset($mensaje))? $mensaje: '';?></div>
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
                <div id="form">
                    <div class="right">
                        <label >*Campos obligatorios</label>
                    </div>
                    <div class="space5"></div>
                    <form id="rodarSeguro-form" name="rodarSeguro-form" method="post" action="process.php">
                        <div class="item-form">
                            <label>Nombre*</label>
                            <br/>
                            <input type="text" id="nombre" name="nombre" maxlength="60" class="large"/>
                            <div class="alert r info" id="error_nombre"></div>
                        </div>

                        <div class="item-form">
                            <label>Correo electr&oacute;nico*</label>
                            <br/>
                            <input type="text" id="email" name="email" maxlength="80" class="large"/>
                            <div class="alert r info" id="error_email"></div>
                        </div>

                        <div class="item-form">
                            <label>Tel&eacute;fono*</label>
                            <br/>
                            <input type="text" id="telefono" name="telefono" maxlength="15" class="large"/>
                            <div class="alert r info" id="error_telefono"></div>
                        </div>

                        <div class="space5"></div>

                        <div class="item-form">
                            <div class="col-left">
                                <div class="alert l info" id="error_sexo"></div><label>Sexo* </label>
                                <input type="radio" name="sexo" id="sexo" value="M"/>
                                <label>M</label>
                                <input type="radio" name="sexo" id="sexo" value="F"/>
                                <label>F</label>
                            </div>
                            <div class="col-right">
                                <label>Edad* </label>
                                <input type="text" id="edad" name="edad" maxlength="2" class="small"/>
                                <div class="alert r info" id="error_edad" ></div>
                            </div>
                        </div>

                        <div class="item-form">
                            <div class="col-left-min">
                                <input type="checkbox" id="autorizacion" name="autorizacion" value="1"/>
                            </div>
                            <div class="col-right-max">
                                <p class="privacidad">
                                    Autorizo que AXA comparta mi información con un asesor para que me contacte por teléfono o correo electrónico; Conoce el Aviso de Privacidad de AXA, da clic <a href="http://axa.mx/personas/paginas/avisodeprivacidad.aspx" target="_blank">aquí</a>.
                                </p>
                            </div>
                        </div>

                        <div class="item-form centered">
                            <input type="submit" class="button" value="Enviar"/>
                        </div>

                    </form>
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
