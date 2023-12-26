<?php

namespace App\Services;

use App\Businesses\Requests\RecipeIngredientAddRequest;


interface RecipeIngredientService{

    public function getById(int $id);
    public function getAllByRecipeId(int $recipeId);

    public function add(RecipeIngredientAddRequest $recipeIngredientAddRequest);
    public function update(int $id);
    public function deleteById(int $id);
    public function deleteByRecipeId(int $recipeId);

}

