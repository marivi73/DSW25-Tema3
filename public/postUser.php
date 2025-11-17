<?php

use Dsw\Blog\DAO\PostDao;
use Dsw\Blog\DAO\UserDao;

require_once '../booststrap.php';

if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
    die('El id no es válido.');
}

$id = $_GET['id'];

$userDAO = new UserDao($conn);
$user = $userDAO->get($id);

if(!$user){
    die('Artículo no existente');
}

$postDao = new PostDao($conn);
$post = $postDao->getByUser($user->getId());
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Listado de Artículos</h1>
    <h2>Usuario: <</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>ID Usuario</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $userDAO = new UserDao($conn);
            foreach($posts as $post){
                $userId = $post->getUserId();
                $user = $userDAO->get($userId);
                echo "<tr>";
                printf("<td>%s</td>", $post->getId());
                printf("<td>%s</td>", $post->getTitle());
                printf("<td>%s</td>", $user->getName());
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>