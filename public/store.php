<?php
// Crear un usuario

use Dsw\Blog\DAO\UserDao;
use Dsw\Blog\Models\User;

require_once '../bootstrap.php';
accessControl($user, 'admin');

if (isset($_POST['email'], $_POST['name'])){
    $user = new User(null, $_POST['name'], $_POST['email'], $_POST['password'], $_POST['role'], null);
    
    $userDAO = new UserDao($conn);
    $user = $userDAO->create($user);
}

header('Location: users.php');
exit();