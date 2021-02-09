<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
$data = file_get_contents('php://input');

$data = json_decode($data, true);

require_once "vendor/autoload.php";

$mail = new PHPMailer(true);

//Enable SMTP debugging.
/* $mail->SMTPDebug = 3;    */                            
//Set PHPMailer to use SMTP.
$mail->isSMTP();            
//Set SMTP host name                          
$mail->Host = "mail.xn--cabaascolibri-lkb.cl";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;                          
//Provide username and password     
$mail->Username = "informacion@xn--cabaascolibri-lkb.cl";                 
$mail->Password = "L#33rtUd]B[)";                           
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "ssl";                           
//Set TCP port to connect to
$mail->Port = 465;    
$mail->SMTPOptions = array(
	'ssl' => array(
		'verify_peer' => false,
		'verify_peer_name' => false,
		'allow_self_signed' => true
	)
);                               

$mail->From = "informacion@xn--cabaascolibri-lkb.cl";
$mail->FromName = "Mensaje de Cliente";

$mail->addAddress("$data[email]", "Recepient Name"); //CAMBIAR EL CORREO POR EL DE herrmau
$mail->AddCC("ricardoecheverriaortiz@gmail.com", "Ricardo");

$mail->isHTML(true);
$asunto = "Mensaje de Cliente - Cabañas Colibrí";
$asunto = utf8_decode($asunto);
$mail->Subject = $asunto;
$mail->Body = "<i>El cliente: $data[usuario] con correo: $data[email] y telefono: $data[celular] le envió el siguiente mensaje.<br/>$data[mensaje]</i>";
$mail->AltBody = "This is the plain text version of the email content";

try {
    $mail->send();
    $array = array(
        "status" => true
    );
} catch (Exception $e) {
    $array = array(
        "status" => false
    );
}

echo json_encode($array);
?>