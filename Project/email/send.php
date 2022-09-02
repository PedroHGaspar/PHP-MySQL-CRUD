​<?php

use PHPMailer\PHPMailer\PHPMailer;


function enviar_email($destinatario,$assunto,$mensagem_html){
require '../vendor/autoload.php';


$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 2;
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->Username = 'testepedrogaspar@gmail.com';
$mail->Password = 'pkxjfvamrcyeonwa';
$mail->SMTPSecure = false;
$mail->isHTML(true);
$mail->CharSet = 'UTF-8';
$mail->setFrom('testepedrogaspar@gmail.com​', "Pedro Henrique");
$mail->addAddress('pedraoh498@gmail.com');
$mail->Subject = 'E-mail de teste';
$mail->Body = "<h1>Teste dos testes</h1><p>E-mail enviado com sucesso! Parabéns pedro, esse email chegou na sua caixa de mensagens! Vamos testar para o celular agora.</p>";

if($mail->send()){
    echo "E-mail enviado com sucesso!!";
    return true;
}
else{
    echo "Falha ao enviar e-mail.";
    return false;
}
}
?>