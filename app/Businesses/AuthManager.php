<?php

namespace App\Businesses;

use App\Businesses\Requests\LoginRequest;
use App\Models\UsersModel;
use App\Services\AuthService;
use Exception;
use Firebase\JWT\JWT;

class AuthManager implements AuthService
{

    protected $usersModel;

    public function __construct()
    {
        $this->usersModel = new UsersModel();
    }


    public function login(LoginRequest $loginRequest)
    {

        $is_email = $this->usersModel->where('email', $loginRequest->getEmail())->first();

        if (!$is_email) {

            throw new Exception('Kullanıcı Adı veya Şifre Geçersiz!');
        }


        $verify_password = password_verify($loginRequest->getPassword(), $is_email['password']);

        if (!$verify_password) {

            throw new Exception('Kullanıcı Adı veya Şifre Geçersiz!');
        }

        $key = "uretim";
        $payload = [
            'iss' => 'localhost',
            'aud' => 'localhost',
            'data' => [
                'user_id' => $is_email['id'],
                'email' => $is_email['email'],
            ]
        ];

        return JWT::encode($payload, $key, 'HS256');

    }
}
