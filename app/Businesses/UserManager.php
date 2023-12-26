<?php
namespace App\Businesses;

use App\Businesses\Requests\UserAddRequest;
use App\Models\UsersModel;
use App\Services\UserService;
use Exception;

class UserManager implements UserService{

    protected $usersModel;

    public function __construct(){
        $this->usersModel = new UsersModel();
    }


    public function add(UserAddRequest $userAddRequest){

        $data = [
            "email" => $userAddRequest->getEmail(),
            "password" => $userAddRequest->getPassword(),
        ];

         // UsersModel içinde tanımlanan validationRules kullanılacak
        if (!$this->usersModel->validate($data)) {
            // Validasyon başarısız olursa, hata mesajlarını al
            $errors = $this->usersModel->errors();

            // Hata mesajlarını içeren bir exception fırlat
            throw new Exception(json_encode($errors));
        }

        $data['password'] = password_hash($userAddRequest->getPassword(), PASSWORD_DEFAULT);

        $result = $this->usersModel->insert($data);
      
        return $result;

    }

  
}