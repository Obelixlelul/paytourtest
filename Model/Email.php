<?php

namespace Model;
session_start();
//Load Composer's autoloader
require '../vendor/autoload.php';

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class Email 
{
    public function send($array){
        try {
            
            //Server settings
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->Host = 'smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Port = 2525;
            $mail->Username = 'ec8fabc7179fa1';
            $mail->Password = 'b88406dc97f51f';
            $mail->CharSet = 'UTF-8';
            $mail->Encoding = 'base64';
            //Recipients
            $mail->setFrom($array['email'], 'Candidato: '.$array['nome']);
            $mail->addAddress('dev@paytour.com.br');     //Add a recipient
        
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Curriculo: '.$array['nome'];
            $mail->Body    = '
            <h1>'.$array["nome"].'</h1>
            <p>Email: '.$array["email"].'</p>
            <p>Phone: '.$array["telefone"].'</p>
            <p>Cargo desejado: '.$array["cargo"].'</p>
            <p>Escolaridade: '.$array["escolaridade"].'</p>
            <p>Observacoes: '.$array["observations"].'</p>
            <p>Ip: '.$array["ip"].'</p>
            <p>Data de envio: '.$array["time"].'</p>
            <p>Id curriculo: '.$array["resume_file_path"].'</p>
            ';
            
            
            
            return $mail->send();
            // echo 'Mensagem enviada';
        } catch (Exception $e) {
            $_SESSION['error'] = "Mensagem nao pode ser enviada. Mailer Error: {$mail->ErrorInfo}";
        }
  
    }
}