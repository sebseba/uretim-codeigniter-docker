<?php

namespace App\Services;

use App\Businesses\Requests\LoginRequest;


interface AuthService{

    public function login(LoginRequest $loginRequest);
}

