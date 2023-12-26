<?php

namespace App\Controllers;
use App\Models\RecipesModel;

class Home extends BaseController
{
    public function index(): string
    {
        return view("welcome_message");
    }

    public function recipes() {
        $recipeModel = new RecipesModel();

        // Tüm kayıtları getirme
        $recipes = $recipeModel->findAll();

        print_r(json_encode($recipes)); 

    }

    public function sercan(){
        echo "sercan";
    }
}
