<?php
namespace App\Models;

use App\Core\App;
use App\Traits\LoggingTrait;
use App\Traits\SearchableTrait;

class Book {
    use LoggingTrait, SearchableTrait;

    public function all() {
        $stmt = App::db()->prepare("SELECT * FROM books");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function find($id){
        $stmt = App::db()->prepare("SELECT * FROM books WHERE id=:id");
        $stmt->execute(['id'=>$id]);
        return $stmt->fetch();
    }

    public function create($title, $author, $copies){
        $stmt = App::db()->prepare("INSERT INTO books(title, author, copies_available) VALUES(:title,:author,:copies)");
        $stmt->execute(['title'=>$title,'author'=>$author,'copies'=>$copies]);
        $this->log("Book created: $title");
    }

    public function update($id, $title, $author, $copies){
        $stmt = App::db()->prepare("UPDATE books SET title=:title, author=:author, copies_available=:copies WHERE id=:id");
        $stmt->execute(['title'=>$title,'author'=>$author,'copies'=>$copies,'id'=>$id]);
        $this->log("Book updated: $title");
    }

    public function delete($id){
        $stmt = App::db()->prepare("DELETE FROM books WHERE id=:id");
        $stmt->execute(['id'=>$id]);
        $this->log("Book deleted: $id");
    }

    // Example Transaction: Borrow Book
    public function borrow($book_id, $user_id){
        $pdo = App::db();
        try {
            $pdo->beginTransaction();
            $stmt1 = $pdo->prepare("INSERT INTO borrows(book_id,user_id,borrow_date) VALUES(:b,:u,NOW())");
            $stmt1->execute(['b'=>$book_id,'u'=>$user_id]);

            $stmt2 = $pdo->prepare("UPDATE books SET copies_available=copies_available-1 WHERE id=:id AND copies_available>0");
            $stmt2->execute(['id'=>$book_id]);

            $pdo->commit();
        } catch (\Exception $e){
            $pdo->rollBack();
            throw $e;
        }
    }
}
