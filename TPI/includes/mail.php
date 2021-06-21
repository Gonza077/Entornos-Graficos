
<?php

    use PHPMailer\PHPMailer\PHPMailer;  
    //use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/Exception.php';
    require 'phpmailer/PHPMailer.php';
    require 'phpmailer/SMTP.php';


    function enviarMail($email_receptor,$asunto,$cuerpo_html)
    {

        //Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
                //Config del server
                $mail->SMTPDebug = 0;                      //muestra el mensaje de error del server (0 no muestra)
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'moduloconsultas@gmail.com';                     //SMTP username
                $mail->Password   = 'consultas0607';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                //Emisor y Receptor
                $mail->setFrom('moduloconsultas@gmail.com', 'Modulo Consultas'); //Emisor
                $mail->addAddress($email_receptor);     //Receptor

                //Archivos adjuntos
                // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

                //Contenido del mail
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = $asunto;
                $mail->Body    = $cuerpo_html;
                //$mail->AltBody = $cuerpo_noHtml;

                //Enviar el correo
                $mail->send();
                echo 'El mensaje ha sido enviado exitosamente.';
            } 
        catch (Exception $e) 
            {
               echo 'El mensaje no pudo ser enviado.', $mail->ErrorInfo;
            }
    } 

?>