<?php

namespace Controllers;

use Models\UserModel;
use src\classes\DatabaseConnect;

class UserController
{

    public static function index() {
        $userModel = new UserModel;
        $users = $userModel->getAll();
        return json_encode($users);
    }

    public static function findOneUser($id) {
        
        return "hello hear i'm user number $id";
    }

  
}