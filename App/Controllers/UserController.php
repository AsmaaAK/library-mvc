<?php
namespace App\Controllers;

use App\Models\User;

class UserController {
    function index(){
    $user = new User();
    $users = $user->all();
    
    $data = ['users' => $users]; // نمرر البيانات كمصفوفة
    extract($data); // تحويل المفاتيح إلى متغيرات
    
    require __DIR__.'/../Views/users/index.php';
        // require 'App/Views/users/index.php';
    }

    function create(){
        require __DIR__.'/../views/users/create.php';
    }

    function store(){
        $user = new User();
        $user->create($_POST['name'],$_POST['email']);
        $this->index();
    }

    function edit($id){
        $user = new User();
        $single = $user->find($id);
        require __DIR__.'/../views/users/edit.php';
    }

    function update(){
        $user = new User();
        $user->update($_POST['id'],$_POST['name'],$_POST['email']);
        $this->index();
    }

    function delete(){
        $user = new User();
        $user->delete($_POST['id']);
        $this->index();
    }
}
