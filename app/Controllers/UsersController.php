<?php

namespace App\Controllers;

use App\Businesses\Requests\UserAddRequest;
use App\Businesses\UserManager;
use CodeIgniter\RESTful\ResourceController;
use Exception;

class UsersController extends ResourceController
{

    protected $userManager;
    protected $format    = 'json';

    public function __construct()
    {

        $this->userManager = new UserManager();
    }

    public function add()
    {

        $userAddRequest = new UserAddRequest();

        $userAddRequest->setEmail($this->request->getVar('email'));
        $userAddRequest->setPassword($this->request->getVar('password'));

        try {

            $result = $this->userManager->add($userAddRequest);

            if ($result) {

                $message = [
                    "success" => "true",
                    "message" => "Kullanıcı Eklendi"
                ];
                return $this->respondCreated($message);

            } else {

                 $message = [
                    "success" => "true",
                    "message" => "Bir hata oluştu"
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
}
