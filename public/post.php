<?php

use Dsw\Blog\DAO\PostDao;
use Dsw\Blog\DAO\UserDao;
use Dsw\Blog\Database;
use Dsw\Blog\Models\Post;

require_once '../vendor/autoload.php';

if(!(isset($_GET['id']) && is_numeric($_GET['id']))){
    die('El id no es válido.');
}

$id = $_GET['id'];

$postDAO = new PostDao($conn);
$post = $postDAO->get($id);

if (!$post) {
    die('Artículo no existe');
}
$userId = $post->getUserId();
$userDAO = new UserDao($conn);
$user = $userDAO->get($userId);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if ($post){
        printf("<h1>%s: %s</h1>", $post->getId(), $post->getTitle());
        printf("<h2>%s</h2>", $post->getBody());
    }else{
        echo "Artículo no encontrado.";
    }
    ?>
</body>
</html>