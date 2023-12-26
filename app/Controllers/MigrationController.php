<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Services;

class MigrationController extends Controller
{
    public function migrate()
    {
        // Tüm migration'ları çalıştır
        $migrate = Services::migrations();
        $migrate->regress(0); // Tüm migration'ları geri al
        $migrate->latest();   // Tüm migration'ları sırasıyla çalıştır

        echo 'Tüm migration işlemi başarıyla tamamlandı.';
    }
}
