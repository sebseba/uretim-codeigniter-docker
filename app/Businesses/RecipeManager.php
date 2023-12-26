<?php
namespace App\Businesses;

use App\Services\RecipeService;
use App\Models\RecipesModel;
use App\Businesses\Requests\RecipeAddRequest;

class RecipeManager implements RecipeService{

    protected $recipesModel;

    public function __construct(){
        $this->recipesModel = new RecipesModel();
    }

    public function getById(int $id){

        return $this->recipesModel->find($id);

    }

    public function getByIdWithIngredients(int $id){

        return $this->recipesModel->with('recipe_ingredients')->find($id);

    }


    public function getAll(){

        return $this->recipesModel->findAll();

    }

    public function getAllWithIngredients(){

        return $this->recipesModel->with('recipe_ingredients')->findAll();

    }

    public function add(RecipeAddRequest $recipeAddRequest){

        $data = [
            "recipe_title" => $recipeAddRequest->getRecipeTitle(),
            "recipe_description" => $recipeAddRequest->getRecipeDescription(),
        ];

        return $this->recipesModel->insert($data);

    }

    public function update(int $id){


    }
    public function delete(int $id){

        return $this->recipesModel->delete($id);


    }
}