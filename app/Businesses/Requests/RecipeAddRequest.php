<?php 

namespace App\Businesses\Requests;

class RecipeAddRequest{

    protected string $recipeTitle;
    protected string $recipeDescription;


    public function __construct(){

        $this->recipeTitle = "";
        $this->recipeDescription = "";
    }

    public function getRecipeTitle(){
        return $this->recipeTitle;
    }

    public function setRecipeTitle(string $recipeTitle){
        $this->recipeTitle = $recipeTitle;
    }

    public function getRecipeDescription(){
        return $this->recipeDescription;
    }

    public function setRecipeDescription(string $recipeDescription){
        $this->recipeDescription = $recipeDescription;
    }

}