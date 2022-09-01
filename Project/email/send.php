​<?php

use PHPMailer\PHPMailer\PHPMailer;
require 'vendor/autoload.php';

$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 2;
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->Username = 'testepedrogaspar@gmail.com';
$mail->Password = 'lkjh098!@#';
$mail->SMTPSecure = false;
$mail->isHTML(true);
$mail->CharSet = 'UTF-8';
$mail->setFrom('testepedrogaspar@gmail.com​', "Pedro Henrique");
$mail->addAddress('pedraoh498@gmail.com');
$mail->Subject = 'E-mail de teste';
$mail->Body = "<h1>EMail enviado com sucesso!</h1><p>Parabéns! Deu tudo certo.</p>";

if($mail->send())
    echo "E-mail enviado com sucesso!!";
else
    echo "Falha ao enviar e-mail.";

?>