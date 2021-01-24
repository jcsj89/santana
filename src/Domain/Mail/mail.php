<?php

namespace App\Domain\Mail;

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

/**
 * 
 */
class mail 
{
    private $mail;
    function __construct()
    {
        // Instantiation and passing `true` enables exceptions
        $this->mail = new PHPMailer(true);
    }



public function send()
{
   try {
    //Server settings
    $this->mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $this->mail->isSMTP();  
                                              // Send using SMTP
    $this->mail->Host       = 'smtp.google.com';                    // Set the SMTP server to send through
    $this->mail->SMTPAuth   = false;                                   // Enable SMTP authentication
    $this->mail->Username   = 'jcsj2010@gmail.com';                     // SMTP username
    $this->mail->Password   = 'fi#0323@';                               // SMTP password    

    //$this->mail->SMTPSecure = 'tls';
    $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $this->mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $this->mail->setFrom('jcsj2010@gmail.com', 'Mailer');
    $this->mail->addAddress('jcsj2010@gmail.com', 'Joe User');     // Add a recipient
    //$this->mail->addAddress('ellen@example.com');               // Name is optional
    //$this->mail->addReplyTo('info@example.com', 'Information');
    //$this->mail->addCC('cc@example.com');
    //$this->mail->addBCC('bcc@example.com');

    // Attachments
    //$this->mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$this->mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $this->mail->isHTML(true);                                  // Set email format to HTML
    $this->mail->Subject = 'Here is the subject';
    $this->mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $this->mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $this->mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
}

}

}