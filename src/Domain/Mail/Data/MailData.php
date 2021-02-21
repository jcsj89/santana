<?php

namespace App\Domain\Mail\Data;

/**
 * Mail Data
 */
class MailData 
{
    private $subject;
    private $to;
    private $from;
    private $body;

    function __construct()
    {        
        $this->subject = 'Site Santana Quimica';
        $this->to = ['santanaquimica@terra.com.br', 'jcsj2010@gmail.com'];
        $this->from = 'contato@santanaquimica.com.br';
        $this->body = null;
    }

    public function setSubject( $subject ){        
        $this->subject = is_string($subject) && strlen($subject) < 60 ? $subject : 'Sem Assunto';
    }    

    public function getSubject(){
        return $this->subject;
    }

    public function setTo( $to ){        
        $this->to[] = (filter_var($to, FILTER_VALIDATE_EMAIL)) ? $to : 'jcsj2010@gmail.com';
    }    

    public function getTo(){
        return $this->to;
    }

    public function setFrom( $from ){        
        $this->from = (filter_var($from, FILTER_VALIDATE_EMAIL)) ? $from : 'jcsj2010@gmail.com';
    }    

    public function getFrom(){
        return $this->from;
    }

    public function setBody( $body ){        
        $this->body = is_string($body) ? $body : 'mensagem com problemas';
    }    

    public function getBody(){
        return $this->body;
    }
}