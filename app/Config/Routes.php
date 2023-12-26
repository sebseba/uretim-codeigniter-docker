<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/migrate', 'MigrationController::migrate');
$routes->get('/', 'Home::index');

//AUTH
$routes->post('/auth/login', 'AuthController::login');
$routes->post('/auth/register', 'AuthController::register');

//USERS
$routes->post('/users', 'UsersController::add', ['filter' => 'auth']);

//RECIPES
$routes->get('/recipes', 'RecipeController::getAll', ['filter' => 'auth']);
$routes->get('/recipes/ingredients', 'RecipeController::getAllWithIngredients', ['filter' => 'auth']);

$routes->get('/recipes/(:num)', 'RecipeController::getById/$1', ['filter' => 'auth']);
$routes->get('/recipes/(:num)/ingredients', 'RecipeController::getByIdWithIngredients/$1', ['filter' => 'auth']);

$routes->post('/recipes', 'RecipeController::add', ['filter' => 'auth']);
//$routes->put('/recipeingredients/(:num)', 'RecipeIngredientsController::update/$1');
$routes->delete('/recipes/(:num)', 'RecipeController::delete/$1', ['filter' => 'auth']);

//RECIPE INGREDIENTS
$routes->get('/recipeingredients/(:num)/recipes', 'RecipeIngredientsController::getAllByRecipeId/$1', ['filter' => 'auth']);
$routes->get('/recipeingredients/(:num)', 'RecipeIngredientsController::getById/$1', ['filter' => 'auth']);

$routes->post('/recipeingredients', 'RecipeIngredientsController::add', ['filter' => 'auth']);
$routes->delete('/recipeingredients/(:num)', 'RecipeIngredientsController::deleteById/$1', ['filter' => 'auth']);
$routes->delete('/recipeingredients/(:num)/recipes', 'RecipeIngredientsController::deleteByRecipeId/$1', ['filter' => 'auth']);

$routes->put('/recipeingredients/(:num)', 'RecipeIngredientsController::update/$1', ['filter' => 'auth']);

//$routes->get('/generateFakeData', 'FakeDataController::generateFakeData');




