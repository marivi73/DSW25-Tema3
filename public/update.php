<?php
// Modificar un usuario

use Dsw\Blog\DAO\UserDao;

require_once '../bootstrap.php';

if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
    die('El id no es válido.');
}

$id = $_GET['id'];

if (isset($_POST['id'], $_POST['name'], $_POST['email'])) {
    $userDAO = new UserDao($conn);
    
    //Obtengo el usuario
    $user = $userDAO->get($id);

    //Modifico los datos:
    $user->setName($_POST['name']);

    //Guardo el usuario:
    $userDAO->update($user);
}


header('Location: selectall.php');
exit(); 