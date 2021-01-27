<?php

namespace App\Domain\Mail;

use Swift_SmtpTransport;
use Swift_Mailer;
use Swift_Message;
/**
 * 
 */
class Mail 
{
    private $mail;
    private $transport;
    private $message;

    function __construct()
    {        
        $this->transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
                            ->setUsername('jcsj2010@gmail.com')
                            ->setPassword('fi#0323@');

        $this->mail = new Swift_Mailer($this->transport);
        $this->message = new Swift_Message();
    }


public function message() {}

public function send() { }

}