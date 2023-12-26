<?php 

namespace App\Businesses\Requests;

class RecipeIngredientAddRequest{

    protected int $recipeId;
    protected string $productName;


    public function __construct(){

        $this->recipeId = 0;
        $this->productName = "";
    }

    public function getRecipeId(){
        return $this->recipeId;
    }

    public function setRecipeId(int $recipeId){
        $this->recipeId = $recipeId;
    }

    public function getProductName(){
        return $this->productName;
    }

    public function setProductName(string $productName){
        $this->productName = $productName;
    }

}