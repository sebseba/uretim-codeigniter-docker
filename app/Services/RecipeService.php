<?php

namespace App\Services;

use App\Businesses\Requests\RecipeAddRequest;


interface RecipeService{

    public function getById(int $id);
    public function getAll();

    public function add(RecipeAddRequest $recipeAddRequest);
    public function update(int $id);
    public function delete(int $id);
}

