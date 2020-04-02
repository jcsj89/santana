<?php 
namespace App\Domain\Mail\Data;

final class MailCreateData
{
    
    private $from;    
    private $address;
    private $subject;
    private $body;
    private $altBody;
    private $addressCopy;
    

    function __construct()
    {
        $this->from = 'santanaquimica@terra.com.br';
        $this->subject = 'Contato do site santanaquimica.com.br';
        $this->body = '';
        $this->altBody = '';
        $this->address = 'santanaquimica@terra.com.br';
        $this->addressCopy = 'santanaquimica@terra.com.br';
    }

    public function getFrom(){
    	return $this->from;
    }

    public function setFrom($from){
    	$this->from = $from;
    }

    public function getAddress(){
    	return $this->address;
    }

    public function setAddress($address){
    	$this->address = $address;
    }

    public function getSubject(){
    	return $this->subject;
    }

    public function setSubject($subject){
    	$this->subject = $subject;
    }

    public function getBody(){
    	return $this->body;
    }

    public function setBody($body){
    	$this->body = $body;
    }

    public function getAltBody(){
    	return $this->altBody;
    }

    public function setAltBody($altBody){
    	$this->altBody = $altBody;
    }

    public function getAddressCopy(){
    	return $this->addressCopy;
    }

    public function setAddressCopy($addressCopy){
    	$this->addressCopy = $addressCopy;
    }

}
 

  