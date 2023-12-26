<?php

namespace App\Controllers;

use App\Businesses\AuthManager;
use App\Businesses\Requests\LoginRequest;
use App\Models\UsersModel;
use CodeIgniter\RESTful\ResourceController;
use Exception;
use Firebase\JWT\JWT;

class AuthController extends ResourceController
{
    protected $format    = 'json';

    protected $authManager;

    public function __construct(){
        $this->authManager = new AuthManager();
    }

    public function login(){
        
        $loginRequest = new LoginRequest();
        $loginRequest->setEmail($this->request->getVar('email'));
        $loginRequest->setPassword($this->request->getVar('password'));
        
        try {

            $loginResult = $this->authManager->login($loginRequest);

            if ($loginResult) {

                $message = [
                    "success" => "true",
                    "message" => "Giriş Başarılı!",
                    "user_token" => $loginResult
                ];
                return $this->respond($message, 200);

            } else {

                 $message = [
                    "success" => "true",
                    "message" => "Bir hata oluştu",
                ];
                return $this->respond($message, 400);
                
            }
            
        } catch (Exception $e) {

            $message = [
                "success" => "false",
                "message" => $e->getMessage(),
            ];
            return $this->respond($message, 400);
        }

        
    }

    public function readUser(){
        $request=service('request');
        $key="caritut";
        $headers=$request->getHeader('authorization');
        $jwt=$headers->getValue();
        return $jwt;
    }

    public function register(){
        $users=new UsersModel();
        $name = $this->request->getVar('name');
        $email = $this->request->getVar('email');
        $password=password_hash($this->request->getVar('password'),PASSWORD_DEFAULT);

        $users = new UsersModel();
        $data=[
            'name'=>$name,
            'email'=>$email,
            'password'=>$password,
        ];
        $result = $users->save($data);
        if($result){
            $key="caritut";
                $payload = [
                    'iss' => 'localhost',
                    'aud' => 'localhost',
                    'data' => [
                        'name' => $name,
                        'email' => $email,
                    ]
                ];
                $jwt=JWT::encode($payload, $key, 'HS256');
            return $this->respondCreated([
                'status' =>1,
                'jwt'=>$jwt,
                'message' =>'User Register Succesfully'
            ]);
        }else{
            return $this->respondCreated([
                'status' =>0,
                'message' =>'User not register Succesfully'
            ]);
        }
    }

    
}
