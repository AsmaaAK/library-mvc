<?php
namespace App\Controllers;
use App\Core\LoggerFactory;
use App\Models\Book;
class BookController {
    function index(){
    $book = new Book();
    $books = $book->all();
    
    $data = ['books' => $books]; 
    extract($data); 
        require __DIR__.'/../Views/books/index.php';
    }

    function create(){
        require __DIR__.'/../Views/books/create.php';
    }

    function store(){
        $book = new Book();
        $book->create($_POST['title'],$_POST['author'],$_POST['copies']);
        try {
    $logger = LoggerFactory::createLogger('file');
    $logger->log("book added  successfully.");

    echo "Logs have been written successfully!";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
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
        
    header("Location: /library-mvc/books");
    exit;
    }

    function delete(){
        $book = new Book();
        $book->delete($_POST['id']);
          header("Location: /library-mvc/books");
    exit;
    }
}
