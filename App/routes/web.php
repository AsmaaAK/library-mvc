<?php
use App\Controllers\BookController;
use App\Controllers\UserController;

$router->get('/books',[BookController::class,'index']);
$router->get('/books/create',[BookController::class,'create']);
$router->post('/books',[BookController::class,'store']);
$router->get('/books/{id}/edit',[BookController::class,'edit']);
$router->post('/books/update',[BookController::class,'update']);
$router->post('/books/delete',[BookController::class,'delete']);

$router->get('/users',[UserController::class,'index']);
$router->get('/users/create',[UserController::class,'create']);
$router->post('/users',[UserController::class,'store']);
$router->get('/users/{id}/edit',[UserController::class,'edit']);
$router->post('/users/update',[UserController::class,'update']);
$router->post('/users/delete',[UserController::class,'delete']);
