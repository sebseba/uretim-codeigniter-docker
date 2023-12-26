<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RecipeIngredient extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'recipe_id' => [
                'type'       => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'product_name' => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('recipe_id', 'recipes', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('recipe_ingredients');
    }

    public function down()
    {
        //
    }
}
