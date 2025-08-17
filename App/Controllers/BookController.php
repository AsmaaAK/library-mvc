<?php
namespace App\Controllers;

use App\Models\Book;

class BookController {
    function index(){
        $book = new Book();
        $books = $book->all();
        require __DIR__.'/../views/books/index.php';
    }

    function create(){
        require __DIR__.'/../views/books/create.php';
    }

    function store(){
        $book = new Book();
        $book->create($_POST['title'],$_POST['author'],$_POST['copies']);
        $this->index();
    }

    function edit($id){
        $book = new Book();
        $single = $book->find($id);
        require __DIR__.'/../views/books/edit.php';
    }

    function update(){
        $book = new Book();
        $book->update($_POST['id'],$_POST['title'],$_POST['author'],$_POST['copies']);
        $this->index();
    }

    function delete(){
        $book = new Book();
        $book->delete($_POST['id']);
        $this->index();
    }
}
