<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Businesses\RecipeIngredientManager;
use App\Businesses\Requests\RecipeIngredientAddRequest;

class RecipeIngredientsController extends ResourceController
{
    protected $modelName = 'App\Models\Recipe';
    protected $format    = 'json';

    protected $recipeIngredientManager;

    public function __construct(){
        $this->recipeIngredientManager = new RecipeIngredientManager();
    }

    public function getAllByRecipeId(int $recipeId)
    {

        $recipes = $this->recipeIngredientManager->getAllByRecipeId($recipeId);
        return $this->respond($recipes);

    }


    

    public function getById(int $id)
    {
        
        $recipe = $this->recipeIngredientManager->getById($id);
        return $this->respond($recipe);

    }


    public function add()
    {

        $recipeIngredientAddRequest = new RecipeIngredientAddRequest();

        $recipeIngredientAddRequest->setRecipeId($this->request->getVar('recipe_id'));
        $recipeIngredientAddRequest->setProductName($this->request->getVar('product_name'));

        
        $recipe = $this->recipeIngredientManager->add($recipeIngredientAddRequest);

        if($recipe){
            $message = [
                "message" => "Recipe Ingredient Eklendi"
            ];
            return $this->respondCreated($message);

        }else{
            $message = [
                "message" => "Recipe Ingredient Eklendi"
            ];
            return $this->respond($message, 400);
        }

    
    }


    public function deleteById($id = null)
    {
        
        $recipe = $this->recipeIngredientManager->deleteById($id);
       
        if($recipe){
            $message = [
                "message" => "Recipe Ingredient Silindi"
            ];
            return $this->respondDeleted($message);

        }else{
            $message = [
                "message" => "Recipe Ingredient Silme Hata"
            ];
            return $this->respond($message, 400);
        }

    }

    public function deleteByRecipeId($recipeId = null)
    {
        
        $recipe = $this->recipeIngredientManager->deleteByRecipeId($recipeId);
       
        
        if($recipe){
            $message = [
                "message" => "Recipe Ingredient RecipeId ile Silindi"
            ];
            return $this->respondDeleted($message);

        }else{
            $message = [
                "message" => "Recipe Ingredient RecipeId ile Silme Hata"
            ];
            return $this->respond($message, 400);
        }

    }


}
