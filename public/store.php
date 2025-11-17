<?php
// Crear un usuario

use Dsw\Blog\DAO\UserDao;
use Dsw\Blog\Models\User;

require_once '../bootstrap.php';

if (isset($_POST['email'], $_POST['name'])){
    $user = new User(null, $_POST['name'], $_POST['email'], null);
    
    $userDAO = new UserDao($conn);
    $user = $userDAO->create($user);
}

header('Location: users.php');
exit();
