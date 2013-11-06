<?php
function insertar($nombre, $email, $telefono, $edad, $sexo, $autorizacion){
    $host = "localhost";
    $db = "sta_rodarSeguro";
    $user = "sta_userAxa";
    $pass = "st117sa";
    $resultado = false;
    $afectaciones = -1;
    $query = "INSERT INTO contacto (nombre, email, telefono, edad, sexo, autorizacion)
                VALUES ('".$nombre."','".$email."', '".$telefono."',".$edad.", '".$sexo."', ".$autorizacion.")"; 
    $conexion = mysql_connect($host,$user,$pass);
    if ($conexion){
        if(mysql_select_db($db,$conexion)){
            $resultado = mysql_query($query, $conexion);
            if($resultado){
                $afectaciones = mysql_affected_rows();
                mysql_close($conexion);
                return ($afectaciones>=1) ? true : false;
            }
            else {
                return false;
            }
        }
        else {
            return false;
        }
    }
    else {
        return false;
    }
}

function enviarEmail($subject, $body){
    require 'src/PHPMailer/PHPMailerAutoload.php';
    
    $mail = new PHPMailer;
    
    $mail->isSMTP();                                        // Set mailer to use SMTP
    $mail->Host = 'server1.eurorscgb.com';                  // Specify main and backup server
    $mail->SMTPAuth = true;                                 // Enable SMTP authentication
    $mail->Username = 'rodarseguro@stage.havasww.com.mx';                            // SMTP username
    $mail->Password = 'sa117st';                            // SMTP password
    $mail->SMTPSecure = 'tls';                              // Enable encryption, 'ssl' also accepted
    
    //Remitente
    $mail->From = 'rodarseguro@stage.havasww.com.mx';
    $mail->FromName = 'Seguros AXA';
    $mail->addReplyTo('joma1408@gmail.com', 'Información');
    
    //Destinatarios:
    $mail->addAddress('jmanumurillo@hotmail.com', 'Manu Murillo');  // Add a recipient
    //$mail->addAddress('jmanumurillo@hotmail.com', 'Manu Murillo');  // Add a recipient
    //$mail->addCC($cc);
    //$mail->addBCC('bcc@example.com');
    
    
    //mensaje:
    //$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $body;
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
    if(!$mail->send()) {
       return false;
    }
    
    return true;
    
}
?>