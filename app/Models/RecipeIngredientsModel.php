<?php

namespace App\Models;

use CodeIgniter\Model;


class RecipeIngredientsModel extends Model
{
   
    protected $table            = 'recipe_ingredients';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['recipe_id', 'product_name'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}
