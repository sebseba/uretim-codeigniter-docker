<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Businesses\RecipeManager;
use App\Businesses\Requests\RecipeAddRequest;

class RecipeController extends ResourceController
{
    protected $modelName = 'App\Models\Recipe';
    protected $format    = 'json';

    protected $recipeManager;

    public function __construct(){
        $this->recipeManager = new RecipeManager();
    }

    public function getAll()
    {
        $this->response->setHeader('Access-Control-Allow-Origin', '*'); // Set this to the domains you want to allow

        $recipes = $this->recipeManager->getAll();
        return $this->respond($recipes);

    }

    public function getAllWithIngredients()
    {

        $recipes = $this->recipeManager->getAllWithIngredients();
        return $this->respond($recipes);

    }

    

    public function getById(int $id)
    {
        
        $recipe = $this->recipeManager->getById($id);
        return $this->respond($recipe);

    }

    public function getByIdWithIngredients(int $id)
    {
        
        $recipe = $this->recipeManager->getByIdWithIngredients($id);
        return $this->respond($recipe);

    }

    public function add()
    {

        $recipeAddRequest = new RecipeAddRequest();

        $recipeAddRequest->setRecipeTitle($this->request->getVar('recipe_title'));
        $recipeAddRequest->setRecipeDescription($this->request->getVar('recipe_description'));

        
        $recipe = $this->recipeManager->add($recipeAddRequest);

        if($recipe){
            $message = [
                "message" => "Recipe Eklendi"
            ];
            return $this->respondCreated($message);

        }else{
            $message = [
                "message" => "Recipe Eklendi"
            ];
            return $this->respond($message, 400);
        }

    
    }


    public function delete($id = null)
    {
        
        $recipe = $this->recipeManager->delete($id);
       
        
        if($recipe){
            $message = [
                "message" => "Recipe Silindi"
            ];
            return $this->respondDeleted($message);

        }else{
            $message = [
                "message" => "Recipe Silme Hata"
            ];
            return $this->respond($message, 400);
        }

    }


}
