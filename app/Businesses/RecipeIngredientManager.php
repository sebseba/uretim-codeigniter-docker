<?php
namespace App\Businesses;

use App\Services\RecipeIngredientService;
use App\Models\RecipeIngredientsModel;
use App\Businesses\Requests\RecipeIngredientAddRequest;

class RecipeIngredientManager implements RecipeIngredientService{

    protected $recipeIngredientsModel;

    public function __construct(){
        $this->recipeIngredientsModel = new RecipeIngredientsModel();
    }

    public function getById(int $id){

        return $this->recipeIngredientsModel->find($id);

    }



    public function getAllByRecipeId(int $recipeId){

        return $this->recipeIngredientsModel->where('recipe_id', $recipeId)->findAll();

    }

  

    public function add(RecipeIngredientAddRequest $recipeIngredientAddRequest){

        $data = [
            "recipe_id" => $recipeIngredientAddRequest->getRecipeId(),
            "product_name" => $recipeIngredientAddRequest->getProductName(),
        ];

        return $this->recipeIngredientsModel->insert($data);

    }

    public function update(int $id){


    }
    public function deleteById(int $id){

        return $this->recipeIngredientsModel->delete($id);


    }

    public function deleteByRecipeId(int $recipeId){

        return $this->recipeIngredientsModel->where('recipe_id', $recipeId)->delete();


    }
}