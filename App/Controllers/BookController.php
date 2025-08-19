<?php
namespace App\Controllers;
use App\Core\LoggerFactory;
use App\Core\NotificationCenter;
use App\Models\Book;
use App\Core\QueryBuilder;
use App\Core\App;
class BookController {
   function index() {
    $query = (new QueryBuilder())
        ->table("books")
        ->select(["id", "title", "author", "copies_available"])
        ->where("id", "=", "2")
        ->orderBy("created_at", "DESC")
        ->limit(5)
        ->getSQL();

    
    $stmt = App::db()->query($query);
    $books = $stmt->fetchAll(\PDO::FETCH_ASSOC);

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
