<?php

namespace App\Domain\User\Data;
use DateTime;
use App\Domain\Pessoa\Data\PessoaCreateData;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserCreateData
 *
 * @author Junior
 */
final class UserCreateData
{    
    private $username = '';
    private $password = '';
    private $create_time = '';
    private $update_time = '';    
    private $pessoa = '';    
    private $role = '';    
    
    
    function __construct() {
        $this->username = '';
        $this->password = '';
        $this->create_time = '';
        $this->update_time = '';    
        $this->pessoa = new PessoaCreateData();    
        $this->role = '';         
        $this->setUpdate_time( $this->getDateNow() );     
    }
    
    
    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }

    function getCreate_time() {
        return $this->create_time;
    }

    function getUpdate_time() {
        return $this->update_time;
    }

    function getPessoa() {
        return $this->pessoa;
    }

    function getRole() {
        return $this->role;
    }
    

    function setUsername($username): void {
        $this->username = $username;
    }

    function setPassword($password): void {
        $this->password = $password;
    }

    function setCreate_time($create_time): void {
        $this->create_time = $create_time;
    }

    function setUpdate_time($update_time): void {
        $this->update_time = $update_time;
    }

    function setPessoa($pessoa): void {
        $this->pessoa = $pessoa;
    }

    function setRole($role): void {
        $this->role = $role;
    }    

    //função retorna data formato para salvar no banco
    public function getDateNow()
    {
        $now = new DateTime();
        $today = $now->format('Y-m-d H:i:s');
        return $today;
    }

}
