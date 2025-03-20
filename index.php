<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require "vendor/autoload.php";
require "Classes/Content.php";

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
$contentMaker = new Content();
$placeholder = [
    "invoice_number" => 387847,
    "fullname" => "Hashim Abbas"
];

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'gwadar.gymkhana@gmail.com';                     //SMTP username
    $mail->Password   = /* APp Password here */ 0;                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`


    //Recipients
    $mail->setFrom('no-reply@gwadargymkhana.com.pk', 'No Reply');
    $mail->addAddress('habbas21219@gmail.com', 'Hashim Abbas');     //Add a recipient
   
    //Attachments
    $mail->addAttachment('files/Hassaan Ahmed.pdf');         //Add attachments
    
    $mail->CharSet = "UTF-8"; 
    $subject = $contentMaker->subject($placeholder);
    $body = $contentMaker->body($placeholder);

    //Content
    $mail->isHTML(true);
    $mail->Subject = nl2br($subject);
    $mail->Body    = nl2br($body);

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}