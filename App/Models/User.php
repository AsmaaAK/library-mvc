<?php
namespace App\Models;

class User {
    use LoggingTrait, SearchableTrait;

    public function all(){
        $stmt = App::db()->prepare("SELECT * FROM users");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function create($name, $email){
        $stmt = App::db()->prepare("INSERT INTO users(name,email) VALUES(:name,:email)");
        $stmt->execute(['name'=>$name,'email'=>$email]);
        $this->log("User created: $name");
    }

    public function update($id, $name, $email){
        $stmt = App::db()->prepare("UPDATE users SET name=:name,email=:email WHERE id=:id");
        $stmt->execute(['name'=>$name,'email'=>$email,'id'=>$id]);
        $this->log("User updated: $name");
    }

    public function delete($id){
        $stmt = App::db()->prepare("DELETE FROM users WHERE id=:id");
        $stmt->execute(['id'=>$id]);
        $this->log("User deleted: $id");
    }
}
