<?php
if (isset($_POST)) {
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];
    $sexo = $_POST["sexo"];
    $edad = $_POST["edad"];
    $autorizacion = (isset($_POST['$autorizacion']) ? $_POST['$autorizacion'] : 0);

    if ($nombre && $email && $telefono && $sexo && $edad !== "") {
        //TODO process
        //if process fail -> redirect error=2 "process failed"
        
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
                    <p class="back"> <a href="index.php" target="_self" >Regresar</a> </p>
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
