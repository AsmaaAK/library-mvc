<?php
use App\Controllers\BookController;
use App\Controllers\UserController;
use App\Core\Router;

// require __DIR__. '/../Controllers/UserController.php';
// require __DIR__. '/../Controllers/BookController.php';

// use App\Core\Router;
$router = new Router();
$router->get('/library-mvc/books',[BookController::class,'index']);
$router->get('/library-mvc/books/create',[BookController::class,'create']);
$router->post('/library-mvc/books',[BookController::class,'store']);
$router->get('/library-mvc/books/edit/{id}',[BookController::class,'edit']);
$router->post('/library-mvc/books/update',[BookController::class,'update']);
$router->post('/library-mvc/books/delete',[BookController::class,'delete']);

$router->get('/library-mvc/users',[UserController::class,'index']);
$router->get('/library-mvc/users/create',[UserController::class,'create']);
$router->post('/library-mvc/users',[UserController::class,'store']);
$router->get('/library-mvc/users/edit/{id}',[UserController::class,'edit']);
$router->post('/library-mvc/users/update',[UserController::class,'update']);
$router->post('/library-mvc/users/delete',[UserController::class,'delete']);
