<?php

use Dsw\Blog\DAO\PostDao;
use Dsw\Blog\DAO\UserDao;

require_once '../bootstrap.php';

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
    <h1><?= $post->getTitle() ?></h1>
    <p><?= $post->getBody() ?></p>
    <h3><?= $user->getName() ?></h3>
    <p>
        <a href="editPost.php?id=<?= $post->getId() ?>">Editar Artículo</a>
    </p>
    <p>
        <a href="deletePost.php?id=<?= $post->getId() ?>">Eliminar Artículo</a>
    </p>
</body>
</html>