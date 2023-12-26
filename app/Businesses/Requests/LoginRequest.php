<?php 

namespace App\Businesses\Requests;

class LoginRequest{

    protected string $email;
    protected string $password;


    public function __construct(){

        $this->email = "";
        $this->password = "";
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail(string $email){
        $this->email = $email;
    }

    public function getPassword(){
        return $this->password;
    }

    public function setPassword(string $password){
        $this->password = $password;
    }

}