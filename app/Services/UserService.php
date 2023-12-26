<?php

namespace App\Services;

use App\Businesses\Requests\UserAddRequest;


interface UserService{

    public function add(UserAddRequest $userAddRequest);
}

