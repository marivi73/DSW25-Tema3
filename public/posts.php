<?php

use Dsw\Blog\DAO\PostDao;
use Dsw\Blog\DAO\UserDao;

require_once '../bootstrap.php';

$postDAO = new PostDao($conn);
$posts = $postDAO->getAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Listao de Artículos</h1>
    <!-- <p>
        <a href="createPost.php">Crear un artículo</a>
    </p> -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Usuario</th>
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
                printf("<td> <a href=\"post.php?id=%s\">%s</a></td>", $post->getId(), $post->getTitle());
                printf("<td>%s</td>", $user->getName());
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>