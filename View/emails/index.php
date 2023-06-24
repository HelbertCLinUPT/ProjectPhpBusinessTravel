<?php
// Cargar la librería de PHP Mailer
require 'vendor/autoload.php';

// Crear una nueva instancia de PHPMailer
$mail = new PHPMailer\PHPMailer\PHPMailer();

// Configurar el servidor SMTP
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';  // Reemplaza con el servidor SMTP que deseas utilizar
$mail->SMTPAuth = true;
$mail->Username = 'hc2020067571@virtual.upt.pe';  // Reemplaza con tu dirección de correo
$mail->Password = 'meqndxdfrbdzrgei';  // Reemplaza con tu contraseña de correo
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

// Configurar el remitente y el destinatario
$mail->setFrom('hc2020067571@virtual.upt.pe', 'Bussinenss');
$mail->addAddress('jjjuliooo733@gmail.com', 'Helbert');

// Configurar el contenido del correo
$mail->isHTML(true);
$mail->Subject = 'Asunto del correo';
$mail->Body = 'Contenido del correo en formato HTML';
$mail->AltBody = 'Contenido del correo en texto plano (opcional)';

// Enviar el correo
if ($mail->send()) {
    echo 'El correo ha sido enviado.';
} else {
    echo 'Error al enviar el correo: ' . $mail->ErrorInfo;
}
?>
