<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['email', 'password'];

    protected $validationRules = [
        'email' => 'required|valid_email|is_unique[users.email]',
        'password' => 'required|min_length[8]',
    ];

    protected $validationMessages = [
        'email' => [
            'required' => 'E-posta alanı zorunludur.',
            'valid_email' => 'Geçerli bir e-posta adresi giriniz.',
            'is_unique' => 'Bu e-posta adresi zaten kullanılmaktadır.',
        ],
        'password' => [
            'required' => 'Şifre alanı zorunludur.',
            'min_length' => 'Şifre en az 8 karakter olmalıdır.',
        ],
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';


}
