<?php

namespace App\Models;

use CodeIgniter\Model;
use \Tatter\Relations\Traits\ModelTrait;

class RecipesModel extends Model
{
    use ModelTrait;

    protected $table            = 'recipes';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['recipe_title', 'recipe_description'];

   
    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function recipeIngredients()
    {
        return $this->hasMany(RecipeIngredient::class, 'recipe_id');
    }

}
