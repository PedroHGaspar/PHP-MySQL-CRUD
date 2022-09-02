<?php

    use PHPMailer\PHPMailer\PHPMailer;


    function enviar_email($destinatario, $assunto, $mensagem_html)
    {
        require 'vendor/autoload.php';


        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPDebug = 0;
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->Username = 'testepedrogaspar@gmail.com';
        $mail->Password = 'pkxjfvamrcyeonwa';
        $mail->SMTPSecure = false;
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';
        $mail->setFrom('testepedrogaspar@gmail.com', "Pedro Henrique");
        $mail->addAddress($destinatario);
        $mail->Subject = $assunto;
        $mail->Body = $mensagem_html;

        if ($mail->send()) {
            echo "<div class= sucessoCadastroSendEmail ;><span><b>Email enviado com sucesso!!</b></span></div>";
            return true;
        } else {
            echo "<div class= falhaCadastroSendEmail ;><span><b>O e-mail não foi enviado. Entre em contato com o suporte.</b></span></div>";
            return false;
        }
    }
    ?>