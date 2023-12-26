<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use Faker\Factory;

class FakeDataController extends Controller
{
    public function generateFakeData()
    {
        $faker = Factory::create();

        for($i=0; $i < 100; $i++){

    

        // Sahte isim ve e-posta oluştur
        $name = $faker->name;
        $email = $faker->email;

        // Sahte adres oluştur
        $address = $faker->address;

        $recipeModel = new \App\Models\Recipe();

        // Eklenecek veri
        $data = [
            'recipe_title' => $name,
            'recipe_description' => $email,
            'created_at' => '10-10-2022'
        ];

        // Veriyi ekleyin
        $recipeModel->insert($data);
    }
     
    }
}
